<?php
session_start();




$title='dashboard';
include './composant/header.php';
// include './exercice/compteur.php';

$year=(int)date('Y');
$lastfiveyear=null;
$active=null;
$activeMonth=null;

$monthsList=null;
// verifier si le tableau est vide
$linkYear=(isset($_GET['year']) && !empty($_GET['year']))?(int)$_GET['year']:$year;
// vardump($_GET['month']);
$linkMonth=(isset($_GET['month']) && !empty($_GET['month']))?$_GET['month']:'';

// on verifie ssi le mois et l'année avait été seclectionner
if ($linkYear && $linkMonth) {
    $total=nombre_vues_mois($linkYear,$linkMonth);
    $table_details=view_detail($linkYear,$linkMonth);
}
else {
    $total=nombre_vues();
};


$months=[
    '01'=>'January',
    '02'=>'February',
    '03'=>'march',
    '04'=>'April',
    '05'=>'May',
    '06'=>'June',
    '07'=>'July',
    '08'=>'August',
    '09'=>'September',
    '10'=>'October',
    '11'=>'November',
    '12'=>'December',

];

// la liste de ses 5 derniere année
for ($i=0; $i < 5; $i++) { 
    $prevYear=$year-$i;
    // add the class active if if the loop date match with parametre in the url
    $active=($prevYear===$linkYear)?'active':null;
    // output the fives last year

    if ($prevYear===$linkYear) {
        foreach ($months as $key => $month) {
            $activeMonth=((int)$key===(int)$linkMonth)?'active':null;
            $monthsList.=<<<EOT
            <a class="list-group-item $activeMonth " href="dashboard.php?year={$prevYear}&month={$key}">{$month} 
            </a>
       EOT;
        }
    } else {
        $monthsList=null;
    }

    $lastfiveyear.=<<<EOT
         <a class="list-group-item $active" href="dashboard.php?year={$prevYear}">{$prevYear} 
         <div class='list-group'>
            $monthsList     
        </div>
         </a>
    EOT;
   
    
};

?>

<div class="row">
   
    <div class="col-md-4">
        <div class='list-group'>
             <?= $lastfiveyear; ?>     
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-2">
            <div class="card-body">
                <strong><?= $total ?></strong><br>
                Visite<?= $total>1?'s':''?> total
            </div>
        </div>
        <?php if(isset($table_details) && !empty($table_details)):?>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th scope="col">Année</th>
                    <th scope="col">Mois</th>
                    <th scope="col">Jour</th>
                    <th scope="col">vues</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?=$table_details[1]?></td>
                    <td><?=$table_details[2]?></td>
                    <td><?=$table_details[3]?></td>
                    <td><?=$total?></td>
                </tr>
            </tbody>
        </table>
        <?php endif;?>
    </div>
</div>

<?php include './composant/footer.php';?>