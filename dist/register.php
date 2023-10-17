<?php
Session_start();
include("connections.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  //SOMETHING WAS POSTED
  $username = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $fullname = mysqli_real_escape_string($con, $_POST['Fname']);
  // $username = $_POST['email'];
  // $password = $_POST['password'];
  // $fullname = $_POST['Fname'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  if (!empty($username) && !empty($password) && !empty($fullname) && !is_numeric($username)) {
    //save to database
    $user_id = random_num(20);
    $query = "INSERT INTO  user (user_id, username, password, fullname) 
    		VALUES('$user_id', '$username', '$hashedPassword', '$fullname')";
    mysqli_query($con, $query);

    header("Location: login.php");
    die;
  } else {
    $error_message = "Please enter some valid information";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Page</title>
  <link rel="stylesheet" href="output.css" />
  <link rel="shortcut icon" href="img/ExP.png" type="image/x-icon">
</head>

<body>
  <div class="flex items-center justify-center h-screen bg-cover" style="
        background-image: url('https://source.unsplash.com/featured/1280x720/?expense-tracker');
      ">
    <div class="bg-gray-100 shadow-md rounded-md p-8 w-1/3">
      <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>
      <form autocomplete="off" action="register.php" method="post">
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Full Name:</label>
          <input type="text" name="Fname" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your name" />
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
          <input type="email" name="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your email" />
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
          <input type="password" name="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your password" />
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
          <input type="password" name="Cpassword" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Confirm your password" />
        </div>
        <button type="submit" class="bg-indigo-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
          Register
        </button>
        <!-- <div class="flex items-center justify-between mt-10">
          <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Forgot Password?</a>
        </div> -->
      </form>
      <!-- Snackbar container -->
      <div id="snackbar" class="fixed bottom-20 left-1/2 -translate-x-52 text-black p-16 opacity-0 "></div>
      <div class="text-sm mt-10 text-center">
        Already have an account?
        <a href="login.php" class="text-blue-500 hover:text-blue-800">Login</a>
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