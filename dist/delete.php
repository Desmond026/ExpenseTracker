<?php
include("connections.php");
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "delete from `budgets` where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "<script>alert('Budget deleted successfully!');</script>";
        header('location:dashboard.php');
    }else{
        die(mysqli_error($con));
    }
}
