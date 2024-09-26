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
                          </tr>
                        </thead>
                        
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Kg</td>
                          </tr>
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
