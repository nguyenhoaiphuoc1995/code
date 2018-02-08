<?php 
include_once 'class/xl_slide_banner.php'; 
	$dt_banner = new xl_slide_banner();
	if(isset($_GET['action']) && $_GET['action'] == 'del' && isset($_GET['ma']) && $_GET['ma'] != '')
	{
		if($dt_banner->xoa($_GET['ma']))
			$thongbao = 'Xóa thành công';
		else
			$thongbao = 'Xóa không thành công';
		echo '<script>history.pushState({}, "", "main.php?views=slideshow" );</script>';
	}
	if(isset($_POST) && isset($_POST['del']) && $_POST['del']== 'delall' && isset($_POST['check']) && count($_POST['check'])>0)
	{
		foreach($_POST['check'] as $ma){
			if($dt_banner->xoa($ma))
				$thongbao = 'Xóa thành công';
		}
		//echo '<script>history.pushState({}, "", "main.php?views=news" );</script>';
	}
	$ds = $dt_banner->danh_sach();
?>
            <!-- content starts -->
<div class=" row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Danh sách slide</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default hidden"><i class="glyphicon glyphicon-remove "></i></a>
        </div>
    </div>
    <div class="box-content">
	<?php if(isset($thongbao) && $thongbao!=''){ ?><div class="alert alert-info"><?php echo @$thongbao; ?> </div><?php } ?>
   <form method="post" action="">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
		<th><input type="checkbox" value="" id="all" /></th>
        <th>Tiêu đề</th>
        <th>Hình</th>
		 <th>Thứ tự</th>
        <th>Ngày đăng</th>
        <th>Trạng thái</th>
        <th>Tác vụ</th>
    </tr>
    </thead>
    <tbody>
	<?php if($ds){
	foreach($ds as $tin){
	?>
    <tr>
		<td><input type="checkbox" name="check[]" value="<?php echo $tin->id ?>"/></td>
        <td><?php echo $tin->tieu_de ?></td>
        <td class="center"><img src="<?php echo $tin->hinh ?>" width="120" height="70"></td>
		 <td><?php echo $tin->thutu ?></td>
        <td class="center"><?php echo $tin->ngay_dang ?></td>
        <td class="center">
           <?php 
				if($tin->trang_thai==1){
			?>
            <span class="label-success label label-default">Active</span>
				<?php } else if($tin->trang_thai==0){?>
			<span class="label-default label label-danger">Lock</span>
				<?php }else if($tin->trang_thai==2){ ?>
				<span class="label-default label label-warning">Pending</span>
				<?php }else if($tin->trang_thai==3){ ?>
				<span class="label-default label label-danger">Delete</span>
				<?php } ?>
        </td>
        <td class="center">
           <!-- <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Chi tiết
            </a>-->
            <a class="btn btn-info" href="?views=editslide&ma=<?php echo $tin->id ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Cập nhật
            </a>
            <a class="btn btn-danger" onclick="return xacnhan()" href="?views=slideshow&action=del&ma=<?php echo $tin->id ?>">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Xóa
            </a>
        </td>
    </tr>
	<?php }} ?>
    </tbody>
    </table>
	<a class="btn btn-success" href="?views=addslide">
		<i class="glyphicon glyphicon-plus icon-white"></i>
		Thêm mới
    </a>
	<button class="btn btn-danger" type="submit" name="del" onclick="return xacnhan()" value="delall">
		<i class="glyphicon glyphicon-trash icon-white"></i>
		Xóa các mục đang chọn
    </button>
	</form>
    </div>
    </div>
    </div>
    <!--/span-->
</div>

    <!-- content ends -->