<?php 
require 'config.php';
$listkhac = $xl_tintuc->DSMoi(8);
$listnoibat = $xl_tintuc->DSnoibat(4);
?>
<html>
	<head>		
		<title><?php echo @$tieude ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php echo @$motatukhoa ?>" />
		<meta name="keywords" content="<?php echo @$tukhoa ?>" />
		<?php 
			include 'includes/cssjs.php';
		?>
	<head>
	<body>
		<!-- header menu-->
		<header>
			<?php include 'includes/header.php' ?>
		</header>
		<!-- content -->
		<div class="container">
				<!-- Sản pham noi bat -->
				<div class="box">
					<div class="box-title">
						<h3 class="big-title"><span class="t-c">Sản phẩm nổi bật</span><span class="title-line"></span></h3>
					</div>
					<div class="box-content ">
						<div class="noibat">
						<div class="leftpro pro">
							<div>
								<a href="<?php echo DOMAIN.$listnoibat[0]->duongdan_cha.'/'.$listnoibat[0]->duongdan.'-'.$listnoibat[0]->ma ?>">
									<img src="<?=DOMAIN.$listnoibat[0]->hinh?>"
										class="img-responsive"
									/>
								</a>
							</div>

							<div>
								<a href="<?php echo DOMAIN.$listnoibat[0]->duongdan_cha.'/'.$listnoibat[0]->duongdan.'-'.$listnoibat[0]->ma ?>"><img src="<?=DOMAIN.$listnoibat[0]->hinh?>"/></a>
							</div>
						</div>
						<div class="midpro pro">
							<a href="<?php echo DOMAIN.$listnoibat[1]->duongdan_cha.'/'.$listnoibat[1]->duongdan.'-'.$listnoibat[1]->ma ?>"><img src="<?=DOMAIN.$listnoibat[1]->hinh?>"/></a>
							<a href="<?php echo DOMAIN.$listnoibat[2]->duongdan_cha.'/'.$listnoibat[2]->duongdan.'-'.$listnoibat[2]->ma ?>"><img src="<?=DOMAIN.$listnoibat[2]->hinh?>"/></a>
						</div>
						<div class="rightpro pro">
							<div>
								<a href="<?php echo DOMAIN.$listnoibat[3]->duongdan_cha.'/'.$listnoibat[3]->duongdan.'-'.$listnoibat[3]->ma ?>">
									<img src="<?=DOMAIN.$listnoibat[3]->hinh?>" class=''
									/>
								</a>
							</div>
							<div>
								<a href="<?php echo DOMAIN.$listnoibat[3]->duongdan_cha.'/'.$listnoibat[3]->duongdan.'-'.$listnoibat[3]->ma ?>"><img src="<?=DOMAIN.$listnoibat[3]->hinh?>"/></a>
							</div>
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
					<div class="col-md-12">
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
		
		<footer>
			<?php include 'includes/footer.php' ?>
		</footer>
	</body>
</html>

<script>
$(function(){
	$('.khac').owlCarousel({
		loop:true,
		items:4,
		margin:20,
		nav:true,
		autoplay: true,
		autoplayTimeout:1000,
		autoplayHoverPause: true,
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
	});

	<!-- SmartMenus jQuery init -->
	$('#main-menu').smartmenus({
		subMenusSubOffsetX: 6,
		subMenusSubOffsetY: -8
	});

});

</script>