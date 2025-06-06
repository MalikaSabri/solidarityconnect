    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SolidarityConnect - Profil Association</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <style>
            /* Color Variables based on the provided images */
            :root {
                --color-dark-blue: #1E3A8A; /* Header, left panel, button, text */
                --color-light-gray-bg: #E5E7EB; /* Main page background */
                --color-white: #FFFFFF; /* Card backgrounds, button text */
                --color-text-dark: #111827; /* General text color */
                --color-light-blue-input: #BFDBFE; /* Used for lighter elements within dark blue sections (not directly in this design but from previous context) */
                --color-teal: #06B6D4; /* "Status don" tag, "m'interesse" button */
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

            .btn-publish-need {
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

            .btn-publish-need:hover {
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

            /* Specific styling for 'Dons Récents' cards on Association page */
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

            .btn-interess {
                background-color: #1E3A8A;
                color: var(--color-white);
            padding: 6px 12px;
                border-radius: 10px;
                font-size: 14px;
                font-weight: 500;
                text-transform: uppercase;
                width: 80px;
                margin-bottom: 33px;
            }
            .btn-interess:hover {
                background-color: #059FB9; /* Darker teal */
            }
            .profile-avatar {
        /* Vos styles existants... */
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 40px;
        font-weight: bold;
        color: var(--color-dark-blue);
    }
    .logout-form {
        display: inline;
        margin: 0;
        padding: 0;
    }

    .logout-form button {
        background: none;
        border: none;
        color: var(--color-white);
        font-weight: 500;
        opacity: 0.8;
        transition: opacity 0.3s ease;
        cursor: pointer;
        font-family: 'Roboto', sans-serif;
        font-size: inherit;
        padding: 0;
    }

    .logout-form button:hover {
        opacity: 1;
        text-decoration: none;
    }

    .no-results {
        grid-column: 1 / -1;
        text-align: center;
        padding: 20px;
        color: var(--color-gray-text);
        font-size: 18px;
    }
.view-selector {
    position: relative;
}

.content-select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: var(--color-light-blue-input);
    color: var(--color-dark-blue-text);
    padding: 8px 35px 8px 15px;
    border: 1px solid var(--color-dark-blue);
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    outline: none;
}

.view-selector::after {
    content: '▼';
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--color-dark-blue);
    pointer-events: none;
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
                .btn-publish-need {
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
                .btn-interess {
                    padding: 6px 12px;
                    font-size: 14px;
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
                .btn-publish-need {
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
        @if(session('success'))
        <div class="alert alert-success" style="position: fixed; top: 20px; right: 20px; padding: 15px; background-color: #d4edda; color: #155724; border-radius: 5px; z-index: 1000;">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                document.querySelector('.alert-success').style.display = 'none';
            }, 3000);
        </script>
    @endif
        <header class="header">
            <a href="#" class="logo">SolidarityConnect</a>
            <form action="{{ route('association.logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="logout-link">Déconnexion</button>
    </form>
        </header>

        <div class="profile-page-wrapper">
        <div class="profile-left-panel">
        <div class="profile-avatar" style="background-color: {{ $association->color }};">
        @php
            // Récupérer les initiales du nom complet
            $words = explode(' ', $association->nom_complet);
            $initials = '';

            // Prendre la première lettre du premier mot
            if(count($words) > 0) {
                $initials .= strtoupper(substr($words[0], 0, 1));
            }

            // Si il y a un deuxième mot, prendre sa première lettre
            // if(count($words) > 1) {
            //     $initials .= strtoupper(substr($words[1], 0, 1));
            // }

            // // Si pas de deuxième mot, juste garder la première lettre
            // echo $initials;
        @endphp
        {{ $association->initials }}
    </div>
        <div class="profile-info">
            <h4>Nom Complet :</h4>
            <p>{{ $association->nom_complet }}</p>
            <h4>Email :</h4>
            <p>{{ $association->email }}</p>
            <h4>Téléphone :</h4>
            <p>{{ $association->telephone }}</p>
        </div>
        <a href="{{ route('association.besoin.create') }}" class="btn-publish-need">publier un besoin</a>
    </div>

            <div class="profile-main-content">
            <section class="urgent-needs-section">
<div class="section-header">
    <h3>Besoins Urgents</h3>
    <div class="view-selector">
        <select id="content-selector" class="content-select">
            <option value="besoins">Voir les besoins</option>
            <option value="dons">Voir les dons</option>
        </select>
    </div>
</div>
     <div class="cards-container" id="besoins-container">
    @forelse($allNeeds as $need)
        <div class="card need-card">
               <div class="card need-card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $need->titre }}</h4>
                    </div>
                    <p class="card-association-name">{{ $need->association->nom_complet }}</p>
                    <p class="card-description">{{ $need->description }}</p>
                    <div class="card-footer">
                        <span class="location-info">{{ $need->association->adresse }}</span>
                        <span class="info-tag">{{ $need->status }}</span>
                    </div>
                </div>
        </div>
    @empty
        <div class="no-results">
            <p>Aucun besoin trouvé</p>
        </div>
    @endforelse
</div>
    </section>

            <section class="recent-donations-section">
 
   <div class="cards-container" id="dons-container" style="display: none;">
    @forelse($allDonations as $donation)
        <div class="card donation-card">
           <div class="card donation-card">
                    <span class="status-tag">{{ $donation->statut }}</span>
                    <form action="{{ route('association.interesse', $donation->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-interess">m'interesse</button>
                    </form>
                    <div class="card-image-placeholder">
                        @if($donation->image)
                            <img src="{{ asset('storage/' . $donation->image) }}" alt="Image du don">
                        @else
                            <span>Image du don</span>
                        @endif
                    </div>
                    <h4 class="card-title">{{ $donation->titre }}</h4>
                    <p class="card-description">{{ $donation->description }}</p>
                    <div class="card-footer">
                        <span class="location-info">{{ $donation->localisation }}</span>
                        <span class="info-tag">{{ $donation->type }}</span>
                    </div>
                </div>
        </div>
    @empty
        <div class="no-results">
            <p>Aucun don trouvé</p>
        </div>
    @endforelse
</div>
    </section>
            </div>
        </div>
    </body>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const contentSelector = document.getElementById('content-selector');
    const besoinsContainer = document.querySelector('.urgent-needs-section .cards-container');
    const donsContainer = document.querySelector('.recent-donations-section .cards-container');

    // Cache initial des dons (on montre les besoins par défaut)
    donsContainer.style.display = 'none';

    contentSelector.addEventListener('change', function() {
        if (this.value === 'besoins') {
            besoinsContainer.style.display = 'grid';
            donsContainer.style.display = 'none';
            document.querySelector('.urgent-needs-section h3').textContent = 'Besoins Urgents';
        } else {
            besoinsContainer.style.display = 'none';
            donsContainer.style.display = 'grid';
            document.querySelector('.urgent-needs-section h3').textContent = 'Dons Récents';
        }
    });

    // Gestion du chargement initial en fonction de l'URL
    const urlParams = new URLSearchParams(window.location.search);
    const view = urlParams.get('view');
    if (view === 'dons') {
        contentSelector.value = 'dons';
        contentSelector.dispatchEvent(new Event('change'));
    }
});
</script>
    </html>
