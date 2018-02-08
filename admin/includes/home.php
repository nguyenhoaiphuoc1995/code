<?php 
include_once 'class/xl_trang_chu.php'; 
$xl_trang_chu = new xl_trang_chu();

?>
            <!-- content starts -->
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-list-alt blue"></i>
            <div>Tổng số sản phẩm</div>
            <div><?php echo $xl_trang_chu->dem_so_tin_tuc()->soluong ?></div>
            <!--<span class="notification">6</span>-->
        </a>
    </div>   

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
            <i class="glyphicon glyphicon-list red"></i>

            <div>Tổng số danh mục</div>
           <div><?php echo @$xl_trang_chu->dem_so_danh_muc()->soluong ?></div>

        </a>
    </div>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Quản lý nội dung website</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    <h3>Shop</h3>
                    <p>Chào mừng bạn đến với hệ thống quản lý website shop<br>Chúc bạn có một ngày làm việc hiệu quả.<br><br><br><br><br>
					<br><br><br><br><br></p>
					
                </div>
            </div>
        </div>
    </div>
</div><!--/row-->

    <!-- content ends -->