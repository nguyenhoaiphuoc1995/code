<?php 
$thongbao='';
if(isset($_GET['ma']) && $_GET['ma'] !=''){	
		echo '<script>document.location="main.php?views=editnew?ma='.$_GET['ma'].'";</script>';
}
include_once 'class/xl_tin_tuc.php'; 
$dt_tintuc = new xl_tin_tuc();
$dsloai = $dt_tintuc->danh_sach_loai();
if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luudong'){
		if($dt_tintuc->them($_POST))
		{
			echo '<script>document.location="main.php?views=news";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình thêm mới.';
		}	
		
	}
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
		if($dt_tintuc->them($_POST))
		{
			$thongbao='Thêm mới thành công.';
			echo '<script>document.location="main.php?views=addnew";</script>';
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
                <h2><i class="glyphicon glyphicon-edit"></i> Thêm mới sản phẩm</h2>

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
                        <label for="tieu_de">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="tieu_de" onblur="loai_bo_dau('tieu_de','duongdan')" value="" name="ten" placeholder="Nhập tên sản phẩm">
                    </div>
					<div class="form-group">
                        <label for="duongdan">Đường dẫn</label>
                        <input type="text" class="form-control" id="duongdan" value="" name="duongdan" placeholder="Nhập đường dẫn rút gọn">
                    </div>
					<div class="control-group">
						<label class="control-label" for="id_loai_san_pham">Thuộc nhóm sản phẩm</label>
						<div class="controls">
                            <select name="manhomtin"  class="form-control" id="id_loai_san_pham" data-rel="chosen">
								<?php foreach($dsloai as $loai){ ?>
								<option value="<?php echo $loai->ma ?>"><?php echo $loai->ten ?></option>		
									<?php 
										$loaicon=$dt_tintuc->danh_sach_loai_con($loai->ma);
										if($loaicon)
										{
											foreach($loaicon as $con){ 
											?>
											<option  value="<?php echo $con->ma ?>"><?php echo '|--'.$con->ten ?></option>		
												<?php 
												$loaicon2=$dt_tintuc->danh_sach_loai_con($con->ma);
												if($loaicon2)
												{
													foreach($loaicon2 as $con2){ 
													?>
													<option  value="<?php echo $con2->ma ?>"><?php echo '|----'.$con2->ten ?></option>		
													<?php
													}
												}
										
											}
										}
									} ?>								
							</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tom_tat">Nội dung tóm tắt</label>
                        <textarea  class="form-control" id="tom_tat" name="tomtat"></textarea>
						<script type="text/javascript">CKEDITOR.replace('tom_tat'); </script>
                    </div>
					 <div class="form-group">
                        <label for="chi_tiet">Nội dung chi tiết</label>
						<textarea  class="form-control" id="chi_tiet" name="chitiet"></textarea>
						<script type="text/javascript">CKEDITOR.replace('chi_tiet'); </script>
                    </div>
                    <div class="form-group">
                        <label for="hinh">Hình đại diện</label>
						<input type="text"  size="48" name="hinh" value=""  id="hinh" /><button type="button" onclick="openPopup()">Chọn hình</button>
                        <p class="help-block">Kích thước hình 220 x 210 (pixel).</p>
                    </div>					
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" checked value="1" name="kichhoat"> Xuất bản
                        </label>
                    </div>
					<div class="form-group">
                        <label for="tieude">Tiêu đề trang</label>
                        <input type="text" class="form-control" id="tieude" value="" name="tieude" placeholder="Nhập tiêu đề trang web">
                    </div>
					
					<div class="form-group">
                        <label for="tukhoa">Từ khóa</label>
                        <input type="text" class="form-control" id="tukhoa" value="" name="tukhoa" placeholder="Nhập từ khóa tìm kiếm">
                    </div>
					<div class="form-group">
                        <label for="motatukhoa">Mô tả từ khóa</label>
                       <textarea class="form-control" id="motatukhoa" name="motatukhoa" placeholder="Nhập mô tả tìm kiếm" rows="3"></textarea>
                    </div>
					<button  value="luu" type="submit" name="luu" onclick="capnhatsitemap()" class="btn btn-default">Lưu</button>
                    <button value="luudong" type="submit" name="luu" onclick="capnhatsitemap()" class="btn btn-default">Lưu và đóng</button>
					<a href="?views=news" class="btn btn-default">Hủy</a>
					<input type="hidden" name="alias" id="alias" value=""/>
					<input type="hidden" name="loai_tin_tuc" value="1"/>
                </form>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->