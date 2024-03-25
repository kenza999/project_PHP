<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive navbar with search and login - Bedimcode</title>
    <base href="<?= ROOT ?>">
    <!-- Remicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">

    <!-- CSS -->
    <link rel="stylesheet" href="public/assets/css/styles.css">
    
</head>
<body>
    <!-- HEADER -->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo">Logo</a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#" class="nav__link">Home</a>
                    </li>
                    <!-- Ajoutez d'autres liens selon vos besoins -->
                </ul>
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>
            <div class="nav__actions">
                <!-- Search button -->
                <i class="ri-search-line nav__search" id="search-btn"></i>

                <!-- Login button -->
                <i class="ri-user-line nav__login" id="login-btn"></i>

                <!-- Register button -->
                <i class="ri-user-add-line nav__register" id="register-btn"></i>
                
                <!-- Toggle button -->
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>

    <!-- SEARCH -->
    <div class="search" id="search">
        <form action="" class="search__form">
            <i class="ri-search-line search__icon"></i>
            <input type="search" placeholder="What are you looking for?" class="search__input">
        </form>
        <i class="ri-close-line search__close" id="search-close"></i>
    </div>

    <!-- LOGIN -->
    <div class="login" id="login">
        <form class="login__form" method="post">
            <h2 class="login__title">Log In</h2>
            <div class="login__group">
                <label for="login-email" class="login__label">Email</label>
                <input type="email" placeholder="Write your email" id="login-email" class="login__input" name="email">
            </div>
            <div class="login__group">
                <label for="login-password" class="login__label">Password</label>
                <input type="password" placeholder="Enter your password" id="login-password" class="login__input" name="password_hash">
            </div>
            <div>
                <p class="login__signup">You do not have an account? <a id="sign-up" href="#">Sign up</a></p>
                <a href="#" class="login__forgot">Forgot your password?</a>
                <button class="login__button" name="login" type="submit">Log In</button>
            </div>
        </form>
        <i class="ri-close-line login__close" id="login-close"></i>
    </div>

   <!-- REGISTER -->
   <div id="container">
    <div class="register" id="register">
        <form method="post" class="register__form">
            <h2 class="register__title">Sign Up</h2>
            <div class="register__group">
                <label for="email" class="register__label">Email :</label>
                <input type="email" placeholder="Write your email" id="email" class="form-control my-2 register__input" name="email">
            </div>
            <div class="register__group">
                <label for="username" class="register__label">Prenom :</label>
                <input type="text" placeholder="Prenom" id="username" class="form-control my-2 register__input" name="username">
            </div>
            <div class="register__group">
                <label for="nom" class="register__label">Nom :</label>
                <input type="text" placeholder="Nom" id="nom" class="form-control my-2 register__input" name="nom">
            </div>
           
        
            
            <div class="register__group_">
                <div class="register__group">
                    <label for="password_hash" class="register__label">Mot de passe :</label>
                    <input type="password" placeholder="Mot de passe" id="password_hash" class="form-control my-2 register__input" name="password_hash">
                </div>
                <div class="register__group">
                    <label for="numero_telephone" class="register__label">Numero de telephone :</label>
                    <input type="text" placeholder="Numero de telephone" id="numero_telephone" class="form-control my-2 register__input" name="numero_telephone">
                </div>
                <label for="carte_didentite" class="register__label">Carte d'identité :</label>
                <input type="file" id="carte_didentite" name="carte_didentite" class="form-control-file my-2 register__input" accept="image/*" required>
            </div>
            <div class="register__group">
                <label for="date_de_naissance" class="register__label">Date de naissance :</label>
                <input type="date" placeholder="Date de naissance" id="date_de_naissance" class="form-control my-2 register__input" name="date_de_naissance">
            </div>
            <div class="register__group">
                <label for="genre" class="register__label">Genre :</label>
                <select id="genre" name="genre" class="form-control my-2 register__input">
                    <option value="Mr">Masculin</option>
                    <option value="Mme">Féminin</option>
                </select>
            </div>

          
            <div class="register__group">
                <label for="adresse" class="register__label">Adresse :</label>
                <input type="text" placeholder="Adresse" id="adresse" class="form-control my-2 register__input" name="adresse">
            </div>
            <div class="register__group">
                <label for="ville" class="register__label">Numéro SIRET :</label>
                <input type="text" placeholder="Numéro SIRET" id="ville" class="form-control my-2 register__input" name="ville">
            </div>
            <div class="register__group">
                <label for="code_postal" class="register__label">Code postal :</label>
                <input type="text" placeholder="Code postal" id="code_postal" class="form-control my-2 register__input" name="code_postal">
            </div>
            <div class="register__group">
                <label for="numero_siret" class="register__label">Numéro SIRET :</label>
                <input type="text" placeholder="Numéro SIRET" id="numero_siret" class="form-control my-2 register__input" name="numero_siret">
            </div>
            <div class="register__group">
                <label for="photo" class="register__label">Photo de profil :</label>
                <input type="file" id="photo" name="photo" class="form-control-file my-2 register__input" accept="image/*" required>
            </div>
            <!-- metier -->
            <div class="register__group">
                <label for="metier" class="register__label">Metier :</label>
                <input type="text" placeholder="Metier" id="metier" class="form-control my-2 register__input" name="metier">
            </div>
            <div class="register__group">
                <label for="description_dutilisateur" class="register__label">Description :</label>
                <textarea id="description_dutilisateur" name="description_dutilisateur" class="form-control my-2 register__input" placeholder="Description" required></textarea>
            </div>
            <div class="register__group">
                <label for="role" class="register__label">Quel type de compte souhaitez-vous créer ?</label>
                <select id="role" name="role" class="form-control my-2 register__input">
                    <option value="ROLE_ENTREPRISE">Entreprise</option>
                    <option value="ROLE_USER">Freelance</option>
                </select>
            </div>
            <div class="register__group">
                <label for="nationalite" class="register__label">Nationalité :</label>
                <select id="nationalite" name="nationalite" class="form-control my-2 register__input" required>
                    <option value="">Sélectionnez votre nationalité</option>
                    <option value="francaise">Français(e)</option>
                    <option value="americaine">Américain(e)</option>
                    <option value="allemande">Allemand(e)</option>
                    <option value="britannique">Britannique</option>
                    <option value="canadienne">Canadien(ne)</option>
                    <option value="espagnole">Espagnole</option>
                    <option value="italienne">Italien(ne)</option>
                    <option value="japonaise">Japonais(e)</option>
                    <option value="chinoise">Chinois(e)</option>
                    <option value="russe">Russe</option>
                    <option value="australienne">Australien(ne)</option>
                    <option value="bresilienne">Brésilien(ne)</option>
                    <option value="indienne">Indien(ne)</option>
                    <option value="mexicaine">Mexicain(e)</option>
                    <option value="suedoise">Suédois(e)</option>
                    <option value="norvegienne">Norvégien(ne)</option>
                    <option value="danoise">Danois(e)</option>
                    <option value="portugaise">Portugais(e)</option>
                    <option value="suisse">Suisse</option>
                    <option value="nederlandaise">Néerlandais(e)</option>
                </select>
            </div>
            <div>
                <p class="login__signup">You have an account? <a href="#login">Log in</a></p>
                <button class="login__button" name="inscription">Inscription</button>
            </div>
        </form> 
        <i class="ri-close-line login__close" id="register-close"></i>
    </div>
   

    <!-- MAIN -->
    <main class="main">
        <img src="img/bg-image.png" alt="" class="main__bg">
    </main>

    <!-- JavaScript -->
    <script src="public/assets/js/main.js"></script>
</body>
</html>
