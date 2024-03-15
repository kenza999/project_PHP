

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../public/assets/css/styles.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Formulaire d'inscription -->
<div class="container rounded bg-white mt-3">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-6 col-md-4 p-0">
            <form  method="post" enctype="multipart/form-data">
               
                
             
                <h4 class="text-center font-weight-bold text-muted">Créer un compte Freelance</h4>
                     <div class="form-group">
                                <label for="username" class="sr-only">Prenom :</label>
                                <input type="text" id="username" name="username" class="form-control my-2" placeholder="Prenom" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="nom" class="sr-only">Nom :</label>
                                <input type="text" id="nom" name="nom" class="form-control my-2" placeholder="Nom" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email :</label>
                                <input type="email" id="email" name="email" class="form-control my-2" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password_hash" class="sr-only">Mot de passe :</label>
                                <input type="password" id="password_hash" name="password_hash" class="form-control my-2" placeholder="Mot de passe" required>
                            </div>
                            <div class="form-group">
                                <label for="numero_telephone" class="sr-only">Numero de telephone :</label>
                                <input type="text" id="numero_telephone" name="numero_telephone" class="form-control my-2" placeholder="numero de telephone" required>         
                                </label>
                            <div class="form-group">
                                <label for="carte_didentite" class="sr-only">Carte d'identité :</label>
                                <input type="file" id="carte_didentite" name="carte_didentite" class="form-control-file my-2" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label for="date_de_naissance" class="sr-only">Date de naissance :</label>
                                <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control my-2" placeholder="Date de naissance" required>
                            </div>
                            <div>
                                <!-- adresse -->
                                <label for="adresse" class="sr-only">Adresse :</label>
                                <input type="text" id="adresse" name="adresse" class="form-control my-2" placeholder="Adresse" required>
                            </div>
                            <div>
                                <!-- code postal -->
                                <label for="code_postal" class="sr-only">Code postal :</label>
                                <input type="text" id="code_postal" name="code_postal" class="form-control my-2" placeholder="Code postal" required>
                            </div>
                            <div>
                                <!-- ville -->
                                <label for="ville" class="sr-only">Ville :</label>
                                <input type="text" id="ville" name="ville" class="form-control my-2" placeholder="Ville" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="genre" class="sr-only">Genre :</label>
                                <select id="genre" name="genre" class="form-control my-2">
                                    <option value="Mr">Masculin</option>
                                    <option value="Mme">Féminin</option>
                                </select>
                            </div>
                            <div class="form-group">
                        <label for="numero_siret" class="sr-only">Numéro SIRET :</label>
                        <input type="text" id="numero_siret" name="numero_siret" class="form-control my-2" placeholder="Numéro SIRET" required>
                            </div>
                            <div class="form-group">
                                <label for="photo" class="sr-only">Photo de profil:</label>
                                <input type="file" id="photo" name="photo" class="form-control-file my-2" accept="image/*" required>
                            </div>
                            <div class="form-group">
                                <label for="description_dutilisateur" class="sr-only">Description :</label>
                                <textarea id="description_dutilisateur" name="description_dutilisateur" class="form-control my-2" placeholder="Description" required></textarea>
                              </div>
                            <!-- <?// foreach($listeCompetences as  $competence){?>  -->
                            <!-- <input type="checkbox" value="<?php// echo $competence['competenceID']?>" name="competences[]" ><br/> -->
                            <!-- <label for=""><?php //echo $competence['nom_competence']?></label><br> -->
                              <?php// }?> 
                            <label for="">Quel type de compte souhaitez-vous créer ?</label>
                                <select name="role" id="">
                                    <option value="ROLE_ENTREPRISE">Entreprise</option>
                                    <option value="ROLE_USER">Freelance</option>
                                </select>
                            
                            <div class="form-group">
                            <label for="nationalite">Nationalité :</label><br>
                        <select id="nationalite" name="nationalite" required>
                            <option value="">Sélectionnez votre nationalité</option>
                            <option value="francaise">Française</option>
                            <option value="americaine">Américaine</option>
                            <option value="allemande">Allemande</option>
                            <option value="britannique">Britannique</option>
                            <option value="canadienne">Canadienne</option>
                            <option value="espagnole">Espagnole</option>
                            <option value="italienne">Italienne</option>
                            <option value="japonaise">Japonaise</option>
                            <option value="chinoise">Chinoise</option>
                            <option value="russe">Russe</option>
                            <option value="australienne">Australienne</option>
                            <option value="bresilienne">Brésilienne</option>
                            <option value="indienne">Indienne</option>
                            <option value="mexicaine">Mexicaine</option>
                            <option value="suedoise">Suédoise</option>
                            <option value="norvegienne">Norvégienne</option>
                            <option value="danoise">Danoise</option>
                            <option value="portugaise">Portugaise</option>
                            <option value="suisse">Suisse</option>
                            <option value="nederlandaise">Néerlandaise</option>
                 <!-- Ajoutez d'autres pays selon vos besoins -->
                        </select><br>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-3">Créer le compte</button>

             </form>
               <script></script>
                <!-- Bootstrap JS and Popper.js (if needed) -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.6/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
