<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @vite('resources/css/home.css')
</head>
<body>
   <header>
    <div><strong>SolidarityConnect</strong></div>
    <nav>
      <a href="{{ route('home') }}">Accueil</a>
      <a href="{{ route('inscrire.donateur') }}">Inscrire</a>
      <a href="">Se connecter</a>
    </nav>
  </header>

  <section class="hero">
    <h1>Commencez un avenir solidaire et lumineux</h1>
    <p>Une plateforme qui relie les donateurs aux associations en toute simplicité.</p>
    <button>Faire un don</button>
    <button>Inscrire mon association</button>
  </section>

  <section class="features">
    <div class="feature-box">
      <i class="fas fa-hand-holding-heart"></i>
      <p>Plateforme 100% gratuite<br>Pas de frais cachés, pour les donateurs ni pour les associations.</p>
    </div>
    <div class="feature-box">
      <i class="fas fa-laptop"></i>
      <p>Interface simple et moderne<br>Design épuré et adaptatif, utilisable sur mobile et ordinateur.</p>
    </div>
    <div class="feature-box">
      <i class="fas fa-bolt"></i>
      <p>Impact social direct<br>Vos dons vont aux associations locales vérifiées.</p>
    </div>
  </section>

  <section class="testimonials">
    <h2>Temoignages</h2>
    <div class="testimonial-boxes">
      <div class="testimonial">
        <strong>Samira, donatrice</strong>
        <p>"Grâce à SolidarityConnect, j’ai pu faire don de mes meubles à une association près de chez moi !"</p>
      </div>
      <div class="testimonial">
        <strong>Association Espoir</strong>
        <p>"Cette plateforme a changé notre manière de recevoir les dons. Plus rapide, plus clair !"</p>
      </div>
      <div class="testimonial">
        <strong>Youssef, donateur</strong>
        <p>"Je pensais jeter mes anciens vêtements... mais grâce à cette plateforme, ils ont trouvé une nouvelle vie chez une famille dans le besoin."</p>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer-section">
      <h3>SolidarityConnect</h3>
      <p>Plateforme de solidarité connectant donateurs et associations pour faciliter le don de biens matériels et améliorer l’efficacité de la redistribution.</p>
      <div class="social-icons">
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
      </div>
    </div>
    <div class="footer-section">
      <h4>Liens Rapides</h4>
      <a href="#">Accueil</a>
      <a href="#">Faire un don</a>
      <a href="#">Inscrire mon association</a>
    </div>
    <div class="footer-section">
      <h4>Ressources</h4>
      <a href="#">Blog</a>
      <a href="#">FAQ</a>
      <a href="#">Centre d’aide</a>
      <a href="#">Statistiques</a>
    </div>
    <div class="copyright">
      © 2025 SolidarityConnect. Tous droits réservés.
    </div>
  </footer>
</body>
</html>
