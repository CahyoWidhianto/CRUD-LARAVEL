@extends('layout.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List Data Transaksi</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>TRX Number</th>
                    <th>Tanggal Transaksi</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaksi as $row)
                    <tr>
                        <td>{{$row->number}}</td>
                        <td><{{$row->created_at}}/td>
                        <td>{!! \App\Helper\Util::getStatusTrx($row->status) !!}</td>
                        <td>
                            <a href="{{url('app/'.$row->number)}}" class="btn btn-primary btn-sm"
                               data-toggle="tooltip" data-placement="top" title="Lanjutkan Transaksi">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                            <a target="_blank" href="{{route('trx.excel',[$row->number])}}" class="btn btn-sm btn-success"
                               data-toggle="tooltip" data-placement="top" title="Export Excel">
                                <i class="fa fa-file-excel"></i>
                            </a>
                            <a target="_blank" href="{{route('trx.pdf',[$row->number])}}" class="btn btn-sm btn-danger"
                               data-toggle="tooltip" data-placement="top" title="Export PDF">
                                <i class="fa fa-file-pdf"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
