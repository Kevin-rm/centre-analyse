@extends("layout")

@section("page_header_title", "Centre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Liste")
    @endcomponent
@endsection

@section("content")
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Administrator</td>
                                    <td>Statique</td>
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
        $(document).ready(() => $("#centre-datatables").DataTable({}));
    </script>
@endsection
