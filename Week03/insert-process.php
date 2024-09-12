<?php
$mysqli = new mysqli("127.0.0.1", "root", "passwordlocal", "fsp_e");

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
$gambar = $_FILES['gambar'];
$ext = pathinfo($gambar['name'], PATHINFO_EXTENSION);

$idpemain = $_POST['idpemain'];
$peranpemain = $_POST['peranpemain'];

// continue for other variables
$query = "INSERT INTO movie (judul, rilis, skor, sinopsis, serial, extension, genre) 	VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssdsiss', $judul, $rilis, $skor, $sinopsis, $serial, $ext, $genre);
// ‘'ssdsis'’ is the variable type 

//ADD DETAIL PEMAIN
$sql2 = 'INSERT INTO detail_pemain values(?, ?, ?)';
$stmt2 = $mysqli->prepare($sql2);
$stmt2 -> bind_param("iis", $new_id, $pemain, $peran);

foreach ($$idpemain as $key => $pemain) {
    $peran = $peranpemain[$key];
    $stmt2 -> execute();
}
for ($i=0; $i < count($idpemain); $i++) { 
    $pemain = $idpemain[$i];
    $peran = $peranpemain[$i];
}

/* execute prepared statement */
$stmt->execute();

if ($stmt) {
    echo "Insert success.";
    echo "ID Movie " + $stmt->$insert_id;
    $new_id = $stmt->insert_id;
    $dst = "gambar/$new_id.$ext";
    move_uploaded_file($gambar['tmp_name'], $dst);

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
