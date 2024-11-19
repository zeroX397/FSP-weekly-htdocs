<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX FSP</title>
</head>

<body>
    <button type="button" id="button_klik_aku">Klik Aku</button>
    <br><br>
    <input type="text" id="txt_klik_aku">
    <br><br>
    <div id="hasil_klik_aku">Isi Hasil...</div>

    <script type="text/javascript" src="/jquery-3.7.1.js"></script>
    <script type="text/javascript">
        $("button_klik_aku").click(function() {
            $.post("index_proses.php", {
                nrp: 160422222,
                nama: "rudi"
            })
            .done(function(data_dari_server) {
                alert(data_dari_server);

                $("#txt_klik_aku")
            })
        })
    </script>
</body>

</html>