@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Waste Data</h1>
    </div>
    <div class="table-responsive col-lg-8">
        @if (session()->has('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
        @endif
      <table class="table table-striped table-sm">
        <a href="/dashboard/wastes/create" class="btn btn-primary mb-3">Create New Data</a>
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kategori</th>
            <th scope="col">Berat</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($wastes as $waste)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $waste->name }}</td>
              <td>{{ $waste->category->name }}</td>
              <td>{{ $waste->weight }}</td>
              <td>
                  <a href="/dashboard/wastes/{{ $waste->id }}" class="badge bg-info"><span data-feather="eye"></span></a>

                  <a href="/dashboard/wastes/{{ $waste->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

                  <form action="/dashboard/wastes/{{ $waste->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus Data {{ $waste->name }}?')"><span data-feather="x-circle"></span></button>
                  </form>
              </td> 
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
@endsection