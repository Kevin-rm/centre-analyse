@extends("layout")

@section("title", "Formulaire centre")

@section("page_header_title", "Centre")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Formulaire")
    @endcomponent
@endsection

@section("content")
    <p>Formulaire de centre</p>
@endsection
