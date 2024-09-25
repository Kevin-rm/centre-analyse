@extends("layout")

@section("title", "Liste des centres")

@section("page_header_title", "Centre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Liste")
    @endcomponent
@endsection

@section("content")
    <p>Liste de centre</p>
@endsection
