<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST" ) {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
      $sql = "SELECT * FROM users where username='$username' AND password='$password' ";
      $result = mysqli_query($conn , $sql);
      $num = mysqli_num_rows($result);

      if($num == 1) {
         $data = mysqli_fetch_assoc($result);
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['ID'] = $data['sno'];
          $_SESSION['username'] = $data['username'];
          header("location: index.php");

        }
    else {
        $showError = "Invalid Credentials.";
    }
}

?>