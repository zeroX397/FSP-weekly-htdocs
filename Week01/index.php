<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FSP Week 01</title>
</head>

<body>
    <?php

    $mysqli = new mysqli("pengalilla.com", "root", "AmandaChantik2010", "fsp_e");

    if ($mysqli->connect_errno) {
        echo "Connection failed : " . $mysqli->connect_error;
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
    </tr>";
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['idmovie'] . "</td>";
        echo "<td>" . $row['judul'] . "</td>";
        $rilis = date("d-m-Y", strtotime($row['rilis']));
        echo "<td>" . $row['rilis'] . "</td>";
        echo "<td>" . $row['skor'] . "</td>";
        echo "<td>" . $row['sinopsis'] . "</td>";
        $serial  = $row['serial'] == 1 ? "Ya" : "Tidak";
        echo "<td>" . $serial . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    $mysqli->close(); /* close connection */
    ?>
    <a href="insert.php">Insert new movie</a>
</body>

</html>