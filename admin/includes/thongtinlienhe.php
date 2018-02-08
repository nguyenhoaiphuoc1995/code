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
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật liên hệ</h2>

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
                        <label for="ten">Điện thoại bán hàng</label>                        
						<textarea  class="form-control" id="mo_ta_tom_tat" rows="10" name="dienthoai"><?php echo $dt_cau_hinh->doc_theo_key('dienthoai')->giatri ?></textarea>						
                    </div>                   
					
				   <div class="form-group">
                        <label for="ten">Địa chỉ</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('diachi')->giatri ?>" name="diachi" placeholder="Địa chỉ">
                    </div> 
					<div class="form-group">
                        <label for="ten">Điện thoại liên hệ</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('dienthoai')->giatri ?>" name="dienthoai" placeholder="Điện thoại trang liên hệ">
                    </div>    
					<div class="form-group">
                        <label for="ten">Tên liên hệ</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('tenlienhe')->giatri ?>" name="tenlienhe" placeholder="Tên người liên hệ">
                    </div> 
					<div class="form-group">
                        <label for="ten">Email</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('email')->giatri ?>" name="email" placeholder="Email liên hệ">
                    </div> 				
					<div class="form-group">
                        <label for="ten">Bản đồ</label>
                        <textarea  class="form-control" rows="3"   name="bando" ><?php echo $dt_cau_hinh->doc_theo_key('bando')->giatri ?></textarea>
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