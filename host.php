<?php
$hostname = getenv('HOSTNAME');
if (substr($hostname, 0, 5) == 'siteb') {
    print '<h1>Response from container:      ' . getenv('HOSTNAME') . "\n";
} else {
    print '<h1>Response from container: ' . getenv('HOSTNAME')  . "\n";
}
?>
