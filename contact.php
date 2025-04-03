<?php
require_once('templates/header.php');
//require_once('lib/user.php');

?>

<h1>Contactez-nous!</h1>



<body class="text-center">
<form method="post" action="mail.php">
  <p>
      <label>Votre email</label>
        <input type="email" name="email" required>
  </p>
  <p>
    <label>Tapez votre message ici pour  nous écrire:</label> </p>
  <p>  <textarea rows="10" cols="30" name="message"></textarea> </p>
  <p>   <input type="submit"> </p>
    </form>
  
 <?php
  /*
    if (isset($_POST['message']) and filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $entete  = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $entete .= 'From: christelle.cossard@cocoweb10.fr' . "\r\n";
        $entete .= 'Reply-to: ' . $_POST['email'];

        $message = '<h1>Message envoyé depuis la page Contact de monsite.fr</h1>
        <p><b>Email : </b>' . $_POST['email'] . '<br>
        <b>Message : </b>' . htmlspecialchars($_POST['message']) . '</p>';

        $retour = mail('christelle.cossard10@gmail.com', 'Réponse au formulaire de contact', $message, $entete);
        if($retour)
            echo '<p>Votre message a bien été envoyé.</p>';
    }
    */
    ?>

<?php
require_once('templates/footer.php');
?>