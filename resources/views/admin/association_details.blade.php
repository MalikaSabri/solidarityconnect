<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
.association-details {
    padding: 20px;
}

.detail-row {
    margin-bottom: 15px;
    display: flex;
    align-items: flex-start;
}

.label {
    font-weight: bold;
    width: 150px;
    flex-shrink: 0;
}

.value {
    flex-grow: 1;
}

.actions {
    margin-top: 30px;
    text-align: center;
}

.btn-validate {
    background-color: #06B6D4;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>
<body>
<div class="association-details">
    <h2>{{ $association->nom_complet }}</h2>

    <div class="detail-row">
        <span class="label">Email:</span>
        <span class="value">{{ $association->email }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Téléphone:</span>
        <span class="value">{{ $association->telephone ?? 'Non renseigné' }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Adresse:</span>
        <span class="value">{{ $association->adresse }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Date d'inscription:</span>
        <span class="value">{{ $association->created_at->format('d/m/Y') }}</span>
    </div>

    <div class="detail-row">
        <span class="label">Description:</span>
        <p class="value">{{ $association->description }}</p>
    </div>

    <div class="actions">
        <button onclick="validateAssociation({{ $association->id }})" class="btn-validate">
            Valider l'association
        </button>
    </div>
</div>




</body>
<script>
function validateAssociation(id) {
    fetch(`/admin/associations/${id}/validate`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Association validée avec succès');
            closeModal();
            // Actualiser la liste si nécessaire
        }
    });
}
</script>
</html>
