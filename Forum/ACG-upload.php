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
    $title = $_POST["title"];
    $description = $_POST["description"];
    $anonymous = isset($_POST["anonymous"]) ? $_POST["anonymous"] : 0;

    // Retrieve the logged-in user's name from the session variable or set it as anonymous
    if ($anonymous == 1) {
        $uploader = "Anonymous";
    } else {
        $uploader = $_SESSION['username'];
    }

    // Insert data into 'pages' table
    $sql_pages = "INSERT INTO pages (title, description, uploader, date, page_type) VALUES ('$title', '$description', '$uploader', NOW(), 'acgpage')";

    // Insert data into 'feitpage' table
    $sql_acgpage = "INSERT INTO acgpage (title, description, uploader, anonymous, date, page_type) VALUES ('$title', '$description', '$uploader', $anonymous, NOW(), 'acgpage')";

    // Execute the queries
    if (mysqli_query($connection, $sql_pages) && mysqli_query($connection, $sql_acgpage)) {
        echo "Data uploaded successfully to both tables.";
        header("Location: ACG.php");
        exit();
    } else {
        echo "Error uploading data: " . mysqli_error($connection);
    }
}

mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/upload.css">
    <link rel="icon" type="image/x-icon" href="Image/728.jpg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Upload Forum</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <section class="upload">
        <div class="upload-container">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <fieldset>
                            <legend>Title</legend>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>Description</legend>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
                        </fieldset>
                        <div class="form-group">
                            <label for="anonymous">Anonymous:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="anonymous" id="anonymous-on" value="1">
                                <label class="form-check-label" for="anonymous-on">On</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="anonymous" id="anonymous-off" value="0" checked>
                                <label class="form-check-label" for="anonymous-off">Off</label>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-upload">Upload</button>
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