<?php 
$thongbao='';
if(isset($_GET['ma']) && $_GET['ma'] !=''){	
		echo '<script>document.location="main.php?views=editslide?ma='.$_GET['ma'].'";</script>';
}
include_once 'class/xl_slide_banner.php'; 
$dt_xl_slide_banner = new xl_slide_banner();
if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luudong'){
		if($dt_xl_slide_banner->them($_POST))
		{
			echo '<script>document.location="main.php?views=slideshow";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình thêm mới.';
		}	
		
	}
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
		if($dt_xl_slide_banner->them($_POST))
		{
			$thongbao='Thêm mới thành công.';
			echo '<script>document.location="main.php?views=addslide";</script>';
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
                <h2><i class="glyphicon glyphicon-edit"></i> Thêm mới slide</h2>

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
                        <label for="tieu_de">Tiêu đề</label>
                        <input type="text" class="form-control" id="tieu_de" value="" name="tieu_de" placeholder="Nhập tiêu đề mô tả">
                    </div>
                    <div class="form-group">
                        <label for="link">Liên kết</label>
                        <input  class="form-control" id="link" type="text" name="link"/>
                    </div>
					 <div class="form-group">
                        <label for="video">Liên kết Video</label>
						<input  class="form-control" id="video" type="text" name="video"/>
                    </div>
                    <div class="form-group">
                        <label for="hinh">Hình slide</label>
						<input type="text"  size="48" name="hinh" value=""  id="hinh" /><button type="button" onclick="openPopup()">Chọn hình</button>
                        <p class="help-block">Kích thước hình 1200 x 550 (pixel).</p>
                    </div>
					<div class="form-group">
                        <label for="thutu">Thứ tự</label>
                        <input type="text" class="form-control" id="thutu" value="" name="thutu" placeholder="Nhập số thứ tự là số lớn hơn 0">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked value="1" name="trang_thai"> Xuất bản
                        </label>
                    </div>
					<button  value="luu" type="submit" name="luu" class="btn btn-default">Lưu</button>
                    <button value="luudong" type="submit" name="luu" class="btn btn-default">Lưu và đóng</button>
					<a href="?views=news" class="btn btn-default">Hủy</a>				
                </form>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->