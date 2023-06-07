@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Waste Data</h1>
        
    </div>
  <div class="table-responsive col-md-3">
      <a href="/dashboard/wastes" class="btn btn-success mb-2"><span data-feather="arrow-left"></span> Back to Wastes Data</a>

      <a href="/dashboard/wastes/{{ $waste->id }}/edit" class="btn btn-warning mb-2"><span data-feather="edit"></span> Edit</a>

      <form action="/dashboard/wastes/{{ $waste->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger mb-2" onclick="return confirm('Hapus Data {{ $waste->name }}?')"><span data-feather="x-circle"></span> Delete</button>
      </form>

      <table class="table table-striped table-sm">
      <thead>
        <tr>
             <th scope="col">Nama</th>
             <td>: {{ $waste->name }}</td>
        </tr>
        <tr>
            <th scope="col">Kategori</th>
            <td>: {{ $waste->category->name }}</td>
        </tr>
        <tr>
            <th scope="col">Berat</th>
            <td>: {{ $waste->weight }} Kg</td>
        </tr>
      </thead>
    </table>
  </div>
@endsection