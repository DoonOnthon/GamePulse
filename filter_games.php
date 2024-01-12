<?php
include 'includes/games_data.php';       
include 'includes/pagination.php';                

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
    echo '<td><button class="btn btn-primary btn-details">Details</button></td>';
    echo '</tr>';
}


?>

