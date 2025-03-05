<?php
// Pagination logic
$itemsPerPage = 20;
$totalItems = count($games);
$totalPages = ceil($totalItems / $itemsPerPage);

$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
if ($currentPage < 1 || $currentPage > $totalPages) {
    $currentPage = 1;
}

$startIndex = max(($currentPage - 1) * $itemsPerPage, 0);
$gamesPage = array_slice($games, $startIndex, $itemsPerPage);

// Debugging statements
//var_dump($totalItems, $itemsPerPage, $currentPage, $startIndex);
?>
