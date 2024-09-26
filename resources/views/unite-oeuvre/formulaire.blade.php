@extends("layout")

@section("title", "Formulaire d'unité d'oeuvre")

@section("page_header_title", "Unité d'oeuvre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Formulaire")
    @endcomponent
@endsection

@section("content")
<form action="" method="POST">
        @csrf
        <div class="form-group row">
        <label for="nom" class="col-form-label col-sm-1">Nom</label>
            <div class="col-sm-5">
                <input type="text" name="nom" id="nom" class="form-control">
            </div>
        </div>
        <label for="nom" class="col-form-label col-sm-1">Libellé</label>
            <div class="col-sm-5">
                <input type="text" name="libelle" id="libelle" class="form-control">
            </div>
        </div>

        <div class="mt-3" style="margin-left:8rem">
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>
@endsection
