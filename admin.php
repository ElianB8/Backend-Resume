<?php
session_start();
if(isset($_SESSION['id'])){
    require_once('./database.php');
   $db = new Database("localhost","cv","root","");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | CV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="row">
        <div class="col">
            <div class="card text-white bg-dark mb-3">   
                <div class="card-body">
                <h4 class="card-title text-center">Informations</h4>
                <?php
                    if(isset($_SESSION['success'])){
                ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success']; ?>
                </div>
                <?php
                    }
                ?>
                    <form method="POST" action="c_admin.php" id="info">
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php $db -> displayInfo('prenom'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php $db -> displayInfo('nom'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="number" class="form-control" id="age" name="age" value="<?php $db -> displayInfo('age'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php $db -> displayInfo('email'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" value="<?php $db -> displayInfo('ville'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="cp">Code Postal</label>
                            <input type="number" class="form-control" id="cp" name="cp" value="<?php $db -> displayInfo('cp'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="dep">Département</label>
                            <input type="text" class="form-control" id="dep" name="dep" value="<?php $db -> displayInfo('dep'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="intro">Introduction</label><br>
                            <textarea class="form-control" rows="3" name="intro" form="info" id="intro" required><?php $db -> displayInfo('intro'); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="info_save">Sauvegarder</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3">
                <div class="card-body">
                    <h4 class="card-title text-center">Expérience professionnelle</h4>
                    <?php
                        if(isset($_SESSION['success_insert'])){
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['success_insert']; ?>
                    </div>
                    <?php
                        }
                    ?>
                        <form method="POST" action="c_admin.php" id="exp">
                            <div class="form-group">
                                <label for="s">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="place">Lieux</label>
                                <input type="text" class="form-control" id="place" name="place" required>
                            </div>
                            <div class="form-group">
                                <label for="city">Ville</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="date_be">Date début</label>
                                        <input type="text" class="form-control" id="date_be" name="date_be" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="date_en">Date fin</label>
                                        <input type="text" class="form-control" id="date_en" name="date_en" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label><br>
                                <textarea class="form-control" rows="3" name="description" form="exp" id="exp" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="exp_save">Sauvegarder</button>
                        </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h4 class="card-title text-center">Formations</h4>
                        <?php
                            if(isset($_SESSION['success_insert_for'])){
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['success_insert_for']; ?>
                        </div>
                        <?php
                            }
                        ?>
                            <form method="POST" action="c_admin.php" id="formation">
                                <div class="form-group">
                                    <label for="school">Ecole</label>
                                    <input type="text" class="form-control" id="school" name="school" required>
                                </div>
                                <div class="form-group">
                                    <label for="city">Ville</label>
                                    <input type="text" class="form-control" id="city" name="city" required>
                                </div>
                                <div class="form-group">
                                    <label for="diplome">Diplômes</label>
                                    <input type="text" class="form-control" id="diplome" name="diplome" required>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="date_be_for">Date début</label>
                                            <input type="text" class="form-control" id="date_be_for" name="date_be_for" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="date_en_for">Date fin</label>
                                            <input type="text" class="form-control" id="date_en_for" name="date_en_for" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description_form">Description</label><br>
                                    <textarea class="form-control" rows="3" name="description_form" form="formation" id="description_form" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="for_save">Sauvegarder</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
             <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h4 class="card-title text-center">Compétences</h4>
                        <?php
                            if(isset($_SESSION['success_insert_comp'])){
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['success_insert_comp']; ?>
                        </div>
                        <?php
                            }
                        ?>
                            <form method="POST" action="c_admin.php" id="competence">
                                <div class="form-group">
                                    <label for="comp_name">Nom</label>
                                    <input type="text" class="form-control" id="comp_name" name="comp_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Code icône</label>
                                    <input type="text" class="form-control" id="icon" name="icon" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="comp_save">Sauvegarder</button>
                            </form>
                    </div>
                </div>
            </div>

            <div class="col">
             <div class="card text-white bg-dark mb-3">
                    <div class="card-body">
                        <h4 class="card-title text-center">Interêts</h4>
                        <?php
                            if(isset($_SESSION['success_insert_int'])){
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['success_insert_int']; ?>
                        </div>
                        <?php
                            }
                        ?>
                            <form method="POST" action="c_admin.php" id="interet">
                                <div class="form-group">
                                    <label for="int_name">Interêts</label>
                                    <input type="text" class="form-control" id="int_name" name="int_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="int_icon">Code icône</label>
                                    <input type="text" class="form-control" id="int_icon" name="int_icon" required>
                                </div>
                                <button type="submit" class="btn btn-primary" name="int_save">Sauvegarder</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
}
else{
    echo("Accès refusé");
}
?>