@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Data</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/wastes">

            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" name="name" required autofocus value="{{ old('name') }}">
              
              @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="category" class="form-label">Kategori</label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="weight" class="form-label">Berat (Kg)</label>
              <input type="text" class="form-control @error('weight') is-invalid @enderror " id="weight" name="weight" required value="{{ old('weight') }}">

              @error('weight')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection