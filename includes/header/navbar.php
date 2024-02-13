<nav class="navbar navbar-expand-lg navbar-dark">

<a href="index.php" class="navbar-brand ms-3 p-2">Game Pulse</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse justify-content-end py-1" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="index.php" class="d-flex justify-content-end py-2 nav-link <?php echo (isPageActive('index.php')) ? 'active' : ''; ?>">
                <?php echo $home[$langue]; ?>
            </a>
        </li>
        <li class="nav-item">
    <a href="game_list.php" class="d-flex justify-content-end py-2 nav-link <?php echo (isPageActive('game_list.php')) ? 'active' : ''; ?>">
        <?php echo $game_list[$langue]; ?>
    </a>
</li>
<li class="nav-item">
    <a href ="<?php echo $_SERVER['PHP_SELF']; ?>?lang=1" class="d-flex justify-content-end py-2 nav-link" target="_self">
        <img src="assets/images/drapeau-francais.jpg" class="drapeau"/>
    </a>
</li>
<li class="nav-item">
    <a href ="<?php echo $_SERVER['PHP_SELF']; ?>" target="_self" class="d-flex justify-content-end py-2 nav-link">
        <img src="assets/images/drapeau-anglais.jpg" class="drapeau"/>
    </a>
    </ul>
</div>
</nav>