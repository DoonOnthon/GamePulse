<!DOCTYPE html>
<?php
include 'includes/languages.php';
?>
<html>
<!-- header -->
<head>
    <title><?php echo $about_home[$langue]; ?></title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include your custom stylesheet -->
    <link href="stylesheet.css" rel="stylesheet">
    <style>
        .drapeau {
            width: 40px;
        }

    </style>
</head>

<body>
    <!-- Navbar (if applicable) -->
    <!-- Include Navbar from another file or code it here -->
    <?php
        include 'includes/header.inc.php';       // Include header
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
    <?php include 'includes/footer.inc.php'; ?>
</body>

</html>
