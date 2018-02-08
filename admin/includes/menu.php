<?php include_once 'class/xl_menu.php'; 
	$xl_menu = new xl_menu();
	if(isset($_GET['action']) && $_GET['action'] == 'del' && isset($_GET['ma']) && $_GET['ma'] != '')
	{
		if($xl_menu->xoa($_GET['ma']))
			$thongbao = 'Xóa thành công';
		else
			$thongbao = 'Xóa không thành công';
		echo '<script>history.pushState({}, "", "main.php?views=menu" );</script>';
	}
	if(isset($_POST) && isset($_POST['del']) && $_POST['del']== 'delall' && isset($_POST['check']) && count($_POST['check'])>0)
	{
		foreach($_POST['check'] as $ma){
			if($xl_menu->xoa($ma))
				$thongbao = 'Xóa thành công';
		}
		//echo '<script>history.pushState({}, "", "main.php?views=news" );</script>';
	}
	$ds = $xl_menu->danh_sach();
?>
            <!-- content starts -->
<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
	
    <div class="box-header well" data-original-title="">
		
        <h2><i class="glyphicon glyphicon-user"></i> Danh sách menu</h2>

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
		<th  class="no-sort"><input type="checkbox" onclick="checkall(this.checked)" value="" id="all" /></th>
        <th  class="no-sort">Tiêu đề</th>
        <th>Thuộc menu</th>
        <th>Thứ tự</th>
        <th>Trạng thái</th>
        <th>Tác vụ</th>
    </tr>
    </thead>
    <tbody>
	<?php if($ds){
	foreach($ds as $tin){
	?>
    <tr>
		<td><input type="checkbox" name="check[]" value="<?php echo $tin->ma ?>"/></td>
        <td><?php echo $tin->ten ?></td>
        <td class="center"><?php echo ($tin->ten_cha!='')?$tin->ten_cha:'Cố định' ?></td>
        <td class="center"><?php echo $tin->thutu ?></td>
        <td class="center">
			<?php 
				if($tin->kichhoat==1){
			?>
            <span class="label-success label label-default">Active</span>
				<?php } else if($tin->kichhoat==0){?>
			<span class="label-default label label-danger">Lock</span>
				<?php }else if($tin->kichhoat==2){ ?>
				<span class="label-default label label-warning">Pending</span>
				<?php }else if($tin->kichhoat==3){ ?>
				<span class="label-default label label-danger">Delete</span>
				<?php } ?>
        </td>
        <td class="center">
          <!--  <a class="btn btn-success" href="#">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Chi tiết
            </a>-->
            <a class="btn btn-info" href="?views=editmenu&ma=<?php echo $tin->ma ?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Cập nhật
            </a>
            <a class="btn btn-danger" href="?views=menu&action=del&ma=<?php echo $tin->ma ?>" onclick="return xacnhan()">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Xóa
            </a>
        </td>
    </tr>
	<?php
		}
	}
	?>
    </tbody>
    </table>
	<a class="btn btn-success" href="?views=addmenu">
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