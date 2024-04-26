<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
     .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            padding-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .menu-btn {
            display: none;
            cursor: pointer;
            font-size: 24px;
            margin: 10px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .menu-btn {
                display: block;
            }
        }
.sidebar nav {
    padding-top: 20px;
}

.sidebar p {
    color: #495057;
    padding: 10px 16px;
    margin-bottom: 0;
    font-size: 18px;
}

.sidebar a {
    background-color: hsl(230, 100%, 97%);
    color: #495057;
    display: block;
    padding: 10px 20px;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 900;
    border: 1px solid rgb(105, 149, 231);
    border-radius: 15px 15px 15px 15px;
    margin: 3px 3px;
}

.sidebar a:hover {
    background-color: #f8f9fa;
    color:  hsl(230, 75%, 56%);
}
.container{
    width: 600px;
    margin: auto;
    margin-top: 50px;
}
.iconMS{
    width: 30px;
    height: 30px;
    padding: 5px;
}
.titre{
    text-align: center;
    font-size: bold;
}
@media (max-width: 768px) {
.sidebar {
width: 100%;
height: auto;
position: relative;
display: none;
}.sidebar a {
padding: 10px 15px;
font-size: 14px;
}

.titre {
font-size: 16px;
}

header {
text-align: left;
padding: 10px;
}
}

@media (max-width: 576px) {
.sidebar a {
padding: 10px 15px;
font-size: 14px;
}
.form-control{
    border-radius:10px 10px;
    border: none;
}
.descript {
    width: 185px;
    height: 100px;
    padding: 10px;
    background-color: #D3D3D3;
    border-radius:10px 10px;
    border: none;
}
.form-control-tel{
    background-color: #D3D3D3;
    border-radius:10px 10px;
    border: none;
}
.titre {
font-size: 16px;
}
}
.logo {
    font-size: 40px;
    color: white;
    margin-top: 22px;
    margin-left: 40px;
  }
.contenaire-profile {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow:  2px 4px rgba(0,0,0,0.1);
    max-width: 750px;
    margin: auto;
    border: 1px solid ;
}

.photoProfil{
  width: 280px; /* Ajustez cette valeur pour augmenter la taille de la photo */
  height: 170px; /* Assurez-vous que width et height sont égaux pour une forme parfaitement ronde */
  object-fit: cover; /* Garde les proportions de l'image tout en remplissant l'espace */
  border-radius: 50%; /* Rend la photo parfaitement ronde */
  border: 1px solid black; /* Bordure noire autour de la photo */
}
.Icon{
  width: 20px; 
  height: 20px;
}
.readonly {
        background-color: #e9ecef; /* Couleur de fond pour griser le champ */
        color: #495057; /* Couleur du texte pour améliorer la lisibilité */
        cursor: not-allowed; /* Change le curseur pour indiquer l'interdiction de modification */
}
hr{

    margin: 20px 20px 20px 20px;
    height: 1px;
    border-radius: 15px 15px 15px 15px;
}

</style>
<body>

<div class="menu-btn">☰</div>
<div class="sidebar">
        <nav>
         <h1> <strong>Tableau de Bord</strong></h1>
            <a href="<?= addLink("user","profile")?>"><img src="public/assets/img/message.png" class="iconMS" alt="">Mon profile</a>
            <a href="#ameliorer-profil"><img src="public/assets/img/add.png" class="iconMS" alt="">Améliorer Mon Profil</a>
            <a href="<?= addLink("Proposals","listProposals")?>"><img src="goal.png" class="iconMS" alt="">Gérer Mes Missions</a>
            <a href="#factures-paiements"><img src="public/assets/img/invoice.png" class="iconMS"alt="">Factures et Paiements</a>
            <a href="<?= addLink("user","siret")?>"><img src="public/assets/img/office-building.png" alt="" class="iconMS">Mon Entreprise</a>
            <a href="#"><img src="public/assets/img/user.png" class="iconMS" alt="">Mon Compte</a>
                    <hr>
            <a href="<?= addLink("user","logout")?>">Se déconnecter</a>
        </nav>
    </div>


<section class="container">
        <h1><strong>Profil</strong></h1>
    <form method="POST" >
        <div class="display">
   <!-- <img src="photo.png"  alt=""><i class="ri-image-add-line"></i> -->
   <img id="profilePic" src="photo.png" alt="Photo de profil" class="photoProfil">
   <input type="file" id="fileInput" accept="image/*" style="display:none;" onchange="loadFile(event)">
   <div id="monConteneurUnique">
    <button style="background-color: transparent; border: none; padding: 0; cursor: pointer; outline: none;" onclick="document.getElementById('fileInput').click();"> 📷</button>
  </div>

    <div class="info">
    <div>
        <!-- affiche les informations pour le user -->
        <img width="20" height="20" src="https://img.icons8.com/plasticine/100/000000/apple-phone.png" alt="apple-phone"/>
        <label for="name">Numero de téléphone</label><br>
        <input type="number" name="numero_telephone" id="numero_telephone" class="form-control-tel" value="<?= $user->getNumero_telephone()?>">
    </div>
    <br>
    <div>
        <label for="name">Nom</label><br>
        <input type="text" name="name" id="name" class="form-control readonly" value="<?= $user->getNom()?>" readonly>
    </div>
    <br>
    <div>
        <label for="username">Prénom</label><br>
        <input type="text" name="username" id="username" class="form-control readonly" value="<?= $user->getUsername()?>" readonly>
    </div>
    <br>
    <div>
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" class="form-control readonly" value="<?= $user->getEmail()?>" readonly>
    </div>
    <br>
    <div>
        <label for="date">Date de naissance:</label><br>
        <input type="date" name="date_de_naissance" id="date_de_naissance" class="form-control readonly" value="<?= $user->getDate_de_naissance()?>" readonly>
    </div>
    <br>
    <div>
        <label for="nationnalite">Nationalité:</label><br>
        <input type="text" name="nationalite" id="nationalite" class="form-control readonly" value="<?= $user->getNationalite()?>" readonly>
    </div>
    <br>
    <div>
        <label for="ville">Ville de naissance:</label><br>
        <input type="text" name="ville" id="ville" class="form-control readonly" value="<?= $user->getVille()?>"readonly>
    </div>
    <div>
        <label for="descrption">Description:</label><br>
        <input type="text" name="description_dutilisateur" id="description_dutilisateur" class="descript" value="<?= $user->getDescription_dutilisateur()?>">
    </div><br>
    <button type="submit" class="btn-svg" name="Sauvegarde">sauvegarde</button>
        </form>
    </div>
    
    <?php include __DIR__ . "/../views/message.html.php";?>
    </section>
      