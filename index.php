<?php 
require 'config.php';
$listkhac = $xl_tintuc->DSMoi(8);
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
		<script>$(function(){
					$('.khac').owlCarousel({
						loop:true,
						margin:20,
						nav:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:2
							},
							1000:{
								items:4
							}
						}
					})
					});
				</script>
	<head>
	<body>
		<!-- header menu-->
		<?php include 'includes/header.php' ?>
		<!-- content -->
		<div class="row content">
				<!-- Sản pham noi bat -->
				<div class="box">
					<div class="box-title">
						<h3 class="big-title"><span class="t-c">Sản phẩm nổi bật</span><span class="title-line"></span></h3>
					</div>
					<div class="box-content ">
						<div class="container noibat">
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
				<!-- san pham khac -->
				<div class="box">
					<div class="box-title">
						<h3 class="big-title"><span class="t-c">Sản phẩm khác</span><span class="title-line"></span></h3>
					</div>
					<div class="box-content">
					<div class="">
						<div class="owl-carousel owl-theme khac container">					
							
							<?php 
								foreach($listkhac as $tink){
							?>
							<div class="item">
								<div class="prokhac">
									<a href="<?php echo DOMAIN.$tink->duongdan_cha.'/'.$tink->duongdan.'-'.$tink->ma ?>"><img src="images/sl1.png"/>
									<span><?=$tink->tieude?></span></a>
								</div>
							</div>
								<?php } ?>				
						</div>
						</div>
					</div>				
				
			</div>
		</div>		
			<?php include 'includes/footer.php' ?>
	</body>
</html>