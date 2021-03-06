@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-11">
            @if (session()->has('createSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('createSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (session()->has('updateSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('updateSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (session()->has('deleteSuccess'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('deleteSuccess') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <a href="{{ route('provinceCreate') }}" class="btn btn-outline-primary mb-3">Tambah Data</a>
            
            @if ($province->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Province Name</th>
                        <th>Country</th>
                        <th>Total Kabupaten / Kota</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($province as $index => $item)
                    <tr class="align-middle">
                        <th>{{ ($currentPage - 1) * $perPage + $index + 1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->country->name }}</td>
                        <td>{{ count($item->regencies) }}</td>
                        <td class="text-center"><a href="/province/edit/{{ $item->id }}" class="btn btn-outline-success"><i class="bi bi-pencil"></i></a> | 
                            <a href="/province/delete/{{ $item->id }}" class="btn btn-outline-danger" onclick="alert(event)"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $province->links() }}
            @else
                <h1>Tidak ada data yang ditemukan !</h1>                
            @endif
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
		function alert(e){
			if(!confirm('Hapus data ?')){
				e.preventDefault();
			}
		}
    </script>
@endsection