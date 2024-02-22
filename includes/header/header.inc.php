<?php
include './includes/datas/languages.php';
?>

<style>
    .border-bottom { border-bottom: 2px solid grey!important; margin-bottom: 4px;}
   .header {padding-right: 10px}
</style>


<?php
function isPageActive($pageName) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    return ($currentPage === $pageName);
}
?>

<header class="header bg-dark text-light py-3">
    <?php include 'navbar.php'; ?>
</header>

