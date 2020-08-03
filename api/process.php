<?php 

require_once 'Booking.php';
require_once '../library/config.php';
require_once '../library/mail.php';

$cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

switch($cmd) {
	
	case 'book':
		bookCalendar();
	break;
        
    case 'bookts':
		bookTeamsport();
	break;
        
    
		
	case 'holiday':
		addHoliday();
	break;
	
	case 'hdelete':
		deleteHoliday();
	break;
        
    case 'sdelete':
		deleteSport();
	break;
		
	case 'calview':
		calendarView();
	break;

	case 'regConfirm':
		regConfirm();
	break;
        
    case 'teamregConfirm':
		teamregConfirm();
	break;
			
	case 'delete':
		regDelete();
	break;
        
    case 'tregdelete':
		tregDelete();
	break;
	
	case 'user':
		userDetails();
	break;
    
    case 'teamreg':
		teamRegister();
	break;
	
	default :
	break;
}
                                                                      
function addHoliday() {
	$date 		= $_POST['date'];
	$reason 	= $_POST['reason'];	
	
	$errorMessage = '';
	
	$sql 	= "SELECT * FROM tbl_holidays WHERE date = '$date'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) > 0) {
		$errorMessage = 'Holiday already exist in record.';
		header('Location: ../views/?v=HOLY&err=' . urlencode($errorMessage));
		exit();
	}
	else {
		$sql = "INSERT INTO tbl_holidays (date, reason, bdate)
				VALUES ('$date', '$reason', NOW())";	
		dbQuery($sql);
		$msg = 'Holiday successfully added on calendar.';
		header('Location: ../views/?v=HOLY&msg=' . urlencode($msg));
		exit();
	}
}



function bookCalendar() {
	$name 		= $_POST['name'];
	$userId		= (int)$_POST['userId'];
	$address 	= $_POST['address'];
	$phone 		= $_POST['phone'];
	$email 		= $_POST['email'];
	$rdate		= $_POST['rdate'];
    $venue		= $_POST['venue'];
    $duration		= $_POST['duration'];
	$rtime		= $_POST['rtime'];
	$bkdate		= $rdate. ' '. $rtime;
	$ucount		= $_POST['ucount'];
	
	//TODO first check if that date has a holiday
	$hsql	= "SELECT * FROM tbl_holidays WHERE date = '$rdate'";
	$hresult = dbQuery($hsql);
	if (dbNumRows($hresult) > 0) {
		$errorMessage = 'You can not book any event on Holiday. Please try another day.';
		header('Location: ../views/?v=DB&err=' . urlencode($errorMessage));
		exit();
	}
	
	/*
	$sql = "INSERT INTO tbl_users (name, address, phone, email, bdate)
			VALUES ('$name', '$address', '$phone', '$email', NOW())";	
	dbQuery($sql);
	$insert_id = dbInsertId();
	*/
	
	$sql = "INSERT INTO tbl_reservations (uid, ucount, rdate, status, comments, bdate,  venue, duration) 
			VALUES ($userId, $ucount, '$bkdate', 'PENDING', '', NOW(), '$venue', '$duration')";
    
	dbQuery($sql);
	
	//send email on registration confirmation
	$bodymsg = "User $name booked the date slot on $bkdate. Requesting you to please take further action on user booking.<br/>Mbr/>Tousif Khan";
	$data = array('to' => 'ilhamlehe98@gmail.com', 'sub' => 'Booking on $rdate.', 'msg' => $bodymsg);
	//send_email($data);
	header('Location: ../index.php?msg=' . urlencode('Venue successfully booked.'));
	exit();
}


function bookTeamsport() {
	$name 		= $_POST['name'];
	$userId		= (int)$_POST['userId'];
	$address 	= $_POST['address'];
	$phone 		= $_POST['phone'];
	$email 		= $_POST['email'];
    $sport_type = $_POST['sport_type'];
    $sportcat = $_POST['sportcat'];
    $tname = $_POST['tname'];
    $college = $_POST['college'];
	$rdate		= $_POST['rdate'];
	$rtime		= $_POST['rtime'];
	$bkdate		= $rdate. ' '. $rtime;
	$ucount		= $_POST['ucount'];
	
	//TODO first check if that date has a holiday
	
	
	/*
	$sql = "INSERT INTO tbl_users (name, address, phone, email, bdate)
			VALUES ('$name', '$address', '$phone', '$email', NOW())";	
	dbQuery($sql);
	$insert_id = dbInsertId();
	*/
	
	$sql = "INSERT INTO tbl_teamreg (uid, ucount, rdate, sport_type, sportcat, tname, college, status, comments, bdate) 
			VALUES ($userId, $ucount, '$bkdate', '$sport_type', '$sportcat', '$tname', '$college', 'PENDING', '', NOW())";
	dbQuery($sql);
	
	//send email on registration confirmation
	$bodymsg = "User $name booked the date slot on $bkdate. Requesting you to please take further action on user booking.<br/>Mbr/>Tousif Khan";
	$data = array('to' => 'ilhamlehe98@gmail.com', 'sub' => 'Booking on $rdate.', 'msg' => $bodymsg);
	//send_email($data);
	header('Location: ../views/?v=TREGLIST&msg=' . urlencode('Team successfully registered.'));
	exit();
}





