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
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật Meta</h2>

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
                        <label for="ten">Các thẻ meta tùy ý</label>
                        <textarea  class="form-control" rows="10"   name="themeta" ><?php echo $dt_cau_hinh->doc_theo_key('themeta')->giatri ?></textarea>
                    </div> 					
					 <div class="form-group">
                        <label for="hinh">Hình Favicon</label>
						<input type="text"  size="48" name="favicon" value="<?php echo $dt_cau_hinh->doc_theo_key('favicon')->giatri ?>"  id="hinh" /><button type="button" onclick="openPopup()">Chọn hình</button>
                        <p class="help-block">Kích thước hình 16 x 16 (pixel).</p>
                    </div>	
					<div class="form-group">
                        <label for="hinh">Hình Share</label>
						<input type="text"  size="48" name="imagetrangchu" value="<?php echo $dt_cau_hinh->doc_theo_key('imagetrangchu')->giatri ?>"  id="hinh3" /><button type="button" onclick="openPopup3()">Chọn hình</button>
                        <p class="help-block">Kích thước hình 600 x 400 (pixel).</p>
                    </div>
					<div class="form-group">
                        <label for="hinh">Hình logo top</label>
						<input type="text"  size="48" name="logo" value="<?php echo $dt_cau_hinh->doc_theo_key('logo')->giatri ?>"  id="logo" /><button type="button" onclick="openimg('logo')">Chọn hình</button>
                        <p class="help-block">Kích thước hình 100 x 100 (pixel).</p>
                    </div>	
					<div class="form-group">
                        <label for="hinh">Hình Banner</label>
						<input type="text"  size="48" name="banner" value="<?php echo $dt_cau_hinh->doc_theo_key('banner')->giatri ?>"  id="banner" /><button type="button" onclick="openimg('banner')">Chọn hình</button>
                        <p class="help-block">Kích thước hình 1600 x 500 (pixel).</p>
                    </div>	
					<div class="form-group">
                        <label for="hinh">Hình logo bottom</label>
						<input type="text"  size="48" name="logo2" value="<?php echo $dt_cau_hinh->doc_theo_key('logo2')->giatri ?>"  id="logo2" /><button type="button" onclick="openimg('logo2')">Chọn hình</button>
                        <p class="help-block">Kích thước hình 100 x 100 (pixel).</p>
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