<?php


// $proposals = new ProposalModel();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Freelance Jobs Portal</title>
    <link rel="stylesheet" type="text/css" href="../Public/styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
    font-family: Arial, sans-serif;
    
}

header {
    background-color: hsl(0, 0%, 87%);
    color: white;
    padding: 10px 0;
    text-decoration: none;
}

nav ul {
    list-style-type: none;
    padding: 0;
    text-align: center;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
}

.job-listings {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
}

.job-card {
    border: 1px solid #ddd;
    margin-bottom: 20px;
    padding: 15px;
    width: 300px;
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px 0;
}

footer ul {
    list-style-type: none;
    padding: 0;
}

footer ul li {
    display: inline;
    margin-right: 20px;
}
#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
  z-index: -1;
}
.sidebar {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color:  hsl(0, 0%, 87%);
    overflow-x: hidden;
    padding-top: 20px;
}

.sidebar p {
    color: hsl(0, 0%, 35%);
    padding: 10px 16px;
}

.sidebar a {
    padding: 6px 16px;
    text-decoration: none;
    font-size: 18px;
    color: hsl(0, 0%, 35%);
    display: block;
    text-decoration: none;
}

.sidebar a:hover {
    color:  hsl(14, 98%, 50%);
    text-decoration: none;
}

.content {
    margin-left: 200px;
    padding: 1px 16px ;
    height: 1000px;
}
hr{
    position: relative;
    left: 50px;
    width: 100px;
}

    </style>
</head>
<body>
 
<div class="sidebar">
            <br><br>
        <p>Tableau de Bord</p>
    <a href="<?= addLink("user","profile")?>">Profile</a>
    <a href="#ameliorer-profil">Améliorer Mon Profil</a>
    <a href="<?= addLink("Proposals","listProposals")?>">Gérer Mes Missions</a>
    <a href="#factures-paiements">Factures et Paiements</a>
    <a href="<?= addLink("user","siret")?>">Mon Entreprise</a>
    <a href="<?= addLink("user","logout")?>">Mon Compte</a>
        <hr>
    <a href="<?= addLink("user","logout")?>">Se déconnecter</a>
</div>
     <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Find Jobs</a></li>
                <li><a href="#">Post Job</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Support</a></li>
                
            </ul>
        </nav>
    </header> 
  
<div class="job-listings">

    </div>
</body>
</html>
