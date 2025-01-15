@extends('layouts.app')

@section('title', 'Résultats de Recherche')

@section('content')
<section class="search-results-page">
    <h2 class="search-header">Résultats pour "{{ $query }}"</h2>

    @if($results->isEmpty())
        <p class="no-results">Aucune bouteille trouvée.</p>
    @else
        <div class="results-list">
            @foreach($results as $bottle)
                <div class="result-item">
                    {{-- Bottle Image --}}
                    <img src="{{ $bottle->image_url }}" alt="{{ $bottle->name }}" class="result-image" />

                    {{-- Bottle Details --}}
                    <div class="result-details">
                        <p class="result-name">{{ $bottle->name }}</p>
                        <p class="result-info">
                            {{ $bottle->volume }} ml | {{ $bottle->country }}<br />
                            {{ ucfirst($bottle->type) }} | {{ number_format($bottle->price, 2) }} $
                        </p>
                        <div class="result-button-container">
                            <a href="{{ route('bottle.add', ['bottle_id' => $bottle->id]) }}" class="btn-add">Ajouter</a>
                            <a href="{{ route('achat.add', ['bottle_id' => $bottle->id]) }}" class="btn-add">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- Add Button and Dropdown --}}
                     <!--<div class="result-actions">
                        <button type="button" class="btn-add" data-bottle-id="{{ $bottle->id }}">+</button>
                        <select name="cellar_id" class="select-cellar">
                            @foreach($userCellars as $cellar)
                                <option value="{{ $cellar->id }}">{{ $cellar->name }}</option>
                            @endforeach
                            <option value="wishlist">Liste d'achat</option>
                        </select>
                    </div>-->
                </div>
            @endforeach
        </div>
    @endif
</section>
@endsection
