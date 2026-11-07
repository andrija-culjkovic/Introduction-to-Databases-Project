<?php
session_start();

// Inicijalizujem korpu ako ne postoji
if(!isset($_SESSION['korpa'])){
    $_SESSION['korpa'] = array();
}

$akcija = isset($_POST['akcija']) ? $_POST['akcija'] : '';

// JSON odgovori
header('Content-Type: application/json');

if($akcija == 'dodaj'){
    $id = $_POST['id'];
    $naziv = $_POST['naziv'];
    $cena = $_POST['cena'];
    
    if(isset($_SESSION['korpa'][$id])){
        $_SESSION['korpa'][$id]['kolicina']++;
    } else {
        $_SESSION['korpa'][$id] = array(
            'naziv' => $naziv,
            'cena' => $cena,
            'kolicina' => 1
        );
    }
    
    echo json_encode([
        'success' => true,
        'broj_proizvoda' => count($_SESSION['korpa'])
    ]);
}

elseif($akcija == 'obriši'){
    $id = $_POST['id'];
    unset($_SESSION['korpa'][$id]);
    
    echo json_encode([
        'success' => true,
        'broj_proizvoda' => count($_SESSION['korpa'])
    ]);
}

elseif($akcija == 'kolicina'){
    $id = $_POST['id'];
    $kolicina = $_POST['kolicina'];
    
    if(isset($_SESSION['korpa'][$id])){
        $_SESSION['korpa'][$id]['kolicina'] += $kolicina;
        
        // Ako je količina manja od 1, obriši proizvod
        if($_SESSION['korpa'][$id]['kolicina'] < 1){
            unset($_SESSION['korpa'][$id]);
        }
    }
    
    echo json_encode([
        'success' => true,
        'broj_proizvoda' => count($_SESSION['korpa'])
    ]);
}

elseif($akcija == 'ocisti'){
    $_SESSION['korpa'] = array();
    
    echo json_encode([
        'success' => true,
        'broj_proizvoda' => 0
    ]);
}

else {
    echo json_encode(['success' => false, 'message' => 'Nepoznata akcija']);
}
?>