<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= ROOT ?>">
    <title>Portail de Missions Freelance</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'cabin';
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .container{
            width: 600px;
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

        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
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
<section class="container">

    <h1>Propositions</h1>
<h2><?= $parametres["h1"] ?></h2>

<form  method="post">
        <label for="missionName">Nom de la mission : </label><br />
        <input type="text" id="missionName" name="missionName" value="<?= $proposal->getMissionName() ?>" required><br /><br />
 
 
        <label for="Description">Description : </label><br />
        <textarea name="description" placeholder="Description" required></textarea><br /><br />
 
 
        <label for="missionDuration">Durée de la mission : </label><br />
        <input type="number" id="missionDuration" name="missionDuration" required><br /><br />
 
        <label for="missionStart">Début : </label><br />
        <input type="date" id="missionStart" name="missionStart" required><br /><br />

<label for="missionEnd">Fin : </label><br />
        <input type="date" id="missionEnd" name="missionEnd" required><br /><br />

        <label for="remoteWork">Télétravail (Oui/Non) : </label><br />
        <input type="text" id="remoteWork" name="remoteWork" required><br /><br />
       
        <label for="location">Lieu : </label><br />
        <input type="text" id="location" name="location" required><br /><br />
       
        <label for="budget">Taux journalier : </label><br />
        <input type="number" id="budget" name="budget" required><br /><br />

        <?php foreach($listeCompetences as $competence){ ?> 

    <input type="checkbox" value="<?php echo $competence->getId()?>" name="competences[]"><br/> 
    <label for="competences" class="register__label booleen"><?php echo $competence->getNomCompetence()?></label><br> 
    
        <?php } ?>

        <button type="submit" name="membre"><?= $mode == "update" ? "modifier la mission" : "Ajouter une mission" ?></button>
    </form>
         

<!-- Formulaire pour ajouter une nouvelle proposition -->

    <script>
    $
    *ù$
    
    $(document).ready(function(){
        $('#login').blur(function() {
            var login = $(this).val();
            if($.trim(login) != ''){
                $.ajax({
                    url: "check_login.php",
                    data: {'login': login},
                    success: function(data){
                        if(data == 'used'){
                            $("#login").css("border-color", "red").next(".error").remove();
                            $("<span class='error'>Ce login est déjà utilisé.</span>").insertAfter("#login");
                        } else {
                            $("#login").css("border-color", "green");
                            $("#login").next(".error").remove();
                        }
                    },
                    error: function(){
                        alert('Erreur lors du traitement de votre demande');
                    }
                });
            }
        });
    });
   </script> 
</section>
</body>
</html>