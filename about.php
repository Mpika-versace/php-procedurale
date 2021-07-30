<?php
$title='About';
include './composant/header.php';
// checkbox
$parfums=[
    'Fraise'=>1,
    'Vanille'=>3,
    'Chocolat'=>4
];
$cornets=[
    'pot'=>3,
    'Cornet'=>2
];
$supplements=[
    'pépites de chocolat'=>1,
    'chantilly'=>0.5
];

 
function icecream($parfums){
    $parfumArray=null;
    $check=null;
    foreach ($parfums as $parfum => $price) {
        if (isset($_GET['parfum']) && in_array($parfum,$_GET['parfum'])) {
            $check='checked';
        }
        else {
            $check=null;
        }
       $parfumArray.=<<<EOT
       <div class="form-check">
           <input class="form-check-input" type="checkbox" {$check} value="{$parfum}" id="defaultCheck1" name="parfum[]">
           <label class="form-check-label" for="defaultCheck1">
               {$parfum}=>{$price} $
           </label>
       </div>
   EOT;
   $priceTotal[]=$price;
    }
    return $parfumArray;   
   
}


 
//reccuperation de donnée et le prix
$getPrice=[];
  $choiceUser='';
 if (isset($_GET['parfum'])) {
     $getData=$_GET['parfum'];
    //  vardump($_GET);
     foreach ($getData as $data) {
        $choiceUser.="<li>$data</li>";
        if (isset($parfums[$data])) {
            $getPrice[]= $parfums[$data];
        };
        if (isset($supplements[$data])) {
            $getPrice[]= $supplements[$data];
        };
        
     };  
 }
 $total=array_sum($getPrice);
//  vardump( $total);
//  vardump($getPrice);
?>

            <form action=<?= $_SERVER['PHP_SELF']?> method="get">
            <div class="row ">
                 <div class="col-md-6">
                 <h1 > Your choice</h1>
                     <ul>
                     <?=$choiceUser;?>
                    </ul>
                    <h3>prix : <?= $total;?> $</h3>
                    <button type="submit" class="btn btn-primary">Composer ma classe</button>   
                 </div>
                 <div class="col-md-6">
                     <h1 >Choice your parfums</h1>
                     <?= icecream($parfums) ;?>
                     <h1 >Choice your supplaments</h1>
                     <?= icecream($supplements) ;?>
               
                 </div>
                 
            </div>
                
                
            </form>
       
        
<?php include './composant/footer.php'?>;
