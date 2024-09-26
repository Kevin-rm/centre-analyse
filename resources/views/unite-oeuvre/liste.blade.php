@extends("layout")

@section("title", "Liste des unités d'oeuvre")

@section("page_header_title", "Unité d'oeuvre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Liste")
    @endcomponent
@endsection

@section("content")
    <p>Liste des unités d'oeuvre</p>
@endsection
