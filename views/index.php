<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkFDUser();

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
	case 'LIST' :
		$content 	= 'eventlist.php';		
		$pageTitle 	= 'View Event Details';
		break;

	case 'USERS' :
		$content 	= 'userlist.php';		
		$pageTitle 	= 'View User Details';
		break;
		
	case 'CREATE' :
		$content 	= 'userform.php';		
		$pageTitle 	= 'Create New User';
		break;
		
	case 'USER' :
		$content 	= 'user.php';		
		$pageTitle 	= 'View User Details';
		break;
	
	case 'NOTI' :
		$content 	= 'notification.php';		
		$pageTitle 	= 'Notification';
		break;
        
    case 'SPORTSTD' :
		$content 	= 'sportliststd.php';		
		$pageTitle 	= 'Sport List for Student';
		break;
        
    case 'SPORT' :
		$content 	= 'sportregister.php';		
		$pageTitle 	= 'Sport Register';
		break;
        
    case 'NOTILIST' :
		$content 	= 'notilist.php';		
		$pageTitle 	= 'Notification';
		break;
        
  
    case 'TEAMREG' :
		$content 	= 'teamreg.php';		
		$pageTitle 	= 'Sport Register';
		break;
        
    case 'TREGLIST' :
		$content 	= 'teamreglist.php';		
		$pageTitle 	= 'Registered Team List';
		break;
        
  
	
	default :
		$content 	= 'dashboard.php';		
		$pageTitle 	= 'Calendar Dashboard';
}

require_once '../include/template.php';
?>
