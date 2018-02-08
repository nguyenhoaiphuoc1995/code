<?php
include_once 'database.php';
class xl_menu extends Database
{
    function danh_sach()
    {
        $lenh_sql = "SELECT *,(select ten from menu cha where cha.ma=menu.menucha) as ten_cha FROM menu ORDER BY thutu";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	function danh_sach_menu($cha=0)
    {
        $lenh_sql = "SELECT * FROM menu where menucha='$cha' ORDER BY thutu";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }

	function danh_sach_tin_loai_con($cha)
    {
		$lenh_sql = "SELECT * FROM nhomtin where kichhoat=1 and danhmuccha='$cha' ORDER BY ma DESC";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	function danh_sach_loai_tin()
    {
		$lenh_sql = "SELECT * FROM nhomtin where kichhoat=1 and danhmuccha=0 ORDER BY ma DESC";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	function danh_sach_tintuc($cha=0)
    {
		$them = ($cha>0)?" and manhomtin ='$cha'":'';
		$lenh_sql = "SELECT * FROM tintuc where kichhoat=1 $them ORDER BY ma DESC";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	
	function doc_thong_tin($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "SELECT * FROM menu WHERE ma = '$id'";
        }
        else
        {
            $lenh_sql = "";
        }
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
	function them($data)
    {
       //lay danh sach menu cha
		$ten=$data['ten'];
		$loaimenu=$data['loai_menu'];
		$duongdan=$data['duongdan'];
		$link=$data['link'];
		$menucha=$data['menucha'];
		$kichhoat=isset($data['kichhoat'])?1:0;
		$thutu=$data['thutu'];
		$mota=$data['mota'];
		$macdinh=isset($data['macdinh'])?1:0;
		$ngaytao=date('Y-m-d');
		$ngaycapnhat=$ngaytao;
		$icon=(isset($data['icon']))?$data['icon']:'';	
		$lenh_sql = "insert into menu(ten,duongdan,link,menucha,kichhoat,thutu,mota,macdinh,ngaytao,ngaycapnhat,icon,loai_menu) values(?,?,?,?,?,?,?,?,?,?,?,?)";
		//echo $lenh_sql;exit;
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($ten,$duongdan,$link,$menucha,$kichhoat,$thutu,$mota,$macdinh,$ngaytao,$ngaycapnhat,$icon,$loaimenu));
			return $result;
    }
	function sua($id,$data)
    {
        //lay danh sach menu cha
        if($id)
        {
			$loaimenu=$data['loai_menu'];
			$ten=$data['ten'];
			$duongdan=$data['duongdan'];
			$link=$data['link'];
			$menucha=$data['menucha'];
			$kichhoat=isset($data['kichhoat'])?1:0;
			$thutu=$data['thutu'];
			$mota=$data['mota'];
			$macdinh=isset($data['macdinh'])?1:0;
			$ngaycapnhat=date('Y-m-d');		
			$icon=(isset($data['icon']))?$data['icon']:'';					
			$lenh_sql = "update menu set ten=?,duongdan=?,link=?,menucha=?,kichhoat=?,thutu=?,mota=?,macdinh=?,ngaycapnhat=?,icon=?,loai_menu=? where ma=?";
			//echo $lenh_sql;exit;
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($ten,$duongdan,$link,$menucha,$kichhoat,$thutu,$mota,$macdinh,$ngaycapnhat,$icon,$loaimenu,$id));
			return $result;
        }else
			return false;
        
    }
	function xoa($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "delete  FROM menu WHERE ma =?";
			$this->setQuery($lenh_sql);
			return $this->execute(array($id));
		}else
			return false;
    }
}
?>