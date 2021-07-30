<?php
// echo dirname(__DIR__).DIRECTORY_SEPARATOR.'composant'.DIRECTORY_SEPARATOR.'compteur.txt';
 
//partie 2
// $dates=date('Y-m-d');
// $files=dirname(__DIR__).DIRECTORY_SEPARATOR.'data_dashboard'.DIRECTORY_SEPARATOR.'compteur';   
// $fichier_journalier=$files.'-'.date('Y-m-d');
// file_put_contents($fichier_journalier,5);


// partie 1
$compteur=1;
function add_file():void
{   
    // nombre de visite par jours
    
    $files=dirname(__DIR__).DIRECTORY_SEPARATOR.'data_dashboard'.DIRECTORY_SEPARATOR.'compteur';  
    $fichier_journalier=$files.'-'.date('Y-m-d'); 
    increment_compteur($files);
    increment_compteur($fichier_journalier);
    
};

function increment_compteur($files):void
{
    if(file_exists($files)) {
        $compteur=(int)file_get_contents($files);
        $compteur++;
        file_put_contents($files,$compteur);
    } else {
        file_put_contents($files,$compteur);
    }
}

function nombre_vues():string
{
    $files=dirname(__DIR__).DIRECTORY_SEPARATOR.'data_dashboard'.DIRECTORY_SEPARATOR.'compteur';   
    return file_get_contents($files);
}
// fin partie 1

//partie 3 obtenir le nombre de vue par jours

// cree une fonction pour obtenir le nombre de vue du mois

function nombre_vues_mois(int $annee,int $mois){
    //function allows add the param at left or right with th str_pad constant
    $mois=str_pad($mois,2,'0',STR_PAD_LEFT);
    $total=0;
    
    $files=dirname(__DIR__).DIRECTORY_SEPARATOR.'data_dashboard'.DIRECTORY_SEPARATOR.'compteur-'.$annee.'-'.$mois.'-'.'*';
    // echo basename($files).'<br>';
  
    // echo $files;
    $files=glob($files) ;
    foreach ($files as $key => $file) {
        $total= file_get_contents($file) ; 
    }
    return $total;
};

function view_detail( $annee, $mois):array
{
    $table=[];
    //function allows add the param at left or right with th str_pad constant
    $mois=str_pad($mois,2,'0',STR_PAD_LEFT);
    $files=dirname(__DIR__).DIRECTORY_SEPARATOR.'data_dashboard'.DIRECTORY_SEPARATOR.'compteur-'.$annee.'-'.$mois.'-'.'*';
    $files=glob($files) ;
    foreach ($files as $key => $file) {
        $table=explode('-',basename($file)) ;
    }
   return $table;
}



