<?php

/*
* PHP SQLite - Create a table and insert rows in SQLite
*/

//Open the database mydb
$db = new SQLite3('db/mydb');

//drop the table if already exists
$db->exec('DROP TABLE IF EXISTS users');

//Create a basic table
$db->exec('CREATE TABLE users (full_name varchar(255), job_title varchar (255))');
echo "Table people has been created \n";

//insert rows
$db->exec('INSERT INTO people (full_name, job_title) VALUES ("John Doe","manager")');
echo "Row inserted \n";
$db->exec('INSERT INTO people (full_name, job_title) VALUES ("Jane Cyrus","assistant")');
echo "Row inserted \n";

?>