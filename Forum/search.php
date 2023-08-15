<?php
// search.php

// Start the session (if not already started)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include your config.php file
include "config.php";
include "header.php";

// Check if the search query is provided as a parameter
if (isset($_GET['search_query'])) {
    $searchQuery = $_GET['search_query'];

    // Perform the search based on your database or data source.
    // Here, I'm assuming you have a database table named "posts"
    // and you want to search for posts containing the search query.
    $searchResults = array(); // Store the search results (you'll fill this array with data from your database)

    // Your search logic here
    // For example:
    $sql = "SELECT * FROM feitpage WHERE title LIKE '%$searchQuery%'";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $searchResults[] = $row;
    }

    $sql = "SELECT * FROM acgpage WHERE title LIKE '%$searchQuery%'";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $searchResults[] = $row;
    }

    $sql = "SELECT * FROM esportpage WHERE title LIKE '%$searchQuery%'";
    $result = mysqli_query($connection, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $searchResults[] = $row;
    }

    // Display the search results
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/seacrh.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Search Results</title>
        <!-- Add any additional CSS or meta tags here if needed -->
    </head>

    <body>
        <section class="search">
            <h1>Search Results for: <?php echo htmlspecialchars($searchQuery); ?></h1>
            <?php if (count($searchResults) > 0) { ?>
                <p><?php echo count($searchResults); ?> results found.</p>
                <!-- Display your search results here -->
                <?php foreach ($searchResults as $result) { ?>
                    <div class="result-item">
                        <h2><?php echo htmlspecialchars($result['title']); ?></h2>
                        <p><?php echo htmlspecialchars($result['description']); ?></p>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>No results found.</p>
            <?php } ?>
        </section>
    </body>

    </html>
<?php
    exit(); // Exit the script after displaying the search results.
}
?>