function regConfirm() {
	$userId		= $_GET['userId'];
	$action 	= $_GET['action'];
	$stat		= ($action == 'approve') ? 'APPROVED' : 'DENIED';
	
	$sql		= "UPDATE tbl_reservations SET status = '$stat' WHERE uid = $userId";
	dbQuery($sql);
	
	//send email now.
	$data = array();
	
	header('Location: ../views/?v=DB&msg=' . urlencode('Reservation status successfully changed.'));
	exit();
}

function teamregConfirm() {
	$userId		= $_GET['userId'];
	$action 	= $_GET['action'];
	$stat		= ($action == 'approve') ? 'APPROVED' : 'DENIED';
	
	$sql		= "UPDATE tbl_teamreg SET status = '$stat' WHERE uid = $userId";
	dbQuery($sql);
	
	//send email now.
	$data = array();
	
	header('Location: ../views/?v=TEAMREGLIST&msg=' . urlencode('Registration status successfully changed.'));
	exit();
}

function regDelete() {
	$userId	= $_GET['userId'];
	$sql1	= "DELETE FROM tbl_reservations WHERE uid = $userId";
	dbQuery($sql1);
	$sql2	= "DELETE FROM tbl_users WHERE id = $userId";
	dbQuery($sql2);
	
	header('Location: ../views/?v=LIST&msg=' . urlencode('User record successfully deleted.'));
	exit();
}

function tregDelete() {
	$userId	= $_GET['userId'];
	$sql1	= "DELETE FROM tbl_teamreg WHERE uid = $userId";
	dbQuery($sql1);
	
	
	header('Location: ../views/?v=TREGLIST&msg=' . urlencode('Registration successfully deleted.'));
	exit();
}

function deleteHoliday() {
	$holyId	= $_GET['hId'];
	$dsql	= "DELETE FROM tbl_holidays WHERE id = $holyId";
	dbQuery($dsql);
	header('Location: ../views/?v=HOLY&msg=' . urlencode('Notification successfully deleted.'));
	exit();
}

function deleteSport() {
	$spId	= $_GET['sId'];
	$dsql	= "DELETE FROM tbl_sport WHERE id = $spId";
	dbQuery($dsql);
	header('Location: ../views/?v=SPORT&msg=' . urlencode('Sport event successfully deleted.'));
	exit();
}

function calendarView() {
	$start 	= $_POST['start'];
	//$sdate	= date("Y-m-d\TH:i\Z", time($start));
	$end 	= $_POST['end'];
	//$edate	= date("Y-m-d\TH:i\Z", time($end));
	$bookings = array();
	$sql	= "SELECT u.name AS u_name, u.id AS user_id, r.rdate, r.status 
			   FROM tbl_users u, tbl_reservations r 
			   WHERE u.id = r.uid  
			   AND (r.rdate BETWEEN '$start' AND '$end')";
	//AND r.status = 'APPROVED'
	$result = dbQuery($sql);
	while($row = dbFetchAssoc($result)) {
		extract($row);
		$book = new Booking();
		$book->title = $u_name;
		$book->start = $rdate; 
		$bgClr = '#f39c12';//pending
		if($status == 'DENIED') {$bgClr = '#ff0000';}
		else if($status == 'APPROVED') {$bgClr = '#00cc00';}
		$book->backgroundColor = $bgClr; //#7FFF00 -> green, #ff0000 red, #f39c12 -> pending 
		$book->borderColor = $bgClr;
		$book->url = WEB_ROOT . 'views/?v=USER&ID='.$user_id;
		$bookings[] = $book; 
	}
	//execute SQLs to get the Holiday blocking days List within the limit of start, end date;
	$hsql	= "SELECT * FROM tbl_holidays 
			   WHERE (date BETWEEN '$start' AND '$end')";
	$hresult = dbQuery($hsql);
	while($hrow = dbFetchAssoc($hresult)) {	
		extract($hrow);	   
		$b = new Booking();
		$b->block = true;
		$b->title = $reason;
		$b->start = $date;
		$b->allDay = true; 
		$b->borderColor = '#F0F0F0';
		$b->className = 'fc-disabled';
		$bookings[] = $b;
	}//while
	echo json_encode($bookings);
}

function userDetails() {
	$userId	= $_GET['userId'];
	$hsql	= "SELECT * FROM tbl_users WHERE id = $userId";
	$hresult = dbQuery($hsql);
	$user = array();
	while($hrow = dbFetchAssoc($hresult)) {	
		extract($hrow);
		$user['user_id'] = $id;
		$user['address'] = $address;
		$user['phone_no'] = $phone;
		$user['email'] = $email;
	}//while
	echo json_encode($user);
}


?>
