<?php
// Include necessary files for game data and functions
    include 'games_data.php';       // Include game data
    include '../processes/games.php';            // Include games array
    include '../processes/functions.inc.php';    // Include custom functions
    include '../processes/pagination.php';       // Include pagination logic
    include 'languages.php';     // Include language logic
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>
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
            <form method="GET" action="" id="search-game">
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
                        <th><a
                                href="?sort=<?php echo ($sort === 'newest') ? 'oldest' : 'newest'; ?>"><?php echo $game_date[$langue]; ?></a>
                        </th>
                        <th><a
                                href="?sort=<?=($sort === 'highest') ? 'lowest' : 'highest'; ?>"><?php echo $game_sales_number[$langue]; ?></a>
                        </th>
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
                            <a class="btn btn-primary btn-trailer" href="<?php echo $game['youtube_trailer']; ?>"
                                target="_blank"><?php echo $game_trailer_btn[$langue]; ?></a>
                            <?php endif; ?>
                        </td>
                        <td><button class="btn btn-primary btn-details"
                                data-game-details="<?php echo htmlspecialchars(json_encode($game), ENT_QUOTES, 'UTF-8'); ?>"><?php echo $game_details[$langue]; ?></button>
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
                        <a class="page-link pagination-link" data-page="<?php echo $i; ?>" href="javascript:void(0);">
                            <?php echo $i; ?>
                        </a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </nav>