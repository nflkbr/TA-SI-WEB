<h1>Edit Produk</h1>

<form method="POST" action="/admin/products/{{ $product->id }}">
    @csrf
    @method('PUT')

    Nama: <input type="text" name="name" value="{{ $product->name }}"><br>
    Deskripsi: <input type="text" name="description" value="{{ $product->description }}"><br>
    Harga: <input type="number" name="price" value="{{ $product->price }}"><br>

    <br>Kategori:<br>
    @foreach($categories as $c)
        <input type="checkbox" name="categories[]" value="{{ $c->id }}"
        {{ $product->categories->contains($c->id) ? 'checked' : '' }}>
        {{ $c->name }}<br>
    @endforeach

    <button>Update</button>
</form>