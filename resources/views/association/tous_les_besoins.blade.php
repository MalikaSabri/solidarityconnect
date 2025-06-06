@extends('layouts.app')

@section('title', 'Tous les besoins')

@section('content')
<div class="container">
    <h1>Tous les besoins</h1>

    <div class="besoins-list">
        @forelse($besoins as $besoin)
            <div class="besoin-card">
                <h3>{{ $besoin->titre }}</h3>
                <p>Association: {{ $besoin->association->nom_complet }}</p>
                <p>{{ $besoin->description }}</p>
                <span class="status">{{ $besoin->status }}</span>
            </div>
        @empty
            <p>Aucun besoin trouvé</p>
        @endforelse
    </div>

    {{ $besoins->links() }}
</div>
@endsection
