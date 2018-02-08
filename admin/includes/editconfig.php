<?php 
$thongbao='';
if(isset($_GET['ma']) && $_GET['ma'] !=''){
	include_once 'class/xl_cau_hinh.php'; 
	$dt_cau_hinh = new xl_cau_hinh();
	$tin = $dt_cau_hinh->doc_thong_tin($_GET['ma']);
	//echo '<pre>',print_r($_POST),'</pre';
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luudong'){
		if($dt_cau_hinh->sua($_GET['ma'],$_POST))
		{
			echo '<script>document.location="main.php?views=config";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
		if($dt_cau_hinh->sua($_GET['ma'],$_POST))
		{
			$thongbao='Cập nhật thành công.';
			$tin = $dt_cau_hinh->doc_thong_tin($_GET['ma']);
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
}else
{
	echo '<script>document.location="main.php?views=config";</script>';
}
?>
            <!-- content starts -->
<script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="row">
    <div class="box col-md-12">
         <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật cấu hình</h2>

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
                        <label for="ten">Tên cấu hình</label>
                        <input type="text"  class="form-control" disabled id="ten" value="<?php echo $tin->ten ?>" name="ten" placeholder="Nhập tên cấu hình">
                    </div>                   
					 <div class="form-group">
                        <label for="gia_tri">Giá trị</label>
						<textarea  class="form-control" id="gia_tri" name="giatri"><?php echo $tin->giatri ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('gia_tri'); </script>
                    </div>
					<button  value="luu" type="submit" name="luu" class="btn btn-default">Lưu</button>
                    <button value="luudong" type="submit" name="luu" class="btn btn-default">Lưu và đóng</button>
					<a href="?views=config" class="btn btn-default">Hủy</a>						
                </form>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->