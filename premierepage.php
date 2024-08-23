<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Demande de Retrait</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFDDC1; /* Couleur de fond attrayante */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        div {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            width: 100%;
        }

        input[type="file"] {
            padding: 10px 0;
        }

        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
    <script>
        function validateFileSize(input) {
            const file = input.files[0];
            if (file.size > 2097152) { // Taille maximale de 2 Mo (2097152 octets)
                alert("La taille du fichier ne doit pas dépasser 2 Mo.");
                input.value = ''; // Réinitialiser le champ de fichier
            }
        }

        function validateForm(event) {
            const quittance = document.getElementById('quittance');
            const photo = document.getElementById('photo_identite');
            
            if (quittance.files.length === 0 || photo.files.length === 0) {
                alert("Veuillez télécharger les fichiers requis.");
                event.preventDefault();
                return;
            }

            if (quittance.files[0].size > 2097152) {
                alert("La taille du fichier de la quittance ne doit pas dépasser 2 Mo.");
                event.preventDefault();
            }

            if (photo.files[0].size > 2097152) {
                alert("La taille du fichier de la photo d'identité ne doit pas dépasser 2 Mo.");
                event.preventDefault();
            }
        }
    </script>
</head>
<body>
    <h1>Formulaire de Demande de Retrait d'Attestation et de Diplôme</h1>
    <form action="Commandes.php" method="post" enctype="multipart/form-data" onsubmit="validateForm(event)">
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="Nom" required>
        </div>
        <div>
            <label for="prenoms">Prénoms :</label>
            <input type="text" id="prenoms" name="Prenoms" required>
        </div>
        <div>
            <label for="numero_matricule">Numéro Matricule :</label>
            <input type="text" id="numero_matricule" name="Numero_matricule" required>
        </div>
        <div>
            <label for="filiere">Filière :</label>
            <input type="text" id="filiere" name="Filière" required>
        </div>
        <div>
            <label for="contact">Contact :</label>
            <input type="text" id="contact" name="Contact" required>
        </div>
        <div>
            <label for="quittance">Quittance :</label>
            <input type="file" id="quittance" name="Quittance" required onchange="validateFileSize(this)">
        </div>
        <div>
            <label for="photo_identite">Photo d'Identité :</label>
            <input type="file" id="photo_identite" name="Photo_identite" required onchange="validateFileSize(this)">
        </div>
        <div>
            <label for="email">Email :</label>
            <input type="email" id="email" name="Email" required>
        </div>
        <div>
            <label for="motif">Motif :</label>
            <textarea id="motif" name="Motif" required></textarea>
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="date" id="date" name="Date" required>
        </div>
        <div>
            <button type="submit">Soumettre</button>
        </div>
    </form>
</body>
</html>
