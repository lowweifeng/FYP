<?php
ob_start();
session_start();
include "config.php";

// Define variables to hold form input values
$email = $password = '';
$error = '';
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form inputs (you can add more validation if needed)
    if (empty($email) || empty($password)) {
        $error = "Please enter your email and password.";
    } else {
        // Retrieve the user record from the database based on the email
        $query = "SELECT * FROM `user` WHERE `email` = '$email'";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $storedPassword = $row['password'];

            // Verify the password
            if (password_verify($password, $storedPassword)) {
                // Password is correct, check if the user is the admin account
                if ($email === "admin@gmail.com") {
                    // Set session variable to indicate that the user is an admin
                    $_SESSION['isAdmin'] = true;
                }

                // Set session variables or generate a token for authentication
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['name'];

                // Set success message
                $successMessage = "Login successful.";
            } else {
                $error = "Invalid email or password.";
            }
        } else {
            $error = "Invalid email or password.";
        }
    }
}

mysqli_close($connection);
ob_end_flush();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <link rel="icon" type="image/x-icon" href="Image/728.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/login.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">

    <title>Login</title>


</head>

<body>
    <section class="login">
        <div class="login-container">
            <h1>Login</h1>
            <?php if (!empty($successMessage)) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $successMessage; ?>Click <a href="home.php">here</a> to go to the Home Page.
                </div>
            <?php } ?>
            <?php if (!empty($error)) { ?>
                <div class="alert alert-danger mt-3" role="alert"><?php echo $error; ?></div>
            <?php } ?>
            <?php if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) { ?>
                <div id="logout">
                    <p>Logged in as <?php echo $_SESSION['username']; ?></p>
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
            <?php } else { ?>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            <?php } ?>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>