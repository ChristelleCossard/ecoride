<?php
require_once('templates/header.php');
require_once('lib/user.php');

if(!isset($_SESSION['user']) && $user['role'] == "client") {
    header('location: login.php');
}

require_once('lib/tools.php');
require_once('lib/product.php');
//require_once('lib/category.php');

?>

<h1 align="center">Page d'administration</h1>
<br>
<h2>Voici la liste des opérations que vous pouvez effectuer:</h2>
<br>
<p class="nav-item"><a href="ajout_modification_produit.php" class="btn btn-primary <?php if ($currentPage === $key) { echo 'active'; } ?>">Ajouter un produit</a>
<br><br><br>
<?php

var_dump($_SESSION);




?>

<?php
require_once('templates/footer.php');
?>