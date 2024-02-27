<nav class="navbar navbar-expand-lg navbar-dark">

    <a href="index.php" class="navbar-brand ms-3 p-2">
        <img src="assets/images/GamePulse.png" alt="logo" width="280" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end py-1" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="index.php"
                    class="d-flex justify-content-center py-2 nav-link <?php echo (isPageActive('index.php')) ? 'active' : ''; ?>">
                    <?php echo $home[$langue]; ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="game_list.php"
                    class="d-flex justify-content-center py-2 nav-link <?php echo (isPageActive('game_list.php')) ? 'active' : ''; ?>">
                    <?php echo $game_list[$langue]; ?>
                </a>
            </li>
            <li class="nav-item dropdown">
            <a class="d-flex nav-link dropdown-toggle justify-content-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Languages Supported
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?lang=fr" target="_self" class="dropdown-item">
                            <img src="assets/images/drapeau-francais.jpg" class="drapeau"/> Francais
                        </a>
                    </li>
                    <li>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?lang=en" target="_self" class="dropdown-item">
                            <img src="assets/images/drapeau-anglais.jpg" class="drapeau" /> English
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>