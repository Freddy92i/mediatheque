<!DOCTYPE html>
<html lang="fr">
<?php include "style.php" ?>

<?php include "navbar.php" ?>

<body style="margin:auto">
<?php
if(empty($_COOKIE['id'])) {
    $_SESSION['message']='Veuillez vous inscrire ou vous connecter pour accéder à cette rubrique';
    header('location: log.php');
} else {
session_start();
if(isset($_SESSION['message'])) { // Si il y a un quelconque message dans le $_SESSION, on l'affiche
    ?>
    <div class="row">
        <div class="alert alert-primary offset-4 col-md-4 " role="alert">
            <?php echo $_SESSION['message']; ?>
        </div>
    </div>
    <?php
    unset($_SESSION['message']);
    echo '<br>';
}
?>



<form  method="post" action="traitement/ajoutmovie-process.php" style="text-align: center">
    <div class="form-addfilm">
        <div class="form-group">
            <label>Nom du film</label>
            <input type="text" name="nom" class="form-control" placeholder="Entrer le nom du film">
        </div>
        <div class="form-group">
            <label>Durée</label>
            <input type="number" name="duree" class="form-control" placeholder="Entrer la durée du film">
        </div>
        <div class="form-group">
            <label>Résumé</label>
            <input type="text" name="resume" class="form-control" placeholder="Entrer le résumé du film">
        </div>
        <div class="form-group">
            <label>Réalisateur</label>
            <input type="text" name="realisateur" class="form-control" placeholder="Entrer le nom du réalisateur du film">
        </div>
        <div class="form-group">
            <label for="category">Catégorie:</label>
                <select class="form-control" name="categorie" id="category" name="category">
                    <?php
                        include "app/connexionpdo.php";
                        $query = $bdd->query('SELECT * FROM categorie');
                        $result2 = $query -> fetchAll();
                        foreach ($result2 as $row)
                        {
                            echo '<option value="'. $row['RefCat'] .'">'. $row['categorie'] . '</option>';
                        }
                    ?>
                </select>
        </div>
        <div class="group">
            <label>Image</label>
            <input type="text" name="img" class="form-control" placeholder="Entrer l'url de votre image">
        </div>
        <div class="group">
            <label>Image Alternative</label>
            <input type="text" name="img_alt" class="form-control" placeholder="Entrer l'url de votre image alternative">
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
</body>
</html>

<?php } ?>