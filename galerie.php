<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie - BMW</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<?php
// Appel du bloc Header et du Menu
require('header.php');
?>

<div class="container">
    <div class="gallery-header">
        <h1>Galerie BMW</h1>
        <p>Découvrez notre collection exceptionnelle de véhicules BMW</p>
    </div>

    <!-- Formulaire d'upload d'images -->
    <div class="upload-section">
        <h2>Ajouter une image à la galerie</h2>
        <form action="traitements/upload_image.php" method="post" enctype="multipart/form-data" class="upload-form">
            <label for="image">Choisir un fichier (JPG, max 200Ko)</label>
            <input type="file" name="image" id="image" accept="image/jpeg" />
            <input type="submit" value="Télécharger" />
        </form>
        
        <?php
        // Affichage des messages de retour pour l'upload
        session_start();
        if (isset($_SESSION['upload_info'])) {
            // Détection du type de message : succès si contient ✅ OU "succès" OU "terminé"
            $est_succes = (strpos($_SESSION['upload_info'], '✅') !== false) || 
                          (stripos($_SESSION['upload_info'], 'succès') !== false) || 
                          (stripos($_SESSION['upload_info'], 'terminé') !== false);
            
            $message_classe = $est_succes ? 'success' : 'error';
            
            echo '<div class="message-retour ' . $message_classe . '">';
            echo '<p>' . $_SESSION['upload_info'] . '</p>';
            echo '</div>';
            session_unset();
        }
        ?>
    </div>

    <!-- Filtres de catégories -->
    <div class="gallery-filters">
        <button class="filter-btn active" data-filter="all">Tous</button>
        <button class="filter-btn" data-filter="serie-m">Série M</button>
        <button class="filter-btn" data-filter="electrique">Électrique</button>
        <button class="filter-btn" data-filter="suv">SUV</button>
        <button class="filter-btn" data-filter="classique">Classiques</button>
    </div>

    <!-- Grille de galerie -->
    <div class="gallery-grid">
        <?php
        // Tableau des véhicules de la galerie
        $galerie = [
            // Série M
            [
                'image' => 'image/m3.jpg',
                'titre' => 'M3 Competition',
                'description' => 'Le summum de la performance sportive',
                'categorie' => 'serie-m'
            ],
            [
                'image' => 'image/m4.jpg',
                'titre' => 'M4 Coupé',
                'description' => 'Élégance et puissance réunies',
                'categorie' => 'serie-m'
            ],
            [
                'image' => 'image/m5.jpg',
                'titre' => 'M5 CS',
                'description' => 'La berline sportive ultime',
                'categorie' => 'serie-m'
            ],
            [
                'image' => 'image/m8.jpg',
                'titre' => 'M8 Gran Coupé',
                'description' => 'Performance et luxe absolu',
                'categorie' => 'serie-m'
            ],
            
            // Électrique
            [
                'image' => 'image/ix.jpg',
                'titre' => 'iX xDrive50',
                'description' => 'L\'avenir de la mobilité électrique',
                'categorie' => 'electrique'
            ],
            [
                'image' => 'image/i4.jpg',
                'titre' => 'i4 M50',
                'description' => 'Performance électrique sportive',
                'categorie' => 'electrique'
            ],
            [
                'image' => 'image/i7.jpg',
                'titre' => 'i7 xDrive60',
                'description' => 'Luxe électrique redéfini',
                'categorie' => 'electrique'
            ],
            [
                'image' => 'image/i5.jpg',
                'titre' => 'i5 eDrive40',
                'description' => 'Berline électrique innovante',
                'categorie' => 'electrique'
            ],
            
            // SUV
            [
                'image' => 'image/x5.jpg',
                'titre' => 'X5 M Competition',
                'description' => 'Le SUV sportif par excellence',
                'categorie' => 'suv'
            ],
            [
                'image' => 'image/x7.jpg',
                'titre' => 'X7 M60i',
                'description' => 'Luxe et espace supérieur',
                'categorie' => 'suv'
            ],
            [
                'image' => 'image/x3.jpg',
                'titre' => 'X3 M40i',
                'description' => 'Polyvalence sportive',
                'categorie' => 'suv'
            ],
            [
                'image' => 'image/x6.jpg',
                'titre' => 'X6 M50i',
                'description' => 'Le SAC sportif iconique',
                'categorie' => 'suv'
            ],
            
            // Classiques
            [
                'image' => 'image/classic-m1.jpg',
                'titre' => 'M1 (1978)',
                'description' => 'La légende des supercars',
                'categorie' => 'classique'
            ],
            [
                'image' => 'image/classic-e30.jpg',
                'titre' => 'E30 M3 (1986)',
                'description' => 'L\'icône des années 80',
                'categorie' => 'classique'
            ],
            [
                'image' => 'image/classic-507.jpg',
                'titre' => '507 Roadster (1956)',
                'description' => 'Élégance intemporelle',
                'categorie' => 'classique'
            ],
            [
                'image' => 'image/classic-2002.jpg',
                'titre' => '2002 Turbo (1973)',
                'description' => 'Le précurseur des sportives',
                'categorie' => 'classique'
            ]
        ];

        foreach ($galerie as $vehicule) {
            echo '<div class="gallery-item" data-category="' . $vehicule['categorie'] . '">' . "\n";
            echo '    <img src="' . $vehicule['image'] . '" alt="' . $vehicule['titre'] . '">' . "\n";
            echo '    <div class="gallery-overlay">' . "\n";
            echo '        <h3>' . $vehicule['titre'] . '</h3>' . "\n";
            echo '        <p>' . $vehicule['description'] . '</p>' . "\n";
            echo '    </div>' . "\n";
            echo '</div>' . "\n";
        }
        
        if (is_dir('image/galerie')) {
    $images_galerie = scandir('image/galerie');
    foreach ($images_galerie as $img) {
        if ($img != '.' && $img != '..' && preg_match('/\.(jpg|jpeg)$/i', $img)) {
            echo '<div class="gallery-item" data-category="all">' . "\n";
            echo '    <img src="image/galerie/' . $img . '" alt="Image uploadée">' . "\n";
            echo '    <div class="gallery-overlay">' . "\n";
            echo '        <h3>' . basename($img, '.jpg') . '</h3>' . "\n";
            echo '        <p>Image uploadée</p>' . "\n";
            echo '    </div>' . "\n";
            echo '</div>' . "\n";
        }
    }
}
        ?>
    </div>
</div>

<script src="js/gallery.js"></script>

<?php
// Appel du Pied de Page
require('footer.php');
?>

</body>
</html>