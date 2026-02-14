<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - BMW</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="header-container">
            <a href="index.php">
                <img src="image/BMW.png" alt="BMW Logo" class="logo">
            </a>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="donnees.php">Données</a></li>
                    <li><a href="galerie.php">Galerie</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="partenaires.php">Partenaires</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="contact-container">
        <div class="contact-header">
            <h1>Contactez-nous</h1>
            <p>Vous avez une question ? N'hésitez pas à nous contacter.</p>
        </div>

        <div class="contact-form-wrapper">
            <form action="" method="post">
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

                <label for="message">MESSAGE</label>
                <textarea name="message" id="message" placeholder="Votre message"></textarea>

                <input type="submit" value="Envoyer" />
            </form>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <p>© MMI Troyes</p>
            <p>Un site créé par Meriç KÖKEN</p>
            <h5>BMW</h5>
            <p>Performance. Passion. Perfection.</p>
        </div>
    </footer>
</body>
</html>
