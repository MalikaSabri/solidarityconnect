<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect - Connecter Association</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<style>
    /* Color Variables */
:root {
    --color-dark-blue: #1E3A8A;
    --color-teal: #06B6D4;
    --color-light-gray: #E5E7EB;
    --color-light-blue-input: #BFDBFE;
    --color-black-text: #111827;
    --color-white: #FFFFFF;
}

/* General Body & Reset */
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: var(--color-light-gray); /* Background of the entire page */
    color: var(--color-black-text);
    min-height: 100vh; /* Ensure full height for layout */
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

/* Header */
.header {
    background-color: var(--color-dark-blue);
    padding: 15px 0;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    color: var(--color-white); /* Text color for header */
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
    transition: color 0.3s ease;
    opacity: 0.8;
}

.nav-links a:hover {
    opacity: 1;
}

.nav-links a.active {
    opacity: 1;
    font-weight: 700;
}

/* Register Page Wrapper */
.register-page-wrapper {
    flex-grow: 1; /* Allows it to take up remaining space */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px; /* Padding around the main content */
    gap: 40px; /* Space between left panel and form container */
}

/* Left Panel */
.register-left-panel {
    background-color: var(--color-light-gray); /* Same as body background */
    text-align: center;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center content vertically */
    align-items: center; /* Center content horizontally */
    flex-shrink: 0; /* Don't shrink */
    width: 280px; /* Fixed width as in image */
    max-width: 100%; /* For responsiveness */
}

.welcome-heading {
    font-size: 48px;
    font-weight: 700;
    color: var(--color-dark-blue);
    margin-bottom: 20px;
}

.welcome-text {
    font-size: 18px;
    color: var(--color-black-text);
    margin-bottom: 30px;
    line-height: 1.5;
}

.btn-connect {
    display: inline-block;
    background-color: var(--color-dark-blue);
    color: var(--color-white);
    padding: 12px 35px;
    border-radius: 5px;
    font-size: 18px;
    font-weight: 500;
    transition: background-color 0.3s ease;
}

.btn-connect:hover {
    background-color: #1a306b; /* Slightly darker dark blue */
}

/* Registration Form Container */
.register-form-container {
    background-color: var(--color-dark-blue);
    color: var(--color-white);
    border-radius: 20px 80px 80px 20px; /* Custom border-radius for the unique shape */
    padding: 40px 60px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    position: relative;
    width: 700px; /* Fixed width */
    max-width: calc(100% - 40px); /* Max width considering padding */
}

.form-tabs {
    position: absolute;
    top: 40px; /* Align with top padding */
    right: 60px; /* Align with right padding */
    display: flex;
    background-color: var(--color-light-blue-input); /* Background of tab container */
    border-radius: 5px;
    overflow: hidden;
    color: var(--color-black-text);
}

.tab-button {
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    text-transform: uppercase;
}

.tab-button.active {
    background-color: var(--color-teal);
    color: var(--color-white);
}

.tab-button:not(.active):hover {
    background-color: #bed6f0; /* Lighter shade of light-blue-input */
}


.form-title {
    font-size: 32px;
    font-weight: 500;
    margin-bottom: 40px;
    margin-top: 80px; /* Push down to make space for tabs */
    text-align: center;
}

.registration-form {
    display: flex;
    flex-direction: column;
    gap: 25px; /* Space between form groups */
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Two columns */
    gap: 25px; /* Space between grid items */
}

/* For the login page, we'll only have two inputs vertically stacked */
.registration-form > .form-group {
    width: 100%; /* Make them take full width within the form */
}


.form-group {
    position: relative;
    background-color: var(--color-light-blue-input);
    border-radius: 8px;
    padding: 15px 20px; /* Padding inside the input box */
}

.form-group label {
    position: absolute;
    top: 15px; /* Adjust based on padding */
    left: 20px; /* Adjust based on padding */
    color: var(--color-black-text);
    font-size: 16px;
    pointer-events: none; /* Allows clicks to pass through to input */
    transition: all 0.2s ease-out;
    background-color: transparent; /* No background on label */
    padding: 0 5px; /* Small padding for background if it floats */
    transform-origin: left top;
}

.form-group input {
    width: calc(100% - 10px); /* Adjust width considering padding */
    padding: 5px 0; /* Smaller internal padding */
    border: none;
    background-color: transparent;
    color: var(--color-black-text);
    font-size: 18px;
    outline: none;
    /* Ensure text aligns with label when input is empty */
    line-height: 1.5;
}

/* Floating Label Effect */
.form-group input:focus + label,
.form-group input:not(:placeholder-shown) + label {
    top: -10px; /* Move label up */
    font-size: 14px; /* Shrink label */
    color: var(--color-black-text); /* Keep label color */
    background-color: var(--color-light-blue-input); /* Match input background */
    padding: 0 5px; /* Padding for the floating background */
    left: 15px; /* Adjust left for floating label */
}

.btn-inscrire {
    align-self: flex-end; /* Align to the right */
    background-color: var(--color-white);
    color: var(--color-dark-blue);
    padding: 14px 45px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin-top: 20px; /* Space from last row of inputs */
}

.btn-inscrire:hover {
    background-color: #f0f0f0; /* Slightly darker white */
    color: var(--color-dark-blue);
}

/* Responsive Design */
@media (max-width: 992px) {
    .register-page-wrapper {
        flex-direction: column; /* Stack panels vertically */
        padding: 30px 20px;
        gap: 30px;

    }

    .register-left-panel {
        width: 100%;
        padding: 30px;
    }

    .register-form-container {
        border-radius: 20px; /* Make it a simple rectangle */
        padding: 40px;
        width: 100%;
        max-width: 600px; /* Limit max width for forms */

    }

    .form-tabs {
        position: static; /* Remove absolute positioning */
        margin-bottom: 20px; /* Add space below tabs */
        justify-content: center; /* Center tabs */
    }

    .form-title {
        margin-top: 0; /* No need for extra margin if tabs are static */
    }
}

