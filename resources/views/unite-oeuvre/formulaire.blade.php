@extends("layout")

@section("page_header_title", "Unité d'oeuvre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Formulaire")
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Insertion</div>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="card-body px-4">
                        <div class="form-group row">
                            <label for="nom" class="col-form-label col-sm-1">Nom</label>
                            <div class="col-sm-5">
                                <input type="text" name="nom" id="nom" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success" type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
