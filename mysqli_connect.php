<?php
$dbconn = @mysqli_connect('localhost', 'aeronvalzado', 'aeronvalzado', 'members_valzado')
    or die('Could not connect to MySQL. Error in: ' . mysqli_connect_error());
mysqli_set_charset($dbconn, 'utf8');
