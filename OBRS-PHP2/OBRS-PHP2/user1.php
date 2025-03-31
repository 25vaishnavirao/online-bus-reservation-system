<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>EZfare Login</title>
    <link rel="stylesheet" href="cssfile/nav.css">
    <link rel="stylesheet" href="cssfile/footer_l.css">
    <link rel="stylesheet" href="cssfile/login.css">
    <link rel="stylesheet" a href="css\font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style type="text/css">
      body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        background-image: url(image/8.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font: 67px;
      }
      .sign_up {
        font-size: 20px;
      }
      .sign_up:hover {
        background-color: #fff;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
          <?php
           // Start the session
          include 'db_connect.php'; // Include your database connection file

          if ($_SERVER['REQUEST_METHOD'] == "POST") {
              // Something was posted
              $user_name = $_POST['user_name'];
              $password = $_POST['password'];

              if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
                  // Read from database
                  $query = "select * from users1 where username = '$user_name' limit 1";
                  $result = mysqli_query($conn, $query);

                  if ($result) {
                      if ($result && mysqli_num_rows($result) > 0) {
                          $user_data = mysqli_fetch_assoc($result);
                          if ($user_data['password'] === $password) {
                              // Successful login, redirect to newticket.php
                              $_SESSION['user_id'] = $user_data['id'];
                            include 'newticket.php';
                            die;
                                        
                         } else {
                              echo "Wrong username or password!";
                          }
                      } else {
                          echo "Wrong username or password!";
                      }
                  } else {
                      echo "Error: " . mysqli_error($conn);
                  }
              } else {
                  echo "Please enter valid username and password!";
              }
          }
          ?>
          <form method="post">
            <p>Username</p>
            <input type="text" name="user_name" placeholder="Enter Username">
            <br><br>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" name="login" value="Login">
            <br>
            <a href="signUp.php" class="sign_up">sign up</a>
            <a href="forget.php">        Forget Password</a>    
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
