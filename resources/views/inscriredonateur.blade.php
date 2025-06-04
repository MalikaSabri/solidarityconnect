<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect - Inscription Donateur</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container header-container">
            <a href="#" class="logo">SolidarityConnect</a>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#" class="active">Inscrire</a></li>
                    <li><a href="#">Se connecter</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="register-page-wrapper">
        <div class="register-left-panel">
            <h2 class="welcome-heading">Welcome</h2>
            <p class="welcome-text">Un petit geste pour vous, un grand changement pour quelqu'un d'autre</p>
            <a href="#" class="btn-connect">Se Connecter</a>
        </div>

        <div class="register-form-container">
            <div class="form-tabs">
                <a href="#" class="tab-button tab-association">association</a>
                <a href="#" class="tab-button tab-donateur active">donateur</a>
            </div>

            <h3 class="form-title">Inscrire en tant que donateur</h3>

            <form action="{{ route('register') }}" method="POST" class="registration-form">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="nom">Nom *</label>
                        <input type="text" id="nom" name="nom" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom *</label>
                        <input type="text" id="prenom" name="prenom" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="email">email *</label>
                        <input type="email" id="email" name="email" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="password">mot de passe *</label>
                        <input type="password" id="password" name="password" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="telephone">telephone *</label>
                        <input type="tel" id="telephone" name="telephone" required placeholder=" ">
                    </div>
                    <div class="form-group">
                        <label for="adresse">adresse /Ville *</label>
                        <input type="text" id="adresse" name="adresse" required placeholder=" ">
                    </div>
                </div>
                <button type="submit" class="btn-inscrire">Inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>
