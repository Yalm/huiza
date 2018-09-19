@extends('dashboard.report.layout.app')

@section('content')
<div class="details clearfix">
    <div class="data right">
        <div class="title">Top 9 mejores clientes</div>
        <div class="date">
            Fecha Inicio: {{ $date_init }}<br>
            Fecha Final: {{ $date_end }}
        </div>
    </div>
</div>
<div class="container">
    <div class="table-wrapper">
        <table>
            <tbody class="head">
                <tr>
                    <th class="no"></th>
                    <th class="desc"><div>Cliente</div></th>
                    <th class="qty"><div>Compras</div></th>
                </tr>
            </tbody>
            <tbody class="body">
                @foreach ($customers as $customer)
                <tr>
                    <td class="no">{{ $loop->iteration }}</td>
                    <td class="desc">{{ "$customer->name $customer->surnames" }}</td>
                    <td class="qty">{{ $customer->purchases }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection