<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Color Variables (from show.html) */
        :root {
            --color-dark-blue: #1E3A8A;
            --color-teal: #06B6D4;
            --color-light-gray: #E5E7EB;
            --color-light-blue-input: #BFDBFE;
            --color-black-text: #111827;
            --color-white: #FFFFFF;
        }

        /* General Body & Reset (harmonized with show.html) */
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif; /* Adopted from show.html */
            background-color: var(--color-light-gray); /* Adopted from show.html */
            box-sizing: border-box;
            color: var(--color-black-text); /* Adopted from show.html */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Header (Directly from show.html styles) */
        .header { /* Using .header class as in show.html */
            background-color: var(--color-dark-blue);
            padding: 15px 0; /* Matches show.html padding */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color: var(--color-white);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--color-white);
        }

        .navbar {
            display: flex;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: var(--color-white);
            font-weight: 500;
            padding: 5px 0;
            position: relative;
            transition: color 0.3s ease, opacity 0.3s ease;
            opacity: 0.8;
        }

        .nav-links a:hover {
            opacity: 1;
        }

        .nav-links a.active {
            opacity: 1;
            font-weight: 700;
        }

        /* Active link underline style */
        .nav-links a.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 2px;
            background-color: var(--color-white);
        }

        /* Hero Section (Keep existing style from test.html for content below header) */
        .hero {
            background: url('/images/solidarity.jpeg') center/cover no-repeat;
            height: 400px;
            color: white;
            text-align: center;
            padding-top: 100px;
        }

        .hero h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .hero p {
            margin-bottom: 1rem;
        }

        .hero button {
            margin: 0 1rem;
            background-color:  #1E3A8A;
            border: none;
            padding: 10px 20px;
            color: rgb(255, 255, 255);
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Features Section */
        .features {
            display: flex;
            justify-content: space-around;
            padding: 3rem 2rem;
            background-color: white;
        }

        .feature-box {
            background-color: #1E3A8A;
            color: white;
            padding: 1.5rem;
            width: 20%;
            border-radius: 10px;
            text-align: center;
        }

        .feature-box i {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        /* Testimonials Section */
        .testimonials {
            text-align: center;
            padding: 2rem;
            background-color: #BFDBFE;
        }

        .testimonials h2 {
            margin-bottom: 2rem;
        }

        .testimonial-boxes {
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        .testimonial {
            background-color: white;
            color: #1E3A8A;
            border-radius: 20px;
            padding: 1.5rem;
            width: 25%;
        }

        /* Footer */
        footer {
            background-color: #1E3A8A;
            color: white;
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-section {
            width: 23%;
            margin-bottom: 1rem;
        }

        .footer-section a {
            color: white;
            text-decoration: none;
            display: block;
            margin: 0.3rem 0;
        }

        .social-icons i {
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .copyright {
            text-align: center;
            width: 100%;
            margin-top: 2rem;
            font-size: 0.9rem;
        }

        /* Responsive Design (adapted from show.html) */
        @media (max-width: 992px) {
            .header-container {
                padding: 0 15px; /* Adjust padding for smaller screens */
            }
            .hero {
                padding-top: 80px;
                height: 350px;
            }
        }

        @media (max-width: 768px) {
            /* Header Responsive (from show.html) */
            .header-container {
                flex-direction: column;
                align-items: center; /* Center items horizontally */
                padding: 0 15px; /* Adjust padding for smaller screens */
            }
            .logo {
                margin-bottom: 15px; /* Space between logo and nav links when stacked */
            }
            .navbar {
                width: 100%;
                margin-top: 0; /* Reset margin from previous version if any */
            }
            .nav-links {
                flex-wrap: wrap;
                gap: 20px; /* Adjust gap for wrapped items */
                justify-content: center;
                width: 100%;
            }
            .nav-links a {
                margin-left: 0; /* Remove margin-left if gap is used */
            }

            .hero {
                height: 300px;
                padding-top: 60px;
            }
            .hero h1 {
                font-size: 1.8rem;
            }
            .features {
                flex-direction: column;
                align-items: center;
                padding: 2rem 1rem;
            }
            .feature-box {
                width: 80%;
                margin-bottom: 1.5rem;
            }
            .testimonial-boxes {
                flex-direction: column;
                align-items: center;
            }
            .testimonial {
                width: 80%;
                margin-bottom: 1rem;
            }
            footer {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .footer-section {
                width: 80%;
                margin-bottom: 1.5rem;
            }
            .social-icons {
                display: flex;
                justify-content: center;
                margin-top: 1rem;
            }
        }

        @media (max-width: 480px) {
            .logo {
                font-size: 20px;
            }
            .nav-links a {
                font-size: 14px;
            }
            .hero {
                height: 250px;
                padding-top: 40px;
            }
            .hero h1 {
                font-size: 1.5rem;
            }
            .hero button {
                padding: 8px 15px;
                font-size: 0.9rem;
            }
            .feature-box {
                width: 90%;
            }
            .testimonial {
                width: 90%;
            }
            .footer-section {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container header-container">
            <a href="#" class="logo">SolidarityConnect</a>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="{{ url('/') }}" class="active">Accueil</a></li>
                    <li><a href="{{ url('/inscrire') }}" >Inscrire</a></li>
                    <li><a href="{{ url('/connecter') }}">Se connecter</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <h1>Commencez un avenir solidaire et lumineux</h1>
        <p>Une plateforme qui relie les donateurs aux associations en toute simplicité.</p>
        <a href="{{ url('/login') }}">
        <button>Faire un don</button>
        </a>
        <a href="{{ url('/inscrire') }}">
        <button>Inscrire mon association</button>
        </a>
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
