<?php

$mysqli = new mysqli("127.0.0.1", "root", "passwordlocal", "fsp_e");

if ($mysqli->connect_errno) {
    echo "Connection failed: " . $mysqli->connect_error;
    exit();
} else {
    echo "Connection success";
}

$id_movie = $_GET['id'] ?? null;

if (!$id_movie) {
    die("Movie ID is missing.");
}

$sql = "SELECT * FROM movie WHERE id = ?";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("Failed to prepare statement: " . $mysqli->error);
}

$stmt->bind_param("i", $id_movie);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $judul = htmlspecialchars($row['judul'], ENT_QUOTES, 'UTF-8');
    $rilis = htmlspecialchars($row['rilis'], ENT_QUOTES, 'UTF-8');
    $skor = htmlspecialchars($row['skor'], ENT_QUOTES, 'UTF-8');
    $sinopsis = htmlspecialchars($row['sinopsis'], ENT_QUOTES, 'UTF-8');
    $serial = $row['serial'];
    $genre = htmlspecialchars($row['genre'], ENT_QUOTES, 'UTF-8');
} else {
    die("Invalid Movie ID");
}

$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
</head>

<body>
    <form action="edit-process.php" method="get">
        <label for="">Judul</label>
        <input type="text" name="judul" value="<?= $judul ?>"><br>

        <label for="">Rilis</label>
        <input type="date" name="rilis" value="<?= $rilis ?>"><br>

        <label for="">Skor</label>
        <input type="number" name="skor" value="<?= $skor ?>"><br>

        <label for="">Sinopsis</label>
        <input type="text" name="sinopsis" value="<?= $sinopsis ?>"><br>

        <label for="">Serial</label>
        <?php
        $ya = $serial == 1 ? "checked" : "";
        $tidak = $serial == 0 ? "checked" : "";
        ?>
        <input type="radio" name="serial" value="1" <?= $ya ?>>Ya
        <input type="radio" name="serial" value="0" <?= $tidak ?>>Tidak<br>

        <label for="">Genre</label>
        <select name="genre">
            <option value="Action" <?= $genre == "Action" ? "selected" : "" ?>>Action</option>
            <option value="Animation" <?= $genre == "Animation" ? "selected" : "" ?>>Animation</option>
            <option value="Drama" <?= $genre == "Drama" ? "selected" : "" ?>>Drama</option>
        </select>

        <input type="hidden" name="id" value="<?= $id_movie ?>">
        <input type="submit" value="SUBMIT">
    </form>
    <a href="index.php">Back to Home</a>
</body>

</html>