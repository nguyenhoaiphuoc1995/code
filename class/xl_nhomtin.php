<?php
class xl_nhomtin extends database
{	
	function DS($sodong = null)
	{
		$soluong = (!empty($sodong))?" limit 0,$sodong ":'';		
		$sql = 'select * from nhom where kichhoat=1  order by thutu,ngaytao desc '.$soluong;
		$this->setQuery($sql);
		return $this->loadAllRow();
	}
	function DSTheoNhom($nhom)
	{
		//$soluong = (!empty($sodong))?" limit 0,$sodong ":'';		
		$sql = "select * from nhom where danhmuccha = '$nhom' and kichhoat=1 order by thutu,ngaytao desc ";
		$this->setQuery($sql);
		return $this->loadAllRow();
	}
	function DSNhomTrangChu($soluong=5)
	{
		$soluong = (!empty($soluong))?" limit 0,$soluong ":'';		
		$sql = "select * from nhom where kichhoat=1 and (select count(ma) from tintuc where kichhoat=1 and manhom=nhom.ma)>5 order by rand() $soluong";
		$this->setQuery($sql);
		return $this->loadAllRow();
	}
	function TheoMa($ma)
	{
		//$soluong = (!empty($sodong))?" limit 0,$sodong ":'';		
		$sql = "select * from nhom where ma = '$ma' ";
		$this->setQuery($sql);
		return $this->loadRow();
	}
	function searchSanPham($query) {
		$sql = "select sanpham.*, nhom.duongdan as duongdan_cha from sanpham join nhom on sanpham.manhomtin=nhom.ma where (sanpham.ten like '%$query%')";
		$this->setQuery($sql);
		return $this->loadAllRow();
	}
}
?>