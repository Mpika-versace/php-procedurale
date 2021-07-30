<?php
$title='Jeu';
include './composant/header.php';
$guess=120;
$number=null;
$value=null;

if (isset($_GET["number"]) && !empty($_GET["number"])) {
        $inputUser=$_GET["number"];

    if ($inputUser<$guess) {
        $number="<div class='mb-3 bg-danger p-2'>
        The number that you enter:$inputUser
         is less than à number to guess </div>";
    }
    elseif ($inputUser>$guess) {
        $number="<div class='mb-3 bg-danger p-2'>
        The number that you enter:$inputUser
         is more than à number to guess </div>";
        }
    else {
        $number="<div class='mb-3 bg-success p-2'>Good you are guess the good number</div>";
    }
    $value=htmlentities($inputUser);
}


?>
    <div class="row">
        <div class="col-md-6">
            <form action=<?=$_SERVER['PHP_SELF'] ?> method='get'>
                    <?= $number;?>
                <div class="mb-3">
                    <label for="number" class="form-label">Guess a number</label>
                    <input type="number" class="form-control" id="number" aria-describedby="number" name="number" placeholder='Enter a numbre between 0 and 1000'value=<?= $value; ?> >
                    <div id="emailHelp" class="form-text">We'll never enter the text in the input.</div>
                 </div>
                    
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
        
    </div>

<?php  include './composant/footer.php'; ?>