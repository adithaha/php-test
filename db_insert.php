<?php

$DBHOST = getenv('DB_HOST') ?: "postgresql";
$DBUSER = getenv('POSTGRESQL_USER');
$DBPASS = getenv('POSTGRESQL_PASSWORD');
$DBNAME = getenv('POSTGRESQL_DATABASE');

$data = shell_exec('date');
$TABLENAME = getenv('POSTGRESQL_TABLE');

// Connecting, selecting database
$dbconn = pg_connect("host=$DBHOST dbname=$DBNAME user=$DBUSER password=$DBPASS")
        or die('Could not connect: ' . pg_last_error());

//perform the insert using pg_query
$result = pg_query($dbconn, "INSERT INTO $TABLENAME(data) VALUES('$data')");

// Closing connection
pg_close($dbconn);

?>