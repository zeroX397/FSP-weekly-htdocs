<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Movie</title>
</head>
<body>
    <form action="insert-process.php" method="post">
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
            <option value="Action">Action</option>
            <option value="Animation">Animation</option>
            <option value="Drama">Drama</option>
        </select>
        <input type="submit" value="SUBMIT">
    </form>
    <a href="index.php">Back to Home</a>
</body>
</html>