<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - BMW</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<?php
require('header.php');
?>

<div class="contact-container">
    <div class="contact-header">
        <h1>Contactez-nous</h1>
        <p>Vous avez une question ? N'hésitez pas à nous contacter.</p>
    </div>

    <?php
    if (isset($_SESSION['information'])) {
        $message_classe = (strpos($_SESSION['information'], '✅') !== false) ? 'success' : 'error';
        echo '<div class="message-retour ' . $message_classe . '">' . "\n";
        echo '    <p>' . $_SESSION['information'] . '</p>' . "\n";
        echo '</div>' . "\n";
        session_unset();
    }
    ?>

    <div class="contact-form-wrapper">
        <form action="traitements/envoi_mail.php" method="post">
            <div id="en-tete">
                <div>
                    <label for="prenom">PRÉNOM <span>*</span></label>
                    <input type="text" name="prenom" id="prenom" required />
                </div>
                <div>
                    <label for="nom">NOM <span>*</span></label>
                    <input type="text" name="nom" id="nom" required />
                </div>
            </div>

            <label for="email">E-MAIL <span>*</span></label>
            <input type="email" name="email" id="email" placeholder="nom@domaine.fr" required />

            <fieldset class="type-demande">
                <legend>PRÉCISER VOTRE DEMANDE <span>*</span></legend>
                <div class="radio-group">
                    <label class="radio-label">
                        <input type="radio" name="type_demande" value="information" required />
                        <span>Information</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="type_demande" value="devis" required />
                        <span>Demande de devis</span>
                    </label>
                    <label class="radio-label">
                        <input type="radio" name="type_demande" value="reclamation" required />
                        <span>Réclamation</span>
                    </label>
                </div>
            </fieldset>

            <label for="message">MESSAGE</label>
            <textarea name="message" id="message" placeholder="Votre message"></textarea>

            <input type="submit" value="Envoyer" />
        </form>
    </div>
</div>

<?php
require('footer.php');
?>

</body>
</html>