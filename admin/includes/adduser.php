<?php 
$thongbao='';
if(isset($_GET['ma']) && $_GET['ma'] !=''){	
		echo '<script>document.location="main.php?views=edituser?ma='.$_GET['ma'].'";</script>';
}
include_once 'class/xl_quan_tri.php'; 
$xl_quan_tri = new xl_quan_tri();
if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luudong'){
		if($xl_quan_tri->them($_POST))
		{
			echo '<script>document.location="main.php?views=users";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình thêm mới.';
		}	
		
	}
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
		if($xl_quan_tri->them($_POST))
		{
			$thongbao='Thêm mới thành công.';
			echo '<script>document.location="main.php?views=adduser";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình thêm mới.';
		}	
		
	}
?>
            <!-- content starts -->
<script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Thêm mới quản trị</h2>

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
                        <input type="text" class="form-control" id="ten"  value="" name="ten" placeholder="Nhập tên người dùng">
                    </div>
                    <div class="form-group">
                        <label for="ten_dang_nhap">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="ten_dang_nhap"  value="" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập">
                    </div>
					<div class="form-group">
                        <label for="mat_khau">Mật khẩu</label>
                        <input type="password" class="form-control" id="mat_khau"  value="" name="mat_khau" placeholder="">
                    </div>
					<div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email"  value="" name="email" placeholder="">
                    </div>
					<div class="form-group">
                        <label for="dien_thoai">Số điện thoại</label>
                        <input type="text" class="form-control" id="dien_thoai"  value="" name="dien_thoai" placeholder="">
                    </div>
					<div class="control-group">
						<label class="control-label" for="trang_thai">Trạng thái</label>
						<div class="controls">
                            <select name="trang_thai" id="trang_thai" data-rel="chosen">
								<option value="0">Khóa đăng nhập quản trị</option>
								<option value="1">Cho phép đăng nhập quản trị</option>
								<option value="2">Chờ kích hoạt</option>
								<option value="3">Không hoạt động</option>
							</select>
                        </div>
                    </div>
					<div class="control-group">
						<label class="control-label" for="quyen">Quyền</label>
						<div class="controls">
                            <select name="quyen" id="quyen" data-rel="chosen">
								<option value="1">Quản trị viên</option>
								<option value="0">Người dùng</option>								
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