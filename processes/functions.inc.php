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

function sortGamesBySales($a,$b)
{
    global $year0rder;
    if ($year0rder === 'highest') {
        return (int) $b['sales_numbers'] - (int) $a['sales_numbers'];
    } else {
        return (int) $a['sales_numbers'] - (int) $b['sales_numbers'];
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
    } elseif ($sort === 'highest' || $sort = 'lowest') {
        //Toggle the release year
        $year0rder = ($sort === 'highest') ? 'lowest' : 'highest';
        //sort games by sales number
        usort($games, 'sortGamesBySales');
    }
