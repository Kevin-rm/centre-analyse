@extends('layout')

@section("page_header_title", "Centre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Liste")
    @endcomponent
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des centres</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="centre-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Type</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (count($all_centre) > 0)
                                    @foreach ($all_centre as $item)
                                        <tr>
                                            <td>{{$loop->iteration}} </td>
                                            <td>{{$item->nom_centre_opp}} </td>
                                            <td>{{$item->est_structure ? 'Structure' : 'Opérationnel' }}</td>
                                            <td><a href="{{route('centre.edit',['id' =>$item->id_centre_opp])}}" class="btn btn-primary btn-sm">Edit</a></td>
                                            <td><a href="{{route('centre.destroy',['id' =>$item->id_centre_opp])}}" class="btn btn-danger btn-sm">Delete</a></td>
                                          </tr>
                                    @endforeach
                                @else
                                <tr>
                                  <td colspan="5">no centre operationnel found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(() => $("#centre-datatables").DataTable({}));
    </script>
@endsection
