<!DOCTYPE html>
<?php
// Check if the search form was submitted
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
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
                <!-- PHP code to display game data -->
                <?php
                // Sample game data
                $games = [
                    [
                        'title' => 'The Last Guardian',
                        'category' => 'Action-Adventure',
                        'release_date' => '2016-12-06',
                        'sales_numbers' => '2,000,000',
                        'github_username' => 'DoonOnthon',
                    ],
                    [
                        'title' => 'Assassin\'s Creed Valhalla',
                        'category' => 'Adventure',
                        'release_date' => '2020-11-10',
                        'sales_numbers' => '14,000,000',
                        'github_username' => 'DoonOnthon',
                    ],
                    [
                        'title' => 'The Witcher 3: Wild Hunt',
                        'category' => 'RPG',
                        'release_date' => '2015-05-19',
                        'sales_numbers' => '30,000,000',
                        'github_username' => 'DoonOnthon',
                    ],
                ];
                // Check if the search form was submitted and the search query is not empty
                if (isset($_GET['search']) && !empty($_GET['search'])) {
                    $searchQuery = $_GET['search'];

                    // Filter games based on the search query
                    $filteredGames = array_filter($games, function ($game) use ($searchQuery) {
                        // Case-insensitive search against game title, category, or release date
                        return stripos($game['title'], $searchQuery) !== false
                            || stripos($game['category'], $searchQuery) !== false
                            || stripos($game['release_date'], $searchQuery) !== false;
                    });

                    // Use the filtered games for displaying search results
                    $games = $filteredGames;
                }

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
        </table>
            <!-- "Reset Search" button -->
    <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
        <a href="index.php" class="btn btn-secondary mt-3">Reset Search</a>
    <?php endif; ?>
    </div>


</body>

</html>