 $(document).ready(function() {
            // Listen for clicks on any button with the class 'select-item-btn'
            $('#dataTable').on('click', '.select-item-btn', function() {
                // Get data from the data attributes of the clicked button
                var namaBarang = $(this).data('nama-barang');
                var kodeBarangBaru = $(this).data('kode-barang-baru');
                var merek = $(this).data('merek');
                var model = $(this).data('model');
                var hargaPerolehan = $(this).data('harga-perolehan');
                var tipeRam = $(this).data('tipe-ram');

                // Populate the form fields on your main page

                console.log(prosesorDetails);

                $('#namaBarangInput').val(namaBarang);
                // $('#kodeBarangBaruInput').val(kodeBarangBaru);
                document.getElementById("kodeBarangBaruInput").innerHTML = kodeBarangBaru;


                // $('#merekInput').val(merek);
                document.getElementById("merekInput").innerHTML = merek;
                // $('#modelInput').val(model);
                document.getElementById("modelInput").innerHTML = model;

                document.getElementById("tipeRamInput").innerHTML = prosesorDetails;

                $('#hargaPerolehanInput').val(hargaPerolehan); // You might want to format this as currency

                // Hide the modal
                $('#exampleModal').modal('hide');
            });
        });


