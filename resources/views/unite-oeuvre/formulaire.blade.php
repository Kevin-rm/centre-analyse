@extends("layout")

@section("title", "Formulaire d'unité d'oeuvre")

@section("page_header_title", "Unité d'oeuvre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Formulaire")
    @endcomponent
@endsection

@section("content")
    <p>Formulaire d'unité d'oeuvre</p>
@endsection
