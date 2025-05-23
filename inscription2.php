<?php
require_once('templates/header.php');
require_once('lib/user2.php');
require_once('lib/user.php');

$errors = [];
$messages = [];

$users = 
[
 [ 'email' => 'abc@test.com', 'password' => '1234'],
 [ 'email' => 'test@test.com', 'password' => 'test']
];

if (isset($_POST['addUser'])) {
   
    $res = addUser($pdo, $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['password']);

    if ($res) {
        $messages[] = 'Merci pour votre inscription, Veuillez vous connecter ici:  <a href="login.php" class="btn btn-outline-primary me-2">Se connecter</a>';
        //header('location: login.php');
    } else {
        $errors[] = 'Une erreur s\'est produite lors de votre inscription';
    }


}


?>

<h1>Inscription</h1>

<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success">
        <?=$message; ?>
    </div>
<?php } ?>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?=$error; ?>
    </div>
<?php } ?>

<body class="text-center">
<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="prenom" class="form-label"">Prénom</label>
        <input type="prenom" name="prenom" id="prenom" class="form-control">
    </div>

    <div class="mb-3">
        <label for="nom" class="form-label"">Nom</label>
        <input type="nom" name="nom" id="nom" class="form-control">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label"">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label"">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>

    <input type="submit" value="Inscription" name="addUser" class="btn btn-primary">


</form>


<?php
require_once('templates/footer.php');
?>