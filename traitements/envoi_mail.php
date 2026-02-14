<?php
session_start();
$_SESSION['information'] = '';

if (count($_POST) == 0) {
    header('location: ../contact.php');
    exit();
}

$affichage_retour = '';
$erreurs = 0;

if (!empty($_POST['prenom'])) {
    $prenom = $_POST['prenom'];
} else {
    $affichage_retour .= 'Le champ PRÉNOM est obligatoire<br>';
    $erreurs++;
}

if (!empty($_POST['nom'])) {
    $nom = $_POST['nom'];
} else {
    $affichage_retour .= 'Le champ NOM est obligatoire<br>';
    $erreurs++;
}

if (!empty($_POST['email'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    } else {
        $affichage_retour .= 'Adresse mail incorrecte<br>';
        $erreurs++;
    }
} else {
    $affichage_retour .= 'Le champ EMAIL est obligatoire<br>';
    $erreurs++;
}

if (!empty($_POST['type_demande'])) {
    $type_demande = $_POST['type_demande'];
} else {
    $affichage_retour .= 'Le type de demande est obligatoire<br>';
    $erreurs++;
}

$message = isset($_POST['message']) ? $_POST['message'] : '';

if ($erreurs == 0) {
    
    $prenom = mb_strtolower($prenom);
    $prenom = ucfirst($prenom);
    
    $nom = mb_strtolower($nom);
    $nom = ucfirst($nom);
    
    switch($type_demande) {
        case 'information':
            $message_confirmation_user = 'Votre demande d\'information a bien été prise en compte';
            $type_demande_libelle = 'Information';
            break;
        case 'devis':
            $message_confirmation_user = 'Votre demande de devis a été transmise';
            $type_demande_libelle = 'Demande de devis';
            break;
        case 'reclamation':
            $message_confirmation_user = 'Votre réclamation sera traitée dans les meilleurs délais';
            $type_demande_libelle = 'Réclamation';
            break;
        default:
            $message_confirmation_user = 'Votre demande a bien été prise en compte';
            $type_demande_libelle = 'Demande';
    }
    
    $subject = 'SAE105 : ' . $type_demande_libelle . ' de ' . $prenom . ' ' . $nom;
    
    $message_html = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
            .container { max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 10px; }
            .header { background: linear-gradient(135deg, #0066b1, #0052a3); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
            .content { padding: 20px; }
            .info-row { margin: 15px 0; padding: 10px; background: #f9f9f9; border-left: 4px solid #0066b1; }
            .label { font-weight: bold; color: #0066b1; }
            .footer { text-align: center; color: #666; font-size: 12px; margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>Nouvelle demande de contact</h1>
            </div>
            <div class="content">
                <div class="info-row">
                    <span class="label">Type de demande :</span> ' . $type_demande_libelle . '
                </div>
                <div class="info-row">
                    <span class="label">Nom :</span> ' . $nom . '
                </div>
                <div class="info-row">
                    <span class="label">Prénom :</span> ' . $prenom . '
                </div>
                <div class="info-row">
                    <span class="label">Email :</span> ' . $email . '
                </div>
                <div class="info-row">
                    <span class="label">Message :</span><br><br>
                    ' . nl2br(htmlspecialchars($message)) . '
                </div>
            </div>
            <div class="footer">
                <p>Ce message a été envoyé depuis le formulaire de contact du site SAE105</p>
            </div>
        </div>
    </body>
    </html>
    ';
    
    $headers = array();
    $headers['From'] = $email;
    $headers['Reply-to'] = $email;
    $headers['X-Mailer'] = 'PHP/' . phpversion();
    $headers['MIME-Version'] = '1.0';
    $headers['Content-type'] = 'text/html; charset=utf-8';
    
    $email_dest = "mmi25b11@mmi-troyes.fr";
    
    if (mail($email_dest, $subject, $message_html, $headers)) {
    } else {
        $erreurs++;
    }
    
    $subject_confirmation = 'Confirmation de votre demande sur SAE105';
    
    $message_confirmation = '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
            .container { max-width: 600px; margin: 0 auto; background: #ffffff; padding: 30px; border-radius: 10px; }
            .header { background: linear-gradient(135deg, #0066b1, #0052a3); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
            .content { padding: 20px; line-height: 1.6; }
            .highlight { background: #e8f4ff; padding: 15px; border-left: 4px solid #0066b1; margin: 20px 0; }
            .footer { text-align: center; color: #666; font-size: 12px; margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd; }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>BMW - Confirmation</h1>
            </div>
            <div class="content">
                <p>Bonjour <strong>' . $prenom . ' ' . $nom . '</strong>,</p>
                
                <div class="highlight">
                    <strong>' . $message_confirmation_user . '</strong>
                </div>
                
                <p>Nous avons bien reçu votre ' . strtolower($type_demande_libelle) . ' et nous vous répondrons dans les plus brefs délais.</p>
                
                <p>Cordialement,<br><strong>L\'équipe BMW</strong></p>
            </div>
            <div class="footer">
                <p>© MMI Troyes - SAE105</p>
                <p>Performance. Passion. Perfection.</p>
            </div>
        </div>
    </body>
    </html>
    ';
    
    $headers_confirmation = array();
    $headers_confirmation['From'] = 'mmi25b11@mmi-troyes.fr';
    $headers_confirmation['Reply-to'] = 'no-reply@mmi-troyes.fr';
    $headers_confirmation['X-Mailer'] = 'PHP/' . phpversion();
    $headers_confirmation['MIME-Version'] = '1.0';
    $headers_confirmation['Content-type'] = 'text/html; charset=utf-8';
    
    if (mail($email, $subject_confirmation, $message_confirmation, $headers_confirmation)) {
    } else {
        $erreurs++;
    }
    
    if ($erreurs == 0) {
        $affichage_retour = '✅ ' . $message_confirmation_user . ' Nous vous répondrons dans les plus brefs délais.';
    } else {
        $affichage_retour = '❌ Échec de l\'envoi du message. Veuillez réessayer ultérieurement.';
    }
}

$_SESSION['information'] = $affichage_retour;
header('location: ../contact.php');
exit();
?>
