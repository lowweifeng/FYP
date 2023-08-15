<?php
session_start();
include "config.php";

// Check if the user is not logged in, then redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $replyContent = $_POST["reply_content"];
    $postId = $_GET["post_id"]; // Get the post ID from the URL

    // Check if the user wants to post anonymously
    if (isset($_POST['anonymous']) && $_POST['anonymous'] === '1') {
        $uploader = "Anonymous";
    } else {
        // Retrieve the logged-in user's name from the session variable
        $uploader = $_SESSION['username'];
    }

    // Insert the reply data into the database
    $sql = "INSERT INTO feit_replies (post_id, content, uploader, date) VALUES ('$postId', '$replyContent', '$uploader', NOW())";

    // Execute the query
    if (mysqli_query($connection, $sql)) {
        echo "Reply uploaded successfully.";
        // Redirect the user back to the original post after submitting the reply
        header("Location: FEIT.php"); // Adjust the URL as needed
        exit();
    } else {
        echo "Error uploading reply: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/reply.css">
    <link rel="icon" type="image/x-icon" href="Image/728.jpg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reply Forum</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <section class="reply">
        <div class="reply-container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Create the reply form -->
                    <form method="POST" action="FEIT_reply.php?post_id=<?php echo $_GET['post_id']; ?>">
                        <fieldset>
                            <legend>Reply</legend>
                            <div class="form-group">
                                <label for="reply_content">Your Reply:</label>
                                <textarea class="form-control" id="reply_content" name="reply_content" rows="5" required></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="anonymous" name="anonymous">
                                <label class="form-check-label" for="anonymous">
                                    Post Anonymously
                                </label>
                            </div>
                        </fieldset>
                        <br>
                        <button type="submit" class="btn btn-reply">Submit Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>