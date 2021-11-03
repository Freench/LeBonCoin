<!-- <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
      <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top" alt="logo">
      Le bon coin
    </a>
    <a class="navbar-brand" href="#">
        Ajouter une annonce
    </a>
    <form action="SignInLogIn/logout.php" method="POST">
        <input type="submit" value="Déconnexion">
    </form>
  </div>
</nav> -->


<nav id="navBarre" class="navbar navbar-expand-lg navbar-light bg-light">
  <a id="Titre" class="navbar-brand" href="../index.php">La Bonne Oca'z</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav d-flex col-md-12" id="navRight">
      <li class="nav-item active col-md-4">
        <form action="Php/newAnnonce.php">
          <button  class="btn btn-secondary">Ajoutre une annonce</button>
        </form>      
      </li>
      <li class="nav-item active col-md-4">
        <form action="../LeBonCoin/SignInLogIn/logout.php"><button id="Deco" class="btn btn-secondary ">Se Déconnecter</button></form>      
      </li>
    </ul>
  </div>
</nav>