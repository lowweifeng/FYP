<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "config.php";

// Check if the form for updating profile is submitted
if (isset($_POST['update_profile'])) {
    $newEmail = $_POST['new_email'];
    $newPassword = $_POST['new_password'];

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the user's profile in the database
    $userId = $_SESSION['user_id']; // Assuming you have a user_id column in your users table
    $query = "UPDATE `user` SET email = '$newEmail', password = '$hashedPassword' WHERE id = '$userId'";
    mysqli_query($connection, $query);

    // Update the session variable with the new email
    $_SESSION['email'] = $newEmail;
}


// Check if the form for deleting a post is submitted
if (isset($_POST['delete_post'])) {
    $postId = $_POST['post_id'];
    $uploader = $_SESSION['username'];

    // Delete the post from the database
    $query = "DELETE FROM pages WHERE id = ? AND uploader = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "is", $postId, $uploader);
    mysqli_stmt_execute($stmt);

    if (mysqli_affected_rows($connection) > 0) {
        // Deletion successful
        // Optionally, you can redirect to a different page after deletion
        header("Location: userprofile.php");
        exit();
    } else {
        // Deletion failed
        $error_message = "Failed to delete post.";
    }

    mysqli_stmt_close($stmt);
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <link rel="icon" type="image/x-icon" href="Image/728.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/userprofile.css">
    <title>User profile</title>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <?php include "header.php"; ?>

    <section class="userprofile">
        <div class="userprofile-container">
            <!-- Display the user's profile information in a form -->
            <div class="edit-profile-form">
                <h2>Edit Profile</h2>
                <form method="post">
                    <div class="form-group">
                        <label for="new_email">Email</label>
                        <div class="input-container">
                            <input type="email" name="new_email" id="new_email" class="form-control" required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new_password">Password</label>
                        <div class="input-container">
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
    </section>

    <!-- Display the post history -->
    <div class="history-posts">
        <div class="mr-2">
            <p class="text-white">
            <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
            </p>
        </div>

        <h3><u>Your history Posts</u></h3>
        <hr>

        <?php
        // Retrieve the current user's username from the session variable
        $currentUser = $_SESSION['username'];

        // Retrieve the posts for the current user from the pages table in the database
        $query = "SELECT * FROM pages WHERE uploader = '$currentUser'";
        $result = mysqli_query($connection, $query);

        // Check if any posts were found
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Access the post data for each row
                $postId = $row['id'];
                $postTitle = $row['title'];
                $postDescription = $row['description'];

                // Display the post data
                echo "<h5>Title: $postTitle</h5>";
                echo "<p>Description: $postDescription</p>";
                echo '<form method="post" style="display: inline-block;">';
                echo '<input type="hidden" name="post_id" value="' . $postId . '">';
                echo '<button type="submit" name="delete_post" class="btn btn-danger">Delete</button>';
                echo '</form>';
                echo "<br><br>";
                echo "<hr>";
            }
        } else {
            echo "<p>No posts found for the current user.</p>";
        }
        ?>
    </div>

    <?php
    mysqli_close($connection);
    ?>
</body>

</html>