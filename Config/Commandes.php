<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "étudiant";
    $password = "luc";
    $dbname = "les inscriptions";

    try {
        // Connexion à la base de données MySQL avec PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        // Définir le mode d'erreur PDO à l'exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer la requête d'insertion SQL
        $stmt = $conn->prepare("INSERT INTO inscrits (Nom, Prénoms, Numero_matricule, Filière, Contact, Email, Motif) 
                               VALUES (:Nom, :Prénoms, :Numero matricule, :Filière, :Contact, :Email, :Motif,)");

        // Récupérer les noms des fichiers téléchargés
        $quittance_file = $_FILES['quittance']['name'];
        $photo_file = $_FILES['photo_identite']['name'];

        // Déplacer les fichiers téléchargés vers un dossier sur le serveur
        $target_dir = "uploads/";
        move_uploaded_file($_FILES["quittance"]["tmp_name"], $target_dir . $quittance_file);
        move_uploaded_file($_FILES["photo_identite"]["tmp_name"], $target_dir . $photo_file);

        // Liaison des paramètres de la requête avec les valeurs du formulaire
        $stmt->bindParam(':Nom', $_POST['Nom']);
        $stmt->bindParam(':Prénoms', $_POST['Prénoms']);
        $stmt->bindParam(':Numero_matricule', $_POST['Numero_matricule']);
        $stmt->bindParam(':Filière', $_POST['Filière']);
        $stmt->bindParam(':Contact', $_POST['Contact']);
        $stmt->bindParam(':Quittance', $quittance_file);
        $stmt->bindParam(':Photo_identite', $photo_file);
        $stmt->bindParam(':Email', $_POST['Email']);
        $stmt->bindParam(':Motif', $_POST['Motif']);
        $stmt->bindParam(':Date_demande', $_POST['Date']);

        // Exécution de la requête
        $stmt->execute();

        // Affichage d'un message de succès
        echo "Formulaire soumis avec succès. Merci !";

    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    // Fermeture de la connexion
    $conn = null;
} else {  
    // Redirection vers une autre page si le formulaire n'est pas soumis
    header("Location: premierepage.php");
    exit();
}
?>
