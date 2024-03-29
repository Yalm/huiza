@extends('dashboard.report.layout.app')

@section('content')
<div class="details clearfix">
    <div class="data right">
        <div class="title">Top 7 productos más vendidos</div>
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
                    <th class="desc"><div>Producto</div></th>
                    <th class="qty"><div>Cantidad</div></th>
                </tr>
            </tbody>
            <tbody class="body">
                @foreach ($products as $product)
                <tr>
                    <td class="no">{{ $loop->iteration }}</td>
                    <td class="desc">{{ $product->name }}</td>
                    <td class="qty">{{ $product->TotalQuantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection