
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
 
        <label for="skillsRequired">Compétences requises : </label><br />
        <input type="text" id="skillsRequired" name="skillsRequired" required><br /><br />
 
        <button type="submit" name="membre"><?= $mode == "update" ? "modifier la mission" : "Ajouter une mission" ?></button>
    </form>
         
 
<?php
require "views/errors_form.html.php";
?>
<!-- Formulaire pour ajouter une nouvelle proposition -->
 
 
 
 
 
    <h1>Détail de la mission</h1>
   
<!--     <script>
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
   </script> -->
</body>
</html>