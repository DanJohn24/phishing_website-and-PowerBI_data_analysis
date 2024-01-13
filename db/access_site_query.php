<?php include 'connection_details.php';?>

<?php
    error_reporting(0);
    $id_gen = bin2hex(openssl_random_pseudo_bytes(16));

    $SQL_statement = "INSERT INTO `results_table` (`id`,`AccessSiteCount`) VALUES ('$id_gen', 1)";
    
    // Create connection
    $conn = new mysqli(servername, username, password, db);

    // Check connection
    if ($conn->connect_error) {
        die("error has occured");
    }
    
    if (!isset($_COOKIE["access_site_restrict"]))
    {
        $SQL_error_check = $conn->query($SQL_statement);
        if(! $SQL_error_check ) {
            die("error has occured");
        }
        setcookie("access_site_restrict", $id_gen,  time() + 2 * 24 * 60 * 60, '/');
    }
?>