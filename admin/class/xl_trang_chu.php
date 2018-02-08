<?php
include_once 'database.php';
class xl_trang_chu extends Database
{
    function dem_so_tin_tuc($id_loai_tin=0)
    {
        //lay danh sach menu cha
        if($id_loai_tin!=0)
        {
            $lenh_sql = "SELECT count(*) as soluong FROM sanpham WHERE manhomtin = '$id_loai_tin'";
        }
        else
        {
            $lenh_sql = "SELECT count(*) as soluong FROM sanpham ";
        }
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
	
	function dem_so_danh_muc()
    {
        //lay danh sach menu cha
        $lenh_sql = "SELECT count(*) as soluong FROM nhom";
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
}
?>