<?php
// Include the necessary files
include_once("config/env.php"); // Load environment variables
require("config/database.php"); // Database connection
include("includes/datas/languages.php");            // Include language logic


// Fetch game data from the database
$stmt = $conn->prepare("SELECT * FROM games");
$stmt->execute();
$result = $stmt->get_result();

// Store results in an array

$gamesPage = [];
while ($row = $result->fetch_assoc()) {
    $gamesPage[] = $row;
}

// Collect unique values for filters

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamePulse - Discover Exciting Games</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
<?php
// include './includes/header/header.inc.php';       // Include header

?>
<!-- Main Content Wrapper -->
<div class="container mt-5">
    <!-- Title Section -->
    <div class="post-content mb-4 head-title text-white p-3">
        <h1><?php echo $titre1[$langue]; ?></h1>
        <p><?php echo $titre2[$langue]; ?></p>
    </div>
    <!-- Game List Table -->
    <table class="table table-bordered table-striped" id="game-table">
        <tbody>
            <?php foreach ($gamesPage as $game): ?>
                <tr>
                    <td><?php echo $game['game_title']; ?></td>
                    <td><?php echo $game['category']; ?></td>
                    <td><?php echo $game['release_date']; ?></td>
                    <td><?php echo $game['sales_number']; ?></td>
                    <td><?php echo $game['github_username']; ?></td>
                    <td>
                        <?php if (!empty($game['youtube_trailer'])): ?>
                            <a class="btn btn-primary btn-trailer" href="<?php echo $game['youtube_trailer']; ?>"
                                target="_blank"><?php echo $game_trailer_btn[$langue]; ?></a>
                        <?php endif; ?>
                    </td>
                    <button class="btn btn-primary btn-details"
                        data-game-details="<?php echo htmlspecialchars(json_encode($game), ENT_QUOTES, 'UTF-8'); ?>">
                        <?php echo $game_details[$langue]; ?>
                    </button>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </body>
    </table>