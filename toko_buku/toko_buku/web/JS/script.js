const navActive = document.getElementById("hb-menu");
const navbarNav = document.querySelector(".navbar-nav");
const emailInput = document.querySelector('input[type="email"]');

navActive.addEventListener("click", function () {
  console.log("done cak");
  navbarNav.classList.toggle("active");
});

document.addEventListener("click", function (e) {
  if (!navActive.contains(e.target) && !navbarNav.contains(e.target))
    navbarNav.classList.remove("active");
});

form.addEventListener("submit", function (e) {
  if (!emailInput.value.includes("@")) {
    e.preventDefault();
    alert("Please enter a valid email address.");
  }
});

async function fetchProduk() {
  const response = await fetch("http://localhost/sneaker-heaven/products.php");
  const produkList = await response.json();

  const productListContainer = document.querySelector(".product-list");
  productListContainer.innerHTML = ""; // Kosongkan kontainer sebelum mengisi

  produkList.forEach((produk) => {
    const productHTML = `
          <div class="product">
              <img src="${produk.gambar}" alt="${produk.nama_produk}" />
              <p class="category">${produk.kategori}</p>
              <p class="product-name">${produk.nama_produk}</p>
              <p class="price">Rp. ${produk.harga}</p>
          </div>
      `;
    productListContainer.innerHTML += productHTML;
  });
}

// Panggil fungsi saat halaman dimuat
document.addEventListener("DOMContentLoaded", fetchProduk);

document
  .getElementById("add-product-form")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const nama_produk = document.getElementById("nama_produk").value;
    const kategori = document.getElementById("kategori").value;
    const harga = document.getElementById("harga").value;
    const gambar = document.getElementById("gambar").value;

    const response = await fetch(
      "http://localhost/sneaker-heaven/products.php",
      {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ nama_produk, kategori, harga, gambar }),
      }
    );

    const result = await response.json();
    alert(result.message);

    fetchProduk(); // Refresh daftar produk
  });