<?php
if (
    (!isset($_POST['name']) || empty($_POST['name']) || strlen($_POST['name']) > 50)
    || (!isset($_POST['surname']) || empty($_POST['surname']) || strlen($_POST['surname']) > 50)
    || (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || strlen($_POST['email']) > 50)
    || (!isset($_POST['message']) || empty($_POST['message']) || strlen($_POST['message']) > 1000)
    )
{
	echo '<p style="font-size: 1.5em">Il faut un email valide pour soumettre le formulaire.</p>';
    echo '<a href="index.php">Retour au site</a>';
    return;
}

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$message = $_POST['message'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/index.css">
    <title>Message bien reçu</title>
</head>
<body>
<main>
    <section>
        <div>
            <h1>Message bien reçu !</h1>
            <h5>Rappel de vos informations</h5>
            <p><b>Nom</b> : <?php echo($name); ?></p>
            <p><b>Prénom</b> : <?php echo($surname); ?></p>
            <p><b>Email</b> : <?php echo ($email); ?></p>
            <p><b>Message</b> : <?php echo htmlspecialchars($message); ?></p>
        </div>
    </section>
</main>
</body>
</html>