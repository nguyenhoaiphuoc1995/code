<?php 
$listcat = $xl_nhomtin->DS();
?>
<div class="menu">
<div class="container">
	<ul class="nav">
<li><a href="<?=DOMAIN?>">Trang chủ</a></li>
		<li class="active"><a>Sản phẩm</a>
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
<div class="clear"></div>
	</div>

</div>