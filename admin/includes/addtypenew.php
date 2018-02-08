<?php 
$thongbao='';
if(isset($_GET['ma']) && $_GET['ma'] !=''){	
		echo '<script>document.location="main.php?views=edittypenew?ma='.$_GET['ma'].'";</script>';
}
include_once 'class/xl_loai_tin.php'; 
$dt_loai_san_pham = new xl_loai_tin();
$dsloaicha = $dt_loai_san_pham->danh_sach();
if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luudong'){
		if($dt_loai_san_pham->them($_POST))
		{
			echo '<script>capnhatsitemap();document.location="main.php?views=typenew";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình thêm mới.';
		}	
		
	}
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
		if($dt_loai_san_pham->them($_POST))
		{
			$thongbao='Thêm mới thành công.';
			echo '<script>capnhatsitemap();document.location="main.php?views=addtypenew";</script>';
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
                <h2><i class="glyphicon glyphicon-edit"></i> Thêm mới nhóm sản phẩm</h2>

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
                        <label for="tieu_de">Tên</label>
                        <input type="text" class="form-control" id="ten_loai_san_pham" onblur="loai_bo_dau('ten_loai_san_pham','duongdan')" value="" name="ten" placeholder="Nhập tên nhóm sản phẩm">
                    </div>
					<div class="form-group">
                        <label for="duongdan">Đường dẫn</label>
                        <input type="text" class="form-control" id="duongdan" value="" name="duongdan" placeholder="Nhập đường dẫn rút gọn">
                    </div>
					<!--<div class="control-group">
						<label class="control-label" for="id_loai_cha">Thuộc nhóm</label>
						<div class="controls">
                            <select name="danhmuccha" id="id_loai_cha" data-rel="chosen">
								<option value="0">Chọn nhóm</option>	
								<?php foreach($dsloaicha as $loai){ ?>
								<option value="<?php echo $loai->ma ?>"><?php echo $loai->ten ?></option>		
								<?php } ?>								
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mo_ta_tom_tat">Mô tả tóm tắt</label>
                        <textarea  class="form-control" id="mo_ta_tom_tat" name="mo_ta_tom_tat"></textarea>
                    </div>-->
					<div class="form-group">
                        <label for="mo_ta_tom_tat">Mô tả</label>
						<textarea  class="form-control" id="mo_ta_tom_tat" name="mota"></textarea>
						<script type="text/javascript">CKEDITOR.replace('mo_ta_tom_tat'); </script>
                    </div>
                    <div class="form-group">
                        <label for="hinh">Hình đại diện</label>
						<input type="text"  size="48" name="hinhdaidien" value=""  id="hinh" /><button type="button" onclick="openPopup()">Chọn hình</button>
                        <p class="help-block">Kích thước hình 346 x 260 (pixel).</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked value="1" name="kichhoat"> Xuất bản
                        </label>
                    </div>	
										
					<div class="form-group">
                        <label for="tieude">Tiêu đề trang</label>
                        <input type="text" class="form-control" id="tieude" value="" name="tieude" placeholder="Nhập tiêu đề trang">
                    </div>		
					<div class="form-group">
                        <label for="tukhoa">Từ khóa</label>
                        <input type="text" class="form-control" id="tukhoa" value="" name="tukhoa" placeholder="Nhập từ khóa tìm kiếm">
                    </div>		
					<div class="form-group">
                        <label for="motatukhoa">Mô tả từ khóa</label>
                        <textarea class="form-control" id="motatukhoa" name="motatukhoa" placeholder="Nhập mô tả tìm kiếm" rows="3"></textarea>
                    </div>	
					<div class="form-group">
                        <label for="thutu">Thứ tự</label>
                        <input type="text" class="form-control" id="thutu" value="1" name="thutu" placeholder="Thứ tự hiển thị">
                    </div>							
					<button  value="luu" type="submit" name="luu" class="btn btn-default">Lưu</button>
                    <button value="luudong" type="submit" name="luu" class="btn btn-default">Lưu và đóng</button>
					<a href="?views=typeproduct" class="btn btn-default">Hủy</a>							
                </form>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->