<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>

<header>
    <div class="header-container">
        <a href="index.php">
            <img src="image/BMW.png" alt="BMW Logo" class="logo">
        </a>
        <nav>
            <ul>
                <li><a href="index.php" class="<?php echo ($current_page == 'index') ? 'active' : ''; ?>">Accueil</a></li>
                <li><a href="donnees.php" class="<?php echo ($current_page == 'donnees') ? 'active' : ''; ?>">Données</a></li>
                <li><a href="galerie.php" class="<?php echo ($current_page == 'galerie') ? 'active' : ''; ?>">Galerie</a></li>
                <li><a href="contact.php" class="<?php echo ($current_page == 'contact') ? 'active' : ''; ?>">Contact</a></li>
                <li><a href="partenaires.php" class="<?php echo ($current_page == 'partenaires') ? 'active' : ''; ?>">Partenaires</a></li>
            </ul>
        </nav>
    </div>
</header>