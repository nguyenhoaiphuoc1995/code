<!-- header top-->
<div class="row header-top">
	<div class="container">
	<a href="<?=DOMAIN?>" class="logotop"><img src="<?php echo $xl_param->DocTheoTen('logo')->giatri ?>"/></a>
	<ul class="menutop">
		<li><a href="<?=DOMAIN?>lien-he">Liên hệ</a></li>
<li>
	<form  class="search" action="" method="get">
		<input class="itim" type="text" placeholder="Tìm kiếm..." name="s"/>
		<button class="btntim"><img width="17" src="<?=DOMAIN?>images/search2.png" /></button>
	</form>	<div class="clear"></div>
</li>
	</ul>
	</div>
</div>
<!-- header menu-->
<div class="row  header-menu">
	<!-- banner -->
	<div class="banner">
		<img src="<?php echo $xl_param->DocTheoTen('banner')->giatri ?>"/>
	</div>
	<!-- menu -->
	<?php include 'includes/menu.php' ?>
</div>