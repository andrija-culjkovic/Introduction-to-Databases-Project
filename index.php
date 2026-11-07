<?php 
session_start();
include "konekcija.php"; 
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aftermarket Auto Delovi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="home">

<!-- NAVIGACIJA -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <img src="slike/logo.png" alt="AFTERMARKET Logo" class="logo-img">
        </div>
        <ul class="nav-menu">
            <li><a href="index.php" class="active">POČETAK</a></li>
            <li><a href="katalog.php">KATALOG</a></li>
            <li><a href="kontakt.php">KONTAKT</a></li>
            <li>
                <a href="korpa.php" class="korpa-link">
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

<!-- HERO SEKCIJA -->
<div class="overlay">
    <div class="hero-content">
        <h1 class="hero-title">AFTERMARKET AUTO DELOVI</h1>
        <p class="hero-subtitle">Pronađi savršene delove za tvoj automobil</p>
        
        <form action="katalog.php" method="GET" class="form-box">
            <label>Brend:</label>
            <select name="brend" id="brendSelect" required>
                <option value="">-- Izaberi brend --</option>
                <?php
                $rez = $conn->query("SELECT naziv FROM brend ORDER BY naziv");
                while($row = $rez->fetch_assoc()){
                    echo "<option>{$row['naziv']}</option>";
                }
                ?>
            </select>

            <label>Model:</label>
            <select name="model" id="modelSelect" required>
                <option value="">-- Prvo izaberi brend --</option>
            </select>

            <button type="submit" class="btn-primary">Prikaži delove</button>
        </form>
    </div>
</div>

<!-- INFO SEKCIJA -->
<section class="info-section">
    <div class="info-container">
        <div class="info-card">
            <div class="info-icon">📦</div>
            <h3>Veliki izbor</h3>
            <p>Hiljade originalnih i aftermarket delova za sve marke automobila</p>
        </div>
        <div class="info-card">
            <div class="info-icon">💰</div>
            <h3>Konkurentne cene</h3>
            <p>Najbolje cene na tržištu sa mogućnošću filtriranja po budžetu</p>
        </div>
        <div class="info-card">
            <div class="info-icon">🚚</div>
            <h3>Brza isporuka</h3>
            <p>Sigurna i brza dostava direktno na tvoju adresu</p>
        </div>
        <div class="info-card">
            <div class="info-icon">⭐</div>
            <h3>Kvalitet</h3>
            <p>Samo originalni i proveren delovi od poverenih proizvođača</p>
        </div>
    </div>
</section>

<script>
// Dinamičko učitavanje modela kada se promeni brend
document.getElementById("brendSelect").addEventListener("change", function(){
    let brend = this.value;

    fetch("ucitaj_modele.php?brend=" + encodeURIComponent(brend))
    .then(res => res.text())
    .then(data => {
        document.getElementById("modelSelect").innerHTML = data;
    })
    .catch(err => console.error("Greška pri učitavanju:", err));
});
</script>

</body>
</html>