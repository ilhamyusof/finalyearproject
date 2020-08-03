<?php 

require_once '../library/config.php';
require_once '../library/functions.php';
require_once '../library/mail.php';

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

switch($cmd) {
	
	case 'create':
		createUser();
	break;
	
	case 'change':
		changeStatus();
	break;
    case 'sport':
		createSport();
	break;
    case 'treg':
		registerTeam();
	break;
        
	
	default :
	break;
}

function createUser() {
	$name 		= $_POST['name'];
    $pwd 		= $_POST['pwd'];
	$address 	= $_POST['address'];
	$phone 		= $_POST['phone'];
	$email 		= $_POST['email'];
	$type		= $_POST['type'];
	
	//TODO first check if that date has a holiday
	$hsql	= "SELECT * FROM tbl_users WHERE name = '$name'";
	$hresult = dbQuery($hsql);
	if (dbNumRows($hresult) > 0) {
		$errorMessage = 'User with same name already exist. Please try another day.';
		header('Location: ../views/?v=CREATE&err=' . urlencode($errorMessage));
		exit();
	}
	$sql = "INSERT INTO tbl_users (name, pwd, address, phone, email, type, status, bdate)
			VALUES ('$name', '$pwd', '$address', '$phone', '$email', '$type', 'active', NOW())";	
	dbQuery($sql);
	
	//send email on registration confirmation
	$bodymsg = "User $name booked the date slot on $bkdate. Requesting you to please take further action on user booking.<br/>Mbr/>Tousif Khan";
	$data = array('to' => '$email', 'sub' => 'Booking on $rdate.', 'msg' => $bodymsg);
	//send_email($data);
	header('Location: ../views/?v=USERS&msg=' . urlencode('User successfully registered.'));
	exit();
}

function createSport() {
    $sport_type 	= $_POST['sport_type'];
    $date 	        = $_POST['date'];
    $category 		= $_POST['category'];
	$venue 	        = $_POST['venue'];
	
//	//TODO first check if that date has a holiday
//	$hsql	= "SELECT * FROM tbl_users WHERE sport_type = '$sport_type'";
//	$hresult = dbQuery($hsql);
//	if (dbNumRows($hresult) > 0) {
//		$errorMessage = 'Sport type with same name already exist. Please try another day.';
//		header('Location: ../views/?v=SPORT&err=' . urlencode($errorMessage));
//		exit();
//	}
	$pwd = random_string();
	$sql = "INSERT INTO tbl_sport (sport_type, date, category, venue, bdate)
			VALUES ('$sport_type', '$date', '$category', '$venue', NOW())";	
	dbQuery($sql);
    header('Location: ../views/?v=SPORT&msg=' . urlencode('New Sport successfully created.'));
	exit();
}


function registerTeam() {
    $sport_type 	= $_POST['sport_type'];
    $name 	        = $_POST['name'];
    $tname 	        = $_POST['tname'];
    $phone 	        = $_POST['phone'];
    $email 	        = $_POST['email'];
    $college 	    = $_POST['college'];
    $category 		= $_POST['category'];
    $tlist 	        = $_POST['tlist'];
	
//	//TODO first check if that date has a holiday
//	$hsql	= "SELECT * FROM tbl_users WHERE sport_type = '$sport_type'";
//	$hresult = dbQuery($hsql);
//	if (dbNumRows($hresult) > 0) {
//		$errorMessage = 'Sport type with same name already exist. Please try another day.';
//		header('Location: ../views/?v=SPORT&err=' . urlencode($errorMessage));
//		exit();
//	}
	$pwd = random_string();
	$sql = "INSERT INTO tbl_teamreg (sport_type, name, tname, phone, email, college, category, tlist, bdate)
			VALUES ('$sport_type', '$name', '$tname', '$phone', '$email', '$college', '$category', '$tlist', NOW())";	
	dbQuery($sql);
    header('Location: ../views/?v=TEAMREG&msg=' . urlencode('New Sport successfully created.'));
	exit();
}

//http://localhost/houda/views/process.php?cmd=change&action=inactive&userId=1
function changeStatus() {
	$action 	= $_GET['action'];
	$userId 	= (int)$_GET['userId'];
	
	
	$sql = "UPDATE tbl_users SET status = '$action' WHERE id = $userId";	
	dbQuery($sql);
	
	//send email on registration confirmation
	$bodymsg = "User $name booked the date slot on $bkdate. Requesting you to please take further action on user booking.<br/>Mbr/>Tousif Khan";
	$data = array('to' => '$email', 'sub' => 'Booking on $rdate.', 'msg' => $bodymsg);
	//send_email($data);
	header('Location: ../views/?v=USERS&msg=' . urlencode('User status successfully updated.'));
	exit();
}
?>