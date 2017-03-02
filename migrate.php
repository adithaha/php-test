<?php

$DBHOST = getenv('DB_HOST') ?: "postgresql";
$DBUSER = getenv('POSTGRESQL_USER');
$DBPASS = getenv('POSTGRESQL_PASSWORD');
$DBNAME = getenv('POSTGRESQL_DATABASE');

$TABLENAME = getenv('POSTGRESQL_TABLE');

// Connecting, selecting database
$dbconn = pg_connect("host=$DBHOST dbname=$DBNAME user=$DBUSER password=$DBPASS")
        or die('Could not connect: ' . pg_last_error());

//Create table
$tabela = pg_query($dbconn, "CREATE TABLE IF NOT EXISTS '$TABLENAME'(DATA  TEXT  NOT NULL)";
$permissao = pg_query($dbconn, "GRANT ALL ON '$TABLENAME' TO '$DBUSER';");

// Closing connection
pg_close($dbconn);

?>
