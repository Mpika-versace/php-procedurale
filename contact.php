<?php 
      session_start();
      $title='Contact';
      include './composant/header.php';
      $name=null;$pass=null;$check=null;
      $erreurs=[];
      $success=null;
      $error_list=null;
     
      function data($data)
      {
            $data=htmlentities($data);
            $data=trim($data);
            return $data;
      }
      // vardump($_GET);
      if (isset($_POST) && !empty($_POST)) {
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                  $name=data($_POST['name']);    
            }
            else {
                  $erreurs[]='Merci d vérifiier vote nom';
            }

            if (isset($_POST['pass']) && !empty($_POST['pass'])) {
                  $pass=data($_POST['pass']);    
            }
            else {
                  $erreurs[]='Merci de vérifiier mot-de-passe';
            }

            if (isset($_POST['check'])) {
                  $check=data($_POST['check']);
            }
            
            if ($name==='pernel' && $pass==='Vmp1990' && $check==="on") {
                  session_start();
                  $_SESSION['connect']=1;
                 header('Location:http://localhost/PHP_%20procedurale/dashboard.php');
                 exit;
            }
            else {
                  $erreurs[]='Your name or you password is incorrect';
            }
            
            
            
      }
      if (isset($erreurs) && !empty($erreurs)) {
            foreach ($erreurs as $value) {
                  $error_list.=<<<EOT
                        <li class="list-group-item bg-danger text-white">{$value}</li>
                  EOT;
                  }
      }
?>
<div class="row">
      <div class="col-md-8">
            <div class="bg-success text-center"><?= $success;?></div>
            <ul class='list-group my-3 '><?= $error_list;?></ul>
            <form action="" method='post'>
                  <div class="mb-3">
                        <label for="text" class="form-label">Your Pseudo</label>
                        <input type="text" class="form-control" id="text"  name='name' value="<?= isset($name)?$name:'';?>">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                  </div>
                  <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <div class="mdp">
                        <input type="password" class="form-control" id="exampleInputPassword1" name='pass'>
                        <i class="fas fa-eye-slash"></i>
                        <i class="fas fa-eye"></i>
                        
                        </div>
                        
                  </div>
                        <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name='check'>
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
      <div class="col-md-4"></div>
</div>
<?php include './composant/footer.php'; ?>