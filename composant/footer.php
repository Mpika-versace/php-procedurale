</main>
<footer>
  <div class="row bg-dark my-5">
    <div class="col-md-4">
     <?php
     
        add_file();
       echo "<h1 class='bg-light my-3'>".nombre_vues() ."</h1>";
       
     
     ?>
      
    </div>
    <div class="col-md-4">
        <h1>notre newsletter</h1>
        <form action="newsletter.php" method="post" class="form-inline">
            <div class="form-group my-2">
                <input type="email" name="email" id="" placeholder='Entrer votre email'>
            </div>
            <button type="submit" class='btn btn-success'>S'incrire</button>
        </form>
      </div>
    <div class="col-md-4">
      <ul class='list-unstyled'>
      <?php include "./composant/navmenu.php" ?> 
      </ul>
    </div>
  </div>
</footer>

<script src="./js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></body>
</html>