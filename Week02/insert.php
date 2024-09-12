<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Movie</title>
</head>
<body>
    <form action="insert-process.php" method="post" enctype="images/*">
        <label for="">Judul</label>
        <input type="text" name="judul" id=""><br>
        <label for="">Rilis</label>
        <input type="date" name="rilis" id=""><br>
        <label for="">Skor</label>
        <input type="number" name="skor" id=""><br>
        <label for="">Sinopsis</label>
        <input type="text" name="sinopsis"><br>
        <label for="">Serial</label>
        <input type="radio" name="serial" value="1">Ya
        <input type="radio" name="serial" value="0">Tidak<br>
        <label for="">Genre</label>
        <select name="genre">
            <?php 
            $mysqli = new mysqli('127.0.0.1', 'root', 'passwordlocal', 'fsp_e');

            $sql = "SELECT * FROM genre";
            $stmt = $mysqli->prepare($sql);
            $stmt -> execute();

            while ($row = $result -> fetch_assoc()) {
                $id = $row['id'];
                $nama = $row['nama'];

                echo "<input type='checkbox' name='genre[]' value='$id>$nama";
            }
            ?>
        </select><br>
        <label>GAMBAR</label>
        <input type="file" name="gambar" accept="images/*">
        <input type="submit" value="SUBMIT">
    </form>
    <a href="/Week02/">Back to Home</a>
</body>
</html>