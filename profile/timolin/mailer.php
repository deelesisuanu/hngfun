<?php

if (isset($_GET['body']) && isset($_GET['subject'])) {
  $email = "fabrobocomx@gmail.com";//$_GET['to'];
  $subject = $_GET['subject'];
  $body = $_GET['body'];
} else {
  die("Invalid request. Please try again");
}

// DB connection
$config = include $_SERVER['DOCUMENT_ROOT'] . '/config.php';
// $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
// $con = new PDO($dsn, $config['username'], $config['pass']);

//var_dump($config);
$db_name = $config["dbname"];
$db_pass = $config["pass"];
$db_username = $config["username"];
$db_host = $config["host"];
//var_dump($db_name.$db_pass.$db_username.$db_host);
$db = new mysqli($db_host, $db_username, $db_pass, $db_name);

if ($db->connect_errno) {
  // trigger_error('Connection Failed!', E_USER_ERROR);
  die("Connection failed ". $db->connect_error);
}

// Fetch password from DB
$query = $db->query('SELECT * FROM password LIMIT 1');
$data = $query->fetch_assoc();
$password = $data['password'];

$result = file_get_contents($_SERVER['DOCUMENT_ROOT'] . 'sendmail.php?password='.$password.'&subject='.$subject.'&body='.$body.'&to='.$email);

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$_SESSION['message'] = $result;

header("Location: http://hng.fun/profile/timolin/");
exit();