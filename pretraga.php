<?php
include "konekcija.php";

$brend = $_GET['brend'];
$model = $_GET['model'];

$sql = "SELECT p.naziv AS proizvod, k.naziv AS kategorija, p.cena
FROM automobil a
JOIN brend br ON a.brend_id = br.id
JOIN automobil_proizvod ap ON a.id = ap.a_id
JOIN proizvod p ON ap.p_id = p.id
JOIN kategorija k ON p.kategorija_id = k.id
WHERE br.naziv='$brend' AND a.model='$model'
ORDER BY p.cena ASC";

$rez = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 class="title">Delovi za <?php echo $brend . " " . $model; ?></h2>

<div class="grid">

<?php
while($row = $rez->fetch_assoc()){

    $ime = str_replace(" ", "_", $row['proizvod']);
    $slika = "slike/$ime.jpg";

    if(!file_exists($slika)){
        $slika = "slike/no-image.png";
    }

    echo "
    <div class='card'>
        <img src='$slika'>
        <h3>{$row['proizvod']}</h3>
        <p>{$row['kategorija']}</p>
        <div class='cena'>{$row['cena']} €</div>
    </div>
    ";
}
?>

</div>

<a href='index.php' class="back">Nazad</a>

</body>
</html>