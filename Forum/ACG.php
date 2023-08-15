<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/feit.css">
  <link rel="stylesheet" href="css/acg.css">
  <link rel="icon" type="image/x-icon" href="Image/728.jpg">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ACG Forum</title>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
  <?php
  include "config.php";
  include "header.php";
  ?>

  <div class="pages-container">
    <div class="row">
      <div class="col-md-3">
        <form action="">
          <fieldset>
            <legend class="legend-title">Category</legend>
            <a href="home.php" class="pages-category-link"><i class='bx bx-home'></i> Home</a><br><br>
            <a href="FEIT.php" class="pages-category-link"><i class='bx bx-desktop'></i> FEIT</a><br><br>
            <a href="ACG.php" class="pages-category-link"><i class='bx bxs-game' ></i> ACG Society</a><br><br>
            <a href="E-Sport.php" class="pages-category-link"><i class='bx bxs-joystick' ></i> E-Sport Society</a>
          </fieldset>
        </form>
      </div>


      <div class="col-md-9">
        <?php
        include "config.php";

        $pageType = 'acgpage'; // Specify the common page_type value

        $sql = "SELECT * FROM pages WHERE page_type = ? ORDER BY id DESC";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "s", $pageType);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
          $postId = $row['id'];

          echo '<div class="acg-page">';
          echo '<h5>' . $row['title'] . '</h5>';
          echo '<p>' . $row['description'] . '</p>';
          echo '<p>Uploader: ' . $row['uploader'] . '</p>';
          echo '<p>Date: ' . $row['date'] . '</p>';

          // Add the separate line after each post
          echo '<hr>';

          // Report button with link to admin-page.php passing the postID as a query parameter
          echo '<a href="admin.php?postID=' . $row['id'] . '&page=' . $pageType . '" class="btn btn-report">Report</a>';

          // Fetch and display replies for this post from the "feit_replies" table
          $replySql = "SELECT * FROM acg_replies WHERE post_id = '$postId'";
          $replyResult = mysqli_query($connection, $replySql);

          while ($replyRow = mysqli_fetch_assoc($replyResult)) {
            echo '<div class="reply">';
            echo '<p>Reply by: ' . $replyRow['uploader'] . '</p>';
            echo '<p>' . $replyRow['content'] . '</p>';
            echo '<p>Date: ' . $replyRow['date'] . '</p>';

            // Add the separate line after each reply
            echo '<hr>';

            echo '</div>';
          }

          // Reply button
          echo '<a href="ACG_reply.php?post_id=' . $postId . '" class="btn btn-reply">Reply</a><br><br>';
          echo '</div>';
        }

        mysqli_close($connection);
        ?>
      </div>
    </div>
  </div>


  <a href="ACG-upload.php" class="btn btn-upload">Upload</a>
</body>

</html>