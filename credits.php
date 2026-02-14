<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédits - BMW</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<?php
// Appel du bloc Header et du Menu
require('header.php');

// Tableau des images avec leurs informations
$images = [
    // Images principales
    'principales' => [
        ['fichier' => 'BMW.png', 'nom' => 'Logo BMW', 'credit' => 'BMW AG - Marque déposée', 'type' => 'image'],
        ['fichier' => 'hero_bmw.mp4', 'nom' => 'BMW Hero Background', 'credit' => 'Vidéo trouvée sur leur site', 'type' => 'video']
    ],
    // Série M
    'serie_m' => [
        ['fichier' => 'm3.jpg', 'nom' => 'BMW M3 Competition', 'credit' =>  "Photo : Spurzem - <a href='https://commons.wikimedia.org/wiki/File:BMW_M3_Competition_(G80)_Auto_Zuerich_2021_IMG_0043.jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image'],
        ['fichier' => 'm4.jpg', 'nom' => 'BMW M4 Coupé', 'credit' => "Photo : Alexander Migl - <a href='https://commons.wikimedia.org/wiki/File:BMW_M4_Competition_Coupé_G82_(51341348473)_(cropped).jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image'],
        ['fichier' => 'm5.jpg', 'nom' => 'BMW M5 CS', 'credit' => "Photo : Kevauto - <a href='https://commons.wikimedia.org/wiki/File:BMW_F90_M5_CS_Frozen_Deep_Green_Metallic_(4).jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image'],
        ['fichier' => 'm8.jpg', 'nom' => 'BMW M8 Gran Coupé', 'credit' => "Photo : Hatsukari715 - <a href='https://commons.wikimedia.org/wiki/File:BMW_M8_Gran_Coupe,_front.jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image']
    ],
    // Électrique
    'electrique' => [
        ['fichier' => 'ix.jpg', 'nom' => 'BMW iX xDrive50', 'credit' => "Photo : Vauxford - <a href='https://commons.wikimedia.org/wiki/File:2021_BMW_iX_xDrive_50_Sport.jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image'],
        ['fichier' => 'i4.jpg', 'nom' => 'BMW i4 M50', 'credit' => "Photo : Kevauto - <a href='https://commons.wikimedia.org/wiki/File:BMW_G26E_i4_M50_Gran_Coupe_Alpine_White_(2).jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image'],
        ['fichier' => 'i5.jpg', 'nom' => 'BMW i5 eDrive40', 'credit' => "Photo : Kevauto - <a href='https://commons.wikimedia.org/wiki/File:2023_BMW_i5.jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image'],
        ['fichier' => 'i7.jpg', 'nom' => 'BMW i7 xDrive60', 'credit' => "Photo : Alexander Migl - <a href='https://commons.wikimedia.org/wiki/File:BMW_i7_xDrive60_1X7A6822.jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image']
    ],
    // SUV
    'suv' => [
        ['fichier' => 'x3.jpg', 'nom' => 'BMW X3 M40i', 'credit' => "Photo : IFCAR - <a href='https://commons.wikimedia.org/wiki/File:2018_BMW_X3_(G01)_M40i_front_4.19.18.jpg' target='_blank'>Wikimedia Commons</a> (Domaine public)", 'type' => 'image'],
        ['fichier' => 'x5.jpg', 'nom' => 'BMW X5 M Competition', 'credit' => "Photo : Alexander Migl - <a href='https://commons.wikimedia.org/wiki/File:Paris_Motor_Show_2018,_Paris_(1Y7A2044).jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image'],
        ['fichier' => 'x6.jpg', 'nom' => 'BMW X6 M50i', 'credit' => "Photo : Vauxford - <a href='https://commons.wikimedia.org/wiki/File:2021_BMW_X6_M50i_Auto_1.jpg' target='_blank'>Wikimedia Commons</a> (CC BY-SA 4.0)", 'type' => 'image'],
        ['fichier' => 'x7.jpg', 'nom' => 'BMW X7 M60i', 'credit' => "Photo : <a href='https://wallpapercat.com/bmw-x7-wallpapers' target='_blank'>WallpaperCat</a>", 'type' => 'image']
    ],
    // Classiques
    'classiques' => [
       ['fichier' => 'classic-m1.jpg', 'nom' => 'BMW M1 (1978)', 'credit' => "Photo : Clemens Vasters<br>Source : <a href='https://www.flickr.com/photos/clemensv/52576610043' target='_blank'>Flickr</a>", 'type' => 'image'],
        ['fichier' => 'classic-e30.jpg', 'nom' => 'BMW E30 M3 (1986)', 'credit' => "Photo : Bring a Trailer - <a href='https://commons.wikimedia.org/wiki/File:Extremely_Limited_1986_BMW_Gemballa_E30_%2853518858587%29.jpg' target='_blank'>Wikimedia Commons</a> (CC BY 2.0)", 'type' => 'image'],
        ['fichier' => 'classic-507.jpg', 'nom' => 'BMW 507 Roadster (1956)', 'credit' => "Photo : Valder137 - <a href='https://commons.wikimedia.org/wiki/File:1958_BMW_507_3.3_Front.jpg' target='_blank'>Wikimedia Commons</a> (CC BY 2.0)", 'type' => 'image'],
        ['fichier' => 'classic-2002.jpg', 'nom' => 'BMW 2002 Turbo (1973)', 'credit' => "Photo : Sicnag - <a href='https://commons.wikimedia.org/wiki/File:1974_BMW_2002_turbo.jpg' target='_blank'>Wikimedia Commons</a> (CC BY 2.0)", 'type' => 'image']
    ]
];

$titres_categories = [
    'principales' => 'Images Principales',
    'serie_m' => 'Série M',
    'electrique' => 'Véhicules Électriques',
    'suv' => 'SUV',
    'classiques' => 'Véhicules Classiques'
];
?>

<div class="container">
    <div class="credits-header">
        <h1>Crédits</h1>
        <p>Toutes les images utilisées sur ce site avec leurs crédits</p>
    </div>

    <?php foreach ($images as $categorie => $liste_images): ?>
        <div class="credits-category">
            <h2><?php echo $titres_categories[$categorie]; ?></h2>
            <div class="credits-grid">
                <?php foreach ($liste_images as $image): ?>
                    <div class="credit-item">
                        <?php if (isset($image['type']) && $image['type'] === 'video'): ?>
                            <video autoplay muted loop playsinline style="width: 100%; height: 200px; object-fit: cover;">
                                <source src="image/<?php echo $image['fichier']; ?>" type="video/mp4">
                            </video>
                        <?php else: ?>
                            <img src="image/<?php echo $image['fichier']; ?>" alt="<?php echo $image['nom']; ?>">
                        <?php endif; ?>
                        <div class="credit-info">
                            <h3><?php echo $image['nom']; ?></h3>
                            <p><?php echo $image['credit']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="credits-note">
        <p><strong>Note :</strong> Toutes les images utilisées sur ce site sont libres de droits ou sous licence Creative Commons.</p>
        <p>Les marques BMW et leur logo sont des marques déposées de BMW AG.</p>
        <p><strong>Total :</strong> 18 images et 1 vidéo utilisées sur ce site.</p>
    </div>
</div>

<?php
// Appel du Pied de Page
require('footer.php');
?>

</body>
</html>