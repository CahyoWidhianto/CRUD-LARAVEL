@extends('layout.main')
@section('content')

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h3>Ganti Password</h3>
            </div>

            <div class="card-body">
                <form action="{{route('update.password')}}" method="post">
                    @csrf
                    <div class="form-group"></div>
                    <input type="password" name="password_lama" class="form-control" placeholder="Password Lama">

                    <div class="form-group"></div>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password Baru ">@error('password')
                    <div class="invalid-feedback">{{ $message }}</div>@enderror

                    <div class="form-group"></div>
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Konfirmasi Password "><br>

                    <a href="{{route('pr.list')}}" class="btn btn-outline-primary">kembali</a>
                    <button type="submit" class="btn btn-sm btn-success ">Ganti Password</button>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>

@endsection
