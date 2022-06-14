@extends('layout.main')
@section('content')

    <div class="row">
        <div class="col-3">
            <div class="card">
                <form action="{{route('kasir.insert',[$no_transaksi])}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" required id="search-id-barang">
                    <div class="card-header">
                        <h3 class="card-title">Cari Barang</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Code Barang</label>
                            <input id="search-kode-barang" placeholder="Input Kode Barang"
                                   type="text" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Barang</label>
                            <input id="search-nama-barang" placeholder="Input Nama Barang"
                                   readonly disabled type="text" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Barang</label>
                            <input id="search-harga-barang" placeholder="Input Harga Barang"
                                   name="price" readonly type="text" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="">Stock Barang</label>
                            <input id="search-stock-barang" placeholder="Input Stock Barang"
                                   readonly disabled type="text" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Barang</label>
                            <input id="search-jumlah-barang" placeholder="Input Jumlah Barang"
                                   name="amount" min="1" type="number" class="form-control"/>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if($status_transaksi === 'darft')
                            <button type="submit" class="btn btn-block btn-success">Tambah</button>
                        @endif
                    </div>
                </form>
            </div>

        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Transaksi : {{$no_transaksi}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-bordered table-sm">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Kode barang</th>
                                <th>Nama barang</th>
                                <th>Harga barang</th>
                                <th>Jumlah barang</th>
                                <th>Total barang</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach($item_transaksi as $row)
                                @php
                                    $totalItem = (int)$row->price * (int)$row->amount;
                                    $total += $totalItem;
                                @endphp
                                <tr>
                                    <td class="text-center text-monospace">{{$row->code}}</td>
                                    <td class="text-center text-monospace">{{$row->nama}}</td>
                                    <td class="text-center text-monospace">
                                        Rp{{number_format($row->price,'0',',','.')}}</td>
                                    <td class="text-center text-monospace">{{$row->amount}}</td>
                                    <td class="text-center text-monospace">
                                        Rp{{number_format($totalItem,'0',',','.')}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">Total Belanja</td>
                                <td class="text-center text-monospace">Rp{{number_format($total,'0',',','.')}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    @if($status_transaksi === 'darft')
                        <button id="btn-tutup-transaksi" class="btn btn-primary">Tutup Transaksi</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#search-kode-barang').on('keyup', function () {
                let code = $(this).val();
                $.ajax({
                    url: "{{url('app/searchProduct/')}}" + '/' + code,
                    success: function ($data) {
                        $('#search-nama-barang').val($data.nama);
                        $('#search-harga-barang').val($data.price);
                        $('#search-stock-barang').val($data.stock);
                        $('#search-id-barang').val($data.id);
                    },
                    error: function () {
                        $('#search-nama-barang').val();
                        $('#search-harga-barang').val();
                        $('#search-stock-barang').val();
                        $('#search-id-barang').val();
                    }
                });
            });

            $('#btn-tutup-transaksi').on('click', function () {
                let url = '{{route('kasir.close',[$no_transaksi])}}'
                window.location.replace(url);
            });
        });
    </script>
@endsection
