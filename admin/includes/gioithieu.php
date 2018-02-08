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
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật giới thiệu</h2>

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
                        <label for="ten">Tiêu đề</label>
                        <input type="text"  class="form-control" value="<?php echo $dt_cau_hinh->doc_theo_key('gioithieutieude')->giatri ?>" name="gioithieutieude" placeholder="Tiêu đề">
                    </div> 
						<div class="form-group">
                        <label for="gioithieunoidung1">Nội dung trang giới thiệu 1</label>                        
                     
						<textarea  class="form-control" id="gioithieunoidung1" rows="10" name="gioithieunoidung1"><?php echo $dt_cau_hinh->doc_theo_key('gioithieunoidung1')->giatri ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('gioithieunoidung1'); </script>
					 </div>
					 <div class="form-group">
                        <label for="gioithieunoidung1">Nội dung trang giới thiệu 2</label>                        
                     
						<textarea  class="form-control" id="gioithieunoidung2" rows="10" name="gioithieunoidung2"><?php echo $dt_cau_hinh->doc_theo_key('gioithieunoidung2')->giatri ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('gioithieunoidung2'); </script>
					 </div>
					 <div class="form-group">
                        <label for="gioithieunoidung1">Nội dung trang giới thiệu 3</label>                        
                     
						<textarea  class="form-control" id="gioithieunoidung3" rows="10" name="gioithieunoidung3"><?php echo $dt_cau_hinh->doc_theo_key('gioithieunoidung3')->giatri ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('gioithieunoidung3'); </script>
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