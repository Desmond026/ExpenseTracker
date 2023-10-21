<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

Session_start();
include("connections.php");
include("functions.php");
$user_data = check_login($con);

//Data to insert
$user_id = $user_data['user_id'];
$commodity = $_POST['commodity'];
$type = $_POST['type'];
$amount = $_POST['amount'];
// $description = $_POST['description'];

// SQL query to insert data into the "expense" table
$sql = "INSERT INTO expense (user_id, type, comodity, amount) VALUES ('$user_id', '$type', '$commodity', $amount)";

if (mysqli_query($con, $sql)) {
    $account_query = mysqli_query($con, "SELECT `balance` FROM `account` WHERE `user_id` = '$user_id'");

    if ($account_query) {
        $account_data = mysqli_fetch_assoc($account_query);
        $current_balance = $account_data['balance'];
        $current_income = $account_data['income'];
        $current_expense = $account_data['expense'];
    } else {
        die("Database query error: " . mysqli_error($con));
    }
    // $user_data = $user_query->fetch_assoc(); 
    // $current_balance = $user_data['balance'];
    // var_dump($type);
    if (isset($type) && $type == "income") {
        $new_balance = $current_balance + $amount;

        // Insert new income record
        // mysqli_query($con, "INSERT INTO expense (user_id, comodity amount) VALUES ($user_id, $commodity, $amount)");

        // Update the user's balance
        mysqli_query($con, "UPDATE `account` SET `balance` = $new_balance WHERE `user_id` = $user_id");

        mysqli_query($con, "UPDATE `account` SET `income` = `income` + $amount WHERE `user_id` = '$user_id'");


        // echo "Income added successfully. New balance: $new_balance";
        // echo "$current_balance";
        header('location:dashboard.php');
    }
    if ($current_balance >= $amount && $type == "expense") {
        // Deduct the expense amount from the user's balance
        $new_balance = $current_balance - $amount;

        // Insert the new expense record
        // mysqli_query($con, "INSERT INTO expense (user_id, comodity, amount) VALUES ($user_id, $commodity, $amount)");

        // Update the user's balance
        mysqli_query($con, "UPDATE `account` SET `balance` = $new_balance WHERE `user_id` = $user_id");

        mysqli_query($con, "UPDATE `account` SET `expense` = `expense` + $amount WHERE `user_id` = '$user_id'");

        // echo "Expense added successfully. New balance: $new_balance";
        header('location:dash.php');
    }
} else {
    echo "Error: " . mysqli_error($con);
}
