<?php
include "konekcija.php";

// Može biti brend (string) ili brend_id (broj)
$brend = isset($_GET['brend']) ? $_GET['brend'] : '';
$brend_id = isset($_GET['brend_id']) ? intval($_GET['brend_id']) : 0;

// Ako je poslat brend kao string (od index.php)
if($brend != '' && $brend_id == 0){
    $brend_query = "SELECT id FROM brend WHERE naziv = '$brend'";
    $brend_result = $conn->query($brend_query);
    
    if($brend_result && $brend_result->num_rows > 0){
        $brend_row = $brend_result->fetch_assoc();
        $brend_id = $brend_row['id'];
    }
}

// Ako nema brend_id, vrati prazno
if($brend_id == 0){
    echo "<option value=''>-- Nema dostupnih modela --</option>";
    exit;
}

// Pronađi modele za taj brend
$sql = "SELECT DISTINCT model FROM automobil WHERE brend_id = $brend_id ORDER BY model";
$rez = $conn->query($sql);

echo "<option value=''>-- Izaberi model --</option>";

if($rez && $rez->num_rows > 0){
    while($row = $rez->fetch_assoc()){
        echo "<option>{$row['model']}</option>";
    }
} else {
    echo "<option value=''>Nema dostupnih modela</option>";
}
?>