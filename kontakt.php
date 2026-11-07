<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontakt - Aftermarket Auto Delovi</title>
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
            <li><a href="kontakt.php" class="active">KONTAKT</a></li>
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

<!-- KONTAKT SEKCIJA -->
<div class="kontakt-container">
    <div class="kontakt-grid">
        
        <!-- KONTAKT FORMA -->
        <div class="kontakt-forma">
            <h2>Pošalji nam poruku</h2>
            
            <form method="POST" class="forma">
                <div class="form-group">
                    <label for="ime">Ime:</label>
                    <input type="text" id="ime" name="ime" required placeholder="Unesite vaše ime">
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="vaš@email.com">
                </div>
                
                <div class="form-group">
                    <label for="telefon">Telefon:</label>
                    <input type="tel" id="telefon" name="telefon" placeholder="+381...">
                </div>
                
                <div class="form-group">
                    <label for="tema">Tema:</label>
                    <select id="tema" name="tema" required>
                        <option value="">-- Izaberi temu --</option>
                        <option value="pitanje">Opšte pitanje</option>
                        <option value="dostava">Dostava</option>
                        <option value="povrat">Povrat i reklamacija</option>
                        <option value="saradnja">Poslovne saradnje</option>
                        <option value="ostalo">Ostalo</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="poruka">Poruka:</label>
                    <textarea id="poruka" name="poruka" rows="6" required placeholder="Vaša poruka..."></textarea>
                </div>
                
                <button type="submit" class="btn-primary">Pošalji poruku</button>
            </form>
            
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo "<div class='success-message'>
                        ✓ Hvala! Vaša poruka je primljena. Odgovorićemo u roku od 24 sata.
                      </div>";
            }
            ?>
        </div>
        
        <!-- KONTAKT INFORMACIJE -->
        <div class="kontakt-info">
            <h2>Kontakt informacije</h2>
            
            <div class="info-item">
                <h3>📍 Adresa:</h3>
                <p>Kneza Miloša 45<br>18000 Niš<br>Srbija</p>
            </div>
            
            <div class="info-item">
                <h3>📞 Telefon:</h3>
                <p>+381 18 123-4567<br>+381 64 123-4567</p>
            </div>
            
            <div class="info-item">
                <h3>✉️ Email:</h3>
                <p>info@aftermarket.rs<br>support@aftermarket.rs</p>
            </div>
            
            <div class="info-item">
                <h3>🕐 Radno vreme:</h3>
                <p>Ponedeljak - Petak: 08:00 - 18:00<br>
                   Subota: 09:00 - 14:00<br>
                   Nedelja: Zatvoreno</p>
            </div>
            
            <div class="info-item">
                <h3>🌐 Društvene mreže:</h3>
                <div class="social-links">
                    <a href="#" class="social-btn">Facebook</a>
                    <a href="#" class="social-btn">Instagram</a>
                    <a href="#" class="social-btn">YouTube</a>
                </div>
            </div>
            
            <div class="info-item faq">
                <h3>❓ Često postavljana pitanja:</h3>
                <ul>
                    <li><strong>Kolika je dostava?</strong> Besplatna dostava za porudžbine preko 5000€</li>
                    <li><strong>Koliko traje dostava?</strong> Obično 2-3 radna dana</li>
                    <li><strong>Mogu li vratiti proizvod?</strong> Da, u roku od 14 dana</li>
                    <li><strong>Prinimate li ostale načine plaćanja?</strong> Naravno - transfer, gotovina, kartice</li>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>