<?php
// Include the 'games_data.php' file to get the game data
include 'includes/games_data.php';
// Include the 'games_data.php' file to get the game data
include 'includes/games.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>GamePulse - Discover Exciting Games</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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
        <table class="table table-bordered table-striped" id="game-table">
            <thead>
                <tr>
                    <th>Game Title</th>
                    <th>Category</th>
                    <th>Release Date</th>
                    <th>Sales Numbers (Approx)</th>
                    <th>Contributor</th>
                    <th>Details</th> <!-- New column for "Details" button -->
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
                    // Add the "Details" button to each row
                    echo "<td><button class='btn btn-primary btn-details'>Details</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- "Reset Search" button -->
        <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
            <!-- Display the "Reset Search" button if a search query is present -->
            <a href="game_list.php" class="btn btn-secondary mt-3">Reset Search</a>
        <?php endif; ?>
    </div>
    <script>
        // JavaScript to handle "Details" button click
        $(document).ready(function () {
            $(".btn-details").on("click", function () {
                // Get the row index of the clicked button
                var rowIndex = $(this).closest("tr").index();
                // Get the game details from the games array based on the row index
                var game = <?php echo json_encode($games); ?>[rowIndex];

                // Update the modal content with game details
                $("#gameModal .modal-title").text(game.title);
                $("#gameModal .modal-body").html(
                    "<p><strong>Category:</strong> " + game.category + "</p>" +
                    "<p><strong>Release Date:</strong> " + game.release_date + "</p>" +
                    "<p><strong>Sales Numbers (Approx):</strong> " + game.sales_numbers + "</p>" +
                    "<p><strong>Contributor:</strong> " + game.github_username + "</p>"
                );

                // Show the modal manually
                $("#gameModal").modal("show");
            });
        });
    </script>

    <!-- Modal for displaying game details -->
    <div class="modal fade" id="gameModal" tabindex="-1" role="dialog" aria-labelledby="gameModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="gameModalLabel">Game Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Game details will be dynamically updated here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>