<?php
include_once 'database.php';
class xl_cau_hinh extends Database
{
    function danh_sach()
    {
        //lay danh sach cau hinh
        $lenh_sql = "SELECT * FROM parameter ORDER BY ngaytao desc,ma DESC";
        
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	function doc_thong_tin($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "SELECT * FROM parameter WHERE ma = '$id'";
        }
        else
        {
            $lenh_sql = "";
        }
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
	function doc_theo_key($key)
    {
        //lay danh sach menu cha
        if($key)
        {
            $lenh_sql = "SELECT * FROM parameter WHERE ten = '$key'";
        }
        else
        {
            $lenh_sql = "";
        }
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
	function doc_theo_id($id)
    {
        //lay danh sach menu cha
        if($key)
        {
            $lenh_sql = "SELECT * FROM parameter WHERE ma = '$id'";
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
		$ten = $data['ten'];
		$gia_tri = $data['giatri'];		
		$ngaytao = date('Y-m-d');
		$ngaycapnhat = $ngaytao;
		$lenh_sql = "insert into parameter(ten,giatri,ngaytao,ngaycapnhat) values(?,?,?,?)";
		//echo $lenh_sql;exit;
		if(!$this->doc_theo_key($key)){
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($ten,$gia_tri,$ngaytao,$ngaycapnhat));
			return $result;
		}else
			return false;
    }
	function sua($id,$data)
    {
        //lay danh sach menu cha
        if($id)
        {
			//$ten = $data['ten'];
			$gia_tri = $data['giatri'];		
			$ngaycapnhat = date('Y-m-d');
			$lenh_sql = "update parameter set giatri=?,ngaycapnhat=? where ma=?";
			//echo $lenh_sql;exit;
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($gia_tri,$ngaycapnhat,$id));
			return $result;
        }else
			return false;
        
    }
	function suatheokey($key,$giatri)
    {
        //lay danh sach menu cha
        if($key)
        {				
			$ngaycapnhat = date('Y-m-d');
			$lenh_sql = "update parameter set giatri=?,ngaycapnhat=? where ten=?";
			//echo $lenh_sql;exit;
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($giatri,$ngaycapnhat,$key));
			return $result;
        }else
			return false;
        
    }
	function xoa($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "delete  FROM parameter WHERE ma =?";
			$this->setQuery($lenh_sql);
			return $this->execute(array($id));
		}else
			return false;
    }
}
?>