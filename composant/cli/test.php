<?php
// contiendra le chemin absolut
$directory = __DIR__.DIRECTORY_SEPARATOR.'demo.txt';
// var_dump($directory);
file_put_contents($directory,'salut versace comment ça va');
/* FILE_APPEND Si le fichier filename existe déjà,
 cette option permet d'ajouter les données
 au fichier au lieu de l'écraser..*/

 // read the files 
echo file_get_contents($directory).'<br>';

//  dirname return a parent directory's path
echo  dirname(__DIR__,3);
$fichers=dirname(__DIR__.DIRECTORY_SEPARATOR,3);
$size= @file_put_contents($fichers.'demo2.txt','salut');#@permet de caché des erreur
if($size===false){
    echo "impossible d'ecrire dans le fichier";
}
else{
    echo 'Ecriiture reusie';
}

