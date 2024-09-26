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
                        <table id="unite-oeuvre-datatables" class="display table table-striped table-hover">
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
    $(document).ready(() => $("#unite-oeuvre-datatables").DataTable({}));
</script>
@endsection
