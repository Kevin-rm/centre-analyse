@extends("layout")

@section("title", "Liste des unités d'oeuvre")

@section("page_header_title", "Unité d'oeuvre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Liste")
    @endcomponent
@endsection

@section("content")
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
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
    $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        
        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });

</script>
@endsection
