
<?php
    if (isset($_POST['message'])) {
        $position_arobase = strpos($_POST['email'], '@');
        $to='vincent_fillon@hotmail.com';
        $subject='Contact Formulaire Portfolio vincentfillon.fr';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: ' . $_POST['email'] . "\r\n";

        $message = '<h1>Message envoyé depuis la page Contact de monsite.fr</h1>
        <p><b>Nom : </b>' . $_POST['nom'] . '<br>
        <b>Email : </b>' . $_POST['email'] . '<br>
        <b>Interlocuteur: </b>' . $_POST['interlocuteur'] . '<br>
        <b>Message : </b>' . $_POST['message'] . '</p>';

        if($position_arobase === false){ //s'il n y a pas d'@ dans le champ mail
            echo '<p>Votre email doit comporter un arobase.</p>';
          }
        else {
          // Ma clé privée masquée pour des raisons de sécurité
          $secret = "6L**************************************";
          // Paramètre renvoyé par le recaptcha
          $response = $_POST['g-recaptcha-response'];
          // On récupère l'IP de l'utilisateur
          $remoteip = $_SERVER['REMOTE_ADDR'];
          
          $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=" 
              . $secret
              . "&response=" . $response
              . "&remoteip=" . $remoteip ;
          
          $decode = json_decode(file_get_contents($api_url), true);
          
          if ($decode['success'] == true) { // C'est un humain
            $retour=mail($to, $subject, $message, $headers);
            if($retour){
                echo '<p  style="color:#ffffff;">Votre message a été envoyé.</p>';
            }
           // else{
               // echo '<p>Captcha invalide.</p>';
            //}            
          }
          else {// C'est un robot ou le code de vérification est incorrecte
          echo '<p style="color:red;">Captcha invalide.</p>';
          }     
      }
    }
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Vincent FILLON</title>
  <link rel="icon" type="image/png" href="images/VF_code_cartouche-carre.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style_portfolio.css" rel="stylesheet" type="text/css" />
  <link href="css/style_portfolio_responsive_mini.css" rel="stylesheet" media="screen and (max-width: 700px)">
  <!--<link href="css/style_competences.css" rel="stylesheet" type="text/css" /> ...-->
  <script src="js/jquery.js"></script>
  <script src="js/raphael.js"></script>
  <script src="js/init.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
  <header>
    <nav id="menu_general">
      <ul>
        <li><a href="#page_accueil"><img src="images/Logo_VF_CODE_cartouche_petit.png" alt="Logo VF pour activer le menu déroulant"></a></li>
        <li><a href="#page_accueil">Accueil</a></li>        
        <li><a href="#page_competences">Compétences</a></li>
        <li><a href="#page_realisations">Réalisations</a></li>
        <li><a href="#page_presentation">Présentation-Contact</a></li>
        <li><a href="#page_centres_interet">Centres d'intérêt</a></li>
        <li><a title="Cliquez pour télécharger mon CV" href="pdf/cv.pdf"><img src="images/logos/logo_telechargement_CV.png" alt="logo téléchargement CV"></a></li>
      </ul>
      <!-- <hr>-->
    </nav>
    <div id="menu_responsive">
      <ul id="menu_deroulant">
        <li><a href="#"><img src="images/Logo_VF_CODE_plus.png" alt="Logo VF pour activer le menu déroulant"></a>
          <ul>
            <li><a href="#page_competences">Compétences</a></li>
            <li><a href="#page_realisations">Réalisations</a></li>
            <li><a href="#page_presentation">Présentation Contact</a></li>
            <li><a href="#page_centres_interet">Centres d'intérêt</a></li>
          </ul>
       </ul>
    </div>
  </header>
  <div id="page_accueil" class="pages">
    <div id="navigateurs">
      <a title="Navigateur recommandé (téléchargement gratuit)" href="https://www.google.fr/chrome/?brand=CHBD&gclid=EAIaIQobChMI3ofIt8vC3gIVTPlRCh1CwgJPEAAYASAAEgJ2aPD_BwE&gclsrc=aw.ds" target=_blank><img class="logostyle" src="images/logos/logo_chrome.png" alt="Logo chrome"></a>
      <a title="Navigateur recommandé (téléchargement gratuit)" href="https://www.mozilla.org/fr/firefox/new/?utm_source=google&utm_medium=cpc&utm_campaign=Brand-FR-TS-GGL-Exact&utm_term=t%C3%A9l%C3%A9charger%20firefox&utm_content=A144_A203_A006176&&gclid=EAIaIQobChMI4s6LhczC3gIVSvlRCh2sbwQeEAAYASAAEgI_9fD_BwE&gclsrc=aw.ds"
        target=_blank><img class="logostyle" src="images/logos/logo_firefox.png" alt="Logo firefox"></a>
      <a title="Navigateur recommandé (téléchargement gratuit)" href="https://www.microsoft.com/fr-fr/windows/microsoft-edge" target=_blank><img class="logostyle" src="images/logos/logo_edge.png" alt="Logo Edge"></a>
      <a title="Navigateur déconseillé, certains styles CSS ne sont pas supportés par IE, merci d'utiliser les navigateurs recommandés" href="https://www.clubic.com/navigateur-internet/microsoft-edge/actualite-826034-faille-zero-day-internet-explorer-edge.html"
        target=_blank><img class="logostyle" src="images/logos/logo_no_ie.png" alt="Logo IE interdit"></a>

    </div>
    <div id="modif_fond">
    </div>


  </div>
  <div id="page_competences" class="pages">
  <h1>Compétences</h1>    
    <div id="comptences_web">
      <h2 id="h2_competences">Langages Web</h2>
          <div id="content">
            <div id="diagram"></div>
            <div class="legend">
              <h3 id="h3_competences">Légende:</h3>
              <div class="skills">
                <ul>
                  <li class="html">HTML5</li>
                  <li class="css">CSS3</li>
                  <li class="jq">JavaScript</li>
                  <li class="php">PHP</li>
                  <li class="sql">MySQL</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="get">

            <div class="arc">
              <span class="text">HTML5</span>
              <input type="hidden" class="percent" value="90" />
              <input type="hidden" class="color" value="#88B8E6" />
            </div>
            <div class="arc">
              <span class="text">CSS3</span>
              <input type="hidden" class="percent" value="80" />
              <input type="hidden" class="color" value="#D84F5F" />
            </div>
            <div class="arc">
              <span class="text">JavaScript</span>
              <input type="hidden" class="percent" value="40" />
              <input type="hidden" class="color" value="#97BE0D" />
            </div>
            <div class="arc">
              <span class="text">PHP</span>
              <input type="hidden" class="percent" value="60" />
              <input type="hidden" class="color" value="#BEDBE9" />
            </div>
            <div class="arc">
              <span class="text">MySQL</span>
              <input type="hidden" class="percent" value="80" />
              <input type="hidden" class="color" value="#EDEBEE" />
            </div>
          </div>
        </div>
        <div id="tampon"></div>

        <div id="comptences_methodes" class="center">
        <h2 id="h2_competences_methodes">Méthodes et maîtrise des concepts</h2>
            <div class="skillBox">
            <p>Algorithmique</p>
            <p>80%</p>
            <div class="skill">
              <div class="skill_level" style="width:80%;"></div>
            </div>
          </div>

          <div class="skillBox">
            <p>POO: Programmation Orientée Objet</p>
            <p>80%</p>
            <div class="skill">
              <div class="skill_level" style="width:80%;"></div>
            </div>
          </div>

          <div class="skillBox">
            <p>Maquettage d'une application</p>
            <p>90%</p>
            <div class="skill">
              <div class="skill_level" style="width:90%;"></div>
            </div>
          </div>

          <div class="skillBox">
            <p>Modélisation BDD: MERISE</p>
            <p>50%</p>
            <div class="skill">
              <div class="skill_level" style="width:50%;"></div>
            </div>
          </div>
          <div class="skillBox">
            <p>Modélisation BDD: UML</p>
            <p>5%</p>
            <div class="skill">
              <div class="skill_level" style="width:5%;"></div>
            </div>
          </div>
          <div class="skillBox">
            <p>Gestion de projet:Méthodes Agile</p>
            <p>60%</p>
            <div class="skill">
              <div class="skill_level" style="width:60%;"></div>
            </div>
          </div>

        </div>

        <div id="comptences_applicatif" class="center">
        <h2 id="h2_competences_applicatif">Langages applicatifs & Frameworks</h2>
            <div class="skillBox">
            <p>.Net</p>
            <p>70%</p>
            <div class="skill">
              <div class="skill_level" style="width:70%;"></div>
            </div>
          </div>

          <div class="skillBox">
            <p>C#</p>
            <p>80%</p>
            <div class="skill">
              <div class="skill_level" style="width:80%;"></div>
            </div>
          </div>

          <div class="skillBox">
            <p>Python</p>
            <p>20%</p>
            <div class="skill">
              <div class="skill_level" style="width:20%;"></div>
            </div>
          </div>

          <div class="skillBox">
            <p>Java</p>
            <p>5%</p>
            <div class="skill">
              <div class="skill_level" style="width:5%;"></div>
            </div>
          </div>
          <div class="skillBox">
            <p>Xamarin</p>
            <p>70%</p>
            <div class="skill">
              <div class="skill_level" style="width:70%;"></div>
            </div>
          </div>

        </div>
        <div id="comptences_transverses" class="center2">
        <h2 id="h2_competences_transverses">Compétences transverses</h2>
            <div class="skill2Box">
            <p>Anglais</p>
            <p>70%</p>
            <div class="skill2">
              <div class="skill2level" style="width:70%;"></div>
            </div>
          </div>
          <div class="skill2Box">
            <p>Orthographe & grammaire</p>
            <p>80%</p>
            <div class="skill2">
              <div class="skill2level" style="width:80%;"></div>
            </div>
          </div>

          <div class="skill2Box">
            <p>Communication /Gestion des situation conflictuelles</p>
            <p>70%</p>
            <div class="skill2">
              <div class="skill2level" style="width:70%;"></div>
            </div>
          </div>
          <div class="skill2Box">
            <p>Reporting</p>
            <p>80%</p>
            <div class="skill2">
              <div class="skill2level" style="width:80%;"></div>
            </div>
          </div>
</div>
    </div>
    <div id="page_realisations" class="pages">
    <h1>Réalisations</h1>
      <div class="flex">
        <div class="realisations">
            <a href="#page_accueil"><img class="vignettes" src="images/realisations/vignette_portfolio.jpg" alt="vignette Portfolio"></a>
            <div class="flexalign">
              <a href="https://github.com/Coeur2Lyon/20_PHP_Portfolio_Public" target=_blank><img class="logostyle"  src="images/logos/logo_github.png" alt="Logo Github"/></a>
              <h3>Portfolio (développé en natif:sans frameworks)</h3>
            </div>
        </div>
        <div class="realisations">
          <a href="ressources/LarkoMulitply.zip"><img class="vignettes" src="images/realisations/vignette_larko_multiply.jpg" alt="vignette LarkoMultiply_C#"></a>
          <div class="flexalign">
            <a href="https://github.com/Coeur2Lyon/LarkoMultiply" target=_blank><img class="logostyle"  src="images/logos/logo_github.png" alt="Logo Github"/></a>
            <h3>Application de bureau UWP(Universal Windows Platform)</h3>
          </div>
        </div>
        <div class="realisations">
          <a  href="https://play.google.com/store/apps/details?id=com.VinzProd.LarkoCalcule" target=_blank><img class="vignettes" src="images/realisations/vignette_larkoCalcule.jpg" alt="vignette LarkoCalcule_XAMARIN"></a>
          <div class="flexalign">
              <a href="https://github.com/Coeur2Lyon/larkocalcule" target=_blank><img class="logostyle"  src="images/logos/logo_github.png" alt="Logo Github"/></a>
              <h3>Application mobile(Android) développé avec l'outil multiplateforme</h3>
          </div>
        </div>
        
        <!-- Prévision des futures réalisations: 
          <div class="realisations">
          <a href="#"><img class="vignettes" src="images/realisations/test.jpg" alt=""></a>
          <div>  <h2>Realisation</h2><a href="https://github.com/Coeur2Lyon" target=_blank><img class="logostyle"  src="images/logos/logo_github.png" alt="Logo Github"/></a></div>
        </div>
        <div class="realisations">
          <a href="#"><img class="vignettes" src="images/realisations/test.jpg" alt=""></a>
          <div>  <h2>Realisation</h2><a href="https://github.com/Coeur2Lyon" target=_blank><img class="logostyle"  src="images/logos/logo_github.png" alt="Logo Github"/></a></div>
        </div>
        <div class="realisations">
          <a href="#"><img class="vignettes" src="images/realisations/test.jpg" alt=""></a>
          <h2>Realisation</h2>
        </div>
        -->
      </div>
    </div>
    <div id="page_presentation" class="pages">
      <h1>Présentation</h1>
      <div id="presentation" class="flex">
          <div id="presentation1" class="fond_transparent">
            <p>Passionné d'informatique depuis toujours,<br>
            J'ai toujours suivi les avancées technologiques avec beaucoup d'intérêt.<br> Après avoir oeuvré dans plusieurs métiers(voir <a title="Cliquez pour télécharger mon CV" href="pdf/cv.pdf"><img class="logostyle" src="images/logos/logo_telechargement_CV.png" alt="logo téléchargement CV"></a> ) qui m'ont permis de développer des compétences <a href="#pages_competences"> transverses diverses</a>,<br>
            J'ai commencé à m'intéresser de plus près au développement et à la programmation informatique dans le cadre de mon dernier poste.<br>
            <br>

            J'ai donc tout d'abord commencé à m'autoformer aux langages de développement à titre personnel et simplement dans le but de découvrir les différentes méthodes et langages de programmation/développement proposés sans prévoir une quelconque application professionnelle dans un premier temps.<br>
            C'est en constatant que ce qui était de l'ordre de la passion et du loisir devenait une pratique courante pour moi; et également en constatant simultanément que les besoins en termes de ressources dans le domaine étaient croissants; que j'ai envisagé d'en faire mon métier.<br>
            <br>
            Après avoir échangé autour de mon projet de reconversion avec différents acteurs du domaine (formateurs de l'école, mon frère ingénieur développeur qui a plus de 15ans d'expérience et certains des tuteurs de jeunes que j'accompagnais), je me suis lancé dans la formation de Concepteur Développeur Nouvelles Technologies qui m'est actuellement enseigné et qui vise le titre de Concepteur Développeur d'Applications (Titre RNCP Niv. II/BAC+4) et donc dans cette nouvelle aventure ...<br>
            Le portfolio que vous consultez actuellement à été initié en HTML et CSS auquel j'ai ajouté du JavasCript pour la partie "Compétences" (notamment en utilisant la bibliothèque RaphaelJS),
            Je l'ai ensuite perfectionné avec du PHP.
          </p>
        </div>

        <div id="presentation2" class="fond_binaire">
          <div class=flex>
            <div id="photo"><img src="images/photo.png" alt="photo visage"></div>
            <div id=coordonnees>
                <h2>Vincent FILLON</h2>                  
                <a href="https://www.linkedin.com/in/vincent-fillon-881938106/" target=_blank><img class="logostyle" src="images/logos/logo_linkedin.png" alt="Logo Linkedin"></a>
                <a href="https://github.com/Coeur2Lyon" target=_blank><img class="logostyle" src="images/logos/logo_github.png" alt="Logo Github"></a>
                <a href="https://www.meetup.com/members/236377606/?_locale=fr-FR" target=_blank><img class="logostyle" src="images/logos/logo_meetup.png" alt="Logo MeetUp"></a>
                <a href="mailto:contact@vincentfillon.fr" target=_blank><img class="logostyle" src="images/logos/logo_mail.png" alt="Logo mail (Enveloppe)"></a>
                <a title="Cliquez pour télécharger mon CV" href="pdf/cv.pdf"><img class="logostyle" src="images/logos/logo_telechargement_CV.png" alt="logo téléchargement CV"></a>
            </div>
          </div>          
          <div id="formulaire_contact" class="flex">
            <form method="POST">
              <fieldset>
                <legend>Me contacter</legend>
                <div class="inline">
                  <label for="nom">Prénom & Nom:</label>
                  <input id="nom" type="text" name="nom">                  
                </div><br>
                <div class="inline">
                  <label for="email">E-mail :</label>
                  <input id="email" type="email" name="email" required> 
                </div><br>                            
                <div class="inline">
                  <label for="message">Message :</label>
                  <textarea id="message" name="message" required></textarea><br> 
                </div><br>
                <div class="inline">            
                  <label for="interlocuteur"> Vous êtes:</label>
                  <select name="interlocuteur" id="interlocuteur">
                  <option value="employeur">Employeur(euse).</option>
                  <option value="recherche_partenariat">En recherche de partenariats.</option>
                  <option value="curieux">Curieux(euse).</option>
                  <option value="autre">Autre.</option>
                  </select>
                </div><br> 
                <div class="g-recaptcha" data-sitekey="6L****************************************"></div>
 
                <div class="flex" id="boutons"><input id="bouton_valider" title="Cliquez sur le bouton pour valider" type="submit" value="Valider"> 
                  <input id="bouton_reset" title="Cliquez sur le bouton pour réinitialiser le formulaire" type="reset" value="Réinitialiser">
                </div>
              </fieldset>
            </form>
            
          </div>
        </div>
    </div>
  </div>
  <div id="page_centres_interet" class="pages">
      <h1>Centres d'intérêt</h1>
      <p>Section en cours de création: Réalisation prévue en juin 2019-Livrée fin aôut 2019</p>
  </div>
</body>
</html>
