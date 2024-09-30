@extends('layout')

@section("page_header_title", "Analyse")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "")
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Formulaire</div>
                </div>

                <form id="form-analyse" action="" method="post">
                    @csrf
                    <div class="card-body px-4">
                        <div class="form-group row">
                            <label for="etape-produit" class="col-form-label">Etapes de produit</label>
                            <div class="col-sm-5">
                                <select class="form-select" id="etape-produit" name="etape-produit">
                                    @foreach ($all_etat_produit as $item)
                                        <option value="{{$item->id_etat_produit}}">{{$item->nom_etat}}, {{ $item->nom_unite_oeuvre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre" class="col-form-label">Nombre</label>
                            <div class="col-sm-5">
                                <input type="number" name="nombre" id="nombre" class="form-control">
                            </div>
                        </div>

                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Soumettre</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Résultat</div>
                </div>
                <div class="card-body">
                    <div style="margin-left:0.5cm">
                        <p id="resultat"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Liste des etats de produit avec leur valeurs
        const etatProduits = @json($all_etat_produit);

        document.getElementById('form-analyse').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche la soumission du formulaire

            const etapeProduitId = document.getElementById('etape-produit').value;
            const nombre = document.getElementById('nombre').value;

            // Trouver l'objet etat_produit correspondant
            const etatProduit = etatProduits.find(item => item.id_etat_produit === parseInt(etapeProduitId));

            if (etatProduit && nombre > 0) {
                const resultat = parseFloat(etatProduit.value) / nombre;

                // Afficher le résultat
                document.getElementById('resultat').innerText = `Coût de ${etatProduit.nom_unite_oeuvre} de ${etatProduit.nom_etat} : ${resultat}`;
            } else {
                document.getElementById('resultat').innerText = "Veuillez sélectionner un état de produit valide et entrer un nombre positif.";
            }
        });
    </script>
@endsection
