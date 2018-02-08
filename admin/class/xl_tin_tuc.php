<?php
include_once 'database.php';
class xl_tin_tuc extends Database
{
    function danh_sach_tin_tuc($id_loai_tin=0)
    {
        //lay danh sach menu cha
        if($id_loai_tin!=0)
        {
            $lenh_sql = "SELECT * FROM sanpham WHERE manhomtin = '$id_loai_tin' ORDER BY ngaytao desc,ma DESC";
        }
        else
        {
            $lenh_sql = "SELECT * FROM sanpham ORDER BY ngaytao desc,ma DESC";
        }
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	function danh_sach_loai()
    {
		$lenh_sql = "SELECT * FROM nhom where kichhoat=1 and danhmuccha=0 ORDER BY thutu, ma DESC";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	function danh_sach_loai_con($cha)
    {
		$lenh_sql = "SELECT * FROM nhom where kichhoat=1 and danhmuccha='$cha' ORDER BY  thutu, ma  DESC";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	function doc_thong_tin($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "SELECT * FROM sanpham WHERE ma = '$id'";
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
		$tomtat=$data['tomtat'];
		$chitiet=$data['chitiet'];
		$manhom=$data['manhomtin'];
		$tukhoa=$data['tukhoa'];
		$motatukhoa=$data['motatukhoa'];
		$tieude=$data['tieude'];
		$kichhoat=$data['kichhoat'];
		$ngaytao=date('Y-m-d');
		$ngaycapnhat= $ngaytao;
		$hinh = $data['hinh'];
		$lenh_sql = "insert into sanpham(ten,duongdan,tomtat,chitiet,manhomtin,tukhoa,motatukhoa,tieude,kichhoat,ngaytao,ngaycapnhat,hinh) values(?,?,?,?,?,?,?,?,?,?,?,?)";
		//echo $lenh_sql;exit;
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($ten,$duongdan,$tomtat,$chitiet,$manhom,$tukhoa,$motatukhoa,$tieude,$kichhoat,$ngaytao,$ngaycapnhat,$hinh));
			return $result;
    }
	function sua($ma,$data)
    {
        //lay danh sach menu cha
        if($ma)
        {
			$ten=$data['ten'];
			$duongdan=$data['duongdan'];
			$tomtat=$data['tomtat'];
			$chitiet=$data['chitiet'];
			$manhom=$data['manhomtin'];
			$tukhoa=$data['tukhoa'];
			$motatukhoa=$data['motatukhoa'];
			$tieude=$data['tieude'];
			$kichhoat=$data['kichhoat'];
			$ngaycapnhat= date('Y-m-d');
			$hinh = $data['hinh'];
			$lenh_sql = "update sanpham set ten=?,duongdan=?,tomtat=?,chitiet=?,manhomtin=?,tukhoa=?,motatukhoa=?,tieude=?,kichhoat=?,ngaycapnhat=?,hinh=? where ma=?";
			//echo $lenh_sql;exit;
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($ten,$duongdan,$tomtat,$chitiet,$manhom,$tukhoa,$motatukhoa,$tieude,$kichhoat,$ngaycapnhat,$hinh,$ma));
			return $result;
        }else
			return false;
        
    }
	function xoa($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "delete  FROM sanpham WHERE ma =?";
			$this->setQuery($lenh_sql);
			return $this->execute(array($id));
		}else
			return false;
    }
}
?>