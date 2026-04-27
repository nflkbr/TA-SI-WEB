@extends('layouts.app')
@section('content')
<div class="page-header">
    <div class="page-title">Edit <span>Produk</span></div>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="card" style="max-width:600px;">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.products.update', $product) }}">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="form-group">
                <label>Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}">
            </div>
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <div class="check-group">
                @foreach($categories as $cat)
                    <div class="check-item">
                        <input type="checkbox" name="categories[]" value="{{ $cat->id }}" id="cat_{{ $cat->id }}"
                               {{ $product->categories->contains($cat->id) ? 'checked' : '' }}>
                        <label for="cat_{{ $cat->id }}">{{ $cat->name }}</label>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-warning">Update Produk</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection