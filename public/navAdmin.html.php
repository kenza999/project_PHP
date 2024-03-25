<section id="menu">
        <div class="logo">
            <img src="" alt="">
        <h2>Dynamic</h2>
        </div>

        <div class="items">
            <li><i class="fad fa-chart-pie-alt"></i><a href="<?= addLink("admin","User","dashboard_admin")?>">Dashboard</a></li>
            <li><i class="fab fa-uikit"></i><a href="<?= addLink("admin","User","checkUser")?>">verificationUser</a></li>
            <li><i class="fas fa-th-large"></i><a href="#">Tabls</a></li>
            <li><i class="fas fa-edit"></i><a href="#">Forms</a></li>
            <li><i class="fab fa-cc-visa"></i><a href="#">Cards</a></li>
            <li><i class="fas fa-hamburger"></i><a href="#">Modal</a></li>
            <li><i class="fas fa-chart-line"></i><a href="<?= addLink("admin","User","list")?>" class="list-group-item list-group-item-action">Liste des Utilisateurs</a></li>
            <li><i class="fa-duotone fa-arrow-right-from-bracket"></i><a href="<?= addLink("user","logout")?>"tabindex="-1" aria-disabled="true">Déconnexion</a></li> 
        </div>
    </section>