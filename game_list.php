<?php
// Include necessary files for game data and functions
include 'includes/games_data.php';       // Include game data
include 'includes/games.php';            // Include games array
include 'includes/functions.inc.php';    // Include custom functions
include 'includes/pagination.php';       // Include pagination logic
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

    <!-- Custom CSS to remove link underline -->
    <style>
        /* Style for the link in the table header */
        th a {
            text-decoration: none;
            /* Remove underline */
            color: inherit;
            /* Inherit color from parent element */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Page Heading -->
        <h1>Welcome to GamePulse!</h1>
        <p>Explore the world of gaming and find your next adventure.</p>

        <!-- Search Bar -->
        <form method="GET" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search for games by title, category, or release date">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <!-- Game List Table -->
        <table class="table table-bordered table-striped" id="game-table">
            <thead>
                <!-- Table Headers -->
                <tr>
                    <th><a href="?sort=title">Game Title</a></th>
                    <th>Category</th>
                    <th><a href="?sort=<?php echo ($sort === 'newest') ? 'oldest' : 'newest'; ?>">Release Date</a></th>
                    <th><a href="?sort=sales&amp;direction=<?php echo ($sort === 'sales' && $sortDirection === 'asc') ? 'desc' : 'asc'; ?>">Sales Numbers</a></th>

                    <th>Contributor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through the sorted games array and display each game as a table row
                foreach ($gamesPage as $game) {
                    echo "<tr>";
                ?>
                    <!-- Game Title -->
                    <td>
                        <?php echo $game['title']; ?>
                    </td>
                    <?php
                    // Category
                    echo "<td>{$game['category']}</td>";
                    ?>
                    <!-- Release Date -->
                    <td>
                        <?php echo $game['release_date']; ?>
                    </td>
                    <?php
                    // Sales Numbers and Contributor
                    echo "<td>{$game['sales_numbers']}</td>";
                    echo "<td>{$game['github_username']}</td>";
                    ?>
                    <!-- Details Button -->
                    <td>
                        <button class="btn btn-primary btn-details">Details</button>
                    </td>
                <?php
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?><?php echo isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : ''; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

        <!-- "Reset Search" button -->
        <?php if (isset($_GET['search']) && !empty($_GET['search'])) : ?>
            <!-- Display the "Reset Search" button if a search query is present -->
            <a href="game_list.php" class="btn btn-secondary mt-3">Reset Search</a>
        <?php endif; ?>
    </div>

    <!-- JavaScript to handle "Details" button click and modal display -->
    <script>
        $(document).ready(function() {
            $(".btn-details").on("click", function() {
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
    <div class="modal fade" id="gameModal" tabindex="-1" role="dialog" aria-labelledby="gameModalLabel" aria-hidden="true">
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