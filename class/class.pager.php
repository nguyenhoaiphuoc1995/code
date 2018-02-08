<?php
class pager
{
/***********************************************************************************
* Ham int findStart (int limit)
* Tra ve dong bat dau cua trang duoc chon dua tren trang lay duoc va bien limit
***********************************************************************************/
	function tim_vi_tri_bat_dau($so_mau_tin_tren_mot_trang)
	{
		if ((!isset($_GET['page'])) || ($_GET['page'] == "1"))
		{
			$start = 0;
			$_GET['page'] = 1;
		}
		else
		{
			$start = ($_GET['page']-1) * $so_mau_tin_tren_mot_trang;
		}
		
		return $start;
	}
/***********************************************************************************
* Ham int findPages (int count, int limit)
* Tra ve so luong trang can thiet dua tren tong so dong co trong table va limit
***********************************************************************************/
	function tim_tong_so_trang($tong_so_mau_tin, $so_mau_tin_tren_mot_trang)
	{
		return ceil($tong_so_mau_tin / $so_mau_tin_tren_mot_trang);
	}

	function in_bo_nut($tong_so_trang,$duongdan)
	{
		if (empty($_GET['page'])) $curpage = 1;
		else $curpage = $_GET['page'];
		echo '<ul class="pagination">';
		$page_list = "";
		
		$query_string = $this->deleteParam($_SERVER['QUERY_STRING'], 'page');
				
		/* In trang dau tien va nhung link toi trang truoc neu can */
		if (($curpage != 1) && ($curpage))
		{
			echo  " <li><a class=\"number\"  href=\"".config::base_url().$duongdan."/page-1\" title=\"Trang đầu\">&lt;&lt;</a></li> ";
		} else {
			echo  " <li><a class=\"number disable\"  title=\"Trang đầu\">&lt;&lt;</a></li> ";
		}
	
		if (($curpage-1) > 0)
		{
			echo  "<li><a class=\"number\"  href=\"".config::base_url().$duongdan."/page-".($curpage-1)."\" title=\"Về trang trước\">&lt;</a></li> ";
		} else {
			echo  "<li><a class=\"number disable\" title=\"Về trang trước\">&lt;</a></li> ";
		}
			
		/* In ra danh sach cac trang va lam cho trang hien tai dam hon va mat link o chan*/
		$vt_dau = max($curpage - 3, 1);
		$vt_sau = min($curpage + 3, $tong_so_trang);
		
		if ($vt_dau > 1) echo '...';
		for ($i=$vt_dau; $i<=$vt_sau; $i++)
		{
			if ($i == $curpage)
			{
				echo  "<li><a class=\"number current\"><b>".$i."</b></a></li>";
			}
			else
			{
				echo  "<li><a class=\"number\" href=\"".config::base_url().$duongdan."/page-".$i."\" title=\"Trang ".$i."\">".$i."</a></li>";
			}
			echo  " ";
		}
		if ($vt_sau < $tong_so_trang) echo '...';

		/* In linh cua trang tiep theo va trang cuoi cung neu can*/
		if (($curpage+1) <= $tong_so_trang)
		{
			echo  "<li><a class=\"number\"  href=\"".config::base_url().$duongdan."/page-".($curpage+1)."\" title=\"Dến trang sau\">&gt;</a></li> ";
		} else {
			echo  "<li><a class=\"number disable\" title=\"Dến trang sau\">&gt;</a></li> ";
		}
		
		if (($curpage != $tong_so_trang) && ($tong_so_trang != 0))
		{
			echo  "<li><a  class=\"number\" href=\"".config::base_url().$duongdan."/page-".$tong_so_trang."\" title=\"Trang cuối\">&gt;&gt;</a> </li>";
		} else {
			echo  "<li><a  class=\"number disable\" title=\"Trang cuối\">&gt;&gt;</a></li> ";
		}
		echo '</ul>';
	}
	
/***********************************************************************************
* Ham: string pageList (int curpage, int pages)
* Tra ve danh sach trang theo dinh dang "Trang dau tien  < [cac trang] > Trang cuoi cung"
***********************************************************************************/
	private function deleteParam($query_string, $param)
	{
		//////xử lý giữ tham số trên url
		
		if($query_string!='')
		{
			$query_string = preg_replace('/(^'.$param.'=[\da-zA-Z]*&)|(&?'.$param.'=[\da-zA-Z]*)|/', '', $query_string);

			if($query_string)
				$query_string = "$query_string&";

		}
		//////xử lý giữ tham số trên url
		return $query_string;
	}	
}
?>