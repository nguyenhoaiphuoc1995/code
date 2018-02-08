<?php 
require 'config.php';
$listnoibat = $xl_tintuc->DSnoibat(4);
?>
<html>
	<head>
		<title><?php echo @$tieude ?></title>
		<meta name="description" content="<?php echo @$motatukhoa ?>" />
		<meta name="keywords" content="<?php echo @$tukhoa ?>" />
		<?php 
			
			include 'includes/cssjs.php';
		?>
	<head>
	<body>
		<!-- header top-->
		<?php include 'includes/header.php' ?>
		<!-- content -->
		<div class="row content">
			<div class="container">
			<!-- breacrum-->
			<div class="breakcrum">
				<ul>
					<li><a href="<?=DOMAIN?>">Trang chủ</a></li>
					<li><a href="#">Liên hệ</a></li>
				</ul>
			</div>
			<div class="contact-info">
				<div class="line-frame">
					<img src="images/logotop.png"/>
					<ul>
						<li><?php echo $xl_param->DocTheoTen('tenlienhe')->giatri ?></li>
						<li><?php echo $xl_param->DocTheoTen('dienthoai')->giatri ?></li>
						<li><?php echo $xl_param->DocTheoTen('email')->giatri ?></li>
						<li><?php echo $xl_param->DocTheoTen('diachi')->giatri ?></li>
					</ul>
					<span style="cursor:pointer" onclick="location.href='<?php echo DOMAIN.'gioi-thieu' ?>'" class="us">Về chúng tôi</span>
				</div>
			</div>
			</div>	
			<!-- Sản pham noi bat -->
			<div class="box">
				<div class="box-title">
					<h3 class="big-title"><span class="t-c">Sản phẩm nổi bật</span><span class="title-line"></span></h3>
				</div>
				<div class="box-content noibat container">
					<div class="leftpro pro">
						<a href="<?php echo DOMAIN.$listnoibat[0]->duongdan_cha.'/'.$listnoibat[0]->duongdan.'-'.$listnoibat[0]->ma ?>"><img src="<?=$listnoibat[0]->hinh?>"/></a>
					</div>
					<div class="midpro pro">
						<a href="<?php echo DOMAIN.$listnoibat[1]->duongdan_cha.'/'.$listnoibat[1]->duongdan.'-'.$listnoibat[1]->ma ?>"><img src="<?=$listnoibat[1]->hinh?>"/></a>
						<a href="<?php echo DOMAIN.$listnoibat[2]->duongdan_cha.'/'.$listnoibat[2]->duongdan.'-'.$listnoibat[2]->ma ?>"><img src="<?=$listnoibat[2]->hinh?>"/></a>
					</div>
					<div class="rightpro pro">
						<a href="<?php echo DOMAIN.$listnoibat[3]->duongdan_cha.'/'.$listnoibat[3]->duongdan.'-'.$listnoibat[3]->ma ?>"><img src="<?=$listnoibat[3]->hinh?>"/></a>
					</div>
				</div>
			</div>
			</div>
			
		<?php include 'includes/footer.php' ?>
	</body>
</html>