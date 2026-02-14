<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMW - Catalogue</title>
    <link rel="stylesheet" href="css/styles.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

</head>
<body>
    <?php require('header.php'); ?>
    
    <main>
        <div class="container">
            <div class="banner">
                <h1>Données BMW</h1>
                <p>Découvrez tous nos modèles</p>
            </div>

            <div class="content-section">
                <h2>Liste des modèles BMW</h2>
                
                <?php
                $fichier = 'datas/bmw.json';

                if (!file_exists($fichier)) {
                    echo '<p style="color: red;">Erreur : Le fichier '.$fichier.' est introuvable.</p>';
                    exit;
                }

                $tabBMWJSON = file_get_contents($fichier);

                if ($tabBMWJSON === false) {
                    echo '<p style="color: red;">Erreur : Impossible de lire le fichier '.$fichier.'</p>';
                    exit;
                }

                $tabBMWPHP = json_decode($tabBMWJSON, true);

                if ($tabBMWPHP === null) {
                    echo '<p style="color: red;">Erreur : Le fichier JSON est invalide.</p>';
                    echo '<p>Erreur JSON : '.json_last_error_msg().'</p>';
                    exit;
                }

                if (empty($tabBMWPHP)) {
                    echo '<p style="color: red;">Le fichier JSON est vide.</p>';
                    exit;
                }
                ?>

                <table id="tableBMW" class="display">
                    <thead>
                        <tr>
                            <th>Modèle</th>
                            <th>Année</th>
                            <th>Catégorie</th>
                            <th>Moteur</th>
                            <th>Puissance (ch)</th>
                            <th>Prix (€)</th>
                            <th>Carburant</th>
                            <th>Pays</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tabBMWPHP as $bmw) {
                            echo '<tr>'."\n";
                            echo '    <td>'.$bmw['modele'].'</td>'."\n";
                            echo '    <td>'.$bmw['annee'].'</td>'."\n";
                            echo '    <td>'.$bmw['categorie'].'</td>'."\n";
                            echo '    <td>'.$bmw['moteur'].'</td>'."\n";
                            echo '    <td>'.$bmw['puissance'].'</td>'."\n";
                            echo '    <td>'.number_format($bmw['prix'], 0, ',', ' ').'</td>'."\n";
                            echo '    <td>'.$bmw['carburant'].'</td>'."\n";
                            echo '    <td>'.$bmw['pays'].'</td>'."\n";
                            echo '</tr>'."\n";
                        }
                        ?>
                    </tbody>
                </table>

                <p style="margin-top: 2rem; color: #0066b1;">
                    <strong>Nombre total de modèles : <?php echo count($tabBMWPHP); ?></strong>
                </p>
            </div>
        </div>
    </main>

    <?php require('footer.php'); ?>
    
    <script>
        $(document).ready(function() {
            $('#tableBMW').DataTable({
                "language": {
                    "lengthMenu": "Afficher _MENU_ modèles par page",
                    "zeroRecords": "Aucun modèle trouvé",
                    "info": "Page _PAGE_ sur _PAGES_",
                    "infoEmpty": "Aucun modèle disponible",
                    "infoFiltered": "(filtré sur _MAX_ modèles au total)",
                    "search": "Rechercher :",
                    "paginate": {
                        "first": "Premier",
                        "last": "Dernier",
                        "next": "Suivant",
                        "previous": "Précédent"
                    },
                        "buttons": {
                        "print": "Imprimer"
                    }
                },
                "pageLength": 10,
                "order": [[0, 'asc']],
                "dom": 'Bfrtip',
                "buttons": [
                    {
                        extend: 'print',
                        text: 'Imprimer',
                        title: 'Catalogue BMW - Liste des modèles',
                        messageTop: 'Liste complète des modèles BMW'
                    }
                ]

            });
        });
    </script>
</body>
</html>