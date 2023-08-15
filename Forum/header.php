<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "config.php";
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/cursor.css">



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        * {
            cursor: none;
        }

        body {
            background-color: #1f1f1f;
            color: #1f1f1f;
            font-family: "Arial", sans-serif;
        }

        /* Header and Navbar */
        .header {
            z-index: 100;
        }

        .navbar {
            background-color: #1f1f1f;
            color: #ffffff;
        }

        .navbar-brand {
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-toggler-icon {
            background-color: #ffffff;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
        }

        .dropdown-menu {
            background-color: #1f1f1f;
        }

        .dropdown-item {
            color: #ffffff;
        }

        /* Forum */
        .forum-title {
            font-size: 36px;
            font-weight: bold;
            margin: 30px 0;
            color: #e91e63;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .forum-category {
            background-color: #fff3f5;
            border: 1px solid #ff99cc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .forum-category-title {
            font-size: 24px;
            font-weight: bold;
            color: #e91e63;
        }

        .forum-thread {
            background-color: #fff3f5;
            border: 1px solid #ff99cc;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .forum-thread-title {
            font-size: 22px;
            font-weight: bold;
            color: #e91e63;
            margin-bottom: 10px;
        }

        .forum-thread-content {
            color: #1f1f1f;
        }

        .forum-thread-info {
            color: #666666;
        }

        .forum-thread-info span {
            margin-right: 10px;
        }

        /* User Avatar */
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #e91e63;
            color: #ffffff;
            text-align: center;
            line-height: 50px;
            font-weight: bold;
        }

        /* Form Control */
        .form-control {
            background-color: #fff3f5;
            color: #1f1f1f;
        }

        /* Buttons */
        .btn-primary {
            background-color: #e91e63;
            color: #ffffff;
            border: none;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 50px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .btn-primary:hover {
            background-color: #ff3385;
        }

        .btn-outline-success {
            background-color: #ffffff;
            color: #e91e63;
            border: 2px solid #e91e63;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .btn-outline-success:hover {
            background-color: #e91e63;
            color: #ffffff;
        }

        ::selection {
            background-color: #e91e63;
            /* Pink */
            color: #ffffff;
            /* White */
        }

        /* Add a text-shadow to the selected text to make it pop */
        ::selection {
            text-shadow: none;
            /* Remove any existing text-shadow */
            text-shadow: 2px 2px 4px rgba(233, 30, 99, 0.3);
            /* Add a new text-shadow */
        }

        .divider {
            border: none;
            height: 2px;
            background: linear-gradient(to right, #e91e63, #ff4081, #9c27b0, #3f51b5, #2196f3);
            /* Use a gradient from #e91e63 to #ff4081 to #9c27b0 to #3f51b5 to #2196f3 */
        }
    </style>

    <script>
        $(document).ready(function() {
            // Initialize the dropdown
            $('.dropdown-toggle').dropdown();
        });
    </script>
</head>

<body>

    <div class="cursor"></div>

    <section class="header">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="home.php">Forum</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php"><i class='bx bx-home'></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-category' ></i> Category
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="userprofile.php"><i class='bx bxs-user-circle'></i> <?php echo $_SESSION['username']; ?>'s page</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="FEIT.php"><i class='bx bx-desktop'></i> FEIT</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="ACG.php"><i class='bx bxs-game' ></i> ACG</a>
                            <a class="dropdown-item" href="E-Sport.php"><i class='bx bxs-joystick' ></i> E-Sport</a>
                        </div>
                    </li>
                </ul>
                <?php if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) { ?>
                    <div class="mr-2">
                        <p class="text-white">Logged in as <?php echo $_SESSION['username']; ?></p>
                    </div>
                    <div class="mr-2">
                        <a href="logout.php" class="btn btn-primary">Logout</a>
                    </div>
                <?php } else { ?>
                    <div class="mr-2">
                        <a href="login.php" class="btn btn-primary">Login</a>
                    </div>
                    <div class="mr-2">
                        <a href="register.php" class="btn btn-primary">Register</a>
                    </div>
                <?php } ?>

                <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                    <input class="form-control mr-sm-2" type="search" name="search_query" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </section>

    <hr class="divider">

    <script>
        const cursor = document.querySelector('.cursor');
        let isMouseStopped = false;
        let mouseStoppedTimer;
        let isCursorVisible = false;
        let lastMouseX = -1;
        let lastMouseY = -1;

        // Function to update cursor position and visibility
        function updateCursor(event) {
            const mouseX = event.clientX;
            const mouseY = event.clientY;

            if (mouseX === lastMouseX && mouseY === lastMouseY) {
                return; // If the mouse hasn't moved, do not update the cursor position
            }

            lastMouseX = mouseX;
            lastMouseY = mouseY;

            if (!isCursorVisible) {
                isCursorVisible = true;
                cursor.style.opacity = '1';
            }
            cursor.style.left = mouseX + 'px';
            cursor.style.top = mouseY + 'px';

            if (!isMouseStopped) {
                cursor.style.transform = 'translate(-50%, -50%) scale(1.5)'; // Custom animation when mouse moves
                clearTimeout(mouseStoppedTimer);
                isMouseStopped = true;
            }

            mouseStoppedTimer = setTimeout(() => {
                isMouseStopped = false;
                cursor.style.transform = 'translate(-50%, -50%) scale(1)'; // Custom animation when mouse stops
            }, 100); // You can adjust the time (in milliseconds) for considering the mouse stopped

            cursorInteractionFeedback();
        }

        // Function to hide cursor after some idle time
        function hideCursor() {
            cursor.style.opacity = '0';
            isCursorVisible = false;
        }

        // Custom animation for cursor click
        function cursorClickAnimation() {
            cursor.style.transform = 'translate(-50%, -50%) scale(0.8)'; // Scale down on click
            setTimeout(() => {
                cursor.style.transform = 'translate(-50%, -50%) scale(1.5)'; // Restore to normal size after click
            }, 100);
        }

        function cursorInteractionFeedback() {
            const clickableElements = document.querySelectorAll('a, button, [role="button"]');
            clickableElements.forEach((element) => {
                element.addEventListener('mouseover', () => {
                    cursor.style.borderColor = '#00ff00'; // Change border color on hover
                });
                element.addEventListener('mouseout', () => {
                    cursor.style.borderColor = '#ff3333'; // Restore border color after hover
                });
                element.addEventListener('click', (event) => {
                    cursorClickAnimation();
                    event.stopPropagation(); // Stop event propagation to prevent unnecessary 'mousemove' trigger
                });
            });
        }
        // Event listeners to trigger custom cursor behavior
        document.addEventListener('mousemove', updateCursor);
        document.addEventListener('click', cursorClickAnimation);
        document.addEventListener('mouseout', hideCursor);
    </script>

</body>



</html>