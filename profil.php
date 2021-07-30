<?php

require './composant/header.php';
// pour se deconnecter de Cookies
$x=null;
    // var_dump($_GET['action']);
    if (!empty($_GET['action']) && $_GET['action']==='deconnecter') {
        //on supprime les cookies
        unset($_COOKIE['user']);
        // là on supprime mais pas dans le navigateur dans l'application
        setcookie('user','',time()-10);
    }
// on revient en haut pour reccuper le nom enregistre dans le cookie
 $nom=null;
if (!empty($_COOKIE['user'])) {
     $nom=$_COOKIE['user'];
    
 }
    
    if (isset($_POST['nom']) && !empty($_POST['nom'])) {
        $name=htmlentities($_POST['nom']) ;
        setcookie('user',$name,time()+60);
    };

    // exercice numero 2

    $age=null;
   if (isset($_POST['born']) && !empty($_POST['born'])) {
    //    mettant la date choisie dans un cookis
            setcookie('birthday',$_POST['born']);
            $_COOKIE['birthday']=$_POST['born'];
    
   }
   //on verifier si la valeur est definie et non vide
  
   if (!empty($_COOKIE['birthday'])) {
       // on reccuper le cookie
            $dateActu=date('Y');
            $birthUser=$_COOKIE['birthday'];
            $age=(int)($dateActu-$birthUser);
            
   };

   
?>

<div class="row">
    <div class="col-md-6">
        <?php if ($nom):?>
        <h3>Bonjour <?=htmlentities($nom);?></h3>
        <a href="profil.php?action=deconnecter">Se déconnecter</a>
        <?php else: ?>
        <form action="" method="post">
            <div class="form-group my-3">
                <input type="text" name='nom' placeholder='Entre votre nom'>
            </div>
            <button type='submit' class="btn btn-primary">Se connecter</button>
        </form>
        <?php endif;?>
    </div>
 
    
    <div class="col-md-6">
        <?php if ($age && $age>=18):?>
            <h2>contenu réserve</h2>
        <?php else:?> 
                <h4>votre date de naissance</h4>
                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group my-3">
                        <select name="born" >
                            <?php for ($i=2010; $i>1919 ; $i--):?>  
                               <?= "<option value=\"{$i}\">{$i}</option>"?>
                            <?php endfor; ?>
                            
                        </select>
                    </div>
                    <button type='submit' class="btn btn-success">date de naissance</button>

                </form>   
        <?php endif ;?>
        
    </div>
</div>





<?php require './composant/footer.php';?>