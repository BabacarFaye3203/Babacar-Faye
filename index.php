<?php
include 'database/connectiondb.php';
$erreur="";
$succes="";
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(!empty($_POST["nom"])){
    $nom=htmlspecialchars($_POST["nom"]);
  }else{
    $erreur="veuiller renseigner votre nom complet svp";

  }
  if(!empty($_POST["email"])){
    if(!preg_match("#[a-zA-Z0-9]+@{1}[a-zA-Z0-9]+\.{1}[a-zA-Z]{2,3}#",$_POST["email"])){
      $erreur="format email invalide";
    }else{
      $email=htmlspecialchars($_POST["email"]);
    }
  }
  if(!empty("message")){
    $message=htmlspecialchars($_POST["message"]);
  }else{
    $erreur="veuiller décrire votre besoin";
  }
  if(!empty($_POST["objet"])){
    $objet=htmlspecialchars($_POST["objet"]);
  }
  
}
try{
  $req="INSERT INTO contact(nom,email,objet,message)values(?,?,?,?)";
  $stm=$conn->prepare($req);
  $stm->bind_param("ssss",$nom,$email,$objet,$message);
  $res=$stm->execute();
  if($res){
    header("location:index.php");
    $succes="message envoyé avec succes";
  }

}catch(Exception){
  //echo"erreur lors de l'envoi";
}
mysqli_close($conn);
include 'configuration/head.html';


?>
  <body>
    <header class="header">
      <div class="header__content">
        <div class="header__logo-container">
          <div class="header__logo-img-cont">
            <img
              src="images/option2.png"
              alt="Ram Maheshwari Logo Image"
              class="header__logo-img"
            />
          </div>
          <span class="header__logo-sub"><b id="logDes"><</b>Babacar Faye</><b id="logDes">/></b>
        </div>
        <div class="header__main">
          <ul class="header__links">
            <li class="header__link-wrapper">
              <a href="./" class="header__link"> Home </a>
            </li>
            <li class="header__link-wrapper">
              <a href="./#services" class="header__link"> Services </a>
            </li>
            <li class="header__link-wrapper">
              <a href="" class="header__link"> Réalisations </a>
            </li>
            <li class="header__link-wrapper">
              <a href="./#education" class="header__link"> Education </a>
            </li>
            <li class="header__link-wrapper">
              <a href="./#contact" class="header__link"> Contact </a>
            </li>
            <li class="header__sm-menu-link">
              <a href="./#articles"> Articles </a>
            </li>
          </ul>
          <div class="header__main-ham-menu-cont">
            <img
              src="images/humburgermenu.png"
              alt="hamburger menu"
              class="header__main-ham-menu"
            />
            <img
              src="images/humburgermenu.png"
              alt="hamburger menu close"
              class="header__main-ham-menu-close d-none"
            />
          </div>
        </div>
      </div>
      <div class="header__sm-menu">
        <div class="header__sm-menu-content">
          <ul class="header__sm-menu-links">
            <li class="header__sm-menu-link">
              <a href="./"> Home </a>
            </li>

            <li class="header__sm-menu-link">
              <a href="./#about"> About </a>
            </li>
            <li class="header__link-wrapper">
              <a href="./#services" class="header__link"> Services </a>
            </li>

            <li class="header__sm-menu-link">
              <a href="./#realisations"> Réalisations </a>
            </li>
            <li class="header__link-wrapper">
              <a href="./#education" class="header__link"> Education </a>
            </li>

            <li class="header__sm-menu-link">
              <a href="./#contact"> Contact </a>
            </li>
            <li class="header__sm-menu-link">
              <a href="./#articles"> Articles </a>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <section id="hero" class="hero section dark-background">

      <img id="frappe" src="images/option2.png" alt="" data-aos="fade-in">

    <div class="container d-flex flex-column align-items-center justify-content-center text-center" data-aos="fade-up" data-aos-delay="100">
        <h2 id="hey">HEY , I am Faye Babacar </h2><br><br>
        <p><span class="typed" id="hey">Full Stack Developper</span></p>
      </div>
  </section>
    </section><!-- /Hero Section -->
    <!--<section id="frappe" class="home-hero"></section>-->
    <section id="about" class="about sec-pad">
      <div class="main-container">
        <h2 class="heading heading-sec heading-sec__mb-med">
          <span class="heading-sec__main">A Propos</span>
          <span class="heading-sec__sub">
            Here you will find more information about me, what I do, and my
            current skills mostly in terms of programming and technology
          </span>
        </h2>
        <div class="container" data-aos="fade-up" data-aos-delay="100">

         <!-- <div class="row gy-4 justify-content-center">
        <div class="col-lg-4">
            <img src="images/file (1).png"  class="img-fluid" alt="">
          </div>
          
        </div>-->

      </div>
        <div class="text-center about__content">
          <div class="about__content-main">
            <h3 class="about__content-title">Let's Go, Faisons connaissances!</h3>
            <div class="about__content-details">
              <p class="about__content-details-para">
                Je suis <strong>Full Stack Developpeur.</strong> Passionné par le développement logiciel et les technologies web, 
                je concois des applications et sites web adéquats pour booster votre business. Check out some of
                my work in the <strong>Projets</strong> section.
              </p>
              <p class="about__content-details-para">
              Faire de votre projet une réalité, c’est ma mission.
              De la planification à l’exécution, je vous accompagne à chaque étape pour un
               résultat à la hauteur de vos attentes 
</p>
              <p class="about__content-details-para">
                Que vous ayez besoin d'un site e-commerce,
                 d'une application personnalisée ou d'une solution SaaS innovante, 
                 je suis là pour vous accompagner à chaque étape. Votre satisfaction et
                  la réussite de votre projet sont ma priorité
              </p>
            </div>
            
          </div>
          <div class="text-center about__content-skills">
            <h3 class="about__content-title">My Skills</h3>
            <div class="skills">
              <div class="skills__skill">HTML</div>
              <div class="skills__skill">CSS</div>
              <div class="skills__skill">JavaScript</div>
              <div class="skills__skill">Angular</div>
              <div class="skills__skill">Java</div>
              <div class="skills__skill">JEE</div>
              <div class="skills__skill">PHP</div>
              <div class="skills__skill">SQL</div>
              <div class="skills__skill">T-SQL</div>
              <div class="skills__skill">Symfony</div>
              <div class="skills__skill">SASS</div>
              <div class="skills__skill">GIT</div>
              <div class="skills__skill">Github</div>
              <div class="skills__skill">Responsive Design</div>
              <div class="skills__skill">C#</div>
              <div class="skills__skill">C</div>
              <div class="skills__skill">Oracle</div>
              <div class="skills__skill">SQL Server</div>
              <div class="skills__skill">UML</div>
              <div class="skills__skill">Database Administration</div>
              <div class="skills__skill">Gestion de projet Agile</div>
              <div class="skills__skill">Scrum</div>
              <div class="skills__skill">Travail en équipe</div>
              <div class="skills__skill">communication</div>
              <div class="skills__skill">Reseau informatique</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="text-center">
    <div class=" row"><br>
            <div class=" heading-sec__sub">
              <h1><b>Pourquoi devriez-vous me rejoindre ?</b></h1><br>
                <h4>
                  <b>.  </b>Un code bien pensé aujourd'hui, c'est une solution fiable pour demain. <br><br></h4>
                  <h4>
                  <b>.  </b>Votre projet mérite plus qu'une simple exécution, il mérite une attention dédiée <br><br></h4>
                  <h4>
                  <b>.  </b>La réussite d'un projet repose sur une communication claire et une expertise solide

                </h4>
            </div>
            </div><br><br><br>
            <div class="text-center">
              <button type="button" class="btn "><a href="./#contact" class="btn btn--med btn--theme dynamicBgClr"
              >Contact</a
            ></button>
            <button type="button" class="btn "><a href="cv/Faya-Babacar-CV.pdf" download="Faya-Babacar-CV.pdf" class="btn btn--med btn--theme dynamicBgClr"
              > Télécharger mon CV</a
            ></button>
            </div>
    </section>
  
<?php include 'service-about/index.html';?> 

<section id="education" class="text-center container">
  <div class="main-container">
        <h2 class="heading heading-sec heading-sec__mb-bg">
          <span class="heading-sec__main">EDUCATION</span>
          <span class="heading-sec__sub">
            Découvrez mon cursus académique 
          </span>
        </h2><br><br>
      <div class="resume-item">
       <strong> <h4> Software ingeneering Student</h4></strong>
        <h5>Fevrier 2024-Présent</h5>
        <p><em> Sultan Moulay Slimane University</em>Maroc</p>
        <p></p>
      </div>
<br><br>
      <div class="resume-item">
        <strong><h4>Tronc Commun  Mathematiques informatique Physique Chimie</h4></strong>
        <h5>Fevrier 2022 -Fevrier 2024</h5>
        <p><em>Sultan Moulay Slimane University</em>Maroc</p>
        
      </div><br><br>
      <div class="resume-item">
        <strong> <h4>Baccalaureat &amp; Scientifique</h4></strong>
        <h5>Juillet 2021</h5>
        <p><em>Lycée El Hadji Malick Sy</em> Sénégal</p>
        <p>Mention Bien</p>
      </div>
  </div>

</div>
</section>
<br><br>
<section id="contact" class="container">
      <div class="main-container">
        <h2 class="heading heading-sec heading-sec__mb-med">
          <span class="heading-sec__main heading-sec__main--lt">Contact</span>
          <span class="heading-sec__sub heading-sec__sub--lt">
          Envie de collaborer ou de discuter d’un projet inspirant ? 
          Contactez-moi, je serai ravi d’échanger avec vous !
          </span>
        </h2>
        <div class="contact__form-container">
          <form action='index.php' class='contact__form' method='post'><input type='hidden' name='form-name' value='form 1' />
            <div class="contact__form-field">
              <label class="contact__form-label" for="name">Nom</label>
              <input
                required
                placeholder="Enter Your Name"
                type="text"
                class="contact__form-input"
                name="nom"
                id="name"
              />
            </div>
            <div class="contact__form-field">
              <label class="contact__form-label" for="email">Email</label>
              <input
                required
                placeholder="Enter Your Email"
                type="text"
                class="contact__form-input"
                name="email"
                id="email"
              />
            </div>
            <div class="contact__form-field">
              <label class="contact__form-label" for="email">Objet</label>
              <select required
                placeholder="choisir l'objet de votre message"
                type="text"
                class="contact__form-input"
                name="objet"
                id="objet">
                <option>Je veux un site vitrine</option>
                <option>Je veux un site e-commerce</option>
                <option>Je veux un Porfolio Professionnel</option>
                <option>Je veux une application Desktop</option>
                <option>Je veux collaborer</option>
                <option>Juste pour dire Bonjour</option>
                
                </select>
            </div>
            <div class="contact__form-field">
              <label class="contact__form-label" for="message">Message</label>
              <textarea
                required
                cols="30"
                rows="10"
                class="contact__form-input"
                placeholder="Enter Your Message"
                name="message"
                id="message"
              ></textarea>
            </div>
            <button type="submit" class="btn btn--theme contact__btn">
              Envoyer
            </button>
            <?php
            if(!empty($erreur)){
              echo $erreur;
            }
            if(!empty($succes)){
              echo $succes;
            }
            ?>
          </form>
        </div>
      </div>
    </section>
</section><br><br><br><br>

</section>
<section class="text-center container" id="articles">
    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-body-tertiary rounded">
          <h4 class="fst-italic">Mon Journal</h4>
          <p class="mb-0">Découvrez mes articles où je partage mes connaissances, 
          mes projets,les actualités et mes expériences dans le domaine de l'informatique et du développement.</p>
        </div>
        <div>
          <h4 class="fst-italic">mes derniers posts</h4>
          <ul class="list-unstyled">
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                <img class="bd-placeholder-img" width="100%" height="96" src="images/reseau.png" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>
                <div class="col-lg-8">
                  <h6 class="mb-0">Du TDD au RIP, un développeur doit tout savoir faire ! 🌐💻

                     </h6>
                    <small class="text-body-secondary">Décembre 15, 2024</small>
                </div>
              </a>
            </li>
            <li >
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-4 link-body-emphasis text-decoration-none border-top" href="#">
                <img class="bd-placeholder-img" width="100%" height="96" src="images/tdd.png" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect max-width="100%" max-height="100%" fill="#777"/></img>
                <div class="col-lg-8">
                  <h6 class="mb-0"> Test-Driven Development (TDD) avec JUnit : Comment coder sans
                     bug (même quand tu t'appelles Babacar)
                 </h6>
                  <small class="text-body-secondary">Décembre 12, 2024</small>
                </div>
              </a>
            </li>
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="#">
                <img class="bd-placeholder-img" width="100%" height="96" src="images/csnDash.png" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect max-width="100%" max-height="100%" fill="#777"/></img>
                <div class="col-lg-8">
                  <h6 class="mb-0"> Présentation de mon projet académique : Carnet de Santé Numérique</h6>
                  <small class="text-body-secondary">Decembre 8, 2024</small>
                </div>
              </a>
            </li>
          </ul>
        </div>
    </section>
    <?php
    include 'configuration/foot.html';
    ?>