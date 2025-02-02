@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow-sm p-3">
        <div class="card-body">
          <h5 class="card-title fw-bold">{{ $title }}</h5>
          <hr>
          <form action="{{ route('categories.update', $category->id_category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name_category">Nama Kategori</label>
              <input type="text" class="form-control @error('name_category') is-invalid @enderror" id="name_category" name="name_category" value="{{ $category->name_category }}">
              @error('name_category')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <!-- Add transaction_type field -->
            <div class="form-group">
              <label for="type">Jenis Transaksi</label>
              <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                <option value="">Pilih Jenis Transaksi</option>
                <option value="expense" {{ old('type', $category->type) == 'expense' ? 'selected' : '' }}>Expense</option>
                <option value="income" {{ old('type', $category->type) == 'income' ? 'selected' : '' }}>Income</option>
              </select>
              @error('type')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>


            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <a href="{{ route('categories') }}" class="btn btn-sm btn-secondary">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection