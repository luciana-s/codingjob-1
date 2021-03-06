<?php

// To work with database, we'll use a library call : mysqli
require_once 'database.php';
// Connect to my database server
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
echo 'Connexion successfull<br>';
// Choose wich database I want to work with
$db_name = 'moviedb';
$db_found = mysqli_select_db($conn, $db_name);

if ($db_found) {
  echo "$db_name found !<br>";
  // Prepare my query
  $query = 'SELECT * FROM movies';
  //Send the query to the DB
  $results = mysqli_query($conn, $query);

  /*
  I retrieve the results as an array
  And display this array (using a loop)
*/

  while ($db_record = mysqli_fetch_assoc($results)) {
    echo '<hr>';
    echo $db_record['title'] . '<br>';
    echo $db_record['release_year'] . '<br>';
    echo $db_record['views'] . '<br>';
  }
} else
  echo "$db_name NOT found !<br>";

// Close the connection to the database
mysqli_close($conn);
