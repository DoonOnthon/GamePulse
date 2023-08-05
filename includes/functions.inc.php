<?php
// Function to sort games by title
function sortGamesByTitle($a, $b) {
    return strcmp($a['title'], $b['title']);
}

// Function to sort games by release date
function sortGamesByDate($a, $b) {
    // Check the sort order (newest to oldest or oldest to newest)
    global $dateSortOrder;
    
    if ($dateSortOrder === 'newest') {
        // Sort in descending order (newest to oldest)
        return strtotime($b['release_date']) - strtotime($a['release_date']);
    } else {
        // Sort in ascending order (oldest to newest)
        return strtotime($a['release_date']) - strtotime($b['release_date']);
    }
}

// Determine the current sorting method
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

// Sort the games based on the selected sorting method
if ($sort === 'title') {
    // Sort games by title
    usort($games, 'sortGamesByTitle');
} elseif ($sort === 'newest' || $sort === 'oldest') {
    // Toggle the date sort order
    $dateSortOrder = ($sort === 'newest') ? 'oldest' : 'newest';
    
    // Sort games by release date using the selected order
    usort($games, 'sortGamesByDate');
}