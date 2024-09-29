@extends('layout')

@section("page_header_title", "Charges")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Formulaire")
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                @if (Session::has('success'))
                    <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
                @endif
                
                <div class="card-header">
                    <div class="card-title">Insertion</div>
                </div>
                <form action="{{ route('charge.store') }}" method="post">
                    @csrf
                    <div class="card-body px-4">
                        <div class="form-group row">
                            <label for="nom" class="col-form-label col-sm-1">Nom</label>
                            <div class="col-sm-5">
                                <input type="text" name="nom" id="nom" value="{{ old('nom') }}"
                                    class="form-control">
                                @error('nom')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prix" class="col-form-label col-sm-1">prix (ariary)</label>
                            <div class="col-sm-5">
                                <input type="number" name="prix" id="prix" value="{{ old('prix') }}"
                                    class="form-control">
                                @error('prix')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="unite-oeuvre" class="col-form-label col-sm-1">Unité</label>
                            <div class="col-sm-5">
                                <select class="form-control form-select" name="unite_oeuvre" id="unite-oeuvre">
                                    @foreach ($unite_oeuvre as $item)
                                        <option value="{{ $item->id_unite_oeuvre }}"
                                            {{ old('unite-oeuvre') == $item->id_unite_oeuvre ? 'selected' : '' }}>
                                            {{ $item->nom_unite_oeuvre }}</option>
                                    @endforeach
                                </select>
                                @error('nom')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nature" class="col-form-label col-sm-1">Nature</label>
                            <div class="col-sm-5">
                                <select class="form-control form-select" id="nature" name="nature">
                                    <option value="1" {{ old('nature') == '0' ? 'selected' : '' }}>Variable</option>
                                    <option value="0" {{ old('nature') == '1' ? 'selected' : '' }}>Fixe</option>
                                </select>
                            </div>
                            @error('nature')
                                <span class="text-danger">{{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-form-label col-sm-1">Centres</label>
                            <div class="col-sm-2">
                                <button id="ajout-centre" type="button" class="btn btn-primary">
                                    Ajouter
                                </button>
                            </div>

                            <div id="centres">
                                @if (old('centre_opp'))
                                    @foreach (old('centre_opp') as $index => $centre)
                                        <div class="row mt-2">
                                            <div class="col-sm-5 offset-1">
                                                <select class="form-control form-select centre" name="centre_opp[]">
                                                    @foreach ($centre_opp as $value)
                                                        <option
                                                            value="{{ $value->id_centre_opp }}"{{ old('centre_opp.' . $index == $value->id_centre_opp ? 'selected' : '') }}>
                                                            {{ $value->nom_centre_opp }}</option>
                                                    @endforeach

                                                    @error('centre_opp.' . $index)
                                                        <span class="text-danger">{{ $message }} </span>
                                                    @enderror
                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" name="pourcentage[]" class="form-control pourcentage"
                                                    placeholder="Pourcentage" value="{{ old('pourcentage.' . $index) }}"
                                                    required />
                                                @error('pourcentage.' . $index)
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
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

@section('scripts')
    <script>
        const centres = @json($centre_opp);
        document.getElementById('ajout-centre').addEventListener('click', function() {
            console.log('Bouton Ajouter cliqué');
            const selectedCentres = Array.from(document.querySelectorAll('.centre')).map(select => select.value);
            const availableCentres = centres.filter(c => !selectedCentres.includes(c));

            if (availableCentres.length > 0) {
                const centresContainer = document.getElementById('centres');
                const newFieldGroup = document.createElement('div');
                newFieldGroup.classList.add('row', 'mt-2');

                newFieldGroup.innerHTML = `
            <div class="col-sm-5 offset-1">
                <select class="form-control form-select centre" name="centre_opp[]">
                    ${availableCentres.map(c => `<option value="${c.id_centre_opp}">${c.nom_centre_opp}</option>`).join('')}
                </select>
            </div>
            <div class="col-sm-2">
                <input type="text"
                    name="pourcentage[]"
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
