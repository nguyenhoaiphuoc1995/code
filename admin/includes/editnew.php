<?php 
$thongbao='';
if(isset($_GET['ma']) && $_GET['ma'] !=''){
	include_once 'class/xl_tin_tuc.php'; 
	$dt_tintuc = new xl_tin_tuc();
	$tin = $dt_tintuc->doc_thong_tin($_GET['ma']);
	$dsloai = $dt_tintuc->danh_sach_loai();
	//echo '<pre>',print_r($_POST),'</pre';
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luudong'){
		if($dt_tintuc->sua($_GET['ma'],$_POST))
		{
			echo '<script>capnhatsitemap();document.location="main.php?views=news";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
		if($dt_tintuc->sua($_GET['ma'],$_POST))
		{
			echo '<script>capnhatsitemap();</script>';
			$thongbao='Cập nhật thành công.';
			$tin = $dt_tintuc->doc_thong_tin($_GET['ma']);
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
}else
{
	echo '<script>document.location="main.php?views=news";</script>';
}
?>
            <!-- content starts -->
<script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật sản phẩm <?php echo '- ',$tin->ten ?></h2>

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
                        <input type="text" class="form-control" id="tieu_de" onblur="loai_bo_dau('tieu_de','duongdan')" value="<?php echo  @$tin->ten ?>" name="ten" placeholder="Nhập tên sản phẩm">
                    </div>
					<div class="form-group">
                        <label for="duongdan">Đường dẫn</label>
                        <input type="text" class="form-control" id="duongdan" value="<?php echo @$tin->duongdan ?>" name="duongdan" placeholder="Nhập đường dẫn rút gọn">
                    </div>
					<div class="control-group">
						<label class="control-label" for="id_loai_san_pham">Thuộc nhóm sản phẩm</label>
						<div class="controls">
                            <select name="manhomtin"  class="form-control" id="id_loai_san_pham" data-rel="chosen">
								<?php foreach($dsloai as $loai){ ?>
								<option <?php echo (@$tin->manhomtin==$loai->ma)?'selected':'' ?> value="<?php echo $loai->ma ?>"><?php echo $loai->ten ?></option>		
									<?php 
										$loaicon=$dt_tintuc->danh_sach_loai_con($loai->ma);
										if($loaicon)
										{
											foreach($loaicon as $con){ 
											?>
											<option <?php echo (@$tin->manhomtin==$con->ma)?'selected':'' ?>   value="<?php echo $con->ma ?>"><?php echo '|--'.$con->ten ?></option>		
												<?php 
												$loaicon2=$dt_tintuc->danh_sach_loai_con($con->ma);
												if($loaicon2)
												{
													foreach($loaicon2 as $con2){ 
													?>
													<option <?php echo (@$tin->manhomtin==$con2->ma)?'selected':'' ?>   value="<?php echo $con2->ma ?>"><?php echo '|----'.$con2->ten ?></option>		
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
                        <textarea  class="form-control" id="tom_tat" name="tomtat"><?php echo @$tin->tomtat ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('tom_tat'); </script>
                    </div>
					 <div class="form-group">
                        <label for="chi_tiet">Nội dung chi tiết</label>
						<textarea  class="form-control" id="chi_tiet" name="chitiet"><?php echo @$tin->chitiet ?></textarea>
						<script type="text/javascript">CKEDITOR.replace('chi_tiet'); </script>
                    </div>
                    <div class="form-group">
                        <label for="hinh">Hình đại diện</label>
						<input type="text"  size="48" name="hinh" value="<?php echo @$tin->hinh ?>"  id="hinh" /><button type="button" onclick="openPopup()">Chọn hình</button>
                        <p class="help-block">Kích thước hình 220 x 210 (pixel).</p>
                    </div>					
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" <?php echo (@$tin->kichhoat==1)?'checked':'' ?> value="1" name="kichhoat"> Xuất bản
                        </label>
                    </div>
					<div class="form-group">
                        <label for="tieude">Tiêu đề trang</label>
                        <input type="text" class="form-control" id="tieude" value="<?php echo @$tin->tieude ?>" name="tieude" placeholder="Nhập tiêu đề trang web">
                    </div>
					
					<div class="form-group">
                        <label for="tukhoa">Từ khóa</label>
                        <input type="text" class="form-control" id="tukhoa" value="<?php echo @$tin->tukhoa ?>" name="tukhoa" placeholder="Nhập từ khóa tìm kiếm">
                    </div>
					<div class="form-group">
                        <label for="motatukhoa">Mô tả từ khóa</label>
                       <textarea class="form-control" id="motatukhoa" name="motatukhoa" placeholder="Nhập mô tả tìm kiếm" rows="3"><?php echo @$tin->motatukhoa ?></textarea>
                    </div>
					<button  value="luu" type="submit" name="luu" class="btn btn-default">Lưu</button>
                    <button value="luudong" type="submit" name="luu"  class="btn btn-default">Lưu và đóng</button>
					<a href="?views=news" class="btn btn-default">Hủy</a>
					
                </form>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->