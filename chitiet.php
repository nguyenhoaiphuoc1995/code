<?php 
require 'config.php';
if(isset($_GET['id']) && !empty($_GET['id']))
{	
	$tin = $xl_tintuc->TheoMa($_GET['id']);		
}else
{
	$tin =null;
	$nhomtin = null;
}
if($tin){
	$nhomtin = $xl_nhomtin->TheoMa($tin->manhomtin);		
	$tieude = $tin->tieude;
	$motatukhoa = $tin->motatukhoa;
	$imageshare = $tin->hinh;
	$tukhoa = $tin->tukhoa;
?>
<html>
	<head>	
		<title><?php echo @$tieude ?></title>
		<meta name="description" content="<?php echo @$motatukhoa ?>" />
		<meta name="keywords" content="<?php echo @$tukhoa ?>" />
		
		<meta charset="utf-8" />
		<link rel="icon" type="image/x-icon" href="../<?php echo $xl_param->DocTheoTen('favicon')->giatri ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<?php echo $xl_param->DocTheoTen('themeta')->giatri ?>
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

		<link href="../dist/styles/style.css" rel="stylesheet">

		<script src="../dist/js/bundle.js"></script>

		<?php echo $xl_param->DocTheoTen('scriptgoogle')->giatri ?>
		
		<script>$(function(){
					var owl = $('#proshow');
					var owl2 = $('#proshownav');
					owl.owlCarousel({
						loop:true,
						margin:0,
						startPosition:0,
						nav:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:1
							},
							1000:{
								items:1
							}
						}
					}).on('changed.owl.carousel', function(event) {
						owl2.trigger('to.owl.carousel', [event.item.index, 300, true]);
						// (Optional) Remove .current class from all items
						owl2.find('.current').removeClass('current');
						// (Optional) Add .current class to current active item
						owl2.find('.owl-item .item').eq(event.item.index).addClass('current');
					});
					owl2.owlCarousel({
						loop:true,
						margin:10,
						nav:false,
						dots:false,
						startPosition:0,
						autoHeight:true,						
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
					}).on('click', '.owl-item', function(event) {
						owl.trigger('to.owl.carousel', [$(event.target).parents('.owl-item').index(), 0, true]);
					});
				});
				</script>
	<head>
	<body>
		<!-- header menu-->
		<?php include 'includes/header.php' ?>
		<!-- content -->
		<div class="row content">
			<div class="container">
				<!-- breacrum-->
				<div class="breakcrum">
					<ul>
						<li><a href="<?=DOMAIN?>">Trang chủ</a></li>
						<li><a href="<?=DOMAIN.$nhomtin->duongdan.'-'.$nhomtin->ma?>"><?=$nhomtin->ten?></a></li>
						<li><a href="#"><?=$tin->tieude?></a></li>
					</ul>
				</div>
				
				<!-- chi tiet Sản pham -->
				<div class="box">
					<div class="box-title">
						<h3 class="big-title"><span class="t-c">Chi tiết sản phẩm</span><span class="title-line"></span></h3>
					</div>
					<div class="box-content">
						<div class="prodetail">
							<!-- slide -->
							<div>
								<div class="owl-carousel owl-theme " id="proshow">					
									<div class="item">
											<img src="<?=DOMAIN?>images/sl1.png"/>
										
									</div>
									<div class="item">
											<img src="<?=DOMAIN?>images/sl3.png"/>
										
									</div>
									<div class="item">
											<img src="<?=DOMAIN?>images/sl2.png"/>
										
									</div>
									<div class="item">								
											<img src="<?=DOMAIN?>images/sl4.png"/>
										
									</div>						
								</div>
								<div class="owl-carousel owl-theme " id="proshownav">					
									<div class="item">									
											<img width="70"  height="70" src="<?=DOMAIN?>images/sl1.png"/>
									</div>
									<div class="item">
											<img width="70" height="70" src="<?=DOMAIN?>images/sl3.png"/>
									</div>
									<div class="item">
											<img width="70" height="70" src="<?=DOMAIN?>images/sl2.png"/>
									</div>
									<div class="item">								
											<img width="70" height="70" src="<?=DOMAIN?>images/sl4.png"/>
									</div>						
								</div>
							</div>
							<div class="infopro">
								<h3 class="title"><?=$tin->tieude?></h3>
								<h4 class="cat">( <?=$nhomtin->ten?>)</h4>
								<?php echo $tin->chitiet ?>
								<div style="padding:30px 0"><a class="btnlienhe" href="<?=DOMAIN.'lien-he'?>">Liên hệ</a></div>
							</div>
						</div>
					</div>
				</div>
					
			</div>
		</div>					
		<?php include 'includes/footer.php' ?>
	</body>
</html>
<?php }else{
	header('location: 404');
} ?>