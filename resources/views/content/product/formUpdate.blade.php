@extends('layout.main')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Ubah</h3>
        </div>

        <div class="card-body">
            <form method="post" action="{{route('pr.update', [$product->id])}}">
                @csrf

                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control col-4" value="{{$product->nama}}" type="text" name="nama" required />
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input class="form-control col-4" value="{{$product->price}}" type="number" min="1" name="price" required />
                </div>

                <div class="form-group">
                    <label for="">Expired</label>
                    <input class="form-control col-4" value="{{$product->expired}}" type="date" name="expired" required />
                </div>

                <div class="form-group">
                    <label for="">Stock</label>
                    <input class="form-control col-4" value="{{$product->stock}}" type="number" min="1" name="stock" required />
                </div>

                <a class="btn btn-outline-primary" href="{{route('pr.list')}}">kembali</a>
                <button class="btn btn-success" type="submit">
                    <i class="fas fa-save"></i>
                    Simpan
                </button>
            </form>
        </div>
    </div>


@endsection
