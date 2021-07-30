<?php
if(!function_exists("navItem")){
      function navItem($name,$classe){
        $retVal = ($_SERVER['SCRIPT_NAME']==="/Course-Grafikart/{$classe}") ? 'active' : '' ; 
        return <<<EOT
        <li class='nav-item'>
        <a class="nav-link {$retVal}" href="{$classe}">{$name}</a>
        </li>
      EOT;
    };
};
  
?>
         <?=navItem('Home','index.php');?>
         <?=navItem('Contact','contact.php');?>
         <?=navItem('About','about.php');?> 
         <?=navItem('Jeu','jeu.php');?>
         <?=navItem('Dates','dates.php');?>
         <?=navItem('Newsletter','newsletter.php');?>
         <?=navItem('Profil','profil.php');?>
         <?=navItem('compteur','exercice/compteur.php');?>
         <?=navItem('dashboard','dashboard.php');?>
     
         
        
        