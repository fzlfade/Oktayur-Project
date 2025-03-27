// Ambil elemen input dan produk
const searchInput = document.querySelector('.search-input');
const productCards = document.querySelectorAll('.product-card');

// Tambahkan event listener untuk input
searchInput.addEventListener('input', function() {
    const searchTerm = searchInput.value.toLowerCase(); // Ambil nilai input dan ubah menjadi huruf kecil

    // Buat array untuk menyimpan produk yang cocok
    const matchedProducts = [];
    const unmatchedProducts = [];

    productCards.forEach(card => {
        const productName = card.querySelector('.product-name').textContent.toLowerCase(); // Ambil nama produk

        // Cek apakah nama produk mengandung kata kunci pencarian
        if (productName.includes(searchTerm)) {
            matchedProducts.push(card); // Simpan produk yang cocok
        } else {
            unmatchedProducts.push(card); // Simpan produk yang tidak cocok
        }
    });

    // Sembunyikan semua produk terlebih dahulu
    productCards.forEach(card => {
        card.style.display = 'none'; // Sembunyikan semua produk
    });

    // Tampilkan produk yang cocok di atas
    matchedProducts.forEach(card => {
        card.style.display = ''; // Tampilkan produk yang cocok
        card.parentNode.prepend(card); // Pindahkan produk yang cocok ke atas daftar
    });

    // Tampilkan produk yang tidak cocok (jika ada)
    unmatchedProducts.forEach(card => {
        card.style.display = 'none'; // Sembunyikan produk yang tidak cocok
    });
});