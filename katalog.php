<?php 
session_start();
include "konekcija.php"; 
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog - Aftermarket Auto Delovi</title>
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
            <li><a href="katalog.php" class="active">KATALOG</a></li>
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

<!-- FILTER SEKCIJA -->
<div class="filter-section">
    <h2>Izaberi automobil</h2>
    <form method="GET" class="filter-form">
        <!-- HIDDEN INPUTI - DA SE NE IZGUBE PRI SUBMITANJU -->
        <input type="hidden" name="brend" id="brendHidden" value="<?php echo isset($_GET['brend']) ? $_GET['brend'] : ''; ?>">
        <input type="hidden" name="model" id="modelHidden" value="<?php echo isset($_GET['model']) ? $_GET['model'] : ''; ?>">
        
        <div class="filter-group">
            <label>Brend:</label>
            <select name="brend_display" id="brendSelect" onchange="document.getElementById('brendHidden').value = this.value; document.getElementById('modelHidden').value = ''; document.getElementById('modelSelect').value = ''; loadModels(this.value);">
                <option value="">-- Izaberi brend --</option>
                <?php
                $sql_brend = "SELECT id, naziv FROM brend ORDER BY naziv";
                $result_brend = $conn->query($sql_brend);
                
                if($result_brend && $result_brend->num_rows > 0){
                    while($row = $result_brend->fetch_assoc()){
                        // Ako je brend string, pronađi njegov ID
                        $selected = '';
                        if(isset($_GET['brend']) && $_GET['brend'] == $row['naziv']){
                            $selected = 'selected';
                        }
                        echo "<option value='{$row['naziv']}' $selected>{$row['naziv']}</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="filter-group">
            <label>Model:</label>
            <select name="model_display" id="modelSelect" onchange="document.getElementById('modelHidden').value = this.value;">
                <option value="">-- Prvo izaberi brend --</option>
                <?php
                if(isset($_GET['brend']) && $_GET['brend'] != ''){
                    $brend_filter = $_GET['brend'];
                    // Pronađi brend_id
                    $brend_id_query = "SELECT id FROM brend WHERE naziv = '$brend_filter'";
                    $brend_id_result = $conn->query($brend_id_query);
                    
                    if($brend_id_result && $brend_id_result->num_rows > 0){
                        $brend_id_row = $brend_id_result->fetch_assoc();
                        $brend_id = $brend_id_row['id'];
                        
                        $sql_model = "SELECT DISTINCT model FROM automobil WHERE brend_id = $brend_id ORDER BY model";
                        $result_model = $conn->query($sql_model);
                        
                        if($result_model && $result_model->num_rows > 0){
                            while($row = $result_model->fetch_assoc()){
                                $selected = (isset($_GET['model']) && $_GET['model'] == $row['model']) ? 'selected' : '';
                                echo "<option value='{$row['model']}' $selected>{$row['model']}</option>";
                            }
                        }
                    }
                }
                ?>
            </select>
        </div>

        <div class="filter-group">
            <label>Kategorija:</label>
            <select name="kategorija">
                <option value="">Sve kategorije</option>
                <?php
                $sql_kat = "SELECT id, naziv FROM kategorija ORDER BY naziv";
                $result_kat = $conn->query($sql_kat);
                
                if($result_kat && $result_kat->num_rows > 0){
                    while($row = $result_kat->fetch_assoc()){
                        $selected = (isset($_GET['kategorija']) && $_GET['kategorija'] == $row['id']) ? 'selected' : '';
                        echo "<option value='{$row['id']}' $selected>{$row['naziv']}</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="filter-group">
            <label>Maks cena (€):</label>
            <input type="number" name="cena" placeholder="Bez ograničenja" 
                   value="<?php echo isset($_GET['cena']) && $_GET['cena'] != '' ? $_GET['cena'] : ''; ?>">
        </div>

        <button type="submit" class="btn-primary">Pretraži</button>
        <a href="katalog.php" class="btn-secondary">Očisti filtere</a>
    </form>
</div>

<!-- PROIZVODI -->
<div class="products-section">
    <h2>Dostupni delovi</h2>
    
    <div class="grid">
    <?php
    
    $brend = isset($_GET['brend']) && $_GET['brend'] != '' ? $_GET['brend'] : null;
    $model = isset($_GET['model']) && $_GET['model'] != '' ? $_GET['model'] : null;
    $kategorija_id = isset($_GET['kategorija']) && $_GET['kategorija'] != '' ? intval($_GET['kategorija']) : null;
    $cena = isset($_GET['cena']) && $_GET['cena'] != '' ? intval($_GET['cena']) : null;

    // SQL sa GROUP_CONCAT - GRUPIŠE PROIZVODE, PRIKAZUJE SVE AUTOMOBILE
    $sql = "SELECT 
                p.id, 
                p.naziv, 
                p.cena, 
                k.naziv AS kategorija,
                GROUP_CONCAT(DISTINCT CONCAT(b.naziv, ' ', a.model) SEPARATOR ', ') AS automobili
            FROM proizvod p
            JOIN kategorija k ON p.kategorija_id = k.id
            JOIN automobil_proizvod ap ON p.id = ap.p_id
            JOIN automobil a ON ap.a_id = a.id
            JOIN brend b ON a.brend_id = b.id
            WHERE 1=1";
    
    if($brend){
        $sql .= " AND b.naziv = '$brend'";
    }
    
    if($model){
        $sql .= " AND a.model = '$model'";
    }
    
    if($kategorija_id){
        $sql .= " AND k.id = $kategorija_id";
    }
    
    if($cena){
        $sql .= " AND p.cena <= $cena";
    }
    
    $sql .= " GROUP BY p.id ORDER BY p.cena ASC";
    
    $rez = $conn->query($sql);
    
    if($rez && $rez->num_rows > 0){
        while($row = $rez->fetch_assoc()){
            $ime = str_replace(" ", "_", $row['naziv']);
            
            // SPECIJALNA LOGIKA ZA FAROVI ANGEL EYES - KORISTI TAČAN NAZIV IZ BAZE
            if(strpos($row['naziv'], 'Farovi Angel Eyes') !== false){
                // Naziv je vec sa modelom, zameni razmake sa underscore
                $ime = str_replace(" ", "_", $row['naziv']);
            }
            
            $slika = "slike/$ime.jpg";
            
            if(!file_exists($slika)){
                $slika = "slike/no-image.png";
            }
            
            echo "
            <div class='card' data-id='{$row['id']}' style='display: flex; flex-direction: column;'>
                <img src='$slika' alt='{$row['naziv']}'>
                <h3>{$row['naziv']}</h3>
                <p class='category'>{$row['kategorija']}</p>
                <p style='color: #60a5fa; font-size: 0.85rem; padding: 0 15px; margin-top: auto;'><strong>{$row['automobili']}</strong></p>
                <div class='price'>{$row['cena']} €</div>
                <button class='btn-korpa' onclick='dodajUKorpu({$row['id']}, \"{$row['naziv']}\", {$row['cena']})' style='margin-top: auto;'>
                    Dodaj u korpu
                </button>
            </div>
            ";
        }
    } else {
        echo "<p class='no-results'>Nema proizvoda koji odgovaraju vašim kriterijumima</p>";
    }
    ?>
    </div>
</div>

<script>
// Funkcija za dinamičko učitavanje modela
function loadModels(brend) {
    let modelSelect = document.getElementById("modelSelect");

    if(brend == ""){
        modelSelect.innerHTML = "<option value=''>-- Prvo izaberi brend --</option>";
        return;
    }

    fetch("ucitaj_modele.php?brend=" + encodeURIComponent(brend))
    .then(res => res.text())
    .then(data => {
        modelSelect.innerHTML = data;
    })
    .catch(err => console.error("Greška pri učitavanju:", err));
}

// Dinamičko učitavanje modela kada se promeni brend
document.getElementById("brendSelect").addEventListener("change", function(){
    document.getElementById("brendHidden").value = this.value;
    document.getElementById("modelHidden").value = '';
    document.getElementById("modelSelect").value = '';
    loadModels(this.value);
});

// Ažuriranje model hidden inputa
document.getElementById("modelSelect").addEventListener("change", function(){
    document.getElementById("modelHidden").value = this.value;
});

function dodajUKorpu(id, naziv, cena) {
    fetch('handleKorpa.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'akcija=dodaj&id=' + id + '&naziv=' + encodeURIComponent(naziv) + '&cena=' + cena
    })
    .then(res => res.json())
    .then(data => {
        if(data.success) {
            alert('Proizvod dodan u korpu!');
            document.querySelector('.korpa-broj').textContent = data.broj_proizvoda;
        }
    })
    .catch(err => console.error('Greška:', err));
}
</script>

</body>
</html>