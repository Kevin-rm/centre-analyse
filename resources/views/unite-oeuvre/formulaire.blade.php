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
                
                @if (Session::has('success'))
                    <span class="alert alert-success p-2">{{Session::get('success')}}</span>
                @endif
                
                <div class="card-header">
                    <div class="card-title">Insertion</div>
                </div>
                <form action="{{isset($unite_oeuvre_edit) ?  route('unite_oeuvre.update',$unite_oeuvre_edit->id_unite_oeuvre): route('unite_oeuvre.store')}}" method="post">
                    @csrf
                    @isset($unite_oeuvre_edit)
                        @method('PUT')
                        <input type="hidden" name="id_unite_oeuvre" value="{{$unite_oeuvre_edit->id_unite_oeuvre}}" id="">
                    @endisset
                    <div class="card-body px-4">
                        <div class="form-group row">
                            <label for="nom" class="col-form-label col-sm-1">Nom</label>
                            <div class="col-sm-5">
                                <input type="text" name="nom" value="{{old('nom', isset($unite_oeuvre_edit) ? $unite_oeuvre_edit->nom_unite_oeuvre : '')}} " id="nom" class="form-control">
                                @error('nom')
                                    <span class="text-danger">{{$message}} </span>
                                @enderror
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
