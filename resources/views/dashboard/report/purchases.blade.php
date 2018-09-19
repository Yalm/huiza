@extends('dashboard.report.layout.app')

@section('content')
<div class="details clearfix">
    <div class="data right">
        <div class="title">Ventas por fecha</div>
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
                    <th class="desc"><div>Pedido #</div></th>
                    <th class="unit"><div>Metodo de pago</div></th>
                    <th class="total"><div>Total</div></th>
                </tr>
            </tbody>
            <tbody class="body">
                @foreach ($orders as $order)
                <tr>
                    <td class="no">{{ $order->id }}</td>
                    <td class="desc"> {{ $order->customer->name }}</td>
                    <td class="unit">{{ $order->method }}</td>
					<td class="total">S/ {{ $order->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="no-break">
    <table class="grand-total">
        <tbody>
            <tr>
                <td class="grand-total" colspan="5"><div><span>TOTAL:</span>S/ {{ $total }}</div></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
@endsection