@extends('layouts.app')

@section('title', 'Ajouter une bouteille')

@section('content')
    <h2>Ajouter la bouteille </h2>

    <form action="{{ route('bottle.add.submit') }}" method="POST">
        @csrf
        <input type="hidden" name="bottle_id" value="{{ $bottle->id }}">

        <!-- Sélectionner un cellier parmi les celliers de l'utilisateur -->
        <div>
            <label for="cellar_id">Sélectionner un cellier :</label>
            <select name="cellar_id" id="cellar_id" required>
                @foreach ($userCellars as $cellar)
                    <option value="{{ $cellar->id }}">{{ $cellar->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Quantité à ajouter -->
        <div>
            <label for="quantity">Quantité :</label>
            <input type="number" name="quantity" id="quantity" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter au cellier</button>
    </form>
@endsection