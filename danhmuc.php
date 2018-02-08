<?php 
require 'config.php';

require 'class/class.pager.php';
$pager = new pager();
$sotrang = 0;
$soluong = $xl_param->DocTheoTen('soluongdong')->giatri;
$vitri = $pager->tim_vi_tri_bat_dau($soluong);
if(isset($_GET['id']) && !empty($_GET['id']))
{			
	$sotrang = $pager->tim_tong_so_trang($xl_tintuc->tongTheoLoai($_GET['id'])->tong,$soluong);
	$nhomtin = $xl_nhomtin->TheoMa($_GET['id']);
}
if($nhomtin){
	$ds_tin = $xl_tintuc->DSTheoLoai($_GET['id'],$soluong,$vitri);	

?>
<html>
	<head>	
		<title><?php echo $nhomtin->ten ?></title>
		<meta name="description" content="<?php echo $nhomtin->motatukhoa ?>" />
		<meta name="keywords" content="<?php echo $nhomtin->tukhoa ?>" />
		<?php 
			
			include 'includes/cssjs.php';
		?>
	<head>
	<body>
		<?php include 'includes/header.php' ?>
		<!-- content -->
		<div class="row content">	
			
			<!-- breacrum--><div class="container">
			<div class="breakcrum">
				
					<ul>
						<li><a href="<?=DOMAIN?>">Trang chủ</a></li>
						<li><a href="<?=DOMAIN.$nhomtin->duongdan.'-'.$nhomtin->ma?>"><?=$nhomtin->ten?></a></li>					
					</ul>
				</div>
			</div>
			<!-- san pham khac -->
			<div class="box">
				<div class="box-title">
					<h3 class="big-title"><span class="t-c"><?=$nhomtin->ten?> </span><span class="title-line"></span></h3>
				</div>
				<div class="box-content"><div class="container">
					<div class="category">
						<?php 
						if($ds_tin){
							foreach($ds_tin as $tin){
						?>
						<div class="pro-item">
							<a href="<?=DOMAIN.$nhomtin->duongdan.'/'.$tin->duongdan.'-'.$tin->ma?>"><img src="<?=$tin->hinh?>"/>
							<span><?=$tin->ten?></span></a>
						</div>	
							<?php }}else{
							echo '<div class="container" style="text-align:center;padding:20px;">Chưa có sản phẩm</div>';
						} ?>
						<div class="clear"></div>
					</div>
				</div>
				
			</div>
		</div>	
	</div>			
			<?php include 'includes/footer.php' ?>
	</body>
</html>
<?php }else header('location: 404'); ?>