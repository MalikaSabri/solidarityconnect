<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect - Historique Donateur</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Color Variables based on the provided images */
        :root {
            --color-dark-blue: #1E3A8A; /* Header, left panel, button, text */
            --color-light-gray-bg: #E5E7EB; /* Main page background */
            --color-white: #FFFFFF; /* Table background, button text */
            --color-text-dark: #111827; /* General text color */
            --color-light-blue-table-header: #BFDBFE; /* Table header background */
            --color-teal: #06B6D4; /* "Voir tous" button background */
            --color-gray-text: #6B7280; /* Secondary text like descriptions */
            --color-dark-blue-text: #1E3A8A; /* Text within light blue elements */
            --color-soft-blue-button: #BFDBFE; /* "Voir tous" button color */
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
            padding: 15px 40px;
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
        .page-wrapper {
            display: flex;
            flex-grow: 1;
            padding: 30px;
            gap: 30px;
        }

        /* Left Panel (Profile Info) */
        .left-panel {
            background-color: var(--color-dark-blue);
            width: 280px;
            min-width: 280px;
            border-radius: 15px;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: var(--color-white);
            flex-shrink: 0;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background-color: var(--color-light-gray-bg); /* Placeholder for avatar */
            border-radius: 50%;
            margin-bottom: 30px;
            border: 4px solid var(--color-white); /* White border around avatar */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            font-weight: 500;
            color: var(--color-dark-blue);
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
            color: var(--color-white);
        }

        .profile-info p {
            font-size: 16px;
            margin-bottom: 25px;
            padding-bottom: 5px;
            border-bottom: 1px dashed var(--color-white);
            color: var(--color-white);
        }

        .profile-info p:last-child {
            margin-bottom: 0;
            border-bottom: none;
        }

        .btn-panel {
            display: inline-block;
            background-color: var(--color-white);
            color: var(--color-dark-blue);
            padding: 14px 40px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            transition: background-color 0.3s ease, color 0.3s ease;
            width: 80%;
            text-align: center;
            margin-top: 15px; /* Space between buttons if stacked */
        }
        .btn-panel.first {
            margin-top: auto; /* Push to bottom if no other element below profile info */
        }

        .btn-panel:hover {
            background-color: #f0f0f0;
            color: var(--color-dark-blue);
        }

        /* Main Content Area (Table) */
        .main-content {
            flex-grow: 1;
            background-color: var(--color-white);
            color: var(--color-text-dark);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }

        .history-table {
            width: 100%;
            border-collapse: separate; /* Allows border-radius on cells/rows */
            border-spacing: 0 10px; /* Space between rows */
        }

        .history-table thead th {
            background-color: var(--color-light-blue-table-header);
            color: var(--color-dark-blue-text);
            font-size: 18px;
            font-weight: 500;
            padding: 15px 20px;
            text-align: left;
        }
        .history-table thead th:first-child {
            border-top-left-radius: 10px;
        }
        .history-table thead th:last-child {
            border-top-right-radius: 10px;
        }


        .history-table tbody tr {
            background-color: var(--color-white);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05); /* Subtle shadow per row */
            border-radius: 10px; /* Rounded corners for each row */
            overflow: hidden; /* Ensures content respects border-radius */
        }

        .history-table tbody td {
            padding: 15px 20px;
            font-size: 16px;
            color: var(--color-text-dark);
            vertical-align: middle;
        }

        .history-table tbody td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        .history-table tbody td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .table-button {
            display: inline-flex; /* Use flex to align text and number */
            align-items: center;
            justify-content: center;
            background-color: var(--color-soft-blue-button);
            color: var(--color-dark-blue-text); /* Text color for the button */
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            min-width: 90px; /* Ensure consistent width */
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .table-button:hover {
            background-color: #ABCDEF; /* Slightly darker light blue on hover */
        }

        .table-button .notification-number {
            background-color: var(--color-dark-blue); /* Dark blue circle */
            color: var(--color-white);
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            margin-left: 8px; /* Space between text and number */
            flex-shrink: 0; /* Prevent shrinking */
        }
        .profile-avatar {
    width: 120px;
    height: 120px;
    background-color: #06B6D4; /* Couleur bleue pour donateurs */
    color:#1E3A8A;
    border-radius: 50%;
    margin-bottom: 20px;
    border: 4px solid white;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 48px;
    font-weight: bold;
}
      .profile-avatar {
            width: 120px;
            height: 120px;
            background-color: var(--color-light-gray-bg); /* Placeholder for avatar */
            border-radius: 50%;
            margin-bottom: 30px;
            border: 4px solid var(--color-white); /* White border around avatar */
        }

                .btn-retour {
            display: inline-block;
            background-color: var(--color-white);
            color: var(--color-dark-blue);
            padding: 14px 40px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            transition: background-color 0.3s ease, color 0.3s ease;
            width: 80%;
            text-align: center;
            margin-top: auto; /* Push to bottom */
        }

        .btn-retour:hover {
            background-color: #f0f0f0;
            color: var(--color-dark-blue);
        }

                .header .logout-link {
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


        /* Responsive Design */
        @media (max-width: 1200px) {
            .page-wrapper {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }

            .left-panel {
                width: 100%;
                max-width: 500px;
                padding: 30px 20px;
            }

            .main-content {
                width: 100%;
                padding: 30px;
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
                align-self: flex-end;
            }

            .page-wrapper {
                padding: 15px;
                gap: 20px;
            }

            .left-panel {
                padding: 20px 15px;
            }
            .profile-avatar {
                width: 100px;
                height: 100px;
                margin-bottom: 20px;
                font-size: 35px;
            }
            .profile-info h4 {
                font-size: 16px;
            }
            .profile-info p {
                font-size: 14px;
                margin-bottom: 15px;
            }
            .btn-panel {
                font-size: 16px;
                padding: 12px 30px;
            }

            .main-content {
                padding: 25px;
            }

            .history-table thead th,
            .history-table tbody td {
                padding: 12px 15px;
                font-size: 15px;
            }
            .table-button {
                padding: 6px 12px;
                font-size: 14px;
                min-width: 80px;
            }
            .table-button .notification-number {
                width: 22px;
                height: 22px;
                font-size: 13px;
                margin-left: 6px;
            }
        }

        @media (max-width: 480px) {
            .header .logo {
                font-size: 20px;
            }
            .left-panel {
                padding: 15px;
            }
            .profile-avatar {
                width: 80px;
                height: 80px;
                font-size: 30px;
            }
            .profile-info h4 {
                font-size: 15px;
            }
            .profile-info p {
                font-size: 13px;
            }
            .btn-panel {
                padding: 10px 25px;
                font-size: 15px;
            }
            .main-content {
                padding: 20px;
            }
            .history-table thead th,
            .history-table tbody td {
                padding: 10px 12px;
                font-size: 14px;
            }
            .table-button {
                min-width: unset; /* Allow button to shrink */
                padding: 5px 10px;
                font-size: 13px;
            }
            .table-button .notification-number {
                width: 20px;
                height: 20px;
                font-size: 12px;
                margin-left: 5px;
            }
            /* Stack table columns if possible, or allow horizontal scroll */
            .history-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
            .history-table thead, .history-table tbody, .history-table tr {
                display: inline-block;
                vertical-align: top;
            }
            .history-table th, .history-table td {
                display: block;
                text-align: center;
                width: 150px; /* Fixed width for columns */
                box-sizing: border-box;
            }
            .history-table th:first-child, .history-table td:first-child { text-align: left; }
            .history-table th:last-child, .history-table td:last-child { text-align: right; }
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

    <div class="page-wrapper">
          <div class="left-panel">
         <div class="profile-avatar">{{ $initiales }}</div>
            <div class="profile-info">
                <h4>Nom Complet :</h4>
                <p>{{ $donateur->prenom }} {{ $donateur->nom }}</p>
                <h4>Email :</h4>
                <p>{{ $donateur->email }}</p>
                <h4>Téléphone :</h4>
                <p>{{ $donateur->telephone ?? 'Non renseigné' }}</p>
            </div>
            <a href="{{ route('donateur.profil') }}" class="btn-retour">Retour</a>
        </div>

        <div class="main-content">
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Type de don</th>
                        <th>Status</th>
                        <th>Association interesse</th>
                    </tr>
                </thead>
            <tbody>
    @forelse($dons as $don)
    <tr>
        <td>{{ $don->titre }}</td>
        <td>{{ $don->type }}</td>
        <td>{{ $don->statut }}</td>
        <td>
            <a href="{{ route('don.association.interessees', ['donation' => $don->id]) }}" class="table-button">
    Voir tous <span class="notification-number">{{ $don->interesses_count }}</span>
</a>

        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4">Aucun don effectué</td>
    </tr>
    @endforelse
</tbody>

            </table>
        </div>
    </div>
</body>
</html>
