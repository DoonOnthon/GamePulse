<!DOCTYPE html>
<html>
<!-- header -->
<head>
    <title>Welcome to GamePulse</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom stylesheet -->
    <link href="stylesheet.css" rel="stylesheet">
</head>

<body>
    <!-- Include the navbar -->
    <?php include 'includes/navbar.inc.php'; ?>

    <!-- Hero Banner -->
    <section class="hero-banner text-center py-5">
        <div class="container">
            <h1 class="display-4">Welcome to GamePulse!</h1>
            <p class="lead">Explore the world of gaming and find your next adventure.</p>
            <a href="game_list.php" class="btn btn-primary btn-lg">View Game List</a>
        </div>
    </section>

    <!-- Introduction -->
    <section class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2>About GamePulse</h2>
                <p class="lead">GamePulse is your gateway to discovering an exhilarating realm of video games. With a handpicked selection spanning diverse genres, GamePulse empowers gamers to explore, experience, and engage with captivating titles.</p>
                <p>Whether you're on the lookout for high-octane action, mind-bending puzzles, or immersive narratives, our platform curates an exceptional collection that resonates with gaming enthusiasts of all levels.</p>
                <p>Join us on this journey as we celebrate the art, innovation, and endless enjoyment that the world of gaming offers. Fuel your passion, ignite your curiosity, and uncover your next unforgettable gaming experience with GamePulse.</p>
            </div>
        </div>
    </section>
<!-- Popular Games Right Now -->
<section class="popular-games">
    <div class="container">
        <h2 class="section-title">Popular Games Right Now</h2>
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
        <h2 class="section-title">Great Upcoming Games!</h2>
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
    <?php include 'includes/footer.inc.php'; ?>
</body>

</html>
