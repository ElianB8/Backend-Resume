<?php 
  require_once('./database.php');
  $db = new Database('localhost','cv','root','');
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CV | Elian</title>

  <!-- Bootstrap core CSS -->
  <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/resume.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">Elian Bourdil</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="img/profile.jpg" alt="">
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#informations">Informations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#experience">Experience Professionnelle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#formation">Formation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#competences">Compétences</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#interets">Intérêts</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0" id="body_div">

    <section class="resume-section p-3 p-lg-5 d-flex d-column" id="informations">
      <div class="my-auto">
        <h1 class="mb-0"><?php $db -> displayInfo('prenom'); ?>
          <span class="text-primary"><?php $db -> displayInfo('nom'); ?></span>
        </h1>
        <div class="subheading mb-5"><?php $db -> displayInfo('age'); ?> ans | Permis B | <?php $db -> displayInfo('ville'); ?> , <?php $db -> displayInfo('cp'); ?> · <?php $db -> displayInfo('dep'); ?> |
          <a href="mailto:<?php $db -> displayInfo('email'); ?>"><?php $db -> displayInfo('email'); ?></a>
        </div>
        <p class="lead mb-5"><?php $db -> displayInfo('intro'); ?>
        </p>
        <div class="social-icons">
          <a href="https://www.linkedin.com/in/elian-bourdil-5b6407167/" target="_blank" rel="nofollow noopener noreferrer">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="https://github.com/ShawColat" target="_blank" rel="nofollow noopener noreferrer">
            <i class="fab fa-github"></i>
          </a>
        </div>
      </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
      <div class="my-auto">
        <h2 class="mb-5">Experience Professionnelle</h2>
        <?php 
          $row = $db -> getExpRow();
          $data = $db -> getExp();
          for($i = 0 ; $i < $row ;$i++){
        ?>
        <div class="resume-item d-flex flex-column flex-md-row mb-5">
          <div class="resume-content mr-auto">
            <h3 class="mb-0"><?= $data[$i]['titre'] ?></h3>
            <div class="subheading mb-3"><?= $data[$i]['lieu'] ?> , <?= $data[$i]['ville'] ?></div>
            <p><?= nl2br($data[$i]['description']) ?></p>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary">
              <?= $data[$i]['date_deb'] ?> - <?= $data[$i]['date_fin'] ?></span>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="formation">
      <div class="my-auto">
        <h2 class="mb-5">Formation</h2>
          <?php
            $row = $db -> getFormRow();
            $data = $db -> getForm();
            for($i = 0; $i < $row; $i++){
          ?>
        <div class="resume-item d-flex flex-column flex-md-row mb-5">
          <div class="resume-content mr-auto">
            <h3 class="mb-0"><?= $data[$i]['ecole'] ?>, <?= $data[$i]['ville'] ?></h3>
            <div class="subheading mb-3"><?= $data[$i]['diplome'] ?></div>
            <div><?= $data[$i]['description'] ?></div>
          </div>
          <div class="resume-date text-md-right">
            <span class="text-primary"><?= $data[$i]['date_deb'] ?> - <?= $data[$i]['date_fin'] ?></span>
          </div>
        </div>
        <?php
          }
        ?>

      </div>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="competences">
      <div class="my-auto">
        <h2 class="mb-5">Compétences</h2>

        <div class="subheading mb-3">Outils &amp; Languages de programmation</div>
        <ul class="list-inline dev-icons">
        <?php 
          $row = $db -> getCompRow();
          $data = $db -> getComp();
          for($i = 0 ; $i < $row ; $i++){
          
        ?>
          <li class="list-inline-item">
            <i id="<?= $data[$i]['name'] ?>" class="<?= $data[$i]['code'] ?>"></i>
          </li>
        <?php
          }
        ?>
        </ul>
    </section>

    <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interets">
      <div class="my-auto">
        <h2 class="mb-5">Interêts</h2>
        <ul class="list-group list-group-flush dev-icons">
        <?php
            $row = $db -> getIntRow();
            $data = $db -> getInt();
            for($i = 0; $i < $row; $i++){
        ?>
          <li class="list-group-item">
            <p><i class="<?= $data[$i]['code'] ?> interest-icons"></i> <?= $data[$i]['name'] ?></p>
          </li>
        <?php
            }
        ?>
        </ul>
      </div>
    </section>

      <section>
        <p id="footer" class="text-center">Based on <a target="_blank" href="https://github.com/blackrockdigital/startbootstrap-resume/" rel="noopener noreferrer nofollow">Resume Template</a> ♥</p>
      </section>

  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="node_modules/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/resume.min.js"></script>

</body>

</html>