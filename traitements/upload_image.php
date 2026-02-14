<?php
session_start();
$_SESSION['upload_info'] = '';

// Vérification de sélection d'un fichier
if (empty($_FILES)) {
    $_SESSION['upload_info'] = '!!!! Vous devez sélectionner un fichier';
    header('location: ../galerie.php');
    exit();
}

// Récupération des attributs du fichier (nom, type, taille)
$image_nom = $_FILES['image']['name'];
$image_type = $_FILES['image']['type'];
$image_taille = $_FILES['image']['size'];
$image_temporaire = $_FILES['image']['tmp_name'];
$image_error = $_FILES['image']['error'];

// Début Vérification de la conformité 
$affichage_erreurs = '';
$erreurs = 0;

// Test si pas d'erreur de sélection
if ($image_error == 0) {
    
    // Test format du fichier en fonction de l'extension
    if ($image_type != 'image/jpeg') {
        $affichage_erreurs .= 'Le fichier n\'est pas au format JPEG ou extension invalide<br>';
        $erreurs++;
    }
    
    // Test format du fichier avec la fonction exif_imagetype
    if (exif_imagetype($image_temporaire) != IMAGETYPE_JPEG) {
        $affichage_erreurs .= 'Ce fichier n\'est pas une image JPEG<br>';
        $erreurs++;
    }
    
    // Test de la taille du fichier (200 Ko maximum = 200 * 1024 octets)
    if ($image_taille > 200 * 1024) {
        $affichage_erreurs .= 'Le fichier est trop volumineux (maximum 200 Ko)<br>';
        $erreurs++;
    }
    
} else {
    $affichage_erreurs = '❌ Impossible de télécharger le fichier, erreur de sélection<br>';
    $erreurs++;
}

// Si aucune erreur, on procède au téléchargement
if ($erreurs == 0) {
    
    // On récupère le nombre de fichiers dans image/galerie
    $nbFichiers = -2; // Le dossier contient deux fichiers cachés . et ..
    $dossier = opendir("../image/galerie");
    while ($fichier = readdir($dossier)) {
        $nbFichiers++;
    }
    closedir($dossier);
    
    // On renomme le fichier - imageN.jpg
    $image_num = $nbFichiers + 1;
    $image_nom = 'image' . $image_num . '.jpg';
    
    // On fixe le nom complet de la destination (chemin relatif/imageN.jpg)
    $destination = "../image/galerie/" . $image_nom;
    
    // On déplace le fichier dans son emplacement définitif
    if (move_uploaded_file($image_temporaire, $destination)) {
        $_SESSION['upload_info'] = 'Téléchargement terminé avec succès ! Image : ' . $image_nom;
    } else {
        $_SESSION['upload_info'] = 'Erreur lors du téléchargement du fichier';
    }
    
} else {
    $_SESSION['upload_info'] = '❌ ' . $affichage_erreurs;
}

// Redirection vers la galerie
header('location: ../galerie.php');
exit();
?>
