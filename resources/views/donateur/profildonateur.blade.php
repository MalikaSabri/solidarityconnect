<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect - Profil Donateur</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Color Variables */
        :root {
            --color-dark-blue: #1E3A8A; /* Header, left panel, button, text */
            --color-light-gray-bg: #E5E7EB; /* Main page background */
            --color-white: #FFFFFF; /* Card backgrounds, button text */
            --color-text-dark: #111827; /* General text color */
            --color-light-blue-input: #BFDBFE; /* Used for lighter elements within dark blue sections (not directly in this design but from previous context) */
            --color-teal: #06B6D4; /* "satisfaction" and "Status don" tags */
            --color-blue-tag: #BFDBFE; /* "Type de don" tag */
            --color-gray-text: #6B7280; /* Secondary text like descriptions, placeholders */
            --color-dark-blue-text: #1E3A8A; /* Specifically for "Voir tous les besoins/dons" */
        }

        /* General Body & Reset */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: var(--color-light-gray-bg);
            color: var(--color-text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a {
            text-decoration: none;
            color: inherit;
        }
        .active{
            margin-top: 40px;
        }

        /* Header */
        .header {
            background-color: var(--color-dark-blue);
            padding: 15px 40px; /* Adjusted padding to match image */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color: var(--color-white);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--color-white);
        }

        .header .logout-link {
            color: var(--color-white);
            font-weight: 500;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .header .logout-link:hover {
            opacity: 1;
        }

        /* Main Content Wrapper */
        .profile-page-wrapper {
            display: flex;
            flex-grow: 1;
            padding: 30px; /* Padding around the entire content area */
            gap: 30px; /* Space between left panel and main content */
        }

        /* Left Panel (Profile Info) */
        .profile-left-panel {
            background-color: var(--color-dark-blue);
            width: 280px; /* Fixed width as per image */
            min-width: 280px; /* Prevent shrinking */
            border-radius: 15px; /* Slight rounded corners */
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--color-white);
            flex-shrink: 0; /* Prevents it from shrinking too much */
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background-color: var(--color-light-gray-bg); /* Placeholder for avatar */
            border-radius: 50%;
            margin-bottom: 30px;
            border: 4px solid var(--color-white); /* White border around avatar */
        }

        .profile-info {
            width: 100%;
            text-align: left;
            margin-bottom: 40px;
        }

        .profile-info h4 {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 10px;
            color: var(--color-white); /* Ensure text is white */
        }

        .profile-info p {
            font-size: 16px;
            margin-bottom: 25px; /* Space between info items */
            padding-bottom: 5px; /* Space for dotted line */
            border-bottom: 1px dashed var(--color-white); /* Dotted line */
            color: var(--color-white); /* Ensure text is white */
        }

        .profile-info p:last-child {
            margin-bottom: 0;
            border-bottom: none; /* No border for the last one */
        }

        .btn-faire-don {
            display: inline-block;
            background-color: var(--color-white);
            color: var(--color-dark-blue);
            padding: 14px 40px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            transition: background-color 0.3s ease, color 0.3s ease;
            width: 80%; /* Adjusted width */
            text-align: center;
        }

        .btn-faire-don:hover {
            background-color: #f0f0f0;
            color: var(--color-dark-blue);
        }

        /* Main Content Area (Needs and Donations) */
        .profile-main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 40px; /* Space between sections */
            padding-right: 20px; /* Small padding on the right for overall content */
        }

        /* Section Styling (Besoins Urgents, Dons Récents) */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h3 {
            font-size: 28px;
            font-weight: 500;
            color: var(--color-text-dark);
            margin: 0;
        }

        .section-header .view-all-link {
            font-size: 16px;
            font-weight: 500;
            color: var(--color-dark-blue-text); /* Blue color for links */
            transition: text-decoration 0.3s ease;
        }

        .section-header .view-all-link:hover {
            text-decoration: underline;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Responsive grid */
            gap: 25px; /* Space between cards */
        }

        /* Card Styling */
        .card {
            background-color: var(--color-white);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 20px;
            font-weight: 500;
            color: var(--color-text-dark);
            margin: 0;
        }

        .status-tag {
            background-color: var(--color-teal);
            color: var(--color-white);
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .card-association-name {
            font-size: 16px;
            color: var(--color-gray-text);
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 15px;
            color: var(--color-gray-text);
            line-height: 1.5;
            margin-bottom: 20px;
            flex-grow: 1; /* Allows description to take up available space */
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: auto; /* Pushes footer to the bottom of the card */
        }

        .location-info {
            display: flex;
            align-items: center;
            font-size: 15px;
            color: var(--color-gray-text);
        }

        .location-info::before {
            content: '📍'; /* Unicode for location pin */
            margin-right: 5px;
            font-size: 18px;
        }

        .info-tag {
            background-color: var(--color-blue-tag);
            color: var(--color-dark-blue);
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
        }

        /* Specific styling for 'Dons Récents' cards */
        .donation-card .card-image-placeholder {
            width: 100%;
            height: 150px;
            background-color: var(--color-light-gray-bg);
            border-radius: 8px;
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--color-gray-text);
            font-size: 14px;
        }

        .donation-card .status-tag {
            position: absolute;
            top: 20px;
            right: 20px;
        }


        /* Responsive Design */
        @media (max-width: 1200px) {
            .profile-page-wrapper {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }

            .profile-left-panel {
                width: 100%;
                max-width: 500px; /* Limit width on smaller screens */
                padding: 30px 20px;
            }

            .profile-main-content {
                width: 100%;
                padding-right: 0;
            }

            .cards-container {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 15px 20px;
                align-items: flex-start;
            }
            .header .logout-link {
                margin-top: 10px;
                align-self: flex-end; /* Push logout to the right */
            }

            .profile-page-wrapper {
                padding: 15px;
                gap: 20px;
            }

            .profile-left-panel {
                padding: 20px 15px;
            }
            .profile-avatar {
                width: 100px;
                height: 100px;
                margin-bottom: 20px;
            }
            .profile-info h4 {
                font-size: 16px;
            }
            .profile-info p {
                font-size: 14px;
                margin-bottom: 15px;
            }
            .btn-faire-don {
                font-size: 16px;
                padding: 12px 30px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                margin-bottom: 15px;
            }
            .section-header h3 {
                font-size: 24px;
                margin-bottom: 10px;
            }
            .section-header .view-all-link {
                font-size: 14px;
            }

            .cards-container {
                grid-template-columns: 1fr; /* Single column on very small screens */
                gap: 20px;
            }

            .card {
                padding: 20px;
            }
            .card-title {
                font-size: 18px;
            }
            .status-tag, .info-tag {
                font-size: 13px;
                padding: 5px 10px;
            }
            .card-association-name, .card-description, .location-info {
                font-size: 14px;
            }
            .donation-card .card-image-placeholder {
                height: 120px;
            }
        }

        @media (max-width: 480px) {
            .header .logo {
                font-size: 20px;
            }
            .profile-left-panel {
                padding: 15px;
            }
            .profile-avatar {
                width: 80px;
                height: 80px;
            }
            .profile-info h4 {
                font-size: 15px;
            }
            .profile-info p {
                font-size: 13px;
            }
            .btn-faire-don {
                padding: 10px 25px;
                font-size: 15px;
            }
            .section-header h3 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">SolidarityConnect</a>
        <a href="#" class="logout-link">Déconnexion</a>
    </header>

    <div class="profile-page-wrapper">
        <div class="profile-left-panel">
            <div class="profile-avatar"></div>
            <div class="profile-info">
                <h4>Nom Complet :</h4>
                <p>----------</p>
                <h4>Email :</h4>
                <p>----------</p>
                <h4>Téléphone :</h4>
                <p>----------</p>
            </div>
            <a href="#" class="btn-faire-don">Faire un don</a>
            <a href="#" class="btn-faire-don active" >L'historique</a>
        </div>

        <div class="profile-main-content">
            <section class="urgent-needs-section">
                <div class="section-header">
                    <h3>Besoins Urgents</h3>
                    <a href="#" class="view-all-link">Voir tous les besoins</a>
                </div>
                <div class="cards-container">
                    <div class="card need-card">
                        <div class="card-header">
                            <h4 class="card-title">Titre du besoin</h4>
                            <a href="" class="status-tag">satisfaction</a>
                        </div>
                        <p class="card-association-name">Nom de l'association</p>
                        <p class="card-description">description du besoin</p>
                        <div class="card-footer">
                            <span class="location-info">Adresse de l'association</span>
                            <span class="info-tag">Satus du besion</span>
                        </div>
                    </div>
                    <div class="card need-card">
                        <div class="card-header">
                            <h4 class="card-title">Titre du besoin</h4>
                            <a href="" class="status-tag">satisfaction</a>
                        </div>
                        <p class="card-association-name">Nom de l'association</p>
                        <p class="card-description">description du besoin</p>
                        <div class="card-footer">
                            <span class="location-info">Adresse de l'association</span>
                            <span class="info-tag">Satus du besion</span>
                        </div>
                    </div>
                    <div class="card need-card">
                        <div class="card-header">
                            <h4 class="card-title">Titre du besoin</h4>
                            <a href="" class="status-tag">satisfaction</a>
                        </div>
                        <p class="card-association-name">Nom de l'association</p>
                        <p class="card-description">description du besoin</p>
                        <div class="card-footer">
                            <span class="location-info">Adresse de l'association</span>
                            <span class="info-tag">Satus du besion</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="recent-donations-section">
                <div class="section-header">
                    <h3>Dons Récents</h3>
                    <a href="#" class="view-all-link">Voir tous les dons</a>
                </div>
                <div class="cards-container">
                    <div class="card donation-card">
                        <span class="status-tag">Status don</span>
                        <div class="card-image-placeholder">Image du don</div>
                        <h4 class="card-title">Titre du don</h4>
                        <p class="card-description">Description du don</p>
                        <div class="card-footer">
                            <span class="location-info">Localisation du don</span>
                            <span class="info-tag">Type de don</span>
                        </div>
                    </div>
                    <div class="card donation-card">
                        <span class="status-tag">Status don</span>
                        <div class="card-image-placeholder">Image du don</div>
                        <h4 class="card-title">Titre du don</h4>
                        <p class="card-description">Description du don</p>
                        <div class="card-footer">
                            <span class="location-info">Localisation du don</span>
                            <span class="info-tag">Type de don</span>
                        </div>
                    </div>
                    <div class="card donation-card">
                        <span class="status-tag">Status don</span>
                        <div class="card-image-placeholder">Image du don</div>
                        <h4 class="card-title">Titre du don</h4>
                        <p class="card-description">Description du don</p>
                        <div class="card-footer">
                            <span class="location-info">Localisation du don</span>
                            <span class="info-tag">Type de don</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
