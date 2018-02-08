<?php 
$listcat = $xl_nhomtin->DS();
?>
<div class="menu">
<div class="container">
	<ul class="nav">
		<li class="active"><a>Danh mục sản phẩm</a>
			<ul class="submenu">
				<?php 
				foreach($listcat as $k=>$cat){
					echo '<li class="'.($k==0?'active':'').'"><a href="'.DOMAIN.$cat->duongdan.'-'.$cat->ma.'">'.$cat->ten.'</a></li>';
				}
				?>			
			</ul>
		</li>
		<li><a href="<?=DOMAIN?>gioi-thieu">Giới thiệu</a></li>
		<li><a href="<?=DOMAIN?>lien-he">Liên hệ</a></li>
	</ul>
	<form  class="search" action="" method="get">
		<input class="itim" type="text" placeholder="Tìm kiếm..." name="s"/>
		<button class="btntim"><img width="17" src="<?=DOMAIN?>images/search2.png" /></button>
	</form>	<div class="clear"></div>
	</div>

</div>