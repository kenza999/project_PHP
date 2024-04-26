


<div class="container-info">

<div class="card">
            <div class="card-header">
                Détails de l'utilisateur
            </div>
            <div class="card-body">
                <table>
                    <tbody>
   
                    <thead>
                        <tr>
                         <td>
                            <th>Nom</th>
                         </td>
                         <td>
                            <th>Prenom </th>
                        </td>
                            
                            <th>Email</th>
                            <th>naissance</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>Code postal</th> 
                            <th>téléphone</th>
                            <th>SIRET</th>
                            <th>Genre</th>
                            <th>Photo de Profil</th>
                            <th>Description d'utilisateur</th>
                            <th>Nationalité</th>
                            <th>ID</th>
                            <th>Role</th>
                        </tr>
        
            
                    </thead>
                    <tbody>
                    <?php foreach ($proposals as $proposal): ?>
                        <tr>
                                <td><?= $proposal->getId() ?></td>
                                    <td><?= $proposal->getMissionName()?></td>
                                </div>
                            </td>
                            <td class="people-des">
                            <td><?= $proposal->getDescription()?></td>                  
                            </td>
                            <td class="people-des">
                            <td><?= $proposal->getDate()?></td>                  
                            </td>
                            <td class="people-des">
                            <td><?= $proposal->getBudget()?></td>                  
                            </td>
                            <td class="people-des">
                            <td><?= $proposal->getMissionDuration()?></td>                  
                            </td>
                            <td class="people-des">
                            <td><?= $proposal->getMissionStart()?></td>                  
                            </td>
                            <td class="people-des">
                            <td><?= $proposal->getMissionEnd()?></td>                  
                            </td>
                            <td class="people-des">
                            <td><?= $proposal->getLocation()?></td>                  
                            </td>
                            <td class="people-des">
                            <td><?= $proposal->getRemoteWork()?></td>                  
                            </td>
                            <td class="people-des">
                                 <a href="<?= addLink("admin", "Proposals", "viewProposal").'/'.$proposal->getId() ?>">
                        <i class="fas fa-trash"></i>Detail mission
                    </a>
                                    <a href="<?= addLink("admin", "Proposals", "delete").'/'.$proposal->getId() ?>" class="btn btn-danger btn-sm me-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet proposition ?');">
                        <i class="fas fa-trash"></i> Supprimer
                    </a>  
                              </td>     
                                        
                        </tr><?php endforeach; ?>
                    </tbody>
                </table>
            </div>
                    </div>

    


