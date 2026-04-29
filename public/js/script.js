// 1. FITUR DARK MODE


const btnTheme = document.getElementById('btn-theme');
const body = document.body;

    // Cek apakah ada simpanan tema di browser?
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
        btnTheme.innerText = "Mode Terang";
    }

    btnTheme.addEventListener('click', function() {
        body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
        btnTheme.innerText = "Mode Terang";
    } else {
        localStorage.removeItem('theme');
        btnTheme.innerText = "Mode Gelap";
    }
});

// 2. FITUR BELI

function aktifkanTombolBeli() {
    const tombolBeli = document.querySelectorAll('.btn-detail');
    tombolBeli.forEach(function(button) {
        button.replaceWith(button.cloneNode(true));
    });
    const tombolBaru = document.querySelectorAll('.btn-detail');
    tombolBaru.forEach(function(button) {
        button.addEventListener('click', function(e) {
            const cardBody = e.target.closest('.card-body');
            const stokElement = cardBody.querySelector('.stok-text');
            let stok = parseInt(stokElement.innerText.replace("Stok: ", ""));
            if (stok > 0) {
                stok --;
                stokElement.innerText = "Stok: " + stok;
                const namaBarang = cardBody.querySelector('.card-title').innerText;
                alert("Berhasil membeli " + namaBarang);
            } else {
                alert("Stok Habis!");
                e.target.disabled = true;
                e.target.innerText = "Habis";
            }
        });

    });
}
aktifkanTombolBeli();

// ===============================
// 3. FITUR WISHLIST
// ===============================

// Ambil elemen
const wishlistButtons = document.querySelectorAll('.btn-wishlist');
const wishlistCount = document.getElementById('wishlist-count');
const wishlistList = document.getElementById('wishlist-list');

// Ambil data dari sessionStorage
let wishlist = JSON.parse(sessionStorage.getItem('wishlist')) || [];

// Update badge saat pertama kali load
updateBadge();
renderWishlist();

// Event tambah wishlist
wishlistButtons.forEach(button => {
    button.addEventListener('click', function(e) {

        const cardBody = e.target.closest('.card-body');
        const namaMobil = cardBody.querySelector('.card-title').innerText;

        // Cegah duplikat
        if (!wishlist.includes(namaMobil)) {
            wishlist.push(namaMobil);
            sessionStorage.setItem('wishlist', JSON.stringify(wishlist));
            updateBadge();
            renderWishlist();
            alert(namaMobil + " ditambahkan ke wishlist!");
        } else {
            alert("Mobil sudah ada di wishlist!");
        }
    });
});

// ===============================
// FUNCTION UPDATE BADGE
// ===============================
function updateBadge() {
    wishlistCount.innerText = wishlist.length;
}

// ===============================
// FUNCTION RENDER WISHLIST
// ===============================
function renderWishlist() {

    // Kosongkan isi lama
    wishlistList.innerHTML = "";

    wishlist.forEach((item, index) => {

        const li = document.createElement('li');
        li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');

        const span = document.createElement('span');
        span.innerText = item;

        const btnRemove = document.createElement('button');
        btnRemove.classList.add('btn', 'btn-sm', 'btn-danger');
        btnRemove.innerText = "Remove";

        btnRemove.addEventListener('click', function() {
            removeItem(index);
        });

        li.appendChild(span);
        li.appendChild(btnRemove);
        wishlistList.appendChild(li);
    });
}

// ===============================
// FUNCTION REMOVE ITEM (BONUS)
// ===============================
function removeItem(index) {
    wishlist.splice(index, 1);
    sessionStorage.setItem('wishlist', JSON.stringify(wishlist));
    updateBadge();
    renderWishlist();
}