<?php
class xl_tintuc extends database
{	
	function DSMoi($sodong = null,$vitri=0,$rand=false)
	{
		$soluong = (!empty($sodong))?" limit 0,$sodong ":'';	
		$soluong = (!empty($sodong) && !empty($vitri))?" limit $vitri,$sodong ":$soluong;		
		$strran = ($rand)?' order by rand() ': ' order by sanpham.ngaytao desc,sanpham.ma desc ';
		$sql = "select sanpham.*,nhom.duongdan as duongdan_cha,DATE_FORMAT(sanpham.ngaytao,'%d/%m/%Y') as ngaytao  from sanpham join nhom on sanpham.manhomtin=nhom.ma where sanpham.kichhoat=1  $strran ".$soluong;
		$this->setQuery($sql);
		return $this->loadAllRow();
	}
	function DSKhac($id,$sodong = null)
	{
		$soluong = (!empty($sodong))?" limit 0,$sodong ":'';				
		$sql = "select sanpham.*,nhom.duongdan as duongdan_cha from sanpham join nhom on sanpham.manhomtin=nhom.ma where sanpham.kichhoat=1 and sanpham.ma!='$id'  order by sanpham.ngaytao desc,sanpham.ma desc $soluong";
		$this->setQuery($sql);
		return $this->loadAllRow();
	}
	function DSnoibat($sodong = null)
	{
		$soluong = (!empty($sodong))?" limit 0,$sodong ":'';				
		$sql = "select sanpham.*,nhom.duongdan as duongdan_cha from sanpham join nhom on sanpham.manhomtin=nhom.ma where sanpham.kichhoat=1 and noibat='1'  order by sanpham.ngaytao desc,sanpham.ma desc $soluong";
		$this->setQuery($sql);
		return $this->loadAllRow();
	}
	function DSTheoLoai($nhom,$sodong = null,$vitri=0)
	{
		$soluong = (!empty($sodong))?" limit $vitri,$sodong ":'';	
		$sql = "select *,DATE_FORMAT(sanpham.ngaytao,'%d/%m/%Y') as ngaytao from sanpham where manhomtin = '$nhom' and kichhoat=1 order by ngaytao desc,ma desc $soluong";
		$this->setQuery($sql);
		return $this->loadAllRow();
	}
	function tongTheoLoai($nhom)
	{		
		$sql = "select count(*) as tong from sanpham where manhomtin = '$nhom' and kichhoat=1";
		//echo $sql;exit;
		$this->setQuery($sql);
		return $this->loadRow();
	}
	function TheoMa($ma)
	{
		//$soluong = (!empty($sodong))?" limit 0,$sodong ":'';		
		$sql = "select * from sanpham where ma = '$ma' ";
		$this->setQuery($sql);
		return $this->loadRow();
	}
}
?>