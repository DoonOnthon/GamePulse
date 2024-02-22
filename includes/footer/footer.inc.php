<?php
include './includes/datas/languages.php';
?>
<style>
    .border-top { border-top: 2px solid grey!important;}
</style>
<div >
<footer class="footer bg-dark text-light py-5 px-5 border-top" style="padding-bottom: 1rem!important;">
    <div class="row" style="justify-content: space-between;">
        <div class="col-6 col-md-2 mb-3">
        <h5><strong>Game Pulse</strong></h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 text-blue"><?php echo $home[$langue]; ?></a></li>
            <li class="nav-item mb-2"><a href="game_list.php" class="nav-link p-0 text-blue"><?php echo $game_list[$langue]; ?></a></li>
            <li class="nav-item mb-2"><a href="aboutus.php" class="nav-link p-0 text-blue"><?php echo $about_us[$langue]; ?></a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-blue"><?php echo $confidentiality[$langue]; ?></a></li>
        </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
        <h5><strong><?php echo $follow_us[$langue]; ?></strong></h5>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-blue">Facebook</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-blue">Twitter</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-blue">Instagram</a></li>
        </ul>
        </div>
        <div class="col-md-5 offset-md-1 mb-3">
            <h5><strong><?php echo $contact_us[$langue]; ?></strong></h5>
            <p><?php echo $contact_us_2[$langue]; ?></p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <a class="text-blue" href="mailto:contact@gamepulse.com">contact@gamepulse.com</a>
                <a href="mailto:contact@gamepulse.com"><svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 512 512"><path fill="#ffffff" d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg></a>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 mt-4 border-top">
        <p><?php echo $rights[$langue]; ?></p>
    </div>
</footer>
</div>