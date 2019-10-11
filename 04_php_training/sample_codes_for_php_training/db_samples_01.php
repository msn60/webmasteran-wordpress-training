<?php
/**
 * Sample to connect a specific database
 */
$host        = "localhost";
$db_username = "mehdi";
$db_password = "mznx9182";
$db          = "gallery_db";
$charset     = 'utf8mb4';
//DSN: abbreviation of Data Source Name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
	$connection = new PDO( $dsn, $db_username, $db_password, $options );
	/*
	 * if you do not send options, you can only set attribute by this method in the following
	 * 	$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	 * */
	echo "Connected successfully";
	echo '<br>';
} catch ( PDOException $e ) {
	echo "Connection failed: " . $e->getMessage();
	echo '<br>';
	echo "The error code is: " . $e->getCode();
	echo '<br>';
	die( 'You can not continue!' );
}

/*
 * Running query with PDO
 * */

/*First with array result*/
$stmt = $connection->query( 'SELECT * FROM users' );
$i = 0;
while ( $row = $stmt->fetch() ) {
	echo ++$i;
	echo '<br>';
	var_dump( $row );
}

echo '<hr>';

/*Second with object result*/
$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
$stmt = $connection->query( 'SELECT * FROM users' );
$i = 0;
while ( $row = $stmt->fetch() ) {
	echo ++$i;
	echo '<br>';
	var_dump( $row );
}

echo '<hr>';

/*get all of result with fetchAll method*/
$stmt   = $connection->query( 'SELECT * FROM users' );
$result = $stmt->fetchAll( PDO::FETCH_BOTH );
var_dump( $result );

echo '<hr>';

/*If you have one result, you do not need to use from while loop*/
$stmt   = $connection->query( "SELECT * FROM users WHERE first_name='gholam'" );
$result = $stmt->fetch( PDO::FETCH_ASSOC );
var_dump( $result );
echo '<b>Username is: ' . $result['username'] . '</b><br>';
echo '<b>First name is: ' . $result['first_name'] . '</b><br>';
echo '<b>Last name is: ' . $result['last_name'] . '</b><br>';

echo '<hr>';
