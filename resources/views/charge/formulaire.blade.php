@extends("layout")

@section("page_header_title", "Charges")
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
                        <div class="form-group row">
                            <label for="unite-oeuvre" class="col-form-label col-sm-1">Unité</label>
                            <div class="col-sm-5">
                                <select class="form-control form-select" id="unite-oeuvre">
                                    <option>Kg</option>
                                    <option>Litre</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nature" class="col-form-label col-sm-1">Nature</label>
                            <div class="col-sm-5">
                                <select class="form-control form-select" id="nature">
                                    <option value="0">Variable</option>
                                    <option value="1">Fixe</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-form-label col-sm-1">Centres</label>
                            <div class="col-sm-2">
                                <button id="ajout-centre" type="button" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>

                            <div id="centres">
                                <div class="row mt-2">
                                    <div class="col-sm-5 offset-1">
                                        <select class="form-control form-select centre">
                                            <option>Centre1</option>
                                            <option>Centre2</option>
                                            <option>Centre3</option>
                                            <option>Centre4</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text"
                                               name="pourcentage"
                                               class="form-control pourcentage" placeholder="Pourcentage" required
                                        />
                                    </div>
                                </div>
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

@section("scripts")
    <script>
        const centres = ["Centre1", "Centre2", "Centre3", "Centre4"];
        document.getElementById('ajout-centre').addEventListener('click', function () {
    console.log('Bouton Ajouter cliqué');
    const selectedCentres = Array.from(document.querySelectorAll('.centre')).map(select => select.value);
    const availableCentres = centres.filter(c => !selectedCentres.includes(c));

    if (availableCentres.length > 0) {
        const centresContainer = document.getElementById('centres');
        const newFieldGroup = document.createElement('div');
        newFieldGroup.classList.add('row', 'mt-2');

        newFieldGroup.innerHTML = `
            <div class="col-sm-5 offset-1">
                <select class="form-control form-select centre">
                    ${availableCentres.map(c => `<option value="${c}">${c}</option>`).join('')}
                </select>
            </div>
            <div class="col-sm-2">
                <input type="text"
                    name="pourcentage"
                    class="form-control pourcentage"
                    placeholder="Pourcentage"
                    required
                />
            </div>
        `;
        centresContainer.appendChild(newFieldGroup);
    } else {
        alert('Tous les centres sont déjà sélectionnés !');
    }
});

    </script>
@endsection
