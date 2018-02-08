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
		<?php include 'includes/header.php' ?>
		<!-- content -->
		<div class="row content">
		<div class="container">
			<!-- breacrum-->
			<div class="breakcrum">
				<ul>
					<li><a href="<?=DOMAIN?>">Trang chủ</a></li>
					<li><a href="#">Giới thiệu</a></li>
				</ul>
			</div>
			<div class="aboutus">
				<h3 class="title-us"><?php echo $xl_param->DocTheoTen('gioithieutieude')->giatri ?></h3>
				<div class="us-row us-fist">
					<img src="<?=DOMAIN?>images/logotop.png"/>
					<div class="us-data-content">
						<?php echo $xl_param->DocTheoTen('gioithieunoidung1')->giatri ?>
					</div>
				</div>
				<div style="padding-left:60px;">
					<div class="us-row us-rowmid">
						<img src="<?=DOMAIN?>images/logotop.png"/>
						<div class="us-data-content">
							<?php echo $xl_param->DocTheoTen('gioithieunoidung2')->giatri ?>
						</div>
					</div>
				</div>
				<div class="us-row us-last">
					<div class="us-data-content">
						<?php echo $xl_param->DocTheoTen('gioithieunoidung3')->giatri ?>
					</div>
				</div>
			</div>
			</div>
			<!-- Sản pham noi bat -->
			<div class="box">
				<div class="box-title">
					<h3 class="big-title"><span class="t-c">Sản phẩm nổi bật</span><span class="title-line"></span></h3>
				</div>
				<div class="box-content noibat"><div class="container">
					<div class="leftpro pro">
						<a href="<?php echo DOMAIN.$listnoibat[0]->duongdan_cha.'/'.$listnoibat[0]->duongdan.'-'.$listnoibat[0]->ma ?>"><img src="<?=$listnoibat[0]->hinh?>"/></a>
					</div>
					<div class="midpro pro">
						<a href="<?php echo DOMAIN.$listnoibat[1]->duongdan_cha.'/'.$listnoibat[1]->duongdan.'-'.$listnoibat[1]->ma ?>"><img src="<?=$listnoibat[1]->hinh?>"/></a>
						<a href="<?php echo DOMAIN.$listnoibat[2]->duongdan_cha.'/'.$listnoibat[2]->duongdan.'-'.$listnoibat[2]->ma ?>"><img src="<?=$listnoibat[2]->hinh?>"/></a>
					</div>
					<div class="rightpro pro">
						<a href="<?php echo DOMAIN.$listnoibat[3]->duongdan_cha.'/'.$listnoibat[3]->duongdan.'-'.$listnoibat[3]->ma ?>"><img src="<?=$listnoibat[3]->hinh?>"/></a>
					</div></div>
				</div>
			</div>				
</div>		
			<?php include 'includes/footer.php' ?>
	</body>
</html>