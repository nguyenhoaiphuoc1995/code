<?php
include_once 'database.php';
class xl_slide_banner extends Database
{
	function danh_sach()
    {
        //lay danh sach menu cha
        $lenh_sql = "SELECT * FROM slider ORDER BY thutu,id desc";
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }

	function doc_thong_tin($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "SELECT * FROM slider WHERE id = '$id'";
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
		$tieu_de = $data['tieu_de'];
		$video = $data['video'];
		$link = $data['link'];	
		$trang_thai = $data['trang_thai'];		
		$hinh = $data['hinh'];
		$ngay_dang = date('Y-m-d');
		$thutu = $data['thutu'];
		$lenh_sql = "insert into slider(tieu_de,link,video,hinh,trang_thai,ngay_dang,thutu) values(?,?,?,?,?,?,?)";
		//echo $lenh_sql;exit;
		$this->setQuery($lenh_sql);
		$result = $this->execute(array($tieu_de,$link,$video,$hinh,$trang_thai,$ngay_dang,$thutu));
			return $result;
    }
	function sua($id,$data)
    {
        //lay danh sach menu cha
        if($id)
        {
			$tieu_de = $data['tieu_de'];
			$video = $data['video'];
			$link = $data['link'];	
			$trang_thai = $data['trang_thai'];		
			$hinh = $data['hinh'];
			$ngay_dang = date('Y-m-d');
			$thutu = $data['thutu'];
			$lenh_sql = "update slider set thutu=?,tieu_de=?,link=?,video=?,hinh=?,trang_thai=?,ngay_dang=? where id=?";
			//echo $lenh_sql;exit;
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($thutu,$tieu_de,$link,$video,$hinh,$trang_thai,$ngay_dang,$id));
			return $result;
        }else
			return false;
        
    }
	function xoa($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "delete  FROM slider WHERE id = ?";
			$this->setQuery($lenh_sql);
			return $this->execute(array($id));
		}else
			return false;
    }
}
?>