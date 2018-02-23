<?php
    require './config.php';
    if ($_POST && $_POST['query']) {
        $query = $_POST['query'];
        $result = $xl_nhomtin->searchSanPham($query);
        echo json_encode($result);
    }
?>