<?php 
$listcat = $xl_nhomtin->DS();
?>
<div class="menu">
	<div class="container-fluid">

		<nav id="main-nav">
			<ul id="main-menu" class="sm sm-mint">
				<li><a href="<?=DOMAIN?>">Trang chủ</a></li>
				<li><a>Sản phẩm</a>
					<ul class="">
						<?php 
						foreach($listcat as $k=>$cat){
							echo '<li class="'.($k==0?'active':'').'"><a href="'.DOMAIN.$cat->duongdan.'-'.$cat->ma.'">'.$cat->ten.'</a></li>';
						}
						?>			
					</ul>
				</li>
				<li class="big-title"><a href="<?=DOMAIN?>gioi-thieu">Giới thiệu</a></li>
			</ul>
		</nav>

		<div class="clear"></div>
	</div>
</div>