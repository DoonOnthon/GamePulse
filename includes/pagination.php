<?php
// Pagination logic
$itemsPerPage = 10;
$totalItems = count($games);
$totalPages = ceil($totalItems / $itemsPerPage);

$currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
if ($currentPage < 1 || $currentPage > $totalPages) {
    $currentPage = 1;
}

$startIndex = ($currentPage - 1) * $itemsPerPage;
$gamesPage = array_slice($games, $startIndex, $itemsPerPage);
?>