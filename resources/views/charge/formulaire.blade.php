@extends('layout') <!-- Ou le nom exact de ton layout -->

@section('title', 'Gestion des Charges')

@section('content')
<div class="container">
    <div class="page-inner">
        <form action="" method="POST">
            @csrf
            <h1>Charge formulaire</h1>
            <div class="form-group row">
            <label for="nom" class="col-form-label col-sm-1">Nom</label>
                <div class="col-sm-5">
                    <input type="text" name="nom" id="nom" class="form-control">
                </div>
            </div>

            <div class="form-group row">    
                <div class="col-sm-1">
                <label for="unite"
                    > Unité </label
                    >
                </div>
                <div class="col-sm-5">
                <select class="form-control" id="unite">
                    <option>Kg</option>
                    <option>Litre</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">    
                <div class="col-sm-1">
                <label for="nature"
                    > Nature</label
                    >
                </div>
                <div class="col-sm-5">
                <select class="form-control" id="nature">
                    <option>Variable</option>
                    <option>Fixe</option>
                    </select>
                </div>
            </div>
            <div id="fields-container">
                <div class="form-group row">
                    <div class="col-sm-1"><label for="">Pourcentage</label></div>
                    <div class="col-sm-4">
                        <input type="text" name="pourcentage" class="form-control pourcentage" required>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control centre">
                            <option selected>Choisissez</option>
                            <option>Centre1</option>
                            <option>Centre2</option>
                            <option>Centre3</option>
                            <option>Centre4</option>
                        </select>
                    </div>    
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary add-field" disabled>+</button>
                    </div>
                </div>
            </div>
            <div class="mt-3" style="margin-left:8rem">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
            <script>
                const centres = ["Centre1", "Centre2", "Centre3", "Centre4"];
                document.getElementById('fields-container').addEventListener('click', function (e) {
                    if (e.target.classList.contains('add-field')) {
                        const selectedCentres = Array.from(document.querySelectorAll('.centre')).map(select => select.value);
                        const availableCentres = centres.filter(c => !selectedCentres.includes(c));
                        if (availableCentres.length > 0) {
                            document.querySelectorAll('.add-field').forEach(button => button.remove());
                            const fieldContainer = document.getElementById('fields-container');
                            const newFieldGroup = document.createElement('div');
                            newFieldGroup.classList.add('form-group', 'row');
                            newFieldGroup.innerHTML = `
                                <div class="col-sm-1"></div>    
                                <div class="col-sm-4">
                                    <input type="text" name="pourcentage" class="form-control pourcentage" required>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control centre">
                                        <option value="" selected>Choisissez</option> <!-- Option par défaut -->
                                        ${availableCentres.map(c => `<option value="${c}">${c}</option>`).join('')}
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary add-field" disabled>+</button>
                                </div>
                            `;
                            fieldContainer.appendChild(newFieldGroup);
                        } else {
                            alert('Tous les centres sont déjà sélectionnés !');
                        }
                    }
                });

                document.getElementById('fields-container').addEventListener('change', function (e) {
                    if (e.target.classList.contains('centre')) {
                        const addButton = e.target.closest('.form-group').querySelector('.add-field');
                        if (e.target.value !== "") {
                            addButton.disabled = false;
                        } else {
                            addButton.disabled = true;
                        }
                    }
                });
            </script>
        </form>

    </div>
</div>
@endsection
