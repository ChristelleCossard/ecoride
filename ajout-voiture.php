<?php
require_once('templates/header.php');
require_once('lib/user.php');

$errors = [];
$messages = [];

$users = 
[
 [ 'email' => 'abc@test.com', 'password' => '1234'],
 [ 'email' => 'test@test.com', 'password' => 'test']
];

function addVoiture(PDO $pdo, string $modele, string $immatriculation, string $energie, string $password, string $password, string $password, string $password) {
    $sql = "INSERT INTO `voiture` (`modele`, `last_name`, `email`, `password`, `role`) VALUES (:first_name, :last_name, :email, :password, :role);";
    $query = $pdo->prepare($sql);


    $id = 1;
    $id_marque = 1;
    $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    
    return $query->execute();
}

if (isset($_POST['addVoiture'])) {
   
    $res = addVoiture($pdo, $_POST['modele'], $_POST['immatriculation'], $_POST['energie'], $_POST['couleur'], $_POST['date_immatriculation'], $_POST['id'], $_POST['id_marque']);

    if ($res) {
        $messages[] = 'Merci pour votre ajout, Veuillez vous connecter ici:  <a href="login.php" class="btn btn-outline-primary me-2">Se connecter</a>';
        //header('location: login.php');
    } else {
        $errors[] = 'Une erreur s\'est produite lors de votre ajout';
    }


}


?>

<h1>Ajout d'une voiture</h1>

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
        <label for="modele" class="form-label"">Modele</label>
        <input type="modele" name="modele" id="modele" class="form-control">
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label"">Nom</label>
        <input type="last_name" name="last_name" id="last_name" class="form-control">
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