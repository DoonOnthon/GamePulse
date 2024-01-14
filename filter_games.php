<?php
include 'includes/games_data.php';       // Include game data
include 'includes/games.php';            // Include games array
include 'includes/functions.inc.php';    // Include custom functions
include 'includes/pagination.php';       // Include pagination logic
include 'includes/languages.php';       // Include language logic            

// Retrieving filter criteria sent by AJAX
//More than one filter in our case so its an array
$titleFilter = isset($_GET['title']) ? $_GET['title'] : [];
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : [];
$usernameFilter = isset($_GET['github_username']) ? $_GET['github_username'] : [];

// Filter games based on title and category
$filteredGames = $games; 

function titleFilter($game) {
    global $titleFilter;
    return in_array($game['title'], $titleFilter);
}

function categoryFilter($game) {
    global $categoryFilter;
    return in_array($game['category'], $categoryFilter);
}
function usernameFilter($game) {
    global $usernameFilter;
    return in_array($game['github_username'], $usernameFilter);
}

//Use functions
if (!empty($titleFilter)) {
    $filteredGames = array_filter($filteredGames, 'titleFilter');
}
if (!empty($categoryFilter)) {
    $filteredGames = array_filter($filteredGames, 'categoryFilter');
}
if (!empty($usernameFilter)) {
    $filteredGames = array_filter($filteredGames, 'usernameFilter');
}


$itemsPerPage = 5;
$totalItems = count($filteredGames);
$totalPages = ceil($totalItems / $itemsPerPage);

$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
if ($currentPage < 1 || $currentPage > $totalPages) {
    $currentPage = 1;
}

$startIndex = max(($currentPage - 1) * $itemsPerPage, 0);
$gamesPage = array_slice($filteredGames, $startIndex, $itemsPerPage);

// Showing games filtered by page
foreach ($gamesPage as $game) {
    echo '<tr>';
    echo '<td>' . $game['title'] . '</td>';
    echo '<td>' . $game['category'] . '</td>';
    echo '<td>' . $game['release_date'] . '</td>';
    echo '<td>' . $game['sales_numbers'] . '</td>';
    echo '<td>' . $game['github_username'] . '</td>';
    echo '<td>';
    if (!empty($game['youtube_trailer'])) {
        echo '<a class="btn btn-primary btn-trailer" href="' . $game['youtube_trailer'] . '" target="_blank">' . $game_trailer_btn[$langue] . '</a>';
    }
    echo '</td>';
    
    $gameDetailsJson = htmlspecialchars(json_encode($game), ENT_QUOTES, 'UTF-8');
    echo '<td><button class="btn btn-primary btn-details" data-game-details="' . $gameDetailsJson . '">' . $game_details[$langue] . '</button></td>';

    echo '</tr>';
}


?>

<script>
        $(document).ready(function() {

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
        });
    </script>