<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);


return [

    'DB_HOST' => $host,
    'DB_USERNAME' => $username,
    'DB_PASSWORD' => $password,
    'DB_NAME' => $database

];