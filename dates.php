<?php
$title='dates';
include './composant/header.php';

define('CRENEAUX',[
    [10,12],
    [15,20]
]);

// vardump(CRENEAUX);
function creneau_html(array $hours){
    if (empty($hours)) {
        return ' fermé ';
    }
   
    else{
        $openCreneaux=[];
        foreach ($hours as $k=> $creneau) {
       
        $openCreneaux[]="de <strong>$creneau[0]h</strong> à <strong>$creneau[1]h</strong>";
       };
     return " Ouvert ".implode(' et ',$openCreneaux);
    }
};

 $creneaux=creneau_html(CRENEAUX);

//  EXERCICE II

define('HORAIRES',[
    [
        [8,12],
        [14,19]
    ],
    [
        [8,12],
        [14,19]
    ],
    [
        [8,12]
        
    ],
    [
        [8,12],
        [15,19]
    ],
    [
        [8,12],
        [14,19]
    ],
    [],
    []  
]);
define('JOURS',[
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
    'Sunday'
]);


 // output the days of weeek
 $weekDayOpen=null;
 $dayofweek='';
 $jourform='';
 foreach (JOURS as $key => $jour) { 
    //  recuperer me jours de la semaine
    $jourform.="<option>$jour<option>";
     $horaires=creneau_html(HORAIRES[$key]);
     if ($key===Date('N')-1) {
     $weekDayOpen.= "<li class='bg-success'><strong > $jour </strong>: $horaires </li>";
     }
     else {
        $weekDayOpen.= "<li><strong> $jour </strong>: $horaires </li>";
     }  
 };



//define the time zone in europ
date_default_timezone_set('Europe/Paris');

// getting the 24 hours
$hoursin24h=(int)($_GET['heure'] ?? (Date('G')));#I put (int) because the can write the string of the url
echo $hoursin24h;

    /*
        // Example usage for: Null Coalesce Operator
        $action = $_POST['action'] ?? 'default';

        // The above is identical to this if/else statement
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
        } else {
            $action = 'default';
        }
    */
// echo $hoursin24h;

// getting the days of week
$daysofweek=Date('N')-1;
// echo($daysofweek);

// le creneau de la semaine
$crenauWeek=HORAIRES[$daysofweek];

 function checkifstoreopen($hoursin24h,$crenauWeek)
 {
     foreach ($crenauWeek as $key => $value) {
        //  vardump($value[0]);
        //  vardump($value[1]);
         if (($hoursin24h>$value[0] && $hoursin24h<$value[1])) {
             return "<div class='alert alert-success'>Le Magasin est ouvert</div>";
         }
         else{
            return "<div class='alert alert-danger'>Le Magasin est Fermé</div>";
         }
     }
 };

?>
<div class="row">
    <div class="col-md-5">
        <h2>Nous contacter</h2>
        <h3>Horaire d'ouvertures</h3>
        <p><?= $creneaux?></p>
    </div>
    <div class="col-md-7">
        <div class="m-2">
            <form action="" method="get">
                <select name="jour" class="form-control">
                    <?= $jourform?>
                </select>
                <div class="form-group m-2">
                    <input type="number" name='heure' value="<?=$hoursin24h?>">
                </div>
                <button type="submit" class='btn btn-primary'>Voir si magasin est ouvert</button>
            </form>
        </div>
        <?= checkifstoreopen($hoursin24h,$crenauWeek); ?>
        <ul>
            <?=$weekDayOpen?>
        </ul>
    </div>
</div>

<?php include './composant/footer.php';?>