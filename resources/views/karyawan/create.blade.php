@extends('index')

@section('content')

<div class="row justify-content-center mt-3 mb-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Tambah Data Karyawan
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('karyawan.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">NIP</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control @error('NIP') is-invalid @enderror" id="NIP" name="NIP" value="{{ old('NIP') }}">
                            @if ($errors->has('NIP'))
                                <span class="text-danger">{{ $errors->first('NIP') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Nama</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                            @if ($errors->has('nama'))
                                <span class="text-danger">{{ $errors->first('nama') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Jabatan</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
                            @if ($errors->has('jabatan'))
                                <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="mb-1 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-success" value="Simpan">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>

@endsection