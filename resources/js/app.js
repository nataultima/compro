// resources/js/app.js

import "./bootstrap";

// =============================================================================
// FUNGSI MODAL SERTIFIKAT
// =============================================================================

/**
 * Membuka modal sertifikat dan mengisinya dengan data yang diberikan.
 * @param {object} certificate - Objek data sertifikat.
 */
window.openCertificateModal = function (certificate) {
    const modal = document.getElementById("certificateModal");
    const title = document.getElementById("certificateModalTitle");
    const imageContainer = document.getElementById(
        "certificateModalImageContainer"
    );
    const description = document.getElementById("certificateModalDescription");

    // Perbarui konten modal
    title.textContent = certificate.name;

    // Tampilkan gambar dengan rasio asli tanpa terpotong
    if (certificate.image_path) {
        imageContainer.innerHTML = `<img src="/storage/${certificate.image_path}" alt="${certificate.name}" class="mx-auto max-h-96 w-auto rounded-lg shadow-md object-contain">`;
    } else {
        // Tampilkan placeholder jika tidak ada gambar
        imageContainer.innerHTML = `
            <div class="flex items-center justify-center h-64 bg-gray-100 rounded-lg">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="ml-2 text-gray-500">Gambar tidak tersedia</p>
            </div>`;
    }

    description.textContent = certificate.description || "Tidak ada deskripsi.";

    // Tampilkan modal
    modal.classList.remove("hidden");
    document.body.style.overflow = "hidden";
};

/**
 * Menutup modal sertifikat.
 */
window.closeCertificateModal = function () {
    const modal = document.getElementById("certificateModal");
    modal.classList.add("hidden");
    document.body.style.overflow = "auto";
};

// =============================================================================
// FUNGSI MODAL PRODUK
// =============================================================================

/**
 * Membuka modal produk dan mengisinya dengan data yang diberikan.
 * @param {object} product - Objek data produk.
 */
window.openProductModal = function (product) {
    const modal = document.getElementById("productModal");
    const title = document.getElementById("productModalTitle");
    const imageContainer = document.getElementById(
        "productModalImageContainer"
    );
    const description = document.getElementById("productModalDescription");
    const category = document.getElementById("productModalCategory");
    const capacity = document.getElementById("productModalCapacity");
    const badge = document.getElementById("productModalBadge");

    // Perbarui konten modal
    title.textContent = product.name;
    description.textContent = product.description || "Tidak ada deskripsi.";
    category.textContent = product.category;
    capacity.textContent = product.capacity || "Tidak disebutkan";

    // Tampilkan gambar dengan rasio asli tanpa terpotong
    if (product.image) {
        imageContainer.innerHTML = `<img src="/storage/${product.image}" alt="${product.name}" class="max-w-full h-auto mx-auto rounded-lg shadow-lg object-contain">`;
    } else {
        // Tampilkan placeholder jika tidak ada gambar
        imageContainer.innerHTML = `
            <div class="flex items-center justify-center h-full">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>`;
    }

    // Tampilkan badge jika ada
    if (product.badge_label) {
        let badgeColorClass = "bg-gray-100 text-gray-800"; // Default
        switch (product.badge_color) {
            case "blue":
                badgeColorClass = "bg-blue-100 text-blue-800";
                break;
            case "green":
                badgeColorClass = "bg-green-100 text-green-800";
                break;
            case "purple":
                badgeColorClass = "bg-purple-100 text-purple-800";
                break;
            case "red":
                badgeColorClass = "bg-red-100 text-red-800";
                break;
            case "yellow":
                badgeColorClass = "bg-yellow-100 text-yellow-800";
                break;
        }
        badge.className = `${badgeColorClass} px-3 py-1 rounded-full text-sm font-medium`;
        badge.textContent = product.badge_label;
        badge.style.display = "inline-block";
    } else {
        badge.style.display = "none";
    }

    // Tampilkan modal
    modal.classList.remove("hidden");
    document.body.style.overflow = "hidden";
};

/**
 * Menutup modal produk.
 */
window.closeProductModal = function () {
    const modal = document.getElementById("productModal");
    modal.classList.add("hidden");
    document.body.style.overflow = "auto";
};

// =============================================================================
// INISIALISASI EVENT LISTENER
// =============================================================================

/**
 * Menjalankan fungsi saat DOM sepenuhnya dimuat.
 */
document.addEventListener("DOMContentLoaded", function () {
    /**
     * Fungsi pembantu untuk menambahkan event listener klik pada backdrop modal.
     * @param {string} modalId - ID dari elemen modal.
     * @param {function} closeFunction - Fungsi yang akan dipanggil untuk menutup modal.
     */
    const setupModalBackdropClose = (modalId, closeFunction) => {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.addEventListener("click", function (event) {
                // Pastikan yang diklik adalah backdrop itu sendiri, bukan konten di dalamnya
                if (event.target === modal) {
                    closeFunction();
                }
            });
        }
    };

    // Inisialisasi event listener untuk setiap modal
    setupModalBackdropClose("certificateModal", window.closeCertificateModal);
    setupModalBackdropClose("productModal", window.closeProductModal);
});
