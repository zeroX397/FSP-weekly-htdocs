<?php
$mysqli = new mysqli("pengalilla.com", "root", "AmandaChantik2010", "fsp_e");

if ($mysqli->connect_errno) {
    echo "Connection failed : " . $mysqli->connect_error;
} else {
    echo "Connection success";
}

$judul = $_POST['judul'];
$rilis = $_POST['rilis'];
$skor = $_POST['skor'];
$sinopsis = $_POST['sinopsis'];
$serial = $_POST['serial'];
$genre = $_POST['genre'];
// continue for other variables
$query = "INSERT INTO movie (judul, rilis, skor, sinopsis, serial, genre) 	VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssdsis', $judul, $rilis, $skor, $sinopsis, $serial, $genre);
// ‘'ssdsis'’ is the variable type 

/* execute prepared statement */
$stmt->execute();

if ($stmt) {
    echo "Insert success.";
    echo "ID Movie " + $stmt->$insert_id;
} else {
    echo "Insert failed.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><a href="index.php">Back to Home</a>
</body>
</html>
