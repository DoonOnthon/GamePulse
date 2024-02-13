<?php
// Include necessary files for game data and functions
    include 'includes/datas/games_data.php';       // Include game data
    include 'includes/processes/games.php';            // Include games array
    include 'includes/processes/functions.inc.php';    // Include custom functions
    include 'includes/processes/pagination.php';       // Include pagination logic
    include 'includes/processes/languages.php';       // Include language logic
?>
<!DOCTYPE html>
<html>
<head>
    <title>GamePulse - Discover Exciting Games</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
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
        .drapeau {
            width: 40px;
        }
    </style>
</head>

<body style="background-image: url(images/Herobanner.png)!important; background-size: cover; background-position: center; ">
    <?php
        include 'includes/header.inc.php';       // Include header
    ?>
    <div class="container mt-5">
        <div class="post-content mb-4 head-title" style="padding: 8px; color: white;">
            <h1><?php echo $titre1[$langue]; ?></h1>
            <p><?php echo $titre2[$langue]; ?></p>
        </div>

        <div class="content white-back" style="margin: 15px; margin-bottom: 3.5rem!important;">
            <div class="filters mb-3">
                <div>   
                    <label for="titleFilter"><?php echo $filter1[$langue]; ?></label>
                    <select id="titleFilter" name="titleFilter[]" multiple>
                        <?php
                        // Collect unique game titles for filter
                        $uniqueTitles = array_unique(array_column($games, 'title'));
                        foreach ($uniqueTitles as $title) {
                            echo "<option value='" . $title . "'>$title</option>";
                        }
                        ?>
                    </select>

                    <label for="categoryFilter"><?php echo $filter2[$langue]; ?></label>
                    <select id="categoryFilter" name="categoryFilter" multiple>
                        <?php
                        // Collect unique game categories for filter
                        $uniqueCategories = array_unique(array_column($games, 'category'));
                        foreach ($uniqueCategories as $category) {
                            echo "<option value='" . $category . "'>$category</option>";
                        }
                        ?>
                    </select>
                    <label for="usernameFilter"><?php echo $filter3[$langue]; ?></label>
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
                    <a href="game_list.php" class="btn btn-secondary"><?php echo $reset_search[$langue]; ?></a>
                </div>
            </div>
            <!-- Search Bar -->
            <form method="GET" action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="<?php echo $search_bar[$langue]; ?>">
                    <button class="btn btn-primary" type="submit"><?php echo $search_btn[$langue]; ?></button>
                </div>
            </form>

            <!-- Game List Table -->
            <table class="table table-bordered table-striped" id="game-table">
                <thead>
                <tr>
                    <th><a href="?sort=title"><?php echo $game_title[$langue]; ?></a></th>
                    <th><?php echo $game_category[$langue]; ?></th>
                    <th><a href="?sort=<?php echo ($sort === 'newest') ? 'oldest' : 'newest'; ?>"><?php echo $game_date[$langue]; ?></a></th>
                    <th><a href = "?sort=<?=($sort === 'highest') ? 'lowest' : 'highest'; ?>"><?php echo $game_sales_number[$langue]; ?></a></th>
                    <th><?php echo $game_contributor[$langue]; ?></th>
                    <th><?php echo $game_trailer[$langue]; ?></th>
                    <th><?php echo $game_actions[$langue]; ?></th>
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
                                <?php if (!empty($game['youtube_trailer'])) : ?>
                                    <a class="btn btn-primary btn-trailer" href="<?php echo $game['youtube_trailer']; ?>" target="_blank"><?php echo $game_trailer_btn[$langue]; ?></a>
                                <?php endif; ?>
                            </td>
                            <td><button class="btn btn-primary btn-details" data-game-details="<?php echo htmlspecialchars(json_encode($game), ENT_QUOTES, 'UTF-8'); ?>"><?php echo $game_details[$langue]; ?></button></td>
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
                placeholder: '<?php echo $select_title[$langue]; ?>',
                width: '150px'
            });
            // Select2 for choose some categorys in this filter
            $('#categoryFilter').select2({
                placeholder: '<?php echo $select_category[$langue]; ?>',
                width: '200px'
            });
            $('#usernameFilter').select2({
                placeholder: '<?php echo $select_contributor[$langue]; ?>',
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

            $(".btn-close, .btn-close2").on("click", function() {
                $("#gameModal").modal("hide");
            });
            
            $(".btn-details").on("click", function() {

                var gameDetails = $(this).data("game-details");

                // Update the modal content with game details
                $("#gameModal .modal-title").text(gameDetails.title);
                $("#gameModal .modal-body").html(
                    "<p><strong>Category:</strong> " + gameDetails.category + "</p>" +
                    "<p><strong>Release Date:</strong> " + gameDetails.release_date + "</p>" +
                    "<p><strong>Sales Numbers (Approx):</strong> " + gameDetails.sales_numbers + "</p>" +
                    "<p><strong>Contributor:</strong> " + gameDetails.github_username + "</p>"
                   
                );

                // Show the modal manually
                $("#gameModal").modal("show");
            });

            $(".btn-trailer").on("click", function() {
            });
        });
    </script>
    <!-- Modal for displaying game details -->
    <div class="modal fade" id="gameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gameModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="gameModalLabel">Game Details</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span class="visually-hidden">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Game details will be dynamically updated here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close2" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'includes/footer.inc.php';       // Include footer
    ?>
</body>

</html>
