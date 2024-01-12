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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Custom CSS to remove link underline -->
    <style>
        /* Style for the link in the table header */
        th a {
            text-decoration: none;
            /* Remove underline */
            color: inherit;
            /* Inherit color from parent element */
        }
        .select2-search__field  {
            height: 25px!important;
        }
        .pagination {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 0;
        }
        .filters {
            display: flex;
            justify-content: space-between;
        }

        .white-back {
            background: white!important; 
            background-size: cover; 
            background-position: center;
            margin: 5px;
            padding: 25px;
            min-height: 400px;
            border-radius: 10px;
        }
        .head-title {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .h1, h1 {
            font-size: 3.5rem;
        }  
    </style>
</head>

<body style="background-image: url(images/herobanner.png)!important; background-size: cover; background-position: center; ">
    <?php
        include 'includes/header.inc.php';       // Include header
    ?>
    <div class="container mt-5">
        
        <div class="post-content mb-4 head-title" style="padding: 8px; color: white;">
            <!-- Page Heading -->
            <h1>Welcome to GamePulse!</h1>
            <p>Explore the world of gaming and find your next adventure.</p>
        </div>

        <div class="content white-back" style="margin: 15px; margin-bottom: 3.5rem!important;">
            <div class="filters mb-3">
                <div>   
                    <label for="titleFilter">Filter by title:</label>
                    <select id="titleFilter" name="titleFilter[]" multiple>
                        <?php
                        // Collect unique game titles for filter
                        $uniqueTitles = array_unique(array_column($games, 'title'));
                        foreach ($uniqueTitles as $title) {
                            echo "<option value='" . $title . "'>$title</option>";
                        }
                        ?>
                    </select>

                    <label for="categoryFilter">Filter by category:</label>
                    <select id="categoryFilter" name="categoryFilter" multiple>
                        <?php
                        // Collect unique game categories for filter
                        $uniqueCategories = array_unique(array_column($games, 'category'));
                        foreach ($uniqueCategories as $category) {
                            echo "<option value='" . $category . "'>$category</option>";
                        }
                        ?>
                    </select>
                    <label for="usernameFilter">Filter by contributor:</label>
                    <select id="usernameFilter" name="usernameFilter" multiple>
                        <?php
                        // Collect unique game categories for filter
                        $uniqueContributors = array_unique(array_column($games, 'github_username'));
                        foreach ($uniqueContributors as $contributor) {
                            echo "<option value='" . $contributor . "'>$contributor</option>";
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <!-- "Reset Search" button -->
                    <a href="game_list.php" class="btn btn-secondary">Reset Search</a>
                </div>
            </div>
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
                <tr>
                    <th><a href="?sort=title">Game Title</a></th>
                    <th>Category</th>
                    <th><a href="?sort=<?php echo ($sort === 'newest') ? 'oldest' : 'newest'; ?>">Release Date</a></th>
                    <th><a href = "?sort=<?=($sort === 'highest') ? 'lowest' : 'highest'; ?>"> Sales Numbers (Approx) </a></th>
                    <th>Contributor</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($gamesPage as $game) : ?>
                        <tr>
                            <td><?php echo $game['title']; ?></td>
                            <td><?php echo $game['category']; ?></td>
                            <td><?php echo $game['release_date']; ?></td>
                            <td><?php echo $game['sales_numbers']; ?></td>
                            <td><?php echo $game['github_username']; ?></td>
                            <td>
                            <button class="btn btn-primary btn-details">Details</button>
                        </td>
                        </tr>
                    <?php endforeach; ?>
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
        </div>
    </div>

    <!-- JavaScript to handle "Details" button click and modal display -->
    <script>
        $(document).ready(function() {

            // Select2 for choose some titles in this filter
            $('#titleFilter').select2({
                placeholder: 'Choose Title(s)',
                width: '150px'
            });
            // Select2 for choose some categorys in this filter
            $('#categoryFilter').select2({
                placeholder: 'Choose Category(s)',
                width: '200px'
            });
            $('#usernameFilter').select2({
                placeholder: 'Choose Contributor(s)',
                width: '200px'
            });
            
            // Filter for titles and categorys to search in the games data
            $('#titleFilter, #categoryFilter, #usernameFilter').on('change', function() {
                // Collect filter values
                var titleFilter = $('#titleFilter').val();
                var categoryFilter = $('#categoryFilter').val();
                var usernameFilter = $('#usernameFilter').val();
                // Sending filter values to the server via AJAX
                $.ajax({
                    type: 'GET',
                    url: 'filter_games.php',
                    data: { title: titleFilter, category: categoryFilter, github_username: usernameFilter},
                    success: function(data) {
                        // Updating the table with filtered results received from the server
                        $('#game-table tbody').html(data);
                    }
                });
            });
            
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
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"></script>

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
    <?php
    include 'includes/footer.inc.php';       // Include footer
    ?>
</body>

</html>