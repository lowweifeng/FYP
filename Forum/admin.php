<?php
session_start();

// Check if the user is logged in as an admin
if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {
  // User is logged in as an admin, show the admin page content
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" type="image/x-icon" href="Image/728.jpg">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Page</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  

  </head>

  <body>
    <?php
    include "config.php";
    include "header.php";

    // Check if the post ID and page type are provided in the query parameters
    if (isset($_GET['postID']) && isset($_GET['page'])) {
      $postID = $_GET['postID'];
      $pageType = $_GET['page'];

      // Use prepared statement to fetch the post from the "pages" table based on the post ID and page type
      $sql = "SELECT * FROM pages WHERE id = ? AND page_type = ? LIMIT 1";
      $stmt = mysqli_prepare($connection, $sql);
      mysqli_stmt_bind_param($stmt, "is", $postID, $pageType);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        // Fetch the post details from the database
        $title = $row['title'];
        $description = $row['description'];
        $uploader = $row['uploader'];
        $date = $row['date'];
        $page_type = $row['page_type']; // Fetch the page_type from the database

        // Display the reported post
        echo '<div class="admin-page">
               <h5>' . $title . '</h5>
               <p>' . $description . '</p>
               <p>Uploader: ' . $uploader . '</p>
               <p>Date: ' . $date . '</p>
               <form action="admin.php" method="post">
                   <input type="hidden" name="postID" value="' . $postID . '">
                   <button type="submit" class="btn btn-delete" name="delete">Delete</button>
                   <button type="submit" class="btn btn-return" name="return">Return</button>
               </form>
           </div>';
      } else {
        echo 'Post not found in the database.';
      }

      mysqli_stmt_close($stmt); // Close the prepared statement
      mysqli_close($connection);
    } else {
      echo 'No post ID or page type provided.';
    }

    // Check if the form is submitted (POST request)
    if (isset($_POST['delete']) && isset($_POST['postID'])) {
      // Retrieve the postID from the form data
      $postIDToDelete = $_POST['postID'];

      // Sanitize the postID to prevent SQL injection
      $postIDToDelete = mysqli_real_escape_string($connection, $postIDToDelete);

      // Perform DELETE queries for both tables
      $deletePagesQuery = "DELETE FROM pages WHERE id = '$postIDToDelete'";
      $deleteFeitPagesQuery = "DELETE FROM feitpage WHERE id = '$postIDToDelete'";

      // Execute the DELETE queries
      if (mysqli_query($connection, $deletePagesQuery) && mysqli_query($connection, $deleteFeitPagesQuery)) {
        // Deletion successful
        echo "Posts with ID '$postIDToDelete' have been deleted successfully.";
      } else {
        // Deletion failed
        echo "Error deleting posts: " . mysqli_error($connection);
      }
    }

    ?>
  </body>

  </html>
<?php
} else {
  // User is not logged in as an admin, redirect to the login page
  header("Location: login.php");
  exit();
}
?>