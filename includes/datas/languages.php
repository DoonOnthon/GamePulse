<?php
if(session_status()==PHP_SESSION_NONE)session_start();
if(isset($_GET["lang"]))
    $_SESSION['lang'] = $_GET['lang'];
    $langue = $_SESSION['lang'];
//game_list.php
$titre1 = array("en" => "Welcome to GamePulse!", "fr" => "Bienvenue sur GamePulse!");
$titre2 = array("en" => "Explore the world of gaming and find your next adventure.", 'fr'=>"Explorez le monde du jeu et trouvez votre prochaine aventure.");
$filter1 = array("en" => "Filter by title:",'fr'=>"Filtrer par titre:");
$filter2 = array("en" => "Filter by catecogry:",'fr'=>"Filtrer par catégorie:");
$filter3 = array("en" => "Filter by contributor:",'fr'=>"Filtrer par contributeur:");
$reset_search = array("en" => "Reset Search",'fr'=>"Réinitialiser la recherche");
$search_bar = array("en" => "Search for games by title, category, or release date",'fr'=>"Rechercher des jeux par titre, catégorie ou date de sortie");
$search_btn = array("en" => "Search",'fr'=>"Rechercher");
$game_title = array("en" => "Game Title",'fr'=>"Titre du Jeu");
$game_category = array("en" => "Category",'fr'=>"Catégorie");
$game_date = array("en" => "Release Date",'fr'=>"Date de sortie");
$game_sales_number = array("en" => "Sales Numbers (Approx)",'fr'=>"Nombre de ventes (Approx)");
$game_contributor = array("en" => "Contributor",'fr'=>"Contributeur");
$game_trailer = array("en" => "Trailer",'fr'=>"Bande d'annonce");
$game_actions = array("en" => "Actions",'fr'=>"Options");
$game_trailer_btn = array("en" => "Watch Trailer",'fr'=>"Regarder la Bande d'annonce");
$game_details = array("en" => "Details",'fr'=>"Details");
$select_title = array("en" => "Choose Titles",'fr'=>"Choisir Titres");
$select_category = array("en" => "Choose Categories",'fr'=>"Choisir Catégories");
$select_contributor = array("en" => "Choose Contributors",'fr'=>"Choisir Contributeurs");

//header
$home = array("en" => "Home",'fr' => "Accueil");
$game_list = array("en" => "Game List",'fr' => "Liste des Jeux");
$about_us = array("en" => "About Us",'fr' => "À propos de nous");
$confidentiality = array("en" => "Privacy Policy",'fr' => "Politique de confidentialité");
$follow_us = array("en" => "Follow Us",'fr' => "Suivez-nous");
$contact_us = array("en" => "Contact Us",'fr' => "Contactez-nous");
$contact_us_2 = array("en" => "For inquiries and support, email us at :",'fr' => "Pour obtenir des informations ou de l'aide, écrivez-nous à :");
$rights = array("en" => "© 2023 GamePulse. All rights reserved.",'fr' => "© 2023 GamePulse. Tous droits réservés.");


$titre2_home = array("en" => "Explore the world of gaming and find your next adventure.",'fr' => "Explorez le monde des jeux vidéos et trouvez votre prochaine aventure.");
$btn_game_list = array("en" => "View Game List",'fr' => "Voir la liste des jeux");
$about_home = array("en" => "About GamePulse",'fr' => "À propos de GamePulse");
$desc1 = array("en" => "GamePulse is your gateway to discovering an exhilarating realm of video games. With a handpicked selection spanning diverse genres, GamePulse empowers gamers to explore, experience, and engage with captivating titles.",'fr' => "GamePulse est votre porte d’entrée pour découvrir un royaume exaltant du gaming. Avec une fine sélection couvrant divers genres, GamePulse permet aux joueurs d’explorer, d’expérimenter et d’interagir avec des titres captivants.");
$desc2 = array("en" => "Whether you're on the lookout for high-octane action, mind-bending puzzles, or immersive narratives, our platform curates an exceptional collection that resonates with gaming enthusiasts of all levels.",'fr' => "Que vous soyez à la recherche d’action, de puzzles époustouflants ou de récits immersifs, notre plateforme propose une collection exceptionnelle qui résonne avec les amateurs de gaming de tous niveaux.");
$desc3 = array("en" => "Join us on this journey as we celebrate the art, innovation, and endless enjoyment that the world of gaming offers. Fuel your passion, ignite your curiosity, and uncover your next unforgettable gaming experience with GamePulse.",'fr' => "Rejoignez-nous pour célébrer l’art, l’innovation et le plaisir sans fin que le monde du gaming offre. Alimentez votre passion, éveillez votre curiosité et découvrez votre prochaine expérience de jeu inoubliable avec GamePulse.");

$popular_games = array("en" => "Popular Games Right Now",'fr'=>"Jeux populaires en ce moment");
$upcoming_games = array("en" => "Great Upcoming Games!",'fr'=>"Bons jeux à venir!");

$about1 = array("en" => "GamePulse is more than just a platform; it's a vibrant community that celebrates gaming in all its forms.",'fr'=> "GamePulse est plus qu’une simple plateforme; c’est une communauté dynamique qui célèbre le gaming sous toutes ses formes.");
$about2 = array("en" => "At GamePulse, our mission is to provide gamers with a curated space where they can discover, explore, and engage with a diverse array of games. We believe that gaming is not just a pastime but an immersive experience that brings people together, sparks creativity, and offers endless entertainment.",'fr'=> "Chez GamePulse, notre mission est de fournir aux joueurs un espace organisé où ils peuvent découvrir, explorer et interagir avec un large éventail de jeux vidéos. Nous savons que le jeu n’est pas seulement un passe-temps, mais une expérience immersive qui rassemble les gens, stimule la créativité et offre un divertissement sans fin.");
$about3 = array("en" => "Our team of passionate developers, designers, and gaming enthusiasts works tirelessly to ensure that GamePulse remains a hub for all things gaming. From showcasing popular titles to highlighting upcoming releases, we strive to create an inclusive environment that caters to gamers of every taste and preference.", 'fr'=> "Notre équipe de développeurs, de designers et de passionnés de gaming travaille sans relâche pour que GamePulse reste une plaque tournante du gaming. De la présentation de titres populaires à la mise en valeur des versions à venir, nous nous efforçons de créer un environnement inclusif qui s’adresse aux joueurs de tous les goûts et préférences.");
$about4 = array("en" => "Join us on this journey as we continue to evolve and grow. GamePulse is your destination to stay connected with the pulse of gaming excitement.", 'fr'=> "Rejoignez-nous dans cette aventure alors que nous continuons d’évoluer et de grandir. GamePulse est votre destination pour rester connecté avec l'émotion du gaming.");
?>
