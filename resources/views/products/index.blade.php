<h1>Product List</h1>

<a href="/admin/products/create">Tambah Produk</a>

@foreach($products as $p)
    <div>
        <b>{{ $p->name }}</b> - {{ $p->price }}
        <br>
        Kategori:
        @foreach($p->categories as $c)
            {{ $c->name }},
        @endforeach

        <br>
        <a href="/admin/products/{{ $p->id }}/edit">Edit</a>

        <form action="/admin/products/{{ $p->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Hapus</button>
        </form>
    </div>
    <hr>
@endforeach