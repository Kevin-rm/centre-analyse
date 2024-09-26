@extends("layout")

@section("title", "Liste des centres")

@section("page_header_title", "Centre")
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
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Administration</td>
                                <td>Structure</td>
                            </tr>
                        </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    
@endsection
