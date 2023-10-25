<?php
include("connections.php");

if (isset($_GET['deletid'])) {
    $id = $_GET['deletid'];

    // First, fetch the record before deleting it to determine its type and amount.
    $fetch_record_query = "SELECT * FROM `expense` WHERE id = $id";
    $record_result = mysqli_query($con, $fetch_record_query);

    if ($record_result) {
        $record = mysqli_fetch_assoc($record_result);
        $type = $record['type'];
        $amount = $record['amount'];
        $user_id = $record['user_id'];

        // Delete the record
        $delete_query = "DELETE FROM `expense` WHERE id = $id";
        $delete_result = mysqli_query($con, $delete_query);

        if ($delete_result) {
            // The delete query was successful.

            // Check if the record type is 'income' or 'expense' and update the balances accordingly.
            if ($type === 'income') {
                // Fetch the user's current balance
                $fetch_balance_query = "SELECT `balance`, `income` FROM `account` WHERE `user_id` = '$user_id'";
                $balance_result = mysqli_query($con, $fetch_balance_query);

                if ($balance_result) {
                    $balance_data = mysqli_fetch_assoc($balance_result);
                    $current_balance = $balance_data['balance'];
                    $current_income = $balance_data['income'];

                    // Update the user's balance by subtracting the amount
                    $new_balance = $current_balance - $amount;

                    // Update the user's income by subtracting the amount
                    $new_income = $current_income - $amount;

                    // Update the user's balance
                    $update_balance_query = "UPDATE `account` SET `balance` = $new_balance, `income` = $new_income WHERE `user_id` = '$user_id'";
                    $update_balance_result = mysqli_query($con, $update_balance_query);

                    if (!$update_balance_result) {
                        die(mysqli_error($con));
                    }
                } else {
                    die(mysqli_error($con));
                }
            } elseif ($type === 'expense') {
                // Fetch the user's current balance and expense
                $fetch_balance_query = "SELECT `balance`, `expense` FROM `account` WHERE `user_id` = '$user_id'";
                $balance_result = mysqli_query($con, $fetch_balance_query);

                if ($balance_result) {
                    $balance_data = mysqli_fetch_assoc($balance_result);
                    $current_balance = $balance_data['balance'];
                    $current_expense = $balance_data['expense'];

                    // Update the user's balance by adding the amount
                    $new_balance = $current_balance + $amount;

                    // Update the user's expense by subtracting the amount
                    $new_expense = $current_expense - $amount;

                    // Update the user's balance and expense
                    $update_balance_query = "UPDATE `account` SET `balance` = $new_balance, `expense` = $new_expense WHERE `user_id` = '$user_id'";
                    $update_balance_result = mysqli_query($con, $update_balance_query);

                    if (!$update_balance_result) {
                        die(mysqli_error($con));
                    }
                } else {
                    die(mysqli_error($con));
                }
            }

            header('location:dash.php');
        } else {
            die(mysqli_error($con));
        }
    } else {
        die(mysqli_error($con));
    }
}
?>
