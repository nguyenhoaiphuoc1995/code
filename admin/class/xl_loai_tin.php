<?php
include_once 'database.php';
class xl_loai_tin extends Database
{
    function danh_sach()
    {
        $lenh_sql = "SELECT *,(select cha.ten from nhom cha where cha.ma=nhom.danhmuccha) as tencha FROM nhom";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }

	function doc_thong_tin($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "SELECT * FROM nhom WHERE ma = '$id'";
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
		$duongdan=$data['duongdan'];
		$mota=$data['mota'];
		$hinhdaidien=$data['hinhdaidien'];

		$ngaytao=date('Y-m-d');
		$ngaycapnhat=$ngaytao;
		$kichhoat=(isset($data['kichhoat']))?1:0;		
		$tukhoa=$data['tukhoa'];
		$motatukhoa=$data['motatukhoa'];
		$tieude=$data['tieude'];
		$thutu=$data['thutu'];
		//echo '<pre>',print_r($data),'</pre>';
		$lenh_sql = "insert into nhom(ten,duongdan,mota,hinhdaidien,ngaytao,ngaycapnhat,kichhoat,tukhoa,motatukhoa,tieude,thutu) values(?,?,?,?,?,?,?,?,?,?,?)";
		//echo $lenh_sql;exit;
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($ten,$duongdan,$mota,$hinhdaidien,$ngaytao,$ngaycapnhat,$kichhoat,$tukhoa,$motatukhoa,$tieude,$thutu));
			return $result;
    }
	function sua($ma,$data)
    {
        //lay danh sach menu cha
        if($ma)
        {
			$ten=$data['ten'];
			$duongdan=$data['duongdan'];
			$mota=$data['mota'];
			$hinhdaidien=$data['hinhdaidien'];
			$ngaycapnhat=date('Y-m-d');		
			$kichhoat=(isset($data['kichhoat']))?1:0;
			$tukhoa=$data['tukhoa'];
			$motatukhoa=$data['motatukhoa'];
			$tieude=$data['tieude'];
			$thutu=$data['thutu'];
			$lenh_sql = "update nhom set ten=?,duongdan=?,mota=?,hinhdaidien=?,ngaycapnhat=?,kichhoat=?,tukhoa=?,motatukhoa=?,tieude=?,thutu=? where ma=?";
			//echo $lenh_sql;exit;
			$this->setQuery($lenh_sql);
			
			$result = $this->execute(array($ten,$duongdan,$mota,$hinhdaidien,$ngaycapnhat,$kichhoat,$tukhoa,$motatukhoa,$tieude,$thutu,$ma));
			return $result;
        }else
			return false;
        
    }
	function xoa($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "delete  FROM nhom WHERE ma = ?";
			$this->setQuery($lenh_sql);
			return $this->execute(array($id));
		}else
			return false;
    }
}
?>