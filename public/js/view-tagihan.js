
document.getElementById("tampilkan_tagihan").addEventListener("click", tampilkan_nilai_form);

function tampilkan_nilai_form() {
    const inputNoTagihan = document.getElementById("inputnoTagihan").value;
    const inputtanggalTagihan = document.getElementById("inputtanggalTagihan").value;
    const inputdueDateTagihan = document.getElementById("inputdueDateTagihan").value;
    const inputperiodeTagihan = document.getElementById("inputperiodeTagihan").value;
    const inputtotaltagihan = document.getElementById("inputtotaltagihan").value;
    const inputsubttotal = document.getElementById("inputsubttotal").value;
    const inputdenda = document.getElementById("inputdenda").value;
    const inputvat = document.getElementById("inputvat").value;
    const inputdiskon = document.getElementById("inputdiskon").value;



    const inputpicUser = document.getElementById("inputpicUser").value;
    const inputpicAlamat = document.getElementById("inputpicAlamat").value;
    const inputpicTlp = document.getElementById("inputpicTlp").value;
    const inputpicEmail = document.getElementById("inputpicEmail").value;



    document.getElementById('noTagihan').textContent = inputNoTagihan;
    document.getElementById('tanggalTagihan').textContent = inputtanggalTagihan;

    // console.log(inputtotaltagihan);
    document.getElementById('dueDateTagihan').textContent = inputdueDateTagihan;
    document.getElementById('totaltagihan').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(inputtotaltagihan);
    document.getElementById('subttotal').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(inputsubttotal);
    document.getElementById('denda').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(inputdenda);
    document.getElementById('diskon').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(inputdiskon);
    document.getElementById('vat').textContent = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(inputvat);
// console.log(inputtotaltagihan);
    // document.getElementById('totaltagihan').textContent = inputtotaltagihan;


    document.getElementById('picUser').textContent = inputpicUser;
    document.getElementById('picAlamat').textContent = inputpicAlamat;
    document.getElementById('picTlp').textContent = inputpicTlp;
    document.getElementById('picEmail').textContent = inputpicEmail;


    // Get the input values
    const namaItems = document.getElementsByName('namaItem[]');
    const jumlahs = document.getElementsByName('jumlah[]');
    const hargaSatuans = document.getElementsByName('hargaSatuan[]');
    const subtotals = document.getElementsByName('subtotal[]');
    // Get the table body
    const tableBody = document.getElementById('tagihanTable').getElementsByTagName('tbody')[0];
    // Clear existing rows
    tableBody.innerHTML = '';
    // Loop through the input fields and create table rows
    for (let i = 0; i < namaItems.length; i++) {
        if (namaItems[i].value && jumlahs[i].value && hargaSatuans[i].value && subtotals[i].value) {
            const row = tableBody.insertRow();
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
            const cell3 = row.insertCell(2);
            const cell4 = row.insertCell(3);
            const cell5 = row.insertCell(4);
            cell1.textContent = i+1;
            cell4.style.textAlign = 'right';
            cell2.textContent = namaItems[i].value;
            cell3.textContent = hargaSatuans[i].value;
            cell3.style.textAlign = 'center';
            cell4.textContent = jumlahs[i].value;
            cell4.style.textAlign = 'center';
            cell5.textContent = subtotals[i].value;
            cell5.style.textAlign = 'right';
        }
    };



    const vendorId = document.getElementById('vendor_id').value;

        if (vendorId) {
        fetch(`/get-vendor-pic/${vendorId}`)
                .then(response => response.json())
                .then(data => {
                    // console.log(data); // Log the entire data object
                    document.getElementById('namaVendor').textContent = data.namaVendor || '';
                    document.getElementById('alamatVendor').textContent = data.alamatVendor || '';
                    document.getElementById('tlpVendor').textContent = data.tlpVendor || '';
                    document.getElementById('emailVendor').textContent = data.emailVendor || '';
                })
                .catch(error => console.error('Error fetching data:', error));
        } else {
            // Clear fields if no pelanggan is selected
            document.getElementById('namaVendor').value = '';
            document.getElementById('alamatVendor').value = '';
            document.getElementById('tlpVendor').value = '';
            document.getElementById('emailVendor').value = '';
        }


}


    // membuat data berbah pada saat dropdown pelangggan
        function fetchData() {
        const pelangganId = document.getElementById('pelanggan_id').value;

            if (pelangganId) {
                fetch(`/get-customer-pic/${pelangganId}`)
                    .then(response => response.json())
                    .then(data => {
                        // console.log(data.namaPelanggan);
                        // document.getElementById('inputPelanggan').value = 'abdul maman';
                        document.getElementById('inputPelanggan').textContent = data.namaPelanggan  || '';
                        document.getElementById('inputPelangganId').textContent = data.PelangganId  || '';
                        document.getElementById('inputpicUser').value = data.picUser  || '';
                        document.getElementById('inputpicAlamat').value = data.picAlamat || '';
                        document.getElementById('inputpicTlp').value = data.picTlp || '';
                        document.getElementById('inputpicEmail').value = data.picEmail || '';
                    })
                    .catch(error => console.error('Error fetching data:', error));
            } else {
                // Clear fields if no pelanggan is selected
                document.getElementById('inputPelangganId').value = '';
                document.getElementById('inputPelanggan').value = '';
                document.getElementById('inputpicUser').value = '';
                document.getElementById('inputpicAlamat').value = '';
                document.getElementById('inputpicTlp').value = '';
                document.getElementById('inputpicEmail').value = '';
            }
        }