@media (max-width: 768px) {
    .header-container {
        flex-direction: column;
        align-items: flex-start;
    }
    .navbar {
        width: 100%;
        margin-top: 15px;
    }
    .nav-links {
        justify-content: center;
        width: 100%;
        flex-wrap: wrap;
        gap: 20px;
    }

    .welcome-heading {
        font-size: 40px;
    }
    .welcome-text {
        font-size: 16px;
    }

    .register-form-container {
        padding: 30px;
    }
    .form-title {
        font-size: 28px;
    }
    .form-grid {
        grid-template-columns: 1fr; /* Single column on smaller screens */
    }
    .btn-inscrire {
        align-self: center; /* Center the button */
        width: 100%;
        max-width: 250px;
    }
    .form-group label {
        font-size: 15px;
    }
    .form-group input {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .header-container {
        padding: 0 15px;
    }
    .logo {
        font-size: 20px;
    }
    .nav-links a {
        font-size: 14px;
    }

    .register-page-wrapper {
        padding: 20px 10px;
    }

    .welcome-heading {
        font-size: 34px;
    }
    .welcome-text {
        font-size: 15px;
    }
    .btn-connect {
        padding: 10px 25px;
        font-size: 16px;
    }

    .register-form-container {
        padding: 25px 20px;
    }
    .form-tabs {
        font-size: 14px;
        padding: 8px 15px;
    }
    .form-title {
        font-size: 24px;
    }
    .form-group {
        padding: 12px 15px;
    }
    .form-group label {
        top: 12px;
        left: 15px;
    }
    .form-group input:focus + label,
    .form-group input:not(:placeholder-shown) + label {
        top: -8px;
        left: 10px;
        font-size: 12px;
    }
    .btn-inscrire {
        padding: 12px 30px;
        font-size: 16px;
    }
}
</style>
<body>
    <header class="header">
        <div class="container header-container">
            <a href="#" class="logo">SolidarityConnect</a>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Inscrire</a></li>
                    <li><a href="#" class="active">Se connecter</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="register-page-wrapper">


        <div class="register-form-container">
            <div class="form-tabs">
                <a href="#" class="tab-button tab-association ">association</a>
                <a href="#" class="tab-button tab-donateur ">donateur</a>
                <a href="#" class="tab-button tab-administrateur active">administrateur</a>
            </div>

            <h3 class="form-title">Connecter en tant qu'administrateur</h3>

            <form action="{{ route('login') }}" method="POST" class="registration-form">
                @csrf
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required placeholder=" ">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe *</label>
                    <input type="password" id="password" name="password" required placeholder=" ">
                </div>
                <button type="submit" class="btn-inscrire">Inscrire</button>
            </form>
        </div>
    </div>
</body>
</html><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect - Connecter Association</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<style>
    /* Color Variables */
:root {
    --color-dark-blue: #1E3A8A;
    --color-teal: #06B6D4;
    --color-light-gray: #E5E7EB;
    --color-light-blue-input: #BFDBFE;
    --color-black-text: #111827;
    --color-white: #FFFFFF;
}

/* General Body & Reset */
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: var(--color-light-gray); /* Background of the entire page */
    color: var(--color-black-text);
    min-height: 100vh; /* Ensure full height for layout */
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

/* Header */
.header {
    background-color: var(--color-dark-blue);
    padding: 15px 0;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    color: var(--color-white); /* Text color for header */
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
    transition: color 0.3s ease;
    opacity: 0.8;
}

.nav-links a:hover {
    opacity: 1;
}

.nav-links a.active {
    opacity: 1;
    font-weight: 700;
}

/* Register Page Wrapper */
.register-page-wrapper {
    flex-grow: 1; /* Allows it to take up remaining space */
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px; /* Padding around the main content */
    gap: 40px; /* Space between left panel and form container */
}

/* Left Panel */
.register-left-panel {
    background-color: var(--color-light-gray); /* Same as body background */
    text-align: center;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center content vertically */
    align-items: center; /* Center content horizontally */
    flex-shrink: 0; /* Don't shrink */
    width: 280px; /* Fixed width as in image */
    max-width: 100%; /* For responsiveness */
}

.welcome-heading {
    font-size: 48px;
    font-weight: 700;
    color: var(--color-dark-blue);
    margin-bottom: 20px;
}

.welcome-text {
    font-size: 18px;
    color: var(--color-black-text);
    margin-bottom: 30px;
    line-height: 1.5;
}

.btn-connect {
    display: inline-block;
    background-color: var(--color-dark-blue);
    color: var(--color-white);
    padding: 12px 35px;
    border-radius: 5px;
    font-size: 18px;
    font-weight: 500;
    transition: background-color 0.3s ease;
}

.btn-connect:hover {
    background-color: #1a306b; /* Slightly darker dark blue */
}

/* Registration Form Container */
.register-form-container {
    background-color: var(--color-dark-blue);
    color: var(--color-white);
    border-radius: 20px 80px 80px 20px; /* Custom border-radius for the unique shape */
    padding: 40px 60px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    position: relative;
    width: 700px; /* Fixed width */
    max-width: calc(100% - 40px); /* Max width considering padding */
}

.form-tabs {
    position: absolute;
    top: 40px; /* Align with top padding */
    right: 60px; /* Align with right padding */
    display: flex;
    background-color: var(--color-light-blue-input); /* Background of tab container */
    border-radius: 5px;
    overflow: hidden;
    color: var(--color-black-text);
}

.tab-button {
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    text-transform: uppercase;
}

.tab-button.active {
    background-color: var(--color-teal);
    color: var(--color-white);
}

.tab-button:not(.active):hover {
    background-color: #bed6f0; /* Lighter shade of light-blue-input */
}


.form-title {
    font-size: 32px;
    font-weight: 500;
    margin-bottom: 40px;
    margin-top: 80px; /* Push down to make space for tabs */
    text-align: center;
}

.registration-form {
    display: flex;
    flex-direction: column;
    gap: 25px; /* Space between form groups */
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Two columns */
    gap: 25px; /* Space between grid items */
}

/* For the login page, we'll only have two inputs vertically stacked */
.registration-form > .form-group {
    width: 100%; /* Make them take full width within the form */
}


.form-group {
    position: relative;
    background-color: var(--color-light-blue-input);
    border-radius: 8px;
    padding: 15px 20px; /* Padding inside the input box */
}

.form-group label {
    position: absolute;
    top: 15px; /* Adjust based on padding */
    left: 20px; /* Adjust based on padding */
    color: var(--color-black-text);
    font-size: 16px;
    pointer-events: none; /* Allows clicks to pass through to input */
    transition: all 0.2s ease-out;
    background-color: transparent; /* No background on label */
    padding: 0 5px; /* Small padding for background if it floats */
    transform-origin: left top;
}

.form-group input {
    width: calc(100% - 10px); /* Adjust width considering padding */
    padding: 5px 0; /* Smaller internal padding */
    border: none;
    background-color: transparent;
    color: var(--color-black-text);
    font-size: 18px;
    outline: none;
    /* Ensure text aligns with label when input is empty */
    line-height: 1.5;
}

/* Floating Label Effect */
.form-group input:focus + label,
.form-group input:not(:placeholder-shown) + label {
    top: -10px; /* Move label up */
    font-size: 14px; /* Shrink label */
    color: var(--color-black-text); /* Keep label color */
    background-color: var(--color-light-blue-input); /* Match input background */
    padding: 0 5px; /* Padding for the floating background */
    left: 15px; /* Adjust left for floating label */
}

.btn-inscrire {
    align-self: flex-end; /* Align to the right */
    background-color: var(--color-white);
    color: var(--color-dark-blue);
    padding: 14px 45px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin-top: 20px; /* Space from last row of inputs */
}

.btn-inscrire:hover {
    background-color: #f0f0f0; /* Slightly darker white */
    color: var(--color-dark-blue);
}

/* Responsive Design */
@media (max-width: 992px) {
    .register-page-wrapper {
        flex-direction: column; /* Stack panels vertically */
        padding: 30px 20px;
        gap: 30px;

    }

    .register-left-panel {
        width: 100%;
        padding: 30px;
    }

    .register-form-container {
        border-radius: 20px; /* Make it a simple rectangle */
        padding: 40px;
        width: 100%;
        max-width: 600px; /* Limit max width for forms */

    }

    .form-tabs {
        position: static; /* Remove absolute positioning */
        margin-bottom: 20px; /* Add space below tabs */
        justify-content: center; /* Center tabs */
    }

    .form-title {
        margin-top: 0; /* No need for extra margin if tabs are static */
    }
}

@media (max-width: 768px) {
    .header-container {
        flex-direction: column;
        align-items: flex-start;
    }
    .navbar {
        width: 100%;
        margin-top: 15px;
    }
    .nav-links {
        justify-content: center;
        width: 100%;
        flex-wrap: wrap;
        gap: 20px;
    }

    .welcome-heading {
        font-size: 40px;
    }
    .welcome-text {
        font-size: 16px;
    }

    .register-form-container {
        padding: 30px;
    }
    .form-title {
        font-size: 28px;
    }
    .form-grid {
        grid-template-columns: 1fr; /* Single column on smaller screens */
    }
    .btn-inscrire {
        align-self: center; /* Center the button */
        width: 100%;
        max-width: 250px;
    }
    .form-group label {
        font-size: 15px;
    }
    .form-group input {
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .header-container {
        padding: 0 15px;
    }
    .logo {
        font-size: 20px;
    }
    .nav-links a {
        font-size: 14px;
    }

    .register-page-wrapper {
        padding: 20px 10px;
    }

    .welcome-heading {
        font-size: 34px;
    }
    .welcome-text {
        font-size: 15px;
    }
    .btn-connect {
        padding: 10px 25px;
        font-size: 16px;
    }

    .register-form-container {
        padding: 25px 20px;
    }
    .form-tabs {
        font-size: 14px;
        padding: 8px 15px;
    }
    .form-title {
        font-size: 24px;
    }
    .form-group {
        padding: 12px 15px;
    }
    .form-group label {
        top: 12px;
        left: 15px;
    }
    .form-group input:focus + label,
    .form-group input:not(:placeholder-shown) + label {
        top: -8px;
        left: 10px;
        font-size: 12px;
    }
    .btn-inscrire {
        padding: 12px 30px;
        font-size: 16px;
    }
}
</style>
<body>
    <header class="header">
        <div class="container header-container">
            <a href="#" class="logo">SolidarityConnect</a>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Inscrire</a></li>
                    <li><a href="#" class="active">Se connecter</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="register-page-wrapper">


        <div class="register-form-container">
            <div class="form-tabs">
                <a href="#" class="tab-button tab-association ">association</a>
                <a href="#" class="tab-button tab-donateur ">donateur</a>
                <a href="#" class="tab-button tab-administrateur active">administrateur</a>
            </div>

            <h3 class="form-title">Connecter en tant qu'administrateur</h3>

            <form action="{{ route('login') }}" method="POST" class="registration-form">
                @csrf
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required placeholder=" ">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe *</label>
                    <input type="password" id="password" name="password" required placeholder=" ">
                </div>
                <button type="submit" class="btn-inscrire">Inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>
