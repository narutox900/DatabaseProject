<?php
ob_start();
session_start();
//session_destroy();

function getAbsolutePath() {
	if(isset($_SERVER["REQUEST_URI"])){
		$tmp = rtrim($_SERVER["REQUEST_URI"], '/');
		$tmp2 = explode('/', $tmp);
		return "/".$tmp2[1];
	}
}

$directory = getAbsolutePath();
$actual_link = "http://$_SERVER[HTTP_HOST]$directory";

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('CURRENT_TIME', date('Y-m-d'));
define('LINK', $actual_link);
define('POSTER_URL', 'https://image.tmdb.org/t/p/w300');

if (isset($_GET['url'])) {
	$url = $_GET['url'];
}

//require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
require_once(ROOT . DS . 'library' . DS . 'Route.php');
require_once(ROOT . DS . 'library' . DS . 'Controller.php');
require_once(ROOT . DS . 'library' . DS . 'Model.php');
require_once(ROOT . DS . 'library' . DS . 'Database.php');
require_once(ROOT . DS . 'config' . DS . 'config.php');

//$init = new Route();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/category.css" type="text/css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/card.css" type="text/css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/footer.css" type="text/css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/login.css" type="text/css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/loginsignupfailed.css" type="text/css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/card-slider-2.css" type="text/css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/details.css" type="text/css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/admin.css" type="text/css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/read.css" type="text/css">
	
    <link rel="icon" href="<?php echo LINK; ?>/image/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- APP CSS -->
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/grid.css">
    <link rel="stylesheet" href="<?php echo LINK; ?>/css/app.css">
</head>

<body>
	<?php
    if (isset($_SESSION["username"])){
        require_once '../application/views/header/headerUser.php';
    }
    else
    {
        require_once '../application/views/header/header.php';
    }
	$init = new Route();
	//require_once '../application/views/footer/footer.php';
	?>

	<!-- <script type="text/javascript" src="<?php echo LINK; ?>/js/slider.js"></script>
	<script type="text/javascript" src="<?php echo LINK; ?>/js/slider1.js"></script>
	<script type="text/javascript" src="<?php echo LINK; ?>/js/header.js"></script> -->
    
    <script src="<?php echo LINK; ?>/js/details.js"></script>

    <!-- SCRIPT -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- OWL CAROUSEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <!-- APP SCRIPT -->
    <script src="<?php echo LINK; ?>/js/app.js"></script>
    <!-- LOGIN SCRIPT -->
    <script src="<?php echo LINK; ?>/js/login.js"></script>
    <!-- Filter SCRIPT -->
    <script src="<?php echo LINK; ?>/js/filter.js"></script>
</body>

</html>