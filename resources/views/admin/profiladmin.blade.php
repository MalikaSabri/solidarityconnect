<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect - Profil Administrateur</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Color Variables based on the provided images */
        :root {
            --color-dark-blue: #1E3A8A; /* Header, left panel, button, some text */
            --color-light-gray-bg: #E5E7EB; /* Main page background */
            --color-white: #FFFFFF; /* Card backgrounds, button text */
            --color-text-dark: #111827; /* General text color for readability */
            --color-light-blue-card: #BFDBFE; /* Light blue for info cards and table header */
            --color-teal: #06B6D4; /* Used for "Donateur" and "Association" tags */
            --color-gray-text: #6B7280; /* Secondary text like descriptions */
            --color-light-bg-icon: #D1D5DB; /* Placeholder background for icons */
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
        .admin-page-wrapper {
            display: flex;
            flex-grow: 1;
            padding: 30px;
            gap: 30px;
        }

        /* Left Panel (Admin Info) */
        .admin-left-panel {
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

        .admin-avatar {
            width: 120px;
            height: 120px;
            background-color: var(--color-light-gray-bg); /* Placeholder for avatar */
            border-radius: 50%;
            margin-bottom: 20px;
            border: 4px solid var(--color-white); /* White border around avatar */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            font-weight: 500;
            color: var(--color-dark-blue);
        }

        .admin-role {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 30px;
            color: var(--color-white);
            text-align: center;
        }

        .admin-info {
            width: 100%;
            text-align: left;
            margin-bottom: 40px;
        }

        .admin-info h4 {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 10px;
            color: var(--color-white);
        }

        .admin-info p {
            font-size: 16px;
            margin-bottom: 25px;
            padding-bottom: 5px;
            border-bottom: 1px dashed var(--color-white);
            color: var(--color-white);
        }

        .admin-info p:last-child {
            margin-bottom: 0;
            border-bottom: none;
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

        /* Main Content Area (Cards and Tables) */
        .admin-main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Top Info Cards */
        .info-cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .info-card {
            background-color: var(--color-light-blue-card);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            color: var(--color-dark-blue);
        }

        .info-card .icon {
            width: 50px;
            height: 50px;
            background-color: var(--color-white); /* White background for icon */
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
            font-size: 24px;
            color: var(--color-dark-blue); /* Icon color */
        }
        /* Specific icons using unicode or font-awesome if available, otherwise just text */
        .info-card .icon.users::before { content: '👥'; }
        .info-card .icon.associations::before { content: '🏢'; }
        .info-card .icon.donations::before { content: '🛍️'; }


        .info-card h4 {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .info-card p {
            font-size: 16px;
            color: var(--color-dark-blue);
            opacity: 0.8;
        }

        /* Section Styling */
        .section-box {
            background-color: var(--color-white);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
        }

        .section-box h3 {
            font-size: 22px;
            font-weight: 500;
            color: var(--color-text-dark);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--color-light-gray-bg); /* Subtle separator */
        }

        /* Activity & Pending Associations Grid */
        .middle-sections-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 30px;
        }

        /* Activity List */
        .activity-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
            border-bottom: 1px dashed var(--color-light-gray-bg);
            padding-bottom: 15px;
        }

        .activity-item:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0;
        }

        .activity-avatar {
            width: 45px;
            height: 45px;
            background-color: var(--color-light-gray-bg);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .activity-details {
            flex-grow: 1;
        }

        .activity-details p {
            margin: 0;
            font-size: 16px;
            line-height: 1.4;
        }

        .activity-details .main-text {
            font-weight: 500;
            color: var(--color-text-dark);
        }

        .activity-details .sub-text {
            font-size: 14px;
            color: var(--color-gray-text);
        }

        .activity-icon {
            width: 30px;
            height: 30px;
            background-color: var(--color-light-gray-bg);
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            color: var(--color-gray-text);
            flex-shrink: 0;
        }
        .activity-icon::before { content: '📄'; /* Document icon */ }

        /* Associations en Attente List */
        .pending-association-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            border-bottom: 1px dashed var(--color-light-gray-bg);
            padding-bottom: 15px;
        }
        .pending-association-item:last-child {
            margin-bottom: 0;
            border-bottom: none;
            padding-bottom: 0;
        }

        .pending-association-avatar {
            width: 45px;
            height: 45px;
            background-color: var(--color-light-gray-bg);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .pending-association-details {
            flex-grow: 1;
        }

        .pending-association-details p {
            margin: 0;
            font-size: 16px;
            line-height: 1.4;
            font-weight: 500;
            color: var(--color-text-dark);
        }

        .pending-association-details .location {
            font-size: 14px;
            color: var(--color-gray-text);
        }

        .pending-actions {
            display: flex;
            gap: 10px;
            flex-shrink: 0;
        }

        .pending-actions .action-icon {
            width: 30px;
            height: 30px;
            background-color: var(--color-light-gray-bg);
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            color: var(--color-gray-text);
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .pending-actions .action-icon:hover {
            background-color: #DDE0E5;
        }
        .pending-actions .action-icon.check::before { content: '✅'; }
        .pending-actions .action-icon.edit::before { content: '📝'; }
        .pending-actions .action-icon.delete::before { content: '❌'; }


        /* Recent Users Table */
        .users-table {
            width: 100%;
            border-collapse: separate; /* Allows border-radius on cells/rows */
            border-spacing: 0 10px; /* Space between rows */
        }

        .users-table thead th {
            background-color: var(--color-light-blue-card);
            color: var(--color-dark-blue);
            font-size: 18px;
            font-weight: 500;
            padding: 15px 20px;
            text-align: left;
            border-radius: 10px 10px 0 0; /* Rounded top corners */
        }
        .users-table thead th:first-child {
            border-top-left-radius: 10px;
        }
        .users-table thead th:last-child {
            border-top-right-radius: 10px;
        }
        /* Adjust for no top-left/right if it's not the first/last in general */
        .users-table thead tr:first-child th:first-child { border-top-left-radius: 10px; }
        .users-table thead tr:first-child th:last-child { border-top-right-radius: 10px; }


        .users-table tbody tr {
            background-color: var(--color-white);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05); /* Subtle shadow per row */
            border-radius: 10px; /* Rounded corners for each row */
            overflow: hidden; /* Ensures content respects border-radius */
        }

        .users-table tbody td {
            padding: 15px 20px;
            font-size: 16px;
            color: var(--color-text-dark);
            vertical-align: middle;
        }

        .users-table tbody td:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        .users-table tbody td:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .user-name-cell {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar-small {
            width: 40px;
            height: 40px;
            background-color: var(--color-light-gray-bg);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .role-tag {
            background-color: var(--color-teal);
            color: var(--color-white);
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            text-transform: capitalize;
            display: inline-block;
        }

        .role-tag.donateur { background-color: var(--color-teal); }
        .role-tag.association { background-color: var(--color-light-blue-card); color: var(--color-dark-blue); } /* Association tag as in image */

        .action-icon-table {
            width: 30px;
            height: 30px;
            background-color: var(--color-light-gray-bg);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            color: var(--color-gray-text);
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .action-icon-table:hover {
            background-color: #DDE0E5;
        }
        .action-icon-table.delete::before { content: '🚫'; } /* Banned icon */


        /* Responsive Design */
        @media (max-width: 1200px) {
            .admin-page-wrapper {
                flex-direction: column;
                align-items: center;
                padding: 20px;
            }

            .admin-left-panel {
                width: 100%;
                max-width: 500px;
                padding: 30px 20px;
            }

            .admin-main-content {
                width: 100%;
                padding-right: 0;
            }

            .info-cards-grid,
            .middle-sections-grid {
                grid-template-columns: 1fr; /* Stack columns */
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

            .admin-page-wrapper {
                padding: 15px;
                gap: 20px;
            }

            .admin-left-panel {
                padding: 20px 15px;
            }
            .admin-avatar {
                width: 100px;
                height: 100px;
                margin-bottom: 15px;
                font-size: 35px;
            }
            .admin-role {
                font-size: 16px;
                margin-bottom: 25px;
            }
            .admin-info h4 {
                font-size: 16px;
            }
            .admin-info p {
                font-size: 14px;
                margin-bottom: 15px;
            }
            .btn-retour {
                font-size: 16px;
                padding: 12px 30px;
            }

            .info-card {
                padding: 20px;
            }
            .info-card h4 {
                font-size: 18px;
            }
            .info-card p {
                font-size: 14px;
            }
            .info-card .icon {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }

            .section-box {
                padding: 20px;
            }
            .section-box h3 {
                font-size: 20px;
                margin-bottom: 15px;
            }

            .activity-item, .pending-association-item {
                gap: 10px;
                padding-bottom: 10px;
                margin-bottom: 10px;
            }
            .activity-avatar, .pending-association-avatar {
                width: 40px;
                height: 40px;
            }
            .activity-details p, .pending-association-details p {
                font-size: 15px;
            }
            .activity-details .sub-text, .pending-association-details .location {
                font-size: 13px;
            }
            .activity-icon, .action-icon {
                width: 28px;
                height: 28px;
                font-size: 16px;
            }

            .users-table thead th,
            .users-table tbody td {
                padding: 12px 15px;
                font-size: 15px;
            }
            .user-avatar-small {
                width: 35px;
                height: 35px;
            }
            .role-tag {
                font-size: 13px;
                padding: 5px 10px;
            }
            .action-icon-table {
                width: 28px;
                height: 28px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .header .logo {
                font-size: 20px;
            }
            .admin-left-panel {
                padding: 15px;
            }
            .admin-avatar {
                width: 80px;
                height: 80px;
                font-size: 30px;
            }
            .admin-role {
                font-size: 15px;
            }
            .admin-info h4 {
                font-size: 15px;
            }
            .admin-info p {
                font-size: 13px;
            }
            .btn-retour {
                padding: 10px 25px;
                font-size: 15px;
            }
            .info-card {
                padding: 15px;
            }
            .info-card h4 {
                font-size: 16px;
            }
            .info-card p {
                font-size: 13px;
            }
            .section-box {
                padding: 15px;
            }
            .section-box h3 {
                font-size: 18px;
            }

            .users-table thead th,
            .users-table tbody td {
                padding: 10px 12px;
                font-size: 14px;
            }
            .user-name-cell {
                flex-direction: column; /* Stack name and avatar if needed */
                align-items: flex-start;
                gap: 5px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">SolidarityConnect</a>
        <a href="#" class="logout-link">Déconnexion</a>
    </header>

    <div class="admin-page-wrapper">
        <div class="admin-left-panel">
            <div class="admin-avatar">EM</div>
            <p class="admin-role">Administrateur</p>
            <div class="admin-info">
                <h4>Nom Complet :</h4>
                <p>----------</p>
                <h4>Email :</h4>
                <p>----------</p>
                <h4>Téléphone :</h4>
                <p>----------</p>
            </div>

        </div>

        <div class="admin-main-content">
            <div class="info-cards-grid">
                <div class="info-card">
                    <div class="icon users"></div>
                    <h4>Utilisateurs</h4>
                    <p>Nombre d'utilisateur</p>
                </div>
                <div class="info-card">
                    <div class="icon associations"></div>
                    <h4>Associations</h4>
                    <p>Nombre d'association</p>
                </div>
                <div class="info-card">
                    <div class="icon donations"></div>
                    <h4>Dons</h4>
                    <p>Nombre du don</p>
                </div>
            </div>

            <div class="middle-sections-grid">
                <div class="section-box activity-section">
                    <h3>Activité récente</h3>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-avatar"></div>
                            <div class="activity-details">
                                <p class="main-text">Donateur a fait un don</p>
                                <p class="sub-text">Type de don</p>
                                <p class="sub-text">Date de don</p>
                            </div>
                            <div class="activity-icon"></div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-avatar"></div>
                            <div class="activity-details">
                                <p class="main-text">Association a ajouté un besoin</p>
                                <p class="sub-text">Titre du besoins</p>
                                <p class="sub-text">Date de besoin</p>
                            </div>
                            <div class="activity-icon"></div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-avatar"></div>
                            <div class="activity-details">
                                <p class="main-text">Donateur a fait un don</p>
                                <p class="sub-text">Type de don</p>
                                <p class="sub-text">Date de don</p>
                            </div>
                            <div class="activity-icon"></div>
                        </div>
                    </div>
                </div>

                <div class="section-box pending-associations-section">
                    <h3>Associations en attente</h3>
                    <div class="pending-associations-list">
                        <div class="pending-association-item">
                            <div class="pending-association-avatar"></div>
                            <div class="pending-association-details">
                                <p>nom d'association</p>
                                <p class="location">Lieu d'association</p>
                            </div>
                            <div class="pending-actions">

                                <div class="action-icon edit"></div>
                                <div class="action-icon delete"></div>
                            </div>
                        </div>
                        <div class="pending-association-item">
                            <div class="pending-association-avatar"></div>
                            <div class="pending-association-details">
                                <p>nom d'association</p>
                                <p class="location">Lieu d'association</p>
                            </div>
                            <div class="pending-actions">

                                <div class="action-icon edit"></div>
                                <div class="action-icon delete"></div>
                            </div>
                        </div>
                        <div class="pending-association-item">
                            <div class="pending-association-avatar"></div>
                            <div class="pending-association-details">
                                <p>nom d'association</p>
                                <p class="location">Lieu d'association</p>
                            </div>
                            <div class="pending-actions">

                                <div class="action-icon edit"></div>
                                <div class="action-icon delete"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-box recent-users-section">
                <h3>Utilisateurs récents</h3>
                <table class="users-table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Role</th>
                            <th>Inscription</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="user-name-cell">
                                <div class="user-avatar-small"></div>
                                Nom Complet
                            </td>
                            <td><span class="role-tag donateur">Donateur</span></td>
                            <td>Date Inscription</td>
                            <td><div class="action-icon-table delete"></div></td>
                        </tr>
                        <tr>
                            <td class="user-name-cell">
                                <div class="user-avatar-small"></div>
                                Nom Complet
                            </td>
                            <td><span class="role-tag association">Association</span></td>
                            <td>Date Inscription</td>
                            <td><div class="action-icon-table delete"></div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
