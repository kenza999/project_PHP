


<section class="container">
    <div class="board">
                <table width="100%">
                    <thead><tbody>
                    <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Numéro de téléphone</th>
                    <th>Numéro de SIRET</th>
                    <th>Carte d'identité</th>
                    <th>Date de naissance</th>
                    <th>Genre</th>
                    <th>Photo de profil</th>
                    <th>Nationalité</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                    </thead>
                    <?php foreach ($user as $verifications): ?>
                        <tr>
                        <td><?= $verifications->getUsername()?></td>
                        
                            <td class="people">
                                <img src="../public/assets/img/pexels-cz-jen-15613792.jpg" alt="">
                                <div class="people-de">
                                    
                                <td><?= $verifications->getNom() ?></td>
                                    <td><?= $verifications->getEmail()?></td>
                                </div>
                            </td>
                            <td class="people-des">
                            <td><?= $verifications->getNumero_siret()?></td>                  
                            </td>
                            <td class="people-des">
                            <td><img style="height: 50px; width: 50px;" src="Public/image/<?= $verifications->getCarte_didentite() ?>" alt="carte d'identité"></td>                  
                            </td>
                            <td class="active"><p>Active</p></td>
                               <td class="role">
                                <p><?php
                        switch ($verifications->getRole()):
                            case ROLE_ADMIN:
                                echo "Administrateur";
                                break;
                            case ROLE_USER:
                                echo "FREELANCE";
                                break;
                                case ROLE_ENTREPRISE:
                                     echo "ENTREPRISE";
                                    break;
                        endswitch;
                        ?></p>
                                 <a href="<?= addLink("admin", "user", "acceptUser").'/'.$verifications->getId() ?>">
                        <i class="fas fa-trash"></i> Verification de l'utilistaeur
                    </a>
                                    <a href="<?= addLink("admin", "user", "delete").'/'.$verifications->getId() ?>" class="btn btn-danger btn-sm me-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                        <i class="fas fa-trash"></i> Supprimer
                    </a>
                    <a href="<?= addLink("admin","user", "show").'/'.$verifications->getId()?>" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> Détails
                    </a>   
                                
                              </td>     
                                        
                        </tr><?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </section>

    


