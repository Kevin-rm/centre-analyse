@extends('layout') <!-- Ou le nom exact de ton layout -->

@section('title', 'Gestion des Charges')

@section('content')
<div class="container">
    <div class="page-inner">
        <form action="" method="POST">
            @csrf
            <h1>Unité d'oeuvre formulaire</h1>
            <div class="form-group row">
            <label for="nom" class="col-form-label col-sm-1">Nom</label>
                <div class="col-sm-5">
                    <input type="text" name="nom" id="nom" class="form-control">
                </div>
            </div>
            <div class="mt-3" style="margin-left:8rem">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>

    </div>
</div>
@endsection
