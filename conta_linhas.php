<?php

$DBHOST = getenv('DB_HOST') ?: "postgresql";
$DBUSER = getenv('POSTGRESQL_USER');
$DBPASS = getenv('POSTGRESQL_PASSWORD');
$DBNAME = getenv('POSTGRESQL_DATABASE');
$TABLENAME = joao;

// Connecting, selecting database
$dbconn = pg_connect("host=$DBHOST dbname=$DBNAME user=$DBUSER password=$DBPASS")
        or die('Could not connect: ' . pg_last_error());

//Run Query
$val = pg_query($dbconn, "SELECT relname, n_tup_ins - n_tup_del as rowcount FROM pg_stat_all_tables where relname = '$TABLENAME' ");

//Fetch Result
$saida=pg_fetch_result($val, 0, 1);

//Show
echo "Quantas Linhas Temos: ", $saida, "\n";

// Closing connection
pg_close($dbconn);
?>
