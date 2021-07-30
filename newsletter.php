<?php
$title='Newsletter';
include './composant/header.php';

// echo $_SERVER['PHP_SELF'];
// une variable null
// echo DIRECTORY_SEPARATOR.'<br>';
// en cree un fichier 

$error=null;
$email=null;
$success=null;
//verifier si l'email est definie et il n'est pas vide
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email=$_POST['email'];
    // filtrer l'email au cas où l'utilisateur change le type d'email par un autre
    // echo filter_var($email,FILTER_VALIDATE_EMAIL);#return the data filter

    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        //en cree un fichier dir:c'est fichier parent ds:met les flache
        $files=__DIR__.DIRECTORY_SEPARATOR.'email'.DIRECTORY_SEPARATOR.date('Y-m-d');
        file_put_contents($files,$email.PHP_EOL,FILE_APPEND);
        $success="Votre email à bien été enregistré";
        $email=null;
    } else {
       $error='Email invalid';
    }    
}
if ($error) {
    $error="<div class='alert alert-danger text-center'>{$error}</div>";
}
if ($success) {
    $success="<div class='alert alert-success text-center'>{$success}</div>";
}
?>
<div class="row">
    <div class="col-md-6">
        <?=$error ?>
        <?=$success ?>
        <h1>S'incrire à la newsletter</h1>
        <form action="newsletter.php" method="post" class="form-inline">
        <div class="form-group my-2">
            <input type="email" name="email" id="" placeholder='Entrer votre email'>
        </div>
        <button type="submit" class='btn btn-success'>S'incrire</button>
        </form>
    </div>
    <div class="col-md-6"></div>
</div>

<?php include './composant/footer.php'; ?>