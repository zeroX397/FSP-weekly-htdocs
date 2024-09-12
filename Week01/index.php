<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSP Week 01</title>
</head>

<body>
    <?php

    $mysqli = new mysqli("127.0.0.1", "root", "passwordlocal", "fsp_e");

    if ($mysqli->connect_errno) {
        echo "Connection failed: " . $mysqli->connect_error;
    } else {
        echo "Connection success";
    }

    $stmt = $mysqli->prepare("SELECT * FROM fsp_e.movie");
    $stmt->execute();
    $res = $stmt->get_result();
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Rilis</th>
        <th>Skor</th>
        <th>Sinopsis</th>
        <th>Serial</th>
        <th>Genre</th>
        <th>Edit</th>
    </tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['judul']) . "</td>";
        $rilis = date("d-m-Y", strtotime($row['rilis']));
        echo "<td>" . htmlspecialchars($rilis) . "</td>";
        echo "<td>" . htmlspecialchars($row['skor']) . "</td>";
        echo "<td>" . htmlspecialchars($row['sinopsis']) . "</td>";
        $serial  = $row['serial'] == 1 ? "Ya" : "Tidak";
        echo "<td>" . htmlspecialchars($serial) . "</td>";
        echo "<td>" . htmlspecialchars($row['genre']) . "</td>";

        $id = $row['id'];
        $ext = $row['extension'];

        echo "<td><img src='gambar/$id.$ext' width=50 height=50></td>";
        // Added Edit link with movie ID
        echo "<td><a href='/Week01/edit.php?id=" . urlencode($row['id']) . "'>Edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    $mysqli->close(); /* close connection */
    ?>
    <a href="/Week01/insert.php">Insert new movie</a>
</body>

</html>