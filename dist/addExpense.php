<?php

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
    echo "Row inserted successfully."; // TODO: Remove this loc and replace with redirect, maybe?
    echo "$type"; // TODO: Remove this loc and replace with redirect, maybe?
    //TODO: Add Statement to either subtract or add to user balance depending on expense type
    // Fetch the current user's balance
    $user_query = $con->query("SELECT balance FROM user WHERE id = $user_id");
    $user_data = $user_query->fetch_assoc(); 
    $current_balance = $user_data['balance'];
    if ($type == "income") {
        $new_balance = $current_balance + $amount;

        // Insert new income record
        mysqli_query($con, "INSERT INTO expense (user_id, amount) VALUES ($user_id, $amount)");

        // Update the user's balance
        mysqli_query($con, "UPDATE user SET balance = $new_balance WHERE id = $user_id");

        echo "Income added successfully. New balance: $new_balance";
    }
    if ($current_balance >= $amount && $type == "expense") {
        // Deduct the expense amount from the user's balance
        $new_balance = $current_balance - $amount;

        // Insert the new expense record
        mysqli_query($con, "INSERT INTO expense (user_id, description, amount) VALUES ($user_id, '$description', $amount)");

        // Update the user's balance
        mysqli_query($con, "UPDATE user SET balance = $new_balance WHERE id = $user_id");

        echo "Expense added successfully. New balance: $new_balance";
    }
} else {
    echo "Error: " . mysqli_error($con);
}
