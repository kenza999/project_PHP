<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple jsPdf pour Freelance</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
</head>
<style>
    *{
        font-family: Arial, Helvetica, sans-serif;
       
    }
    .block-facture{
        background-color: rgb(223, 240, 255);
        border-radius: 30px 30px;
        width: 380px;
        height: 200px;
        margin: 5px 5px 0;
        padding: 5px 10px  10px 10px;
    }
</style>
<body>
    <section class="block-facture">
        <!-- ici ecrire le code php pour client  -->
        <h1>Facture #FL15GHG-5757</h1>
   <img width="50" height="50" src="https://img.icons8.com/external-bearicons-blue-bearicons/64/external-DATE-capsule-hotel-bearicons-blue-bearicons.png" alt="external-DATE-capsule-hotel-bearicons-blue-bearicons"/><br><br>
    <img width="50" height="50" src="https://img.icons8.com/external-outline-satawat-anukul/64/external-newmedia-new-media-outline-outline-satawat-anukul-5.png" alt="external-newmedia-new-media-outline-outline-satawat-anukul-5"/>
        
    </section>
    <!-- Bouton pour télécharger la facture -->
    <!-- <button onclick="telechargerFacture()">Télécharger Facture Freelance</button> -->

    <script>
        function telechargerFacture() {
            // Récupération des données depuis le backend
            fetch('UserController.php') // Modifiez ceci avec l'URL réelle
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    // Construction de la structure HTML de la facture
                    let html = `
                        <h1>Facture pour Freelance</h1>
                        <p>Freelancer N° : ${data.id}</p>
                        <table>
                            <thead>
                                <tr>
                                    <th>Mission</th>
                                    <th>Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                    `;
                    data.missions.forEach(mission => {
                        html += `
                            <tr>
                                <td>${mission.nom}</td>
                                <td>${mission.tarif} €</td>
                            </tr>
                        `;
                    });
                    html += `</tbody></table>`;

                    // Génération du PDF à partir de la structure HTML
                    const { jsPDF } = window.jspdf;
                    const doc = new jsPDF();
                    doc.html(html, {
                        callback: function (doc) {
                            doc.save('facture-freelance.pdf'); // Sauvegarde du PDF sous le nom "facture-freelance.pdf"
                        }
                    });
                });
        }
    </script>
</body>
</html>
