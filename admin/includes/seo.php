<?php 
$thongbao='';
include_once 'class/xl_cau_hinh.php'; 
$dt_cau_hinh = new xl_cau_hinh();
//print_r($_POST);
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
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật SEO</h2>

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
                        <label for="ten">Tiêu đề trang</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('tieude')->giatri ?>" name="tieude" placeholder="Tiêu đề của website">
                    </div> 
					<div class="form-group">
                        <label for="ten">Từ khóa</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('tukhoa')->giatri ?>" name="tukhoa" placeholder="Từ khóa tìm kiếm, cách nhau bằng dấu phẩy(,)">
                    </div> 
					<div class="form-group">
                        <label for="ten">Mô tả tìm kiếm</label>
                        <textarea  class="form-control" rows="3"   name="motatukhoa" ><?php echo $dt_cau_hinh->doc_theo_key('motatukhoa')->giatri ?></textarea>
                    </div> 					
					<div class="form-group">
                        <label for="ten">Link thân thiện: </label>
						<?php $checkseo = ($dt_cau_hinh->doc_theo_key('seo')->giatri==1)?'checked':''; ?>
                        <label><input type="radio" <?php echo $checkseo ?> value="1" name="seo">Bật</label>
						<label><input type="radio" <?php echo ($checkseo=='')?'checked':'' ?> value="0" name="seo">Tắt</label>
                    </div> 
					<div class="form-group">
                        <label for="ten">Bảo trì website: </label>
                        <?php $checkbt = ($dt_cau_hinh->doc_theo_key('baotri')->giatri==1)?'checked':''; ?>
                        <label><input type="radio" <?php echo $checkbt ?> value="1" name="baotri">Bật</label>
						<label><input type="radio" <?php echo ($checkbt=='')?'checked':'' ?> value="0" name="baotri">Tắt</label>
                    </div> 
					<div class="form-group">
                        <label for="ten">Nội dung bảo trì website</label>
                        <textarea  class="form-control" name="noidungbaotri" id="noidungbaotri"><?php echo $dt_cau_hinh->doc_theo_key('noidungbaotri')->giatri ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('noidungbaotri'); </script>
                    </div> 
					<div class="form-group">
                        <label for="ten">Nội dung trang 404</label>
                        <textarea  class="form-control" name="noidung404" id="noidung404"><?php echo $dt_cau_hinh->doc_theo_key('noidung404')->giatri ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('noidung404'); </script>
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