    @extends('index')

    @section('content')

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card mt-5">
                <div class="card-header">Karyawan List</div>
                <div class="card-body">
                    <a href="{{ route('karyawan.create') }}" class="btn btn-success btn-sm my-3"><i class="bi bi-plus-circle"></i> Tambah Data Karyawan</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($karyawans as $karyawan)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $karyawan->NIP }}</td>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $karyawan->jabatan }}</td>
                                <td>
                                    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this karyawan?');"><i class="bi bi-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <td colspan="6">
                                    <span class="text-danger">
                                        <strong>Data Kosong!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $karyawans->links() }}

                </div>
            </div>
        </div>    
    </div>
        
    @endsection