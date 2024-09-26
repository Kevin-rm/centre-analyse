@extends("layout")

@section("page_header_title", "Charges")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Liste")
    @endcomponent
@endsection

@section("content")
    <p>Liste des charges</p>
@endsection
