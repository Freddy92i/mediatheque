<?php
if(empty($_COOKIE['id'])) {
    $_SESSION['message']='Veuillez vous inscrire ou vous connecter pour accéder à cette rubrique';
    header('location: ../log.php');
} else {
    include "../app/connexionpdo.php";
    session_start();
    $id = $_SESSION['filmid'];
    $nom = $_POST['nom'];
    $duree = $_POST['duree'];
    $resume = $_POST['resume'];
    $realisateur = $_POST['realisateur'];
    $categorie = $_POST['categorie'];
    $image = $_POST['image'];
    $image_alt = $_POST['image_alt'];

    if (empty($nom) || empty($duree) || empty($resume) || empty($realisateur) || empty($categorie) || empty($image) || empty($image_alt)) {
        // Création de la session message pour y afficher le message d'erreur
        $_SESSION['message'] = 'Un des champs est vide';
        header('location: ../editmovie.php');
    } else {
        $req = $bdd->prepare("UPDATE film SET nom = ?, duree = ?, resume = ?, realisateur = ?, RefCat = ?, img = ?, img_alt = ? WHERE id = '$id'");
        $req->execute(array($nom, $duree, $resume, $realisateur, $categorie, $image, $image_alt));

        // Création de la session message pour y afficher le message de confirmation
        $_SESSION['message'] = 'Modification du film effectuée avec succès';
        header('location: ../mediatheque.php');

    }
}
?>