<!DOCTYPE html>
<?php
include 'includes/languages.php';
?>
<html>
<!-- header -->
<head>
    <title>GamePulse - Discover Exciting Games</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS and Popper.js (for dropdowns) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Include your custom stylesheet -->
    <link href="assets/css/main.css" rel="stylesheet">
    <style>
        .drapeau {
            width: 40px;
        }
    </style>
</head>

<body>
    <?php
        include 'includes/header/header.inc.php';       // Include header
    ?>
    <!-- Hero Banner -->
    <section class="hero-banner text-center py-5">
        <div class="container">
            <h1 class="display-4"><?php echo $titre1[$langue]; ?></h1>
            <p class="lead"><?php echo $titre2_home[$langue]; ?></p>
            <a href="game_list.php" class="btn btn-primary btn-lg"><?php echo $btn_game_list[$langue]; ?></a>
        </div>
    </section>

    <!-- Introduction -->
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2><?php echo $about_home[$langue]; ?></h2>
                <p class="lead"><?php echo $desc1[$langue]; ?></p>
                <p><?php echo $desc2[$langue]; ?></p>
                <p><?php echo $desc3[$langue]; ?></p>
            </div>
        </div>
    </section>
<!-- Popular Games Right Now -->
<section class="popular-games">
    <div class="container">
        <h2 class="section-title"><?php echo $popular_games[$langue]; ?></h2>
        <div class="horizontal-tilted-game-art">
            <div class="tilted-game-art">
                <a target="_blank" href="https://www.rockstargames.com/reddeadredemption2/restricted-content/agegate/form?redirect=https%3A%2F%2Fwww.rockstargames.com%2Freddeadredemption2%2F&options=&locale=en_us">
                    <img src="images/RDR2cover.jpg" alt="RDR2 Game Art">
                </a>
            </div>
            <div class="tilted-game-art">
                <a target="_blank" href="https://store.steampowered.com/app/730/CounterStrike_Global_Offensive/">
                    <img src="images/CSGOcover.jpg" alt="CSGO Game Art">
                </a>
            </div>
            <div class="tilted-game-art">
                <a target="_blank" href="https://www.minecraft.net/en-us">
                    <img src="images/MinecraftCover.png" alt="Minecraft Game Art">
                </a>
            </div>
        </div>
    </div>
</section>
<!-- Popular Games Right Now -->
<section class="Upcoming-games">
    <div class="container">
        <h2 class="section-title"><?php echo $upcoming_games[$langue]; ?></h2>
        <div class="horizontal-tilted-game-art">
            <div class="tilted-game-art">
                <a target="_blank" href="https://www.ea.com/games/skate?isLocalized=true">
                    <img src="images/Skate4Cover.jpg" alt="Skate 4 art">
                </a>
            </div>
            <div class="tilted-game-art">
                <a target="_blank" href="https://www.paydaythegame.com/payday3/">
                    <img src="images/Payday3Cover.jpg" alt="Payday 3 art">
                </a>
            </div>
        </div>
    </div>
</section>
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Include the footer -->
    <?php include 'includes/footer/footer.inc.php'; ?>
</body>

</html>