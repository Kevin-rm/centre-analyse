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
