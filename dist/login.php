<?php
Session_start();
include("connections.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //SOMETHING WAS POSTED
  $user_name = $_POST['email'];
  $password = $_POST['password'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
    //read from database

    $query = "SELECT * FROM user where username = '$user_name' limit 1";
    $result = mysqli_query($con, $query);

    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        if (password_verify($password, $user_data['password'])) {
          $_SESSION['user_id'] = $user_data['user_id'];
          header("Location: dash.php");
          die;
        }
      }
    }
    // $error_message = "Invalid username or password";
    echo "<script>alert('wrong username or password!')</script> ";
  } else {
    $error_message = "Please Fill Up All Spaces";
    echo "<script>alert('wrong username or password!')</script> ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Page</title>
  <link rel="stylesheet" href="output.css" />
  <link rel="shortcut icon" href="img/ExP.png" type="image/x-icon">
</head>

<body>
  <div class="flex items-center justify-center h-screen bg-cover" style="
        background-image: url('https://source.unsplash.com/featured/1280x720/?expense-tracker');
      ">
    <div class="bg-gray-100 shadow-md rounded-md p-8 w-1/3">
      <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
      <form method="post">
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
          <input type="email" name="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email" />
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
          <input type="password" name="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password" />
        </div>
        <div class="flex items-center justify-between mt-10">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Log in
          </button>
          <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Forgot Password?</a>
        </div>
      </form>
      <!-- Snackbar container -->
      <div id="snackbar" class="fixed bottom-20 left-1/2 -translate-x-52 text-black p-16 opacity-0 "></div>
      <div class="text-sm mt-10 text-center">
        Don't have an account?
        <a href="register.php" class="text-blue-500 hover:text-blue-800">Sign up</a>
      </div>
    </div>
  </div>
</body>

</html>
<?php
// If there's an error message, render the JavaScript to show the snackbar
if (isset($error_message)) {
  echo "<script>showSnackbar('$error_message');</script>";
}
?>