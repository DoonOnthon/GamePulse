<?php
// Include the necessary files
include_once("config/env.php"); // Load environment variables
include_once("config/database.php"); // Database connection

// Fetch game data from the database
$query = "SELECT * FROM games";
$stmt = $pdo->prepare($query);
$stmt->execute();
$games = $stmt->fetchAll();

// Collect unique values for filters
$uniqueTitles = array_unique(array_column($games, 'game_title'));
$uniqueCategories = array_unique(array_column($games, 'category'));
$uniqueContributors = array_unique(array_column($games, 'github_username'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Existing head content remains the same -->
</head>
<body style="background-image: url(./assets/images/Herobanner.png); background-size: cover; background-position: center;">
    <?php
    include './includes/header/header.inc.php'; // Include header
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
                        // Dynamically populate title filter
                        foreach ($uniqueTitles as $title) {
                            echo "<option value='" . $title . "'>$title</option>";
                        }
                        ?>
                    </select>

                    <label for="categoryFilter"><?php echo $filter2[$langue]; ?></label>
                    <select id="categoryFilter" name="categoryFilter" multiple>
                        <?php
                        // Dynamically populate category filter
                        foreach ($uniqueCategories as $category) {
                            echo "<option value='" . $category . "'>$category</option>";
                        }
                        ?>
                    </select>

                    <label for="usernameFilter"><?php echo $filter3[$langue]; ?></label>
                    <select id="usernameFilter" name="usernameFilter" multiple>
                        <?php
                        // Dynamically populate contributor filter
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
                    <?php foreach ($games as $game) : ?>
                        <tr>
                            <td><?php echo $game['game_title']; ?></td>
                            <td><?php echo $game['category']; ?></td>
                            <td><?php echo $game['release_date']; ?></td>
                            <td><?php echo $game['sales_number']; ?></td>
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
    include './includes/footer/footer.inc.php'; // Include footer
    ?>
</body>
</html>
