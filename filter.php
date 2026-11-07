<?php include "konekcija.php"; ?>

<form method="GET">
Kategorija:
<select name="kategorija">
<?php
$rez = $conn->query("SELECT naziv FROM kategorija");
while($row = $rez->fetch_assoc()){
    echo "<option>{$row['naziv']}</option>";
}
?>
</select>

Maks cena:
<input type="number" name="cena">

<button type="submit">Filtriraj</button>
</form>

<?php
if(isset($_GET['kategorija'])){
$kat = $_GET['kategorija'];
$cena = $_GET['cena'];

$sql = "SELECT p.naziv, p.cena
FROM proizvod p
JOIN kategorija k ON p.kategorija_id = k.id
WHERE k.naziv='$kat' AND p.cena <= $cena
ORDER BY p.cena ASC";

$rez = $conn->query($sql);

echo "<table>";
while($row = $rez->fetch_assoc()){
    echo "<tr><td>{$row['naziv']}</td><td>{$row['cena']} €</td></tr>";
}
echo "</table>";
}
?>