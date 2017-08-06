<?

if ($_SERVER['REQUEST_URI'] == '/') $page = 'home';
else {
	$page = substr($_SERVER['REQUEST_URI'], 1);
	if (!preg_match('/^[A-z0-9]{3,15}$/', $page)) include '404.php'; #exit('error url');
}

session_start();

if ($page == 'home') include 'index.html';
else if (file_exists('all/'.$page.'.php')) include 'all/'.$page.'.php';
else if ($_SESSION['ulogin'] == 1 and file_exists('auth/'.$page.'.php')) include 'auth/'.$page.'.php';
else if ($_SESSION['ulogin'] != 1 and file_exists('guest/'.$page.'.php')) include 'guest/'.$page.'.php';
else include '404.php';
#echo $page;

function get_header($title) {
		echo '<!DOCTYPE html>
<head>
	<meta charset=utf-8">
	<title>'.$title.'</title>
</head>
<body>';
}

function get_footer() {
		echo '</body></html>';
}

?>
