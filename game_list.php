<?php
// Include the 'games_data.php' file to get the game data
include 'includes/games_data.php';
// Include the 'games_data.php' file to get the game data
 include 'includes/games.php';
?>
<!DOCTYPE html>
<?php
// Check if the search form was submitted and the search query is not empty
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchQuery = $_GET['search'];

    // TODO: Implement search functionality
    // Filter games based on the search query
    // Code to be added here
}
?>
<html>

<head>
    <title>GamePulse - Discover Exciting Games</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Welcome to GamePulse!</h1>
        <p>Explore the world of gaming and find your next adventure.</p>

        <!-- Search bar code -->
        <form method="GET" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search"
                    placeholder="Search for games by title, category, or release date">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

<!-- Game List Table -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Game Title</th>
            <th>Category</th>
            <th>Release Date</th>
            <th>Sales Numbers (Approx)</th>
            <th>Contributor</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop through the games array and display each game as a table row
        foreach ($games as $game) {
            echo "<tr>";
            echo "<td>{$game['title']}</td>";
            echo "<td>{$game['category']}</td>";
            echo "<td>{$game['release_date']}</td>";
            echo "<td>{$game['sales_numbers']}</td>";
            echo "<td>{$game['github_username']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
            </tbody>
        </table>

        <!-- "Reset Search" button -->
        <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
            <!-- Display the "Reset Search" button if a search query is present -->
            <a href="index.php" class="btn btn-secondary mt-3">Reset Search</a>
        <?php endif; ?>
    </div>


</body>

</html>