<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .output-container {
            margin-top: 20px;
        }
        .user-details {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }
        .user-details p {
            margin: 5px 0;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include("project.php"); 
        
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $query = "SELECT email FROM email WHERE email = '$email' AND password ='$password'";
            $result = mysqli_query($con, $query);
            
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['email'] = $email;
                echo '<div class="output-container">';
                foreach ($result as $row) {
                    echo "<div class='user-details'>";
                    echo "<p><strong>WELCOME :</strong> ".$row['email']."</p>";
                    echo "</div>";
                }
                echo '</div>'; // Close output-container
            }
            else {
                echo "<p class='error-message'>Invalid eamil or password</p>";
            }
        }
        ?>
    </div>
</body>
</html>

