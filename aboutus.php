<!DOCTYPE html>
<?php
session_start();
include 'includes/datas/languages.php';
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
</head>

<body>
    <!-- Navbar (if applicable) -->
    <!-- Include Navbar from another file or code it here -->
    <?php
        include 'includes/header/header.inc.php';       // Include header
    ?>
    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h1><?php echo $about_home[$langue]; ?></h1>
                <h2 class="lead"><?php echo $about1[$langue]; ?></h2>
                <p><?php echo $about2[$langue]; ?></p>
                <p><?php echo $about3[$langue]; ?></p>
                <p><?php echo $about4[$langue]; ?></p>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Include the footer -->
    <?php include 'includes/footer/footer.inc.php'; ?>
</body>

</html>
