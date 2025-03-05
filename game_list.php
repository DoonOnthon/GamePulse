<?php
    // Include necessary files for game data and functions
    include("includes/datas/games_data.php");
    include("includes/processes/games.php");            // Include games array
    include_once("includes/processes/functions.inc.php");    // Include custom functions
    include("includes/processes/pagination.php");       // Include pagination logic
    include("includes/datas/languages.php");            // Include language logic

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamePulse - Discover Exciting Games</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/game_list.css">
  
    <!-- jQuery and AJAX -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="./assets/js/game_list.js"></script>

    <script>
        let selectTitlePlaceholder = '<?php echo $select_title[$langue]; ?>';
        let selectCategoryPlaceholder = '<?php echo $select_category[$langue]; ?>';
        let selectContributorPlaceholder = '<?php echo $select_contributor[$langue]; ?>';
    </script>

</head>
<body style="background-image: url(./assets/images/Herobanner.png); background-size: cover; background-position: center;">
    <?php
        include './includes/header/header.inc.php';       // Include header
    
    ?>



    <!-- Main Content Wrapper -->
    <div class="container mt-5">
        <!-- Title Section -->
        <div class="post-content mb-4 head-title text-white p-3">
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

    <!-- Modal for displaying game details -->
    <div class="modal fade" id="gameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gameModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="gameModalLabel">Game Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span class="visually-hidden">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Game details will be dynamically updated here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close2" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include './includes/footer/footer.inc.php';       // Include footer
    ?>
</body>

</html>
