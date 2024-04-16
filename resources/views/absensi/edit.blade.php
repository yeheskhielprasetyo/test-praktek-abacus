@extends('index')

@section('content')

<div class="row justify-content-center mt-3 mb-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Data Absensi
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('absensi.update', $absensi->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label for="karyawan" class="col-md-4 col-form-label text-md-end text-start">NIP</label>
                        <div class="col-md-6">
                            <select class="form-select" id="NIP" name="NIP">
                                @foreach($karyawan as $k)
                                    <option value="{{ $k->NIP }}" @selected($k->NIP == $absensi->NIP)>{{ $k->NIP }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('NIP'))
                                <span class="text-danger">{{ $errors->first('NIP') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start">Status</label>
                        <div class="col-md-6">
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                <option selected disabled>Pilih Status</option>
                                <option value="0"  @selected($absensi->status == 0)>Hadir</option>
                                <option value="1"  @selected($absensi->status == 1)>Ijin</option>
                                <option value="2"  @selected($absensi->status == 2)>Sakit</option>
                                <option value="3"  @selected($absensi->status == 3)>Tanpa Keterangan</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-md-4 col-form-label text-md-end text-start">Tanggal</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ $absensi->tanggal }}">
                            @if ($errors->has('tanggal'))
                                <span class="text-danger">{{ $errors->first('tanggal') }}</span>
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