<?php
include 'includes/languages.php';
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

<header class="header bg-dark text-light py-3 border-bottom">
    <div class="d-flex justify-content-between px-4">
        <a href="index.php" class="fs-4 text-light text-decoration-none">Game Pulse</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="index.php" class="nav-link <?php echo (isPageActive('index.php')) ? 'active' : ''; ?>" aria-current="page">
                    <?php echo $home[$langue]; ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="game_list.php" class="nav-link <?php echo (isPageActive('game_list.php')) ? 'active' : ''; ?>">
                    <?php echo $game_list[$langue]; ?>
                </a>
            </li>
            <li class="nav-item">
                <a href ="<?php echo $_SERVER['PHP_SELF']; ?>?lang=1" class="nav-link" target="_self">
                    <img src="images/drapeau-francais.jpg" class="drapeau"/>
                </a>
            </li>
            <li class="nav-item">
                <a href ="<?php echo $_SERVER['PHP_SELF']; ?>" target="_self" class="nav-link">
                    <img src="images/drapeau-anglais.jpg" class="drapeau"/>
                </a>
            </li>  
        </ul>
    </div>
</header>
