<?php
include_once 'database.php';
class xl_lien_he extends Database
{
    function doc_thong_tin($id)
    {
        $lenh_sql = "SELECT * FROM eve_thong_tin_lien_he where id='$id'";
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
	function sua($id,$data)
    {
        //lay danh sach menu cha
        if($id)
        {
			$dia_chi = $data['dia_chi'];
			$so_dien_thoai = $data['so_dien_thoai'];
                        $x= $data['x'];
			$y= $data['y'];
			$fax = $data['fax'];
			$email = $data['email'];
			$website = $data['website'];
			
			$lenh_sql = "update eve_thong_tin_lien_he set dia_chi=?,so_dien_thoai=?,fax=?,email=?,website=?,x=?,y=? where id=?";
			//echo $lenh_sql;exit;
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($dia_chi,$so_dien_thoai,$fax,$email,$website,$x,$y,$id));
			return $result;
        }else
			return false;
        
    }
}
?>