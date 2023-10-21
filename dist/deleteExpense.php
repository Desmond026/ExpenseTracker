<?php
include("connections.php");
if(isset($_GET['deletid'])){
    $id = $_GET['deletid'];
    $sql = "delete from `expense` where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "<script>alert('Budget deleted successfully!');</script>";
        header('location:dash.php');
    }else{
        die(mysqli_error($con));
    }
}