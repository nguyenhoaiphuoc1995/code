<?php 
$thongbao='';
if(isset($_GET['ma']) && $_GET['ma'] !=''){
	include_once 'class/xl_quan_tri.php'; 
	$xl_quan_tri = new xl_quan_tri();
	$tin = $xl_quan_tri->doc_thong_tin($_GET['ma']);
	//echo '<pre>',print_r($_POST),'</pre';
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luudong'){
		if($xl_quan_tri->sua($_GET['ma'],$_POST))
		{
			echo '<script>document.location="main.php?views=users";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
		if($xl_quan_tri->sua($_GET['ma'],$_POST))
		{
			$thongbao='Cập nhật thành công.';
			$tin = $xl_quan_tri->doc_thong_tin($_GET['ma']);
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
}else
{
	echo '<script>document.location="main.php?views=users";</script>';
}
?>
            <!-- content starts -->
<script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật quản trị <?php echo $tin->ten ?></h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default hidden"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
				<?php if($thongbao!=''){ ?><div class="alert alert-info"><?php echo @$thongbao; ?> </div><?php } ?>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="ten">Họ tên</label>
                        <input type="text" class="form-control" id="ten"  value="<?php echo $tin->ten ?>" name="ten" placeholder="Nhập tên người dùng">
                    </div>
                    <div class="form-group">
                        <label for="ten_dang_nhap">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="ten_dang_nhap"  value="<?php echo $tin->tendangnhap ?>" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập">
                    </div>
					<div class="form-group">
                        <label for="mat_khau">Mật khẩu</label>
                        <input type="password" class="form-control" id="mat_khau"  value="" name="mat_khau" placeholder="">
                    </div>
					<div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email"  value="<?php echo $tin->email ?>" name="email" placeholder="">
                    </div>
					<div class="form-group">
                        <label for="dien_thoai">Số điện thoại</label>
                        <input type="text" class="form-control" id="dien_thoai"  value="<?php echo $tin->dienthoai ?>" name="dien_thoai" placeholder="">
                    </div>
					<div class="control-group">
						<label class="control-label" for="trang_thai">Trạng thái</label>
						<div class="controls">
							<?php 
								$khoa ='';$kickhoat='';$cho='';$del='';
								if($tin->kichhoat==1)
								{
									$kickhoat='selected';
									$khoa='';
									$cho='';
									$del='';
								}else if($tin->kichhoat==0)
								{
									$kickhoat='';
									$khoa='selected';
									$cho='';
									$del='';
								}
								else if($tin->kichhoat==2)
								{
									$kickhoat='';
									$khoa='';
									$cho='selected';
									$del='';
								}
								else if($tin->kichhoat==3)
								{
									$kickhoat='';
									$khoa='';
									$cho='';
									$del='selected';
								}
							?>
                            <select name="trang_thai" id="trang_thai" data-rel="chosen">
								<option <?php echo $khoa ?> value="0">Khóa đăng nhập quản trị</option>
								<option <?php echo $kickhoat ?> value="1">Cho phép đăng nhập quản trị</option>
								<option <?php echo $cho ?> value="2">Chờ kích hoạt</option>
								<option <?php echo $del ?> value="3">Không hoạt động</option>
							</select>
                        </div>
                    </div>
					<div class="control-group">
						<label class="control-label" for="quyen">Quyền</label>
						<div class="controls">
						<?php 
						if($tin->quyen==1)
								{
									$mng='selected';
									$us='';
								}else if($tin->kichhoat==0)
								{
									$mng='';
									$us='selected';
								}
						?>
                            <select name="quyen" id="quyen" data-rel="chosen">
								<option <?php echo $mng ?>  value="1">Quản trị viên</option>
								<option <?php echo $us ?>  value="0">Người dùng</option>								
							</select>
                        </div>
                    </div>
					<div style="margin-top:10px" class="control-group">
						<button  value="luu" type="submit" name="luu" class="btn btn-default">Lưu</button>
						<button value="luudong" type="submit" name="luu" class="btn btn-default">Lưu và đóng</button>
						<a href="?views=users" class="btn btn-default">Hủy</a>						
					</div>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->