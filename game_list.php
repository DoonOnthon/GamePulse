<?php
// Include necessary files for game data and functions
    include './includes/datas/games_data.php';       // Include game data
    include './includes/processes/games.php';            // Include games array
    include './includes/processes/functions.inc.php';    // Include custom functions
    include './includes/processes/pagination.php';       // Include pagination logic
    include './includes/datas/languages.php';       // Include language logic
?>
<!DOCTYPE html>
<html>
<head>
    <title>GamePulse - Discover Exciting Games</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/game_list.css">
    <!-- jQuery and AJAX -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="./assets/js/game_list.js"></script>

    <script>
        let selectTitlePlaceholder = '<?php echo $select_title[$langue]; ?>';
        let selectCategoryPlaceholder = '<?php echo $select_category[$langue]; ?>';
        let selectContributorPlaceholder = '<?php echo $select_contributor[$langue]; ?>';
    </script>

</head>

<body style="background-image: url(./assets/images/Herobanner.png)!important; background-size: cover; background-position: center; ">
    <?php
        include './includes/header/header.inc.php';       // Include header
    ?>
    <div class="container mt-5">
        <div class="post-content mb-4 head-title" style="padding: 8px; color: white;">
            <h1><?php echo $titre1[$langue]; ?></h1>
            <p><?php echo $titre2[$langue]; ?></p>
        </div>

        <div class="content white-back" id="game-list" style="margin: 15px; margin-bottom: 3.5rem!important;">
        </div>
    </div>

    <!-- Modal for displaying game details -->
    <div class="modal fade" id="gameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="gameModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="gameModalLabel">Game Details</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span class="visually-hidden">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Game details will be dynamically updated here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close2" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './includes/footer/footer.inc.php';       // Include footer
    ?>
</body>

</html>
