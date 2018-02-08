<?php
include_once 'database.php';
class xl_tags extends Database
{
    function danh_sach()
    {        
        $lenh_sql = "SELECT * FROM tags";       
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	
	function danh_sach_tags()
    {
		$lenh_sql = "SELECT tukhoa FROM sanpham where kichhoat=1";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();		
		$lenh_sql = "SELECT giatri as tukhoa FROM parameter where ten='tukhoa'";
        $this->setQuery($lenh_sql);
        $row = $this->loadRow();
		$result[]=$row;
        return $result;
    }
	function them($tag,$home = 0)
    {
        //lay danh sach menu cha
        if($tag)
        {
            $lenh_sql = "insert into tags(tag,trangchu) values(?,?)";
			$this->setQuery($lenh_sql);
			return $this->execute(array($tag,$home));	
		}else
			return false;
    }
	function capnhat($chon)
    {
        //lay danh sach menu cha
        if($chon)
        {
            $lenh_sql = "update tags set trangchu=1 where ma = ?";
			$this->setQuery($lenh_sql);
			return $this->execute(array($chon));	
		}else
			return false;
    }
	function capnhatall()
    {
        //lay danh sach menu cha
       
		$lenh_sql = "update tags set trangchu=0";
		$this->setQuery($lenh_sql);
		return $this->execute();	
		
    }
	function xoa($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "delete  FROM tags WHERE ma =?";
			$this->setQuery($lenh_sql);
			return $this->execute(array($id));
		}else
			return false;
    }
	function xoa_all()
    {
        
		$lenh_sql = "delete  FROM tags where trangchu !=1 ";
		$this->setQuery($lenh_sql);
		return $this->execute();		
    }
}
?>