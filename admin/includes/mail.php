<?php 
$thongbao='';
include_once 'class/xl_cau_hinh.php'; 
$dt_cau_hinh = new xl_cau_hinh();
if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
	unset($_POST['luu']);
	$thongbao = '';
	foreach($_POST as $key=>$value)
	{
		if(!$dt_cau_hinh->suatheokey($key,$value))
			$thongbao .= $key.' xảy ra lỗi <br>';
	}	
}
?>
            <!-- content starts -->
<script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="row">
    <div class="box col-md-12">
         <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật cấu hình gửi mail</h2>

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
				<?php if($thongbao!=''){ ?><div class="alert alert-danger"><?php echo @$thongbao; ?> </div><?php }else if(isset($_POST) && $_POST && $thongbao==''){ ?><div class="alert alert-info">Cập nhật thành công</div><?php } ?>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="ten">Email gửi</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('emailgui')->giatri ?>" name="emailgui" placeholder="Nhập địa chỉ email gửi">
                    </div> 
					<div class="form-group">
                        <label for="ten">Email nhận</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('emailnhan')->giatri ?>" name="emailnhan" placeholder="Nhập địa chỉ email nhận">
                    </div> 
					<div class="form-group">
                        <label for="ten">Tên người gửi</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('tengui')->giatri ?>" name="tengui" placeholder="Tên người gửi">
                    </div> 
					<div class="form-group">
                        <label for="ten">Smpt Host</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('smtphost')->giatri ?>" name="smtphost" placeholder="Máy chủ smtp">
                    </div> 
					<div class="form-group">
                        <label for="ten">Smtp Port</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('port')->giatri ?>" name="port" placeholder="Cổng smtp">
                    </div> 
					<div class="form-group">
                        <label for="ten">Tên đăng nhập</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('email')->giatri ?>" name="email" placeholder="Email đăng nhập máy chủ gửi mail">
                    </div> 
					<div class="form-group">
                        <label for="ten">Mật khẩu</label>
                        <input type="password"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('matkhau')->giatri ?>" name="matkhau" placeholder="Mật khẩu">
                    </div> 
					<div class="form-group">
                        <label for="ten">Chứng thực: </label>
						<?php $checkct = ($dt_cau_hinh->doc_theo_key('chungthuc')->giatri==1)?'checked':''; ?>
                        <label><input type="radio" <?php echo $checkct ?> value="1" name="chungthuc">Có</label>
						<label><input type="radio" <?php echo ($checkct=='')?'checked':'' ?> value="0" name="chungthuc">Không</label>
                    </div> 
					<div class="form-group">
                        <label for="ten">Loại chứng thực: </label>
                        <?php $checklct = ($dt_cau_hinh->doc_theo_key('ssl')->giatri==1)?'checked':''; ?>
                        <label><input type="radio" <?php echo $checklct ?> value="1" name="ssl">SSL</label>
						<label><input type="radio" <?php echo ($checklct=='')?'checked':'' ?> value="0" name="ssl">TLS</label>
                    </div> 
					<button  value="luu" type="submit" name="luu" class="btn btn-default">Lưu</button>
					<a href="?views=home" class="btn btn-default">Hủy</a>						
                </form>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->