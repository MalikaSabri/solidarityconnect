<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolidarityConnect - Nouveau Don</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Color Variables from previous styles */
        :root {
            --color-dark-blue: #1E3A8A;
            --color-teal: #06B6D4;
            --color-light-gray-bg: #E5E7EB;
            --color-white: #FFFFFF;
            --color-text-dark: #111827;
            --color-light-blue-input: #BFDBFE; /* Light blue for input backgrounds */
            --color-gray-text: #6B7280; /* Secondary text like descriptions */
            --color-blue-button-bg: #1E3A8A; /* Dark blue for main buttons */
            --color-blue-button-text: #FFFFFF;
            --color-border-gray: #D1D5DB; /* Light border for certain elements */
            --color-light-teal: #B2EBF2; /* Lighter teal for active steps */
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
        .label{
           margin-bottom: 1000px;
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
            background-color: var(--color-light-gray-bg);
            border-radius: 50%;
            margin-bottom: 30px;
            border: 4px solid var(--color-white);
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

        /* Main Form Container */
        .form-main-container {
            flex-grow: 1;
            background-color:#FFFFFF;
            color: var(--color-white);
            border-radius: 15px;
            padding: 40px 60px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            position: relative;
            max-width: calc(100% - 40px);
            display: flex;
            flex-direction: column;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .form-header h3 {
            font-size: 28px;
            font-weight: 500;
            margin: 0;
           color: black;
        }

        /* Step Indicators */
        .step-indicators {
            display: flex;
            gap: 15px;
        }

        .step-indicator {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--color-light-blue-input);
            color: var(--color-dark-blue);
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 700;
            font-size: 16px;
        }

        .step-indicator.active {
            background-color: var(--color-teal);
            color: var(--color-white);
        }
        .step-indicator.completed {
            background-color: var(--color-light-teal); /* A slightly different shade for completed steps */
            color: var(--color-dark-blue);
        }

        /* Form Steps */
        .form-step {
            display: none; /* Hidden by default */
            flex-grow: 1; /* Allow content to take space */
            padding-bottom: 20px; /* Space above buttons */
        }

        .form-step.active {
            display: block; /* Show active step */
            color: black;
        }

        /* Page 1: Type de don */
        .type-selection-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px; /* Space below title */
        }

        .type-option {
            background-color: var(--color-light-blue-input);
            color: var(--color-dark-blue);
            padding: 25px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .type-option:hover {
            background-color: #A9D0FF; /* Slightly darker light-blue-input */
            transform: translateY(-2px);
        }
        .type-option.selected {
            background-color: var(--color-teal);
            color: var(--color-white);
        }
        .type-option img {
            width: 40px; /* Example size for icons */
            height: 40px;
            filter: brightness(0) saturate(100%) invert(18%) sepia(87%) saturate(2250%) hue-rotate(218deg) brightness(89%) contrast(90%); /* Icon color to match dark blue */
        }
        .type-option.selected img {
            filter: brightness(0) saturate(100%) invert(100%) sepia(0%) saturate(7500%) hue-rotate(240deg) brightness(110%) contrast(100%); /* White icon for selected */
        }


        /* Page 2: Détails du don */
        .form-group {
            position: relative;
            background-color: var(--color-light-blue-input);
            border-radius: 8px;
            padding: 15px 20px;
            margin-bottom: 25px; /* Space between form groups */
        }

        .form-group label {
            position: absolute;
            top: 15px;
            left: 20px;
            color: var(--color-dark-blue); /* Label text color */
            font-size: 16px;
            pointer-events: none;
            transition: all 0.2s ease-out;
            background-color: transparent;
            padding: 0 5px;
            transform-origin: left top;
        }

        .form-group input,
        .form-group textarea {
            width: calc(100% - 10px);
            padding: 5px 0;
            border: none;
            background-color: transparent;
            color: var(--color-text-dark);
            font-size: 18px;
            outline: none;
            line-height: 1.5;
            resize: vertical; /* Allow textarea to be resized vertically */
            min-height: 40px; /* Minimum height for textarea */
        }

        .form-group textarea {
            min-height: 100px; /* Taller for description */
        }

        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label,
        .form-group textarea:focus + label,
        .form-group textarea:not(:placeholder-shown) + label {
            top: -10px;
            font-size: 14px;
            color: var(--color-dark-blue);
            background-color: var(--color-light-blue-input);
            padding: 0 5px;
            left: 15px;
        }

        .photo-upload-section {
            margin-top: 20px;
        }

        .photo-upload-label {
            font-size: 18px;
            font-weight: 500;
            color: var(--color-black);
            margin-bottom: 15px;
            display: block;
        }

        .photo-upload-box {
            background-color: var(--color-light-blue-input);
            border-radius: 8px;
            width: 150px; /* Fixed size as in image */
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border: 2px dashed var(--color-dark-blue);
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .photo-upload-box:hover {
            background-color: #A9D0FF;
            border-color: var(--color-teal);
        }

        .photo-upload-box input[type="file"] {
            display: none;
        }

        .photo-upload-box .plus-icon {
            font-size: 50px;
            color: var(--color-dark-blue);
            font-weight: 300;
        }

        /* Page 3: Modalités de remise */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .form-grid .form-group {
            margin-bottom: 0; /* Remove default margin as grid handles spacing */
        }

        .date-time-group {
            display: flex;
            gap: 15px;
        }

        .date-time-group .form-group {
            flex-grow: 1;
            margin-bottom: 0;
        }

        .date-time-group .form-group.date-input {
            flex-basis: 60%;
        }

        .date-time-group .form-group.time-input {
            flex-basis: 40%;
        }

        .date-time-group .form-group .info-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: var(--color-dark-blue);
            cursor: pointer;
        }

        /* Form Navigation Buttons */
        .form-navigation {
            display: flex;
            justify-content: flex-end; /* Align to right for 'Suivant' */
            gap: 20px;
            margin-top: auto; /* Push buttons to the bottom of the form-main-container */
            padding-top: 20px; /* Space from content above */
        }

        .form-navigation button {
            padding: 12px 35px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
            border: none;
        }

        .form-navigation .btn-previous {
            background-color: #1E3A8A;
            color: #E5E7EB;
        }

        .form-navigation .btn-previous:hover {
            background-color: #f0f0f0;
            color:#1E3A8A;
        }

        .form-navigation .btn-next,
        .form-navigation .btn-publish {
            background-color: var(--color-teal);
            color: var(--color-white);
        }

        .form-navigation .btn-next:hover,
        .form-navigation .btn-publish:hover {
            background-color: #059FB9; /* Darker teal */
        }
.type-option.selected {
    border: 2px solid #007BFF;
    background-color: #f0f8ff;
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

            .form-main-container {
                width: 100%;
                padding: 30px 40px;
            }

            .type-selection-grid {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
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
            }
            .profile-info h4 {
                font-size: 16px;
            }
            .profile-info p {
                font-size: 14px;
                margin-bottom: 15px;
            }
            .btn-retour {
                font-size: 16px;
                padding: 12px 30px;
            }

            .form-main-container {
                padding: 25px 25px;
                background-color: #FFFFFF;
            }

            .form-header h3 {
                font-size: 24px;
                color: black;
            }

            .step-indicator {
                width: 25px;
                height: 25px;
                font-size: 14px;
            }

            .type-selection-grid {
                grid-template-columns: 1fr; /* Single column on small screens */
            }

            .type-option {
                padding: 20px;
                font-size: 16px;
            }

            .form-group input,
            .form-group textarea {
                font-size: 16px;
            }

            .form-grid {
                grid-template-columns: 1fr; /* Single column on smaller screens */
            }

            .date-time-group {
                flex-direction: column;
                gap: 20px;
            }
            .date-time-group .form-group {
                flex-basis: auto;
            }

            .form-navigation {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }
            .form-navigation button {
                width: 100%;
                max-width: 250px;
                padding: 12px 25px;
                font-size: 16px;
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
            }
            .profile-info h4 {
                font-size: 15px;
            }
            .profile-info p {
                font-size: 13px;
            }
            .btn-retour {
                padding: 10px 25px;
                font-size: 15px;
            }
            .form-main-container {
                padding: 20px 15px;
                background-color: #FFFFFF;
            }
            .form-header h3 {
                font-size: 20px;

            }
            .photo-upload-box {
                width: 120px;
                height: 120px;
            }
            .photo-upload-box .plus-icon {
                font-size: 40px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo">SolidarityConnect</a>
        <a href="#" class="logout-link">Déconnexion</a>
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

        <div class="form-main-container">

            <div class="form-header">
                <h3>Nouveau don</h3>
                <div class="step-indicators">
                    <div class="step-indicator active" data-step="1">1</div>
                    <div class="step-indicator" data-step="2">2</div>
                    <div class="step-indicator" data-step="3">3</div>
                </div>
            </div>
           <form action="{{ route('don.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <input type="hidden" name="type" id="don_type">
            <div class="form-step active" id="step1">
                <h4 style="font-size: 24px; font-weight: 500; margin-bottom: 20px; color: var(--color-black);">Type de don</h4>
                <div class="type-selection-grid">
                    <div class="type-option" data-type="vetements">
                        <img src="https://img.icons8.com/ios-filled/50/null/t-shirt.png" alt="Vêtements Icon">
                        <span>Vêtements</span>
                    </div>
                    <div class="type-option" data-type="nourriture">
                        <img src="https://img.icons8.com/ios-filled/50/null/food.png" alt="Nourriture Icon">
                        <span>Nourriture</span>
                    </div>
                    <div class="type-option" data-type="meubles">
                        <img src="https://img.icons8.com/ios-filled/50/null/bed.png" alt="Meubles Icon">
                        <span>Meubles</span>
                    </div>
                    <div class="type-option" data-type="autres">
                        <img src="https://img.icons8.com/ios-filled/50/null/more.png" alt="Autres Icon">
                        <span>Autres</span>
                    </div>
                </div>
                <div class="form-navigation">
                    <button type="button" class="btn-next" onclick="nextStep()">Suivant</button>
                </div>
            </div>

            <div class="form-step" id="step2">
                <h4 style="font-size: 24px; font-weight: 500; margin-bottom: 20px; color: var(--color-black);">Détails du don</h4>
                <label for="titre" class="label">Titre</label>
                <div class="form-group">

                    <input type="text" id="titre" name="titre" placeholder="Ex: Vêtements femme taille 38">
                </div>
                <label for="description" class="label">Description</label>
                <div class="form-group">
                    <textarea id="description" name="description" placeholder="Décrivez votre don en detail..."></textarea>
                </div>
                <div class="photo-upload-section">
                    <span class="photo-upload-label">Photos</span>
                    <div class="photo-upload-box" onclick="document.getElementById('photoUpload').click()">
                        <span class="plus-icon">+</span>
                        <input type="file" id="photoUpload" name="photos[]" accept="image/*" multiple>
                    </div>
                </div>
                <div class="form-navigation">
                    <button type="button" class="btn-previous" onclick="prevStep()">Précédent</button>
                    <button type="button" class="btn-next" onclick="nextStep()">Suivant</button>
                </div>
            </div>

            <div class="form-step" id="step3">
                <h4 style="font-size: 24px; font-weight: 500; margin-bottom: 20px; color: var(--color-black);">Modalités de remise</h4>
                <label for="localisation" class="label">Localisation</label>
                <div class="form-group">
                    <input type="text" id="localisation" name="localisation" placeholder="Adresse">
                </div>
                <label for="disponibilite" class="label">Disponibilité</label>

                        <label for="date" class="label">Date</label>
                        <div class="form-group date-input">

                            <input type="text" id="date" name="date" placeholder="jj/mm/aaaa">
                        </div>
                        <label for="heure" class="label">Heure</label>
                        <div class="form-group time-input">
                            <input type="text" id="heure" name="heure" placeholder="----">

                        </div>


                <div class="form-navigation">
                    <button type="button" class="btn-previous" onclick="prevStep()">Précédent</button>
                    <button type="submit" class="btn-publish">Publier le don</button>
                </div>
            </div>
            </form>
        </div>

    </div>

</body>

    <script>
        let currentStep = 1;
        const totalSteps = 3;

        function updateFormVisibility() {
            for (let i = 1; i <= totalSteps; i++) {
                document.getElementById(`step${i}`).classList.remove('active');
                document.querySelector(`.step-indicator[data-step="${i}"]`).classList.remove('active', 'completed');
            }

            document.getElementById(`step${currentStep}`).classList.add('active');
            for (let i = 1; i < currentStep; i++) {
                document.querySelector(`.step-indicator[data-step="${i}"]`).classList.add('completed');
            }
            document.querySelector(`.step-indicator[data-step="${currentStep}"]`).classList.add('active');
        }

        function nextStep() {
            if (currentStep < totalSteps) {
                currentStep++;
                updateFormVisibility();
            }
        }

        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateFormVisibility();
            }
        }

        // Handle type option selection
        document.querySelectorAll('.type-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.type-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        // Initialize form
        updateFormVisibility();


    document.querySelectorAll('.type-option').forEach(function (element) {
        element.addEventListener('click', function () {
            const selectedType = this.getAttribute('data-type');

            // Mettre à jour le champ caché avec la bonne valeur (adaptée au nom de la base)
            let typeValue;
            switch (selectedType) {
                case 'vetements':
                    typeValue = 'Vêtements';
                    break;
                case 'nourriture':
                    typeValue = 'Nourriture';
                    break;
                case 'meubles':
                    typeValue = 'Meubles';
                    break;
                default:
                    typeValue = 'Autres';
            }

            document.getElementById('don_type').value = typeValue;

            // Met à jour les styles (active step visuelle)
            document.querySelectorAll('.type-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
        });
    });
</script>
</html>
