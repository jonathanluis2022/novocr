<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "loja";

$mysqli = new mysqli($host, $user, $pass, $db);

if($mysqli->connect_errno) 
    die('Erro ao conectar o banco de dados');

