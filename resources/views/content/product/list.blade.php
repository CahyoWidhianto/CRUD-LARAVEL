@extends('layout.main')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Produtcs</h3>
        </div>
        <div class="card-body">
            <a class="btn btn-outline-primary mb-2" href="{{route('pr.formNew')}}">Tambah Product</a>

            <table class="table table-sm table-striped table-bordered">
                <tr>
                    <th>NO</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Price</th>
                    <th>Expired</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
                @php($no = 1)
                @foreach($products as $product)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->nama}}</td>
                        <td>{{"Rp " . number_format($product->price,0,"",".")}}</td>
                        <td>{{$product->expired}}</td>
                        <td>{{$product->stock}}</td>
                        <td>
                            <a
                                data-nama-produk="{{$product->name}}"
                                data-id-produk="{{$product->id}}"
                                data-harga-produk="{{$product->price}}"
                                data-expired-produk="{{$product->expired}}"
                                class="btn-konfirmasi-hapus btn-sm btn-danger" href="#">
                                <i class="fa fa-trash"></i>
                            </a>

                            <a class="btn btn-warning btn-sm" href="{{route('pr.formUpdate',[$product->id])}}">
                                <i class="fas fa-user-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-konfirmasi-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda Yakin Hapus Data Ini? <br>
                    Id Produk : <b id="modal-id-produk"></b> <br>
                    Nama Produk : <b id="modal-nama-produk"></b> <br>
                    Harga Produk : <b id="modal-price-produk"></b> <br>
                    Expired Produk : <b id="modal-expired-produk"></b> <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="#" id="btn-proses-hapus" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.btn-konfirmasi-hapus').click(function () {
                let  idProduk =$(this).data('id-produk');
                let  namaProduk = $(this).data('nama-produk');
                let  hargaProduk = $(this).data('harga-produk');
                let  expiredProduk = $(this).data('expired-produk');
                $('#modal-id-produk').text(idProduk);
                $('#modal-nama-produk').text(namaProduk);
                $('#modal-price-produk').text(hargaProduk);
                $('#modal-expired-produk').text(expiredProduk);
                $('#btn-proses-hapus').attr('href','/products/'+idProduk+'/delete');
                $('#modal-konfirmasi-hapus').modal('show');
            });
        });
    </script>
@endsection
