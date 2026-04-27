@extends('layouts.app')
@section('content')
<div class="page-header">
    <div class="page-title">Semua <span>Produk</span></div>
    <a href="{{ route('user.cart') }}" class="btn btn-outline">🛒 Keranjang</a>
</div>

<div class="product-grid">
@forelse($products as $product)
    <div class="product-card">
        <div class="product-name">{{ $product->name }}</div>
        <div class="product-desc">{{ $product->description ?? 'Tidak ada deskripsi.' }}</div>
        <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
        <div class="product-stock">Stok: {{ $product->stock }}</div>
        <div class="product-cats">
            @foreach($product->categories as $cat)
                <span class="badge badge-accent">{{ $cat->name }}</span>
            @endforeach
        </div>
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button class="btn btn-primary" style="width:100%">+ Keranjang</button>
        </form>
    </div>
@empty
    <div class="empty-state">Belum ada produk tersedia.</div>
@endforelse
</div>
@endsection