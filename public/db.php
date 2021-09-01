<?php

$mysqli = new mysqli("localhost", "gardoon1_next", "zXu81ApuQ1EvD02i", "gardoon1_next");
$mysqli->query('SET foreign_key_checks = 0');
if ($result = $mysqli->query("SHOW TABLES"))
{
    while($row = $result->fetch_array(MYSQLI_NUM))
    {
        $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
    }
}

$filename = 'demo.sql';
$op_data = '';
$lines = file($filename);
foreach ($lines as $line)
{
    if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
    {
        continue;
    }
    $op_data .= $line;
    if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
    {
        $mysqli->query($op_data);
        $op_data = '';
    }
}

$mysqli->query('SET foreign_key_checks = 1');
$mysqli->close();




