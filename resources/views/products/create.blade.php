<h1>Tambah Produk</h1>

<form method="POST" action="/admin/products">
    @csrf

    Nama: <input type="text" name="name"><br>
    Deskripsi: <input type="text" name="description"><br>
    Harga: <input type="number" name="price"><br>

    <br>Kategori:<br>
    @foreach($categories as $c)
        <input type="checkbox" name="categories[]" value="{{ $c->id }}">
        {{ $c->name }}<br>
    @endforeach

    <button>Simpan</button>
</form>