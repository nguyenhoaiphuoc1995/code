<?php 
$listcat = $xl_nhomtin->DS();
?>
<div class="menu">
	<div class="row">

		<div class="col-md-12">
			<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark">
				<!-- Collapse button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- Collapsible content -->
				<div class="collapse navbar-collapse" id="basicExampleNav">
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
						<li><a href="<?=DOMAIN?>gioi-thieu">Giới thiệu</a></li>
					</ul>
				</div>
				<!-- Search form -->
				<form class="form-inline md-form form-sm pull-right">
						<div class="md-form mt-0">
							<input class="form-control form-control-sm ml-3 w-70" type="text" placeholder="Nhập Thông Tin Cần Tìm" aria-label="Search">
							<span class="input-group-btn w-30">
								<button class="btn btn-sm" type="submit" style="background-color: rgba(0,0,0,0)">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</span>
						</div>
						
					</form>
				
			</nav>
		</div>

		<!-- <div class="col-md-6 col-sm-12">
			<!-- Search form -->
			<!-- <form class="form-inline md-form form-sm pull-right">
				<input class="form-control form-control-sm ml-3 w-70" type="text" placeholder="Search" aria-label="Search">
				<span class="input-group-btn w-30">
					<button class="btn btn-sm" type="submit" style="background-color: rgba(0,0,0,0)">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</span>
			</form> -->
		<!-- </div>-->

		<div class="clear"></div>
	</div>
</div>