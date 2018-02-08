<?php 
require 'config.php';
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
		<!-- header menu-->
		<?php include 'includes/header.php' ?>
		<!-- content -->
		<div class="row content" >
			<div class="container" style="padding:40px 0">
			<?php echo $xl_param->DocTheoTen('noidung404')->giatri ?>
			</div>
		</div>		
			<?php include 'includes/footer.php' ?>
	</body>
</html>