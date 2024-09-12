<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Movie</title>
    <style type="text/css">
        label {
            display: inline-block;
            width: 80px;
        }
    </style>
</head>

<body>
    <form method="POST" enctype="multipart/form-data" action="insertmovie_proses.php">
        <label>Judul</label>
        <input type="text" name="judul"><br>
        <label>Rilis</label>
        <input type="date" name="rilis"><br>
        <label>Skor</label>
        <input type="number" name="skor"><br>
        <label>Sinopsis</label>
        <input type="text" name="sinopsis"><br>
        <label>Serial</label>
        <input type="radio" name="serial" value="1">Ya
        <input type="radio" name="serial" value="0">Tidak
        <br>
        <label>Genre</label><br>
        <?php
        $mysqli = new mysqli("127.0.0.1", "root", "passwordlocal", "fsp_e");

        if ($mysqli->connect_errno) {
            echo "Failed to connect MySQL: " . $mysqli->connect_error;
        } else {
            "Connection success";
        }

        $sql = "SELECT * FROM genre";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $id = $row['idgenre'];
            $nama = $row['nama'];
            echo "<input type='checkbox' name='genre[]' value='$id'>$nama";
        }
        ?>
        <!-- <select name="genre">
            <option value="Action">Action</option>
            <option value="Drama">Drama</option>
            <option value="Comedy">Comedy</option>
        </select><br> -->
        <br>
        <label>Gambar</label>
        <input type="file" name="gambar" accept="image/*"><br>

        <label>Pemain</label>
        <select name="pemain" id="pemain">
            <?php

            $sql = "SELECT * FROM pemain";
            $stmt = $mysqli->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            // echo "<select>";
            while ($row = $result->fetch_assoc()) {
                $id = $row['idpemain'];
                $nama = $row['nama'];

                echo "<option value='$id'>$nama</option>";
            }

            $mysqli->close();
            ?>
        </select>

        <select name="peran" id="peran">
            <option value="Utama">Utama</option>
            <option value="Pembantu">Pembantu</option>
            <option value="Cameo">Cameo</option>
        </select>
        <input type="button" name="btnTambah" id="btnTambah" value="Tambah">
        <br>
        <table style="border: 1px;" id="tblPemain">
            <tr>
                <th>Nama Pemain</th>
                <th>Peran Pemain</th>
                <th>Aksi</th>
            </tr>
        </table>

        <input type="submit" name="submit" value="Insert">
    </form>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $("#btnTambah").click(function() {
            var str;

            var idpemain = $("#pemain").val();
            var nama = $("#pemain option:selected").text();
            var peran = $("#peran").val();

            str = "<tr>";
            str = str + "<input type='hidden' name='idpemain[]' value='" + idpemain + "'>";
            str = str + "<input type='hidden' name='peranpemain[]' value='" + peran + "'>";
            str = str + "<td>" + nama + "</td>";
            str = str + "<td>" + peran + "</td>";
            str = str + "<td><input type='button' value ='Hapus' class='btnHapus'</td>";
            str = str + "</tr>";

            $("#tblPemain").append(str);
        });

        // $('.btnHapus').click(function(){alert(document.cookie);})
        $(document).on("click", ".btnHapus", function(){
            $(this).parent().parent().remove();
        })
    </script>
</body>

</html>