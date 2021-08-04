<?php 
// Database credentials are now stored in /credentials.php
$config = [
    'db_host' => '',
    'db_user' => '',
    'db_pass' => '',
    'db_name' => '',
];
// check if it is file or not
if (is_file(__DIR__ . '/../../credentials.php')) {
    $config = array_merge($config, require __DIR__ . '/../../credentials.php');
}

// import credentials
define('DB_HOST', $config['db_host']);
define('DB_USER', $config['db_user']);
define('DB_PASS', $config['db_pass']);
define('DB_NAME', $config['db_name']);

// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
