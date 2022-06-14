@extends('layout.main')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Konfirmasi Hapus Produtcs</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('pr.delete', [$product->id])}}">
                @csrf
                <label>Apakah anda yakin ingin menghapus file ini</label>

                <div class="form-group">
                    <label for="">Id</label>
                    <input class="form-control col-4" value="{{$product->id}}" type="text" name="id" required readonly />
                </div>

                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control col-4" value="{{$product->nama}}" type="text" name="nama" required readonly/>
                </div>

                <a class="btn btn-outline-primary" href="{{route('pr.list')}}">kembali</a>
                <button class="btn btn-danger" type="submit">
                    <i class="fa fa-trash-alt"></i>
                    Hapus
                </button>
            </form>

        </div>
    </div>
@endsection
