<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail de Missions Freelance</title>
    <base href="<?= ROOT ?>">
    <link rel="stylesheet" href="styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'cabin';
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            width: 100%;
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            padding-top: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
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
            padding: 20px 20px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 900;
            /* border: 1px solid rgb(105, 149, 231); */
            border-radius: 15px 15px 15px 15px;
            margin: 3px 3px;
        }

        .sidebar a:hover {
            background-color: #f8f9fa;
            color:  hsl(230, 75%, 56%);
        }
        hr {
            border: 0;
            clear: both;
            display: block;
            width: 50%;
            background-color: #6c757d;
            height: 1px;
            margin: 20px auto;
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


    </style>
</head>
<body>

    <div class="sidebar">
        <nav>
            <p class="titre"><strong>Tableau de Bord</strong></p>
            <a href="<?= addLink("user","profile")?>"><img src="public/assets/img/message.png" class="iconMS" alt="">Mon profile</a>
            <a href="#ameliorer-profil"><img src="public/assets/img/add.png" class="iconMS" alt="">Améliorer Mon Profil</a>
            <a href="<?= addLink("Proposals","listProposals")?>"><img src="goal.png" class="iconMS" alt="">Gérer Mes Missions</a>
            <a href="<?= addLink("user","factures")?>"><img src="public/assets/img/invoice.png" class="iconMS"alt="">Factures et Paiements</a>
            <a href="<?= addLink("user","siret")?>"><img src="public/assets/img/office-building.png" alt="" class="iconMS">Mon Entreprise</a>
            <a href="#"><img src="public/assets/img/user.png" class="iconMS" alt="">Mon Compte</a>
            <hr>
            <a href="<?= addLink("user","logout")?>">Se déconnecter</a>
        </nav>
    </div>

