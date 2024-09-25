@extends("layout")

@section("title", "Formulaire de charge")

@section("page_header_title", "Charges")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Formulaire")
    @endcomponent
@endsection

@section("content")
    <p>Formulaire de charge</p>
@endsection
