// Fungsi untuk mencetak invoice
        document.querySelector('.print-btn').addEventListener('click', function() {
            window.print();
        });

        // Fungsi untuk tombol bayar
        document.querySelector('.payment-btn').addEventListener('click', function() {
            alert('Anda akan diarahkan ke halaman pembayaran. Terima kasih!');
            // Di sini bisa diisi dengan redirect ke halaman pembayaran
            // window.location.href = '/payment';
        });

        // Animasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.invoice-container, .header-gradient, table tr');
            elements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = 1;
                    el.style.transform = 'translateY(0)';
                }, 100 * index);
            });
        });
