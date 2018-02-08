<?php
class xl_param extends database
{	
	function DS()
	{			
		$sql = 'select * from parameter';
		$this->setQuery($sql);
		return $this->loadAllRow();
	}
	function DocTheoTen($ten)
	{		
		$sql = "select * from parameter where ten = '$ten'";
		$this->setQuery($sql);
		return $this->loadRow();
	}
	function DocTheoMa($ma)
	{	
		$sql = "select * from parameter where ma = '$ma' ";
		$this->setQuery($sql);
		return $this->loadRow();
	}
	function DocTuMang($mang,$ten)
	{			
		if($mang)
		{
			echo '<pre>',print_r($mang),'</pre>';
		}
	}
	function capnhat($key,$giatri)
    {
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
}
$dt_param =new xl_param();
$baotri = $dt_param->DocTheoTen('baotri')->giatri;
if($baotri == '1')
	echo '<script>document.location.href="baotri.php";</script>';
$dt_param->disconnect();
?>