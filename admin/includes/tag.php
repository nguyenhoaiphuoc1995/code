<?php include_once 'class/xl_tags.php'; 
//echo '<pre>',print_r($_POST),'</pre>';
	$xl_san_pham = new xl_tags();
	if(isset($_GET['action']) && $_GET['action'] == 'del' && isset($_GET['ma']) && $_GET['ma'] != '')
	{
		if($xl_san_pham->xoa($_GET['ma']))
			$thongbao = 'Xóa thành công';
		else
			$thongbao = 'Xóa không thành công';
		echo '<script>history.pushState({}, "", "main.php?views=tag" );</script>';
	}
	if(isset($_POST) && isset($_POST['del']) && $_POST['del']== 'delall' && isset($_POST['check']) && count($_POST['check'])>0)
	{
		foreach($_POST['check'] as $ma){
			if($xl_san_pham->xoa($ma))
				$thongbao = 'Xóa thành công';
		}
		//echo '<script>history.pushState({}, "", "main.php?views=news" );</script>';
	}
	
	if(isset($_POST) && isset($_POST['update']) && $_POST['update']== 'update')
	{
		$dstukhoa = $xl_san_pham->danh_sach_tags();
		$dstagmoi = array();
		foreach($dstukhoa as $tukhoa)
		{
			$mangtam = explode(',',$tukhoa->tukhoa);			
			foreach($mangtam as $tag)
			{
				$tam =	trim($tag);
				if(!in_array($tam,$dstagmoi))
				{
					$dstagmoi[]=$tam;
				}
			}
		}
		if($dstagmoi && count($dstagmoi)>0)
		{
			$xl_san_pham->xoa_all();
			foreach($dstagmoi as $tg)
			{
				$xl_san_pham->them($tg);
			}
		}		
	}
	if(isset($_POST) && isset($_POST['capnhat']) && $_POST['capnhat']== 'capnhat')
	{
		if(isset($_POST['checktrangchu']) && $_POST['checktrangchu'] && count($_POST['checktrangchu'])>0)
		{		
			$xl_san_pham->capnhatall();	
			foreach($_POST['checktrangchu'] as $ch)
			{
				$xl_san_pham->capnhat($ch);
			}
		}		
	}
	$ds = $xl_san_pham->danh_sach();
?>
            <!-- content starts -->
<div class=" row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-tag"></i> Danh sách tag</h2>

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
		<th><input type="checkbox" onclick="checkall(this.checked)" value="" id="all" /></th>		
        <th >Tag</th>  
		<th>Hiển thị trang chủ </th>		
        <th>Tác vụ </th>
    </tr>
    </thead>
    <tbody>
	<?php if($ds){
	foreach($ds as $tin){
	?>
    <tr>
		<td><input type="checkbox" name="check[]" value="<?php echo $tin->ma ?>"/></td>	
        <td><?php echo $tin->tag ?></td>       
		<td><input type="checkbox" name="checktrangchu[]" <?php echo $tin->trangchu==1?'checked':'' ?> value="<?php echo $tin->ma ?>"/></td>	
        <td class="center">         
            <a class="btn btn-danger" href="?views=tag&action=del&ma=<?php echo $tin->ma ?>" onclick="return xacnhan()">
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
	<button class="btn btn-danger" type="submit" name="del" onclick="return xacnhan()" value="delall">
		<i class="glyphicon glyphicon-trash icon-white"></i>
		Xóa các mục đang chọn
    </button>
	<button class="btn btn-success" type="submit" name="update" value="update">
		<i class="glyphicon glyphicon-refresh icon-white"></i>
		Cập nhật lại danh sách tag
    </button>
	<button class="btn btn-success" type="submit" name="capnhat" value="capnhat">
		<i class="glyphicon glyphicon-save icon-white"></i>
		Lưu
    </button>
	</form>
    </div>
    </div>
    </div>
    <!--/span-->
</div>

    <!-- content ends -->