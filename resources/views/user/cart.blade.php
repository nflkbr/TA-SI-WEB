@extends('layouts.app')
@section('content')
<div class="page-header">
    <div class="page-title">🛒 <span>Keranjang</span></div>
    <a href="{{ route('user.home') }}" class="btn btn-secondary">← Lanjut Belanja</a>
</div>

@if(count($cart) > 0)
<div class="card">
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @php $total = 0; @endphp
        @foreach($cart as $id => $item)
            @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
            <tr>
                <td style="font-weight:500;">{{ $item['name'] }}</td>
                <td style="font-family:'Space Mono',monospace; font-size:0.85rem;">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                <td><span class="badge badge-success">{{ $item['quantity'] }}</span></td>
                <td style="font-family:'Space Mono',monospace; color:var(--success); font-size:0.85rem;">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Hapus dari keranjang?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align:right; font-weight:600; padding:1rem; color:var(--text-muted); font-size:0.85rem; text-transform:uppercase;">Total</td>
                <td colspan="2" style="font-family:'Space Mono',monospace; color:var(--success); font-size:1.1rem; font-weight:700;">Rp {{ number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</div>
@else
    <div class="card"><div class="empty-state">Keranjang kosong. <a href="{{ route('user.home') }}" style="color:var(--accent)">Belanja sekarang →</a></div></div>
@endif
@endsection