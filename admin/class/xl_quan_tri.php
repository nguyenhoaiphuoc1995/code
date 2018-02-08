<?php
include_once 'database.php';
class xl_quan_tri extends Database
{
    function danh_sach()
    {
        //lay danh sach menu cha
       
        $lenh_sql = "SELECT * FROM quantri ORDER BY ma DESC";
      
        $this->setQuery($lenh_sql);
        $result = $this->loadAllRow();
        return $result;
    }
	function doc_thong_tin($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "SELECT * FROM quantri WHERE ma = '$id'";
        }
        else
        {
            $lenh_sql = "";
        }
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
	function doc_thong_tin_theo_tdn($tendangnhap)
    {        
        if($tendangnhap!='')
        {
            $lenh_sql = "SELECT * FROM quantri WHERE tendangnhap='$tendangnhap'";
        }
        else
        {
            $lenh_sql = "";
        }
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
	function doc_thong_tin_theo_tdnid($tendangnhap,$id)
    {        
        if($tendangnhap!='' && $id !='')
        {
            $lenh_sql = "SELECT * FROM quantri WHERE tendangnhap='$tendangnhap' and ma != '$id'";
        }
        else
        {
            $lenh_sql = "";
        }
		//echo $lenh_sql;
        $this->setQuery($lenh_sql);
        $result = $this->loadRow();
        return $result;
    }
	function dang_nhap($data)
    {
        $ten_dang_nhap = $data['ten_dang_nhap'];
		$mat_khau =($data['mat_khau'] !='')?md5($data['mat_khau']):'';
        if($ten_dang_nhap !='' && $mat_khau !='')
        {
            $lenh_sql = "SELECT * FROM quantri WHERE tendangnhap='$ten_dang_nhap' and matkhau='$mat_khau'";
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
		$ten_dang_nhap = $data['ten_dang_nhap'];
		$mat_khau =($data['mat_khau'] !='')?md5($data['mat_khau']):'';
		$email = $data['email'];
		$trang_thai = $data['trang_thai'];
		$dien_thoai = $data['dien_thoai'];
		$quyen = $data['quyen'];
		$ngay_tao = date('Y-m-d');
		$lenh_sql = "insert into quantri(ten,tendangnhap,matkhau,email,kichhoat,dienthoai,ngaytao,ngaycapnhat,quyen) values(?,?,?,?,?,?,?,?)";
		//echo $lenh_sql;exit;
		if(!$this->doc_thong_tin_theo_tdn($ten_dang_nhap)){
			$this->setQuery($lenh_sql);
			$result = $this->execute(array($ten,$ten_dang_nhap,$mat_khau,$email,$trang_thai,$dien_thoai,$ngay_tao,$quyen));
			return $result;
		}else return false;
    }
	function sua($id,$data)
    {
        //lay danh sach menu cha
        if($id)
        {
			$ten = $data['ten'];
			$ten_dang_nhap = $data['ten_dang_nhap'];
			$mat_khau =($data['mat_khau'] !='')?md5($data['mat_khau']):'';
			$email = $data['email'];
			$trang_thai = $data['trang_thai'];
			$dien_thoai = $data['dien_thoai'];
			$quyen = $data['quyen'];
			$ngay_tao = date('Y-m-d');
			$lenh_sql = "update quantri set ten=?,tendangnhap=?,".(($mat_khau!='')?"matkhau=?,":'')."email=?,kichhoat=?,dienthoai=?,ngaycapnhat=?,quyen=? where ma=?";
			//echo $lenh_sql;exit;
			if(!$this->doc_thong_tin_theo_tdnid($ten_dang_nhap,$id)){
				$this->setQuery($lenh_sql);
				if($mat_khau != '')
					$result = $this->execute(array($ten,$ten_dang_nhap,$mat_khau,$email,$trang_thai,$dien_thoai,$ngay_tao,$quyen,$id));
				else
					$result = $this->execute(array($ten,$ten_dang_nhap,$email,$trang_thai,$dien_thoai,$ngay_tao,$quyen,$id));
				return $result;
			}else return false;
        }else
			return false;
        
    }
	function xoa($id)
    {
        //lay danh sach menu cha
        if($id)
        {
            $lenh_sql = "delete  FROM quantri WHERE ma = ? and tendangnhap!='admin'";
			$this->setQuery($lenh_sql);
			return $this->execute(array($id));
		}else
			return false;
    }
}
?>