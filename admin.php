<?php
//Includes file
require_once __DIR__.'/includes/configuration.php';
require_once __DIR__.'/includes/class.php';
require_once __DIR__.'/includes/function.php';

//Session
session_name("materiweb");
session_start();

//Route
$component = isset($_REQUEST['component']) ? $_REQUEST['component'] : 'Home';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

//Includes Model, View, and Controller
if (!file_exists(__DIR__.'/components/'.strtolower($component).'.controller.php')) {
    echo "File tidak ditemukan";
    exit();
}

require_once(__DIR__.'/components/'.strtolower($component).'.model.php');
require_once(__DIR__.'/components/'.strtolower($component).'.view.php');
require_once(__DIR__.'/components/'.strtolower($component).'.controller.php');

ob_start();

$controllerName = $component.'Controller';
$controller = new $controllerName();
$controller->{$action}();

$content = ob_get_contents();
ob_clean();
   
if (!isset($_SESSION['user'])) {
    echo "Anda belum login";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

	<title><?php echo $config["name"]; ?></title>

	<link rel="shortcut icon" type="image/x-icon" href="images/ic.jpg">
    
    <link rel="stylesheet" href="fonts/material-icons/material-icons.css">
	<link rel="stylesheet" href="fonts/montserrat/montserrat.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/propeller.min.css">
	<link rel="stylesheet" href="js/datetimepicker/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="js/datetimepicker/pmd-datetimepicker.css">
	<link rel="stylesheet" href="js/select2/select2.min.css">
	<link rel="stylesheet" href="js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="js/select2/pmd-select2.css">
	<link rel="stylesheet" href="css/propeller-admin.css">

	<link rel="stylesheet" href="css/cssindex.css">

	
</head>
<body  style="background-image:url(coba22.jpg); background-size:cover;">
	<nav class="navbar navbar-default navbar-fixed-top pmd-navbar pmd-z-depth-1" style="z-index: 1030;">
    	<div id="atas" class="container-fluid" >
			<div class="navbar-header"  >
				<button class="pmd-ripple-effect navbar-toggle pmd-navbar-toggle" type="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="admin.php">
		  			<img class="navbar-img" src="images/1112.png" width="40">
				</a>
	  			<span class="navbar-title" style="line-height: 55px; font-size: 30px;">
	  				<?php echo strtoupper($config["name"]); ?>
	  			</span>
			</div>
			<div class="collapse navbar-collapse pmd-navbar-sidebar">
				<div class="dropdown pmd-dropdown pmd-user-info pull-right">
    				<a href="javascript:void(0);" class="btn-user dropdown-toggle media" data-toggle="dropdown" data-sidebar="true" aria-expanded="false">
    					<div class="media-left">
    			  			<img src="images/user-icon.png" width="40" height="40" alt="avatar">
    					</div>
    					<div class="media-body media-middle navbar-username">
    						<b><?php echo $_SESSION['user']->userName; ?></b>
    					</div>
    				</a>
    			</div>
    			<ul  class="nav navbar-nav navbar-right">
                    <li><a class="pmd-ripple-effect" href="admin.php?component=Pemesanan" id="pm" ><b>Pemesanan</b></a></li>
                    <li><a class="pmd-ripple-effect" href="admin.php?component=Pelanggan" id="pl"><b>Pelanggan</b></a></li>
                    <li><a class="pmd-ripple-effect" href="admin.php?component=Home&action=logout" id="lg"><b>Logout</b></a></li>
    			</ul>
			</div>
		</div>
	</nav>
    <div id="isi" class="pmd-content content-area" style="padding-top:64px;">
		<?php echo $content; ?>
	</div>
	<script src="js/jquery-1.12.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/propeller.min.js"></script>
    <script src="js/datetimepicker/moment-with-locales.js"></script>
	<script src="js/datetimepicker/locale/id.js"></script>
	<script src="js/datetimepicker/bootstrap-datetimepicker.js"></script>
	<script src="js/select2/select2.full.js"></script>
	<script src="js/select2/pmd-select2.js"></script>
	<script src="js/propeller-admin.js"></script>
</body>
</html>
<?php
ob_end_flush();
?>