<!DOCTYPE html>
<!-- Déclare que ce document utilise HTML5 (obligatoire en premier) -->

<html lang="fr">
<!-- Balise racine HTML, lang="fr" indique que la page est en français -->

<head>
    <!-- Section tête : contient les métadonnées et ressources -->
    
    <meta charset="UTF-8">
    <!-- Définit l'encodage des caractères UTF-8 (accents français OK) -->
    
    <title>Projet 1 - DataTables Basique</title>
    <!-- Titre affiché dans l'onglet du navigateur -->
    
    <!-- Inclure les styles CSS de DataTables depuis CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.6/css/dataTables.dataTables.css">
    <!-- Charge le fichier CSS qui rend DataTables joli (tri, recherche, pagination) -->
</head>

<body>
    <!-- Corps de la page, contenu visible -->
    
    <!-- Table HTML avec ID unique "usersTable" et classe "display" requise par DataTables -->
    <!-- table = élément de base pour afficher des données tabulaires (lignes et colonnes) -->
     <!-- ID "usersTable" : permet de cibler cette table précisément en JavaScript -->
     <!-- Classe "display" : style de base fourni par DataTables pour une belle présentation -->
      
    <table id="usersTable" class="display">
        
        <!-- En-tête du tableau : définit les colonnes -->
        <thead>
            <tr>
                <th>Nom</th>        <!-- Colonne 1 : Nom utilisateur -->
                <th>Email</th>      <!-- Colonne 2 : Adresse email -->
                <th>Âge</th>        <!-- Colonne 3 : Âge en années -->
                <th>Salaire</th>    <!-- Colonne 4 : Salaire mensuel -->
            </tr>
        </thead>
        
        <!-- Corps du tableau : les données (remplies par PHP) -->
        <tbody>
            <?php
            // Tableau PHP contenant les données de test (simule une DB)
            $users = [
                ['John Doe', 'john@example.com', 28, 3500.00],
                ['Jane Smith', 'jane@example.com', 34, 4200.00],
                ['Bob Johnson', 'bob@example.com', 42, 5200.00],
                ['Alice Martin', 'alice@example.com', 29, 3800.00],
                ['Charlie Brown', 'charlie@example.com', 37, 4500.00],
                ['Diana Prince', 'diana@example.com', 31, 4800.00],
                ['Eve Wilson', 'eve@example.com', 26, 3200.00],
                ['Frank Miller', 'frank@example.com', 45, 6100.00],
                ['Grace Lee', 'grace@example.com', 33, 4100.00],
                ['Henry Davis', 'henry@example.com', 39, 4900.00]
                // 10 lignes de données tests (DataTables gère parfaitement 10-100 lignes)
            ];
            
            // Boucle qui génère une ligne HTML <tr> pour chaque utilisateur
            foreach ($users as $user) {
                echo "<tr>";
                echo "    <td>{$user[0]}</td>";      // $user[0] = nom
                echo "    <td>{$user[1]}</td>";      // $user[1] = email  
                echo "    <td>{$user[2]}</td>";      // $user[2] = âge
                echo "    <td>€" . number_format($user[3], 2) . "</td>"; // $user[3] = salaire formaté
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Scripts JavaScript (chargés après le HTML pour meilleures performances) -->
    
    <!-- 1. jQuery (librairie obligatoire pour DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- jQuery permet de sélectionner facilement les éléments HTML (#usersTable) -->
    
    <!-- 2. Bibliothèque principale DataTables -->
    <script src="https://cdn.datatables.net/2.1.6/js/dataTables.js"></script>
    <!-- Contient toute la magie : tri, recherche, pagination, responsive -->
    
    <!-- 3. Initialisation de DataTables sur notre table -->
    <script>
    $(document).ready(function(){
        // Attend que la page soit complètement chargée
        // $(document).ready() = équivalent "window.onload"
        
        $('#usersTable').DataTable();
        // Sélectionne la table par son ID et l'active en DataTable
        // Par défaut : ajoute recherche, tri sur chaque colonne, pagination
    });
    </script>
</body>
</html>