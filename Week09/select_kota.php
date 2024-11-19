<?php 
$idprovinsi = $_POST['idprovinsi'];
$sql = "SELECT * FROM kota WHERE provinsi.id = ?";
$stmt = $conn -> prepare($sql);
$stmt -> bind_param("i", $idprovinsi);
$stmt -> execute();
$result = $stmt -> get_result();

echo "<option value=''> --- Pilih Kota ---</options>";
while ($row = $result->fetch_assoc()) {
  $id = $row['id'];
  $nama = $row['n'];
}
?>
