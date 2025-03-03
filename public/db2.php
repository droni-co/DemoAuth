<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:demoauthserver.database.windows.net,1433; Database = demoAuthDb", "CloudSA17982b56", "{your_password_here}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "CloudSA17982b56", "pwd" => "{your_password_here}", "Database" => "demoAuthDb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:demoauthserver.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

pint_r($conn);
