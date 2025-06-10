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

.profile-avatar {
    width: 120px;
    height: 120px;
    background-color: #06B6D4; /* Couleur bleue pour donateurs */
    color: #1E3A8A;
    border-radius: 50%;
    margin-bottom: 20px;
    border: 4px solid white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 48px;
    font-weight: bold;
}
/* Dans ton fichier CSS */
.status-tag {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
}

.status-tag.urgent {
    background-color: #ffebee;
    color: #d32f2f;
}

.status-tag.normal {
    background-color: #e8f5e9;
    color: #388e3c;
}

.satisfy-btn {
    background-color: #1E3A8A;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.satisfy-btn:hover {
    background-color: #388E3C;
}


/* Style pour le sélecteur */
.view-selector {
    margin-left: auto;
}

.content-select {
    padding: 8px 12px;
    border-radius: 4px;
    border: 1px solid #ddd;
    background-color: white;
    cursor: pointer;
}

/* Styles spécifiques pour les cartes */
.card {
    transition: all 0.3s ease;
}

.no-results {
    grid-column: 1 / -1;
    text-align: center;
    padding: 20px;
    color: #666;
}

/* Bouton Satisfaire */
.satisfy-btn {
    background-color: #1E3A8A;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    border: none;
    cursor: pointer;
}

.satisfy-btn:hover {
    background-color: #388E3C;
}

/* Bouton Détails */
.details-btn {
    background-color: #1E3A8A;
    color: white;
    padding: 6px 12px;
    border-radius: 4px;
    text-decoration: none;
}

.details-btn:hover {
    background-color: #1E3A8A;
}

/* Styles pour les différents statuts */
.status-tag {
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
}

.status-tag.urgent {
    background-color: #ffebee;
    color: #d32f2f;
}

.status-tag.normal {
    background-color: #e8f5e9;
    color: #388e3c;
}

.status-tag.delivered {
    background-color: #e8f5e9;
    color: #388e3c;
}

.status-tag.pending {
    background-color: #fff8e1;
    color: #ffa000;
}

/* Styles pour les cartes de dons */
.donation-card {
    border-left: 4px solid #2196F3;
}

.card-type {
    color: #666;
    font-size: 14px;
    margin-bottom: 8px;
}
  .logout-form button {
        background:#1E3A8A ;
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

        .header .logout-link{
            color: var(--color-white);
            font-weight: 500;
            opacity: 0.8;
            transition: opacity 0.3s ease;
            background-color: #1E3A8A;
            box-shadow: none;
            border: none;
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
            margin-bottom: 15px;
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

/* Style de la modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.7);
}

.modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 25px;
    border-radius: 8px;
    width: 60%;
    max-width: 700px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    position: relative;
}

.close-modal {
    position: absolute;
    right: 20px;
    top: 10px;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    color: #aaa;
}

.close-modal:hover {
    color: #333;
}

/* Responsive */
@media (max-width: 768px) {
    .modal-content {
        width: 90%;
        margin: 10% auto;
    }
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
         <form action="{{ route('donateur.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-link">Déconnexion</button>
    </form>
    </header>

    <div class="profile-page-wrapper">
      <div class="profile-left-panel">
    <div class="profile-avatar">{{ $initiales }}</div>
    <div class="profile-info">
        <h4>Nom Complet :</h4>
        <p>{{ $donateur->prenom }} {{ $donateur->nom }}</p>
        <h4>Email :</h4>
        <p>{{ $donateur->email }}</p>
        <h4>Téléphone :</h4>
        <p>{{ $donateur->telephone }}</p>
        <h4>Adresse :</h4>
        <p>{{ $donateur->adresse }}</p>
    </div>


   <a href="{{ route('donateur.formdon') }}" class="btn-faire-don">Faire un don</a>

    <a href="{{ route('don.historique') }}" class="btn-faire-don">L'historique</a>



</div>
<!-- ... (contenu existant avant la section) ... -->

<div class="profile-main-content">
    <section class="content-section">
      <div class="section-header">
    <h3 id="section-title">{{ $currentView === 'besoins' ? 'Besoins Disponibles' : 'Les Dons' }}</h3>
    <div class="view-selector">
        <select id="content-selector" class="content-select">
            <option value="besoins" {{ $currentView === 'besoins' ? 'selected' : '' }}>Voir les besoins</option>
            <option value="dons" {{ $currentView === 'dons' ? 'selected' : '' }}>Voir les dons</option>
        </select>
    </div>
</div>

        <!-- Conteneur pour les besoins -->
    <div class="cards-container" id="besoins-container" style="{{ $currentView !== 'besoins' ? 'display: none;' : '' }}">
    @forelse($besoins as $besoin)
        <div class="card need-card">
            <div class="card-header">
                <h4 class="card-title">{{ $besoin->titre }}</h4>
                <span class="status-tag {{ $besoin->status === 'Urgent' ? 'urgent' : 'normal' }}">
                    {{ $besoin->status }}
                </span>
            </div>
            <p class="card-association-name">{{ $besoin->association->nom }}</p>
            <p class="card-description">{{ Str::limit($besoin->description, 100) }}</p>
            <div class="card-footer">
                <span class="location-info">{{ $besoin->association->adresse }}</span>
                <form method="POST" action="{{ route('besoin.satisfaction', $besoin->id) }}">
                    @csrf
                    <button type="submit" class="satisfy-btn">Satisfaire</button>
                </form>
            </div>
        </div>
    @empty
        <div class="no-results">
            <p>Aucun besoin disponible</p>
        </div>
    @endforelse
</div>

        <!-- Conteneur pour les dons -->
  <div class="cards-container" id="dons-container" style="{{ $currentView !== 'dons' ? 'display: none;' : '' }}">
    @forelse($dons as $don)
        <div class="card donation-card">
            <div class="card-header">
                <h4 class="card-title">{{ $don->titre }}</h4>
                <span class="status-tag {{ $don->statut === 'Donné' ? 'delivered' : 'pending' }}">
                    {{ $don->statut }}
                </span>
            </div>
            <p class="card-type">Type: {{ $don->type }}</p>
            <p class="card-description">{{ Str::limit($don->description, 100) }}</p>
                       <div class="card-footer">
                <span class="date-info">Disponible le: {{ $don->date_disponible->format('d/m/Y') }}</span>
                <button class="details-btn" onclick="showDonDetails({{ $don->id }})">Détails</button>
            </div>
        </div>
    @empty
        <div class="no-results">
            <p>Vous n'avez fait aucun don</p>
        </div>
    @endforelse
</div>
<div id="donDetailsModal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeModal()">&times;</span>
        <div id="donDetailsContent">
            <!-- Les détails seront chargés ici -->
        </div>
    </div>
</div>
    </section>
</div>

<!-- ... (contenu existant après la section) ... -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contentSelector = document.getElementById('content-selector');
    const besoinsContainer = document.getElementById('besoins-container');
    const donsContainer = document.getElementById('dons-container');
    const sectionTitle = document.getElementById('section-title');

    contentSelector.addEventListener('change', function() {
        if (this.value === 'besoins') {
            besoinsContainer.style.display = 'grid';
            donsContainer.style.display = 'none';
            sectionTitle.textContent = 'Besoins Disponibles';
            history.pushState(null, '', '?view=besoins');
        } else {
            besoinsContainer.style.display = 'none';
            donsContainer.style.display = 'grid';
            sectionTitle.textContent = 'Mes Dons';
            history.pushState(null, '', '?view=dons');
        }
    });
});

function showDonDetails(donId) {
    // Afficher le loader
    document.getElementById('donDetailsContent').innerHTML = '<p>Chargement...</p>';
    document.getElementById('donDetailsModal').style.display = 'block';

    // Récupérer les détails via AJAX
    fetch(`/donateur/dons/${donId}/details`)
        .then(response => response.json())
        .then(data => {
            const detailsHtml = `
                <h3>${data.titre}</h3>
                <p><strong>Type:</strong> ${data.type}</p>
                <p><strong>Statut:</strong> <span class="status-tag ${data.statut === 'Donné' ? 'delivered' : 'pending'}">${data.statut}</span></p>
                <p><strong>Description:</strong> ${data.description}</p>
                <p><strong>Localisation:</strong> ${data.localisation}</p>
                <p><strong>Date de disponibilité:</strong> ${new Date(data.date_disponible).toLocaleDateString()}</p>
                ${data.image ? `<img src="/storage/${data.image}" alt="Image du don" style="max-width: 100%; margin-top: 15px;">` : ''}
            `;
            document.getElementById('donDetailsContent').innerHTML = detailsHtml;
        });
}

function closeModal() {
    document.getElementById('donDetailsModal').style.display = 'none';
}

// Fermer la modal si on clique en dehors
window.onclick = function(event) {
    const modal = document.getElementById('donDetailsModal');
    if (event.target == modal) {
        closeModal();
    }
}
</script>
    </div>
</body>
</html>
