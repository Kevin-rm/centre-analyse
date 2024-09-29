@extends("layout")

@section("page_header_title", "Unité d'oeuvre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Liste")
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col-ms-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des unités d'oeuvres</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th colspan="2">Action</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                          @if(count($all_unite_oeuvre)>0)
                          @foreach ($all_unite_oeuvre as $item)
                          <tr>
                            <td>{{$loop->iteration}} </td>
                            <td>{{$item->nom_unite_oeuvre}} </td>
                            <td><a href="{{route('unite_oeuvre.edit',['id' =>$item->id_unite_oeuvre]) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            <td><a href="{{route('unite_oeuvre.destroy',['id'=>$item->id_unite_oeuvre]) }}" class="btn btn-danger btn-sm">Delete</a></td>
                          </tr>
                          @endforeach
                          @else
                          <tr>
                            <td colspan="4" > no unite oeuvre found</td>
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
    $(document).ready(() => $("#unite-oeuvre-datatables").DataTable({}));
</script>
@endsection
