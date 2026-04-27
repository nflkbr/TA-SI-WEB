@extends('layouts.app')
@section('content')
<div class="page-header">
    <div class="page-title">Kelola <span>Produk</span></div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Tambah Produk</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $i => $product)
            <tr>
                <td style="color:var(--text-muted); font-family:'Space Mono',monospace; font-size:0.8rem;">{{ $i + 1 }}</td>
                <td style="font-weight:500;">{{ $product->name }}</td>
                <td style="font-family:'Space Mono',monospace; color:var(--success); font-size:0.85rem;">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @foreach($product->categories as $cat)
                        <span class="badge badge-accent">{{ $cat->name }}</span>
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus produk ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6"><div class="empty-state">Belum ada produk. Tambahkan sekarang!</div></td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection