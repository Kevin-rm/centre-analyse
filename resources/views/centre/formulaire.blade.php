@extends('layout')

@section("page_header_title", "Centre")
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
                <form action="{{ isset($centre_edit) ? route('centre.update',$centre_edit->id_centre_opp): route('centre.store') }} " method="post">
                    @csrf
                    @isset($centre_edit)
                        @method('PUT')
                        <input type="hidden" name="id_centre" value="{{$centre_edit->id_centre_opp}}">
                    @endisset
                    <div class="card-body px-4">
                        <div class="form-group row">
                            <label for="nom" class="col-form-label col-sm-1">Nom</label>
                            <div class="col-sm-5">
                                <input type="text" name="nom" value="{{ old('nom',isset($centre_edit)?$centre_edit->nom_centre_opp:'' )}}" id="nom"
                                    class="form-control">
                                @error('nom')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-form-label col-sm-1">Type</label>
                            <div class="col-sm-5">
                                <select class="form-control form-select" name="type_opp" id="type">
                                    <option value="1"{{ old('type_opp') == '1' ? 'selected' : '' }}>Structure</option>
                                    <option value="0"{{ old('type_opp') == '0' ? 'selected' : '' }}>Opérationnel</option>
                                </select>
                                @error('type_opp')
                                    <span class="text-danger">{{ $message }} </span>
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
