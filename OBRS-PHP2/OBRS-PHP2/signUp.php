<?php
                include 'db_connect.php'; // Include your database connection file

                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    // Retrieve form data
                    $name = $_POST['name'];
                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];
                    $confirm_password = $_POST['confirm_password'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                
                    // Check if all fields are filled and username is not numeric
                    if (!empty($name) && !empty($user_name) && !empty($password) && !empty($confirm_password) && !empty($email) && !empty($phone) && !is_numeric($user_name)) {
                        // Check if passwords match
                        if ($password !== $confirm_password) {
                            echo "Passwords do not match!";
                        } else {
                            // Check if the username already exists
                            $query = "SELECT * FROM users1 WHERE username = '$user_name'";
                            $result = mysqli_query($conn, $query);
                
                            if (mysqli_num_rows($result) > 0) {
                                echo "Username already exists!";
                            } else {
                                // Insert new user into the database
                                $status = 1; // Assuming default status is active
                                $date_updated = date('Y-m-d H:i:s'); // Current date and time
                
                                $query = "INSERT INTO users1 (name, username, password, email, phone, status, date_updated) VALUES ('$name', '$user_name', '$password', '$email', $phone, $status, '$date_updated')";
                                if (mysqli_query($conn, $query)) {
                                    echo "Registration successful!";
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                            }
                        }
                    } else {
                        echo "Please enter all required fields correctly!";
                    }
                }
                


                ?>
                <form method="post">
                    <p>Name</p>
                    <input type="text" name="name" placeholder="Enter Your Name">
                    <br><br>
                    <p>Username</p>
                    <input type="text" name="user_name" placeholder="Enter Username">
                    <br><br>
                    <p>Password</p>
                    <input type="password" name="password" placeholder="Enter Password">
                    <br><br>
                    
                    <p>Confirm Password</p>

                    <input type="password" name="confirm_password" placeholder="confirm Password">
                    <br><br>

                    <p>Email</p>
                    <input type="email" name="email" placeholder="Enter Email">
                    <br><br>
                    <p>Phone</p>
                    <input type="text" name="phone" placeholder="Enter Phone Number">
                    <br><br>
                    <input type="submit" name="signup" value="Sign Up">
                </form>