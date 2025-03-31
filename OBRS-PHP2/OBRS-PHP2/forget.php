<html>
<style type="text/css">
    body {
    background-image: url(./assets/img/bsimgstat.png) ;
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    /* background-size: stretch; */
}
    </style>
	<body id='login-body' class="bg-light">
    

    		<div class="card col-md-4 offset-md-4 mt-4">
                <div class="card-header-edge text-white">
                    <strong>Forget Password</strong>
                </div>
            <div class="card-body">



<?php
                include 'db_connect.php'; // Include your database connection file

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    // Retrieve form data
                    
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
                    
                
                    // Check if all fields are filled and username is not numeric
                    if ( !empty($user_name) && !empty($password) && !empty($confirm_password)) {
                        // Check if passwords match
                        if ($password !== $confirm_password) {
                            echo "Passwords do not match!";
                        } else {
                            // Check if the username already exists
                            $query = "SELECT * FROM users1 WHERE username = '$user_name'";
                            $result = mysqli_query($conn, $query);
                
                             
                                // Insert new user into the database
                                $status = 1; // Assuming default status is active
                                $date_updated = date('Y-m-d H:i:s'); // Current date and time
                
                                $query = "UPDATE users1 SET password='$password' WHERE username='$user_name'";
                                if (mysqli_query($conn, $query)) {
                                    echo "Password changed succesfully!";
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                            
                        }
                    } else {
                        echo "Please enter all required fields correctly!";
                    }
                }
                


                ?>
                <form method="post">
                   
                    <p>Username</p>
                    <input type="text" name="user_name" placeholder="Enter Username">
                    <br><br>
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter new Password">
                    <br><br>
                    
                    <p>Confirm Password</p>

                    <input type="password" name="confirm_password" placeholder="confirm Password">
                    <br><br>

                    
                    <input type="submit" name="signup" value="save">
                </form>
                
<a href="user1.php">Back to Login</a>
</div>
    </div>
  </body>
</html>