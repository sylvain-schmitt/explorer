<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" ></link>

</head>
<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href=""><img class="logo" src="../assets/img/logo.png" alt="logo"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <ul class="navbar-nav ml-auto">
      <?php
      if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="far fa-user"></i> <?= $_SESSION['user']['username'] ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deconnexion"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
        </li>
      <?php endif; ?>
         
    </ul>
  </div>
</nav>

    <?= $content ?>

  <footer class="bg-light py-4 footer">
      <div class="footer-copyright text-center py-3">© 2020 Copyright:
          <a href="#"> L'amour est dans le code</a>
      </div>
  </footer>

<script src="../assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" ></script>


</body>
</html>