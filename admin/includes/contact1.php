<?php 
$thongbao='';
if(isset($_GET['ma']) && $_GET['ma'] !=''){
	include_once 'class/xl_lien_he.php'; 
	$xl_lien_he = new xl_lien_he();
	$tin = $xl_lien_he->doc_thong_tin($_GET['ma']);
	//echo '<pre>',print_r($_POST),'</pre';
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luudong'){
		if($xl_lien_he->sua($_GET['ma'],$_POST))
		{
			echo '<script>document.location="main.php?views=home";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
		if($xl_lien_he->sua($_GET['ma'],$_POST))
		{
			$thongbao='Cập nhật thành công.';
			$tin = $xl_lien_he->doc_thong_tin($_GET['ma']);
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
}else
{
	echo '<script>document.location="main.php?views=home";</script>';
}
?>
            <!-- content starts -->
<script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật thông tin liên hệ</h2>

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
                        <label for="dia_chi">Địa chỉ</label>
                        <textarea class="form-control" id="dia_chi" name="dia_chi"><?php echo $tin->dia_chi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="so_dien_thoai">Số điện thoại</label>
                        <input type="text" class="form-control" id="so_dien_thoai" value="<?php echo $tin->so_dien_thoai ?>" name="so_dien_thoai" placeholder="Nhập số điện thoại ">
                    </div>
					<div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control" id="fax" value="<?php echo $tin->fax ?>" name="fax" placeholder="Nhập số fax ">
                    </div>
					<div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $tin->email ?>" name="email" placeholder="Nhập Email">
                    </div>
					<div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="website" value="<?php echo $tin->website ?>" name="website" placeholder="Nhập tên website">
                    </div>

<div class="form-group">
                        <label for="x">Tọa độ x</label>
                        <input type="text" class="form-control" id="x" value="<?php echo $tin->x?>" name="x" placeholder="Nhập tọa độ x của bản đồ">
                    </div>
<div class="form-group">
                        <label for="y">Tọa độ y</label>
                        <input type="text" class="form-control" id="y" value="<?php echo $tin->y?>" name="y" placeholder="Nhập tọa độ y của bản đồ">
                    </div>
                
					<button  value="luu" type="submit" name="luu" class="btn btn-default">Lưu</button>
                    <button value="luudong" type="submit" name="luu" class="btn btn-default">Lưu và đóng</button>
					<a href="?views=home" class="btn btn-default">Hủy</a>					
                </form>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->