<?php
// Include the 'games_data.php' file to get the game data
include 'games_data.php';
// Check if the search form was submitted and the search query is not empty
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchQuery = $_GET['search'];

    // Limit the length of the search query
    if (strlen($searchQuery) > 100) {
        die("Search query is too long.");
    }


    // Filter games based on the search query
    $filteredGames = array_filter($games, function ($game) use ($searchQuery) {
        // Case-insensitive search against game title, category, or release date
        return stripos($game['title'], $searchQuery) !== false
            || stripos($game['category'], $searchQuery) !== false
            || stripos($game['release_date'], $searchQuery) !== false;
    });

    // Use the filtered games for displaying search results
    $games = $filteredGames;

    // Check and validate the sorting method
    $allowedSortMethods = ['title', 'newest', 'oldest'];
    $sort = isset($_GET['sort']) && in_array($_GET['sort'], $allowedSortMethods) ? $_GET['sort'] : '';
    if (!$sort && isset($_GET['sort'])) {
        die("Invalid sorting method.");
    }
}