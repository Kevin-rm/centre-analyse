@extends("layout")

@section("title", "Formulaire de charge")

@section("page_header_title", "Charges")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("route_to_index", "charge.show")
        @slot("current", "Formulaire")
    @endcomponent
@endsection

@section("content")
    <p>Formulaire</p>
@endsection
