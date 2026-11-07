<?php 
session_start();
include "konekcija.php"; 
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korpa - Aftermarket Auto Delovi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVIGACIJA -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <img src="slike/logo.png" alt="AFTERMARKET Logo" class="logo-img">
        </div>
        <ul class="nav-menu">
            <li><a href="index.php">POČETAK</a></li>
            <li><a href="katalog.php">KATALOG</a></li>
            <li><a href="kontakt.php">KONTAKT</a></li>
            <li>
                <a href="korpa.php" class="korpa-link active">
                    🛒 KORPA 
                    <span class="korpa-broj">
                        <?php 
                        $broj = isset($_SESSION['korpa']) ? count($_SESSION['korpa']) : 0;
                        echo $broj;
                        ?>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- KORPA SADRŽAJ -->
<div class="korpa-container">
    <h2>🛒 Vaša korpa</h2>
    
    <?php
    if(!isset($_SESSION['korpa']) || empty($_SESSION['korpa'])){
        echo "<div class='empty-korpa'>
                <p>Vaša korpa je prazna</p>
                <a href='katalog.php' class='btn-primary'>Nastavi kupovinu</a>
              </div>";
    } else {
        $ukupna_cena = 0;
        ?>
        
        <table class="korpa-table">
            <thead>
                <tr>
                    <th>Proizvod</th>
                    <th>Cena (€)</th>
                    <th>Količina</th>
                    <th>Ukupno (€)</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>
        <?php
        
        foreach($_SESSION['korpa'] as $id => $proizvod){
            $linijska_cena = $proizvod['cena'] * $proizvod['kolicina'];
            $ukupna_cena += $linijska_cena;
            
            echo "
            <tr class='korpa-red' data-id='$id'>
                <td>{$proizvod['naziv']}</td>
                <td>{$proizvod['cena']}</td>
                <td>
                    <div class='kolicina-kontrola'>
                        <button onclick='promeniKolicinu($id, -1)'>-</button>
                        <input type='number' value='{$proizvod['kolicina']}' min='1' readonly>
                        <button onclick='promeniKolicinu($id, 1)'>+</button>
                    </div>
                </td>
                <td class='cena-ukupno'>$linijska_cena €</td>
                <td>
                    <button class='btn-delete' onclick='obrisiIzKorpe($id)'>Obriši</button>
                </td>
            </tr>
            ";
        }
        
        ?>
            </tbody>
        </table>
        
        <div class="korpa-summary">
            <div class="summary-info">
                <p>Broj stavki: <strong><?php echo count($_SESSION['korpa']); ?></strong></p>
                <p class="total-price">UKUPNA CENA: <strong><?php echo $ukupna_cena; ?> €</strong></p>
            </div>
            
            <div class="summary-actions">
                <a href='katalog.php' class='btn-secondary'>Nastavi kupovinu</a>
                <button class='btn-primary' onclick='naruci()'>Naruči</button>
            </div>
        </div>
        
        <?php
    }
    ?>
</div>

<script>
function obrisiIzKorpe(id) {
    fetch('handleKorpa.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'akcija=obriši&id=' + id
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            location.reload();
        }
    })
    .catch(err => console.error('Greška:', err));
}

function promeniKolicinu(id, kolicina) {
    fetch('handleKorpa.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'akcija=kolicina&id=' + id + '&kolicina=' + kolicina
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            location.reload();
        }
    })
    .catch(err => console.error('Greška:', err));
}

function naruci() {
    alert('Hvala na narudžbini! Uskoro ćemo vas kontaktirati za detalje dostave.');
    fetch('handleKorpa.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'akcija=ocisti'
    })
    .then(res => res.json())
    .then(data => {
        window.location.href = 'index.php';
    });
}
</script>

</body>
</html>