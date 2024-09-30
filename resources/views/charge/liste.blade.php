@extends("layout")

@section("page_header_title", "Charges")
@section("page_header_content")
    @component("shared.breadcrumbs")
        @slot("current", "Liste")
    @endcomponent
@endsection

@section("content")
<style>
    .table-container {
    overflow-x: auto;
    width: 100%;
}
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: right;
    }
    th {
        background-color: #f2f2f2;
    }
    .center {
        text-align: center;
    }
    .header {
        font-weight: bold;
    }
    .highlight-total {
        font-weight: bold;
        background-color: #e0e0e0;
    }
</style>
    <p>Liste des charges</p>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Rubriques</th>
                    <th>Unite d'oeuvre</th>
                    <th>Nature</th>
                    <th>Total</th>
                    @foreach ($grouped_data as $id_centre_opp => $items)
                        <th colspan="3" class="center">{{ $items->first()->nom_centre_opp }} - {{$items->first()->est_structure ? 's': 'o' }} </th>
                    @endforeach
                    <th colspan="2" class="center">TOTAL</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    @foreach ($grouped_data as $id_centre_opp => $items)
                        <th class="center">%</th>
                        <th class="center">Fixe</th>
                        <th class="center">Variable</th>
                    @endforeach
                    <th class="center" colspan="2">Fixe</th>
                    <th class="center" >Variable</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($grouped_data->first() as $charge)
                <tr>
                    <td>{{ $charge->nom_charge }}</td>
                    <td>{{ $charge->nom_centre_opp}} </td>
                    <td>{{ $charge->nature ? 'v':'f' }} </td>
                    <td>{{ $charge->total }}</td>
                    @foreach ($grouped_data as $id_centre_opp => $items)
                        @php
                            $item = $items->where('nom_charge', $charge->nom_charge)->first();
                        @endphp
                        <td>{{100* $item->pourcentage}} </td>
                        <td>{{ $item->fixe }}</td>
                        <td>{{ $item->variable }}</td>
                    @endforeach
                        @php
                            $index=$charge->where('nom_charge',$charge->nom_charge)->first();
                        @endphp
                    <td colspan="2">{{ $index->total_sum_fixe }}</td>
                    <td>{{ $index->total_sum_variable}}</td>
                </tr>
                
                @endforeach
            </tbody>
            <tfoot>
                <tr class="header">
                    <td rowspan="3">Total</td>
                    <td colspan="3"> </td>
                    <td></td>
                    @foreach ($grouped_data as $id_centre_opp => $items)
                    @php
                        $index=$data_desc_total_par_co->where('id_centre_opp',$id_centre_opp)->first();
                    @endphp
                        <td>{{$index->sum_fixe }}</td>
                        <td>{{ $index->sum_variable }}</td>
                    <td></td>
                    @endforeach
                    <td colspan="2">{{$data_sum_charge->sum_total_sum_fixe}} </td>
                    <td>{{$data_sum_charge->sum_total_sum_variable}} </td>
                </tr>
                <tr class="header">
                    <td colspan="3">{{$data_sum_charge->sum_charge }}</td>
                    @foreach ($grouped_data as $id_centre_opp => $items)
                    @php
                        $index=$data_desc_total_par_co->where('id_centre_opp',$id_centre_opp)->first();
                    @endphp
                        <td colspan="3">{{$index->sum_variable_fixe}}</td>
                    @endforeach
                </tr>
            </tfoot>
        </table>
    </div>
   
@endsection
