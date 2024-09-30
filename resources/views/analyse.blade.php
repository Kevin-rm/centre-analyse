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
                <div class="card-header">
                    <div class="card-title">Formulaire</div>
                </div>

                <form action="" method="post">
                    @csrf
                    <div class="card-body px-4">
                        <div class="form-group row">
                        <label for="prix" class="col-form-label">Etapes de produit</label>
                            <div class="col-sm-5">
                                <select
                                    class="form-select"
                                    id="etape-produit"
                                    name="etape-produit"
                                >
                                @foreach ($all_etat_produit as $item)
                                    <option value="{{$item->id_etat_produit}}" >{{$item->nom_etat}} </option>
                                @endforeach
                                </select>
                        
                            </div>
                            <div class="col-sm-5">
                                <input type="text" disabled value="Kg" name="unite-oeuvre" id="unite-oeuvre" class="form-control">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="prix" class="col-form-label">Nombre</label>
                            <div class="col-sm-5">
                                <input type="number" name="prix" id="prix"
                                    class="form-control">
                            </div>
                        </div>
                            
                        <div class="card-action">
                            <button class="btn btn-success" type="submit">Soumettre</button>
                        </div>
                    
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card">
                <div class="card-header">
                    <div class="card-title">Resultat</div>
                </div>
                <div class="card-body">
                    <div class="" style="margin-left:0.5cm">
                        <p>Coût de Kg </p>
                    </div>
                </div>
                
                
            </div>
    </div>
@endsection

