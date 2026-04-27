@extends('layouts.app')
@section('content')
<div class="page-header">
    <div class="page-title">Tambah <span>Produk</span></div>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="card" style="max-width:600px;">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.products.store') }}">
            @csrf
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama produk">
                @error('name')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" placeholder="Deskripsi produk...">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
                <label>Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price') }}" placeholder="0">
                @error('price')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stock" value="{{ old('stock', 0) }}" placeholder="0">
                @error('stock')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            <div class="form-group">
                <label>Kategori (bisa pilih lebih dari satu)</label>
                <div class="check-group">
                @foreach($categories as $cat)
                    <div class="check-item">
                        <input type="checkbox" name="categories[]" value="{{ $cat->id }}" id="cat_{{ $cat->id }}"
                               {{ in_array($cat->id, old('categories', [])) ? 'checked' : '' }}>
                        <label for="cat_{{ $cat->id }}">{{ $cat->name }}</label>
                    </div>
                @endforeach
                </div>
                @error('categories')<span class="invalid-feedback">{{ $message }}</span>@enderror
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection