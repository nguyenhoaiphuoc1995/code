<?php 
$thongbao='';
if(isset($_GET['ma']) && $_GET['ma'] !=''){
	include_once 'class/xl_menu.php'; 
	$xl_menu = new xl_menu();
	$tin = $xl_menu->doc_thong_tin($_GET['ma']);
	$dsloai = $xl_menu->danh_sach_menu(0);
	
	$dsloaitin = $xl_menu->danh_sach_loai_tin();
	$dstin = $xl_menu->danh_sach_tintuc(0);
	
	//echo '<pre>',print_r($_POST),'</pre';
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luudong'){
		if($xl_menu->sua($_GET['ma'],$_POST))
		{
			echo '<script>document.location="main.php?views=menu";</script>';
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
	if(isset($_POST) && isset($_POST['luu']) && $_POST['luu']=='luu'){
		if($xl_menu->sua($_GET['ma'],$_POST))
		{
			$thongbao='Cập nhật thành công.';
			$tin = $xl_menu->doc_thong_tin($_GET['ma']);
		}else
		{
			$thongbao='Xảy ra lỗi trong quá trình cập nhật.';
		}	
		
	}
}else
{
	echo '<script>document.location="main.php?views=menu";</script>';
}
?>
            <!-- content starts -->
<script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>
<style>.none{display:none}</style>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Cập nhật menu <?php echo '- '.$tin->ten ?></h2>

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
                        <label for="tieu_de">Tên menu</label>
                        <input type="text" class="form-control" id="tieu_de" value="<?php echo $tin->ten ?>" name="ten" placeholder="Nhập tên menu">
                    </div>
					<div class="form-group">
                        <label for="tieu_de">Icon</label><br>
						<?php 
							foreach($array_icon as $icon){
						?>
                        <label><input type="radio" <?php echo ($tin->icon==$icon)?'checked':'' ?> value="<?php echo $icon ?>" name="icon">
						<i class="<?php echo $icon ?>"></i> &nbsp;</label>
						<?php } ?>
                    </div>
					<div class="control-group">
						<label class="control-label" for="loai_menu">Loại menu</label>
						<div class="controls">
                            <select name="loai_menu" onchange="an_hien_control(this.value)" id="loai_menu" data-rel="chosen">		
								<?php foreach($array_loai_menu as $key=>$ten){ ?>
								<option <?php echo ($tin->loai_menu==$key)?'selected':'' ?> value="<?php echo $key ?>"><?php echo $ten ?></option>		
								<?php } ?>								
							</select>
                        </div>
                    </div> 
					
					<div id="khungloaitintuc" class="control-group">
						<label class="control-label" for="id_loai_tin">Chọn nhóm bài viết</label>
						<div class="controls">
                            <select onchange="taourl(this)" data-type="danhsachtin" class="form-control" name="id_loai_tin" id="id_loai_tin" data-rel="chosen">
								<option value="0">-- Chọn nhóm bài viết --</option>
								<?php
								$arrTach  = explode('danhsachtin&id=',$tin->link);
								$idnhom = ($arrTach && count($arrTach)==2)?$arrTach[1]:0; 
								foreach($dsloaitin as $loai){ 									
								?>
								<option <?php echo ($idnhom==$loai->ma)?'selected':'' ?> value="<?php  echo $loai->duongdan.'*'.$loai->ma ?>"><?php echo $loai->ten ?></option>		
									<?php 
										$loaicon=$xl_menu->danh_sach_tin_loai_con($loai->ma);
										if($loaicon)
										{
											foreach($loaicon as $con){ 
											?>
											<option <?php echo ($idnhom==$con->ma)?'selected':'' ?>  value="<?php echo $con->duongdan.'*'.$con->ma ?>"><?php echo '|--'.$con->ten ?></option>		
												<?php 
												$loaicon2=$xl_menu->danh_sach_tin_loai_con($con->ma);
												if($loaicon2)
												{
													foreach($loaicon2 as $con2){ 
													?>
													<option <?php echo ($idnhom==$con2->ma)?'selected':'' ?>  value="<?php echo $con2->duongdan.'*'.$con2->ma ?>"><?php echo '|----'.$con2->ten ?></option>		
													<?php
													}
												}
										
											}
										}
									} ?>								
							</select>
                        </div>
                    </div>	
					<div id="khungtintuc" class="control-group">
						<label class="control-label" for="id_tin">Chọn bài viết</label>
						<div class="controls">
                            <select onchange="taourl(this)" data-type="chitiettin"   class="form-control" name="id_tin" id="id_tin" data-rel="chosen">
								<option value="0">-- Chọn bài viết --</option>
								<?php
								$arrTach  = explode('chitiettin&id=',$tin->link);
								$idtin = ($arrTach && count($arrTach)==2)?$arrTach[1]:0; 
								foreach($dstin as $sp){
								?>
								<option <?php echo ($idtin==$sp->ma)?'selected':'' ?> value="<?php echo $sp->duongdan.'*'.$sp->ma ?>"><?php echo $sp->ten ?></option>		
									<?php
									} ?>								
							</select>
                        </div>
                    </div>						
					<div class="form-group">
                        <label for="link">Đường dẫn</label>
                        <input readonly type="text" class="form-control" id="duongdan" value="<?php echo $tin->duongdan ?>" name="duongdan" placeholder="Nhập đường dẫn rút gọn SEO">
                    </div>
					<div class="form-group">
                        <label for="link">Liên kết gốc</label>
                        <input readonly type="text" class="form-control" id="link" value="<?php echo $tin->link ?>" name="link" placeholder="Liên kết gốc">
                    </div>
					<div class="control-group">
						<label class="control-label" for="menu_cha">Thuộc menu</label>
						<div class="controls">
                            <select name="menucha" id="menu_cha" data-rel="chosen">
								<option value="0">-- Chọn menu cha --</option>		
								<?php foreach($dsloai as $loai){ ?>
								<option <?php echo ($tin->menucha==$loai->ma)?'selected':'' ?> value="<?php echo $loai->ma ?>"><?php echo $loai->ten ?></option>		
								<?php 
								$dsmenucon = $xl_menu->danh_sach_menu($loai->ma);
								if($dsmenucon)
								{
									foreach($dsmenucon as $mncon)
									{
										?>
										<option <?php echo ($tin->menucha==$mncon->ma)?'selected':'' ?> value="<?php echo $mncon->ma ?>">|--<?php echo $mncon->ten ?></option>		
										<?php
									}
								}
							 } ?>								
							</select>
                        </div>
                    </div> 
					<div class="form-group">
                        <label for="mota">Mô tả</label>
                        <input type="text" class="form-control" id="mota" value="<?php echo $tin->mota ?>" name="mota" placeholder="Nhập ghi chú cho menu">
                    </div>
					<div class="form-group">
                        <label for="sap_xep">Thứ tự</label>
                        <input type="text" class="form-control" id="sap_xep" value="<?php echo $tin->thutu ?>" name="thutu" placeholder="Nhập thứ tự hiển thị">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"  <?php echo ($tin->kichhoat==1)?'checked':'' ?> value="1" name="kichhoat"> Xuất bản
                        </label>
						<label>
                            <input type="checkbox"  <?php echo ($tin->macdinh==1)?'checked':'' ?> value="1" name="macdinh"> Mặc định
                        </label>						
                    </div>
					 
					<button  value="luu" type="submit" name="luu" class="btn btn-default">Lưu</button>
                    <button value="luudong" type="submit" name="luu" class="btn btn-default">Lưu và đóng</button>
					<a href="?views=menu" class="btn btn-default">Hủy</a>
					<input type="hidden" name="alias" id="alias" value="<?php echo $tin->duongdan ?>"/>				
                </form>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
    <!-- content ends -->
	<script>
		function an_hien_control(value){
			switch(value)
			{
				case 'codinh':
					$('#khungloaisanpham').addClass('none');
					$('#khungsanpham').addClass('none');
					$('#khungloaitintuc').addClass('none');
					$('#khungtintuc').addClass('none');
					$('#duongdan').prop('readonly',true);
					$('#link').prop('readonly',true);
					break;
				case 'link':
					$('#khungloaisanpham').addClass('none');
					$('#khungsanpham').addClass('none');
					$('#khungloaitintuc').addClass('none');
					$('#khungtintuc').addClass('none');
					$('#duongdan').removeAttr('readonly');
					$('#link').removeAttr('readonly');
					break;
				
				case 'loaitin':
					$('#khungloaisanpham').addClass('none');
					$('#khungsanpham').addClass('none');
					$('#khungloaitintuc').removeClass('none');
					$('#khungloaitintuc .chosen-container').width(500);
					$('#khungtintuc').addClass('none');
					$('#duongdan').prop('readonly',true);
					$('#link').prop('readonly',true);
					break;
				case 'tin':
					$('#khungloaisanpham').addClass('none');
					$('#khungsanpham').addClass('none');
					$('#khungloaitintuc').addClass('none');
					$('#khungtintuc').removeClass('none');
					$('#khungtintuc .chosen-container').width(500);
					$('#duongdan').prop('readonly',true);
					$('#link').prop('readonly',true);
					break;
								
			}
		}
		function taourl(obj)
		{
			//alert(123);
			var array = $(obj).val().split('*');
			jQuery.ajax({
				type: "POST",
				url: "<?php echo config::base_url() ?>services/index.php",
				data: {type:jQuery(obj).attr('data-type'),duongdan:array[0],ma:array[1],task:'taoLink'},				
				dataType: "json",				
				beforeSend: function () {
					//alert(234);
					//jQuery("#dvPhanTrangTin").html('<img src="images/loading.gif"/>');
				},
				success: function (data) {
					console.log(data);
					if(data.d=='no')
					{
						//jQuery("#dvPhanTrangTin").remove();
					}
					else
					{						
						jQuery("#duongdan").val(data.urlSeo);
						jQuery("#link").val(data.url);					
					}
				},
				error: function (a,b,c) {
					//alert(a.responseText);
					//jQuery("#dvPhanTrangTin").html("Không tìm thấy dữ liệu!!!");					
				}
			});
		}
		$(function(){
			an_hien_control('<?php echo @$tin->loai_menu ?>');
		})
	</script>