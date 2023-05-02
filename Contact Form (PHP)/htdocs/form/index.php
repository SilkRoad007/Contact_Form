<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/index.css">
    <title>Formulaire</title>
</head>
<body>
    <section class="section-contact">
        <form method="POST" action="submit_form.php">
            <div class="name-surname">
                <div>
                    <label for="name">nom</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="surname">prénom</label>
                    <input type="text" name="surname" id="surname"required>
                </div>
            </div>
            <label for="email">email</label>
            <input type="email" name="email" id="email" maxlength="50" required>
            <label for="message">message</label>
            <textarea name="message" id="message" rows="10" required></textarea>
            <input type="submit" value="ENVOYER" class="cta">
        </form>
        <?php
            // inclusion du fichier de configuration
            require_once 'config.php';

            // connexion à la base de données
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // récupération des données du formulaire
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            // préparation de la requête SQL. INSERT INTO + le nom créee sur la BD, ici: contact_form
            $stmt = mysqli_prepare($conn, "INSERT INTO contact_form (name, surname, email, message) VALUES (?, ?, ?, ?)");

            // liaison des paramètres
            mysqli_stmt_bind_param($stmt, 'ssss', $name, $surname, $email, $message);

            // exécution de la requête
            mysqli_stmt_execute($stmt);

            // fermeture de la connexion
            mysqli_close($conn);
        ?>
    </section>
</body>
</html>
