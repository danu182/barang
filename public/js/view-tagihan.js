
document.getElementById("tampilkan_tagihan").addEventListener("click", tampilkan_nilai_form);

function tampilkan_nilai_form() {
    const inputNoTagihan = document.getElementById("inputnoTagihan").value;
    const inputtanggalTagihan = document.getElementById("inputtanggalTagihan").value;
    const inputdueDateTagihan = document.getElementById("inputdueDateTagihan").value;
    const inputperiodeTagihan = document.getElementById("inputperiodeTagihan").value;
    const inputtotaltagihan = document.getElementById("inputtotaltagihan").value;


    const inputpicUser = document.getElementById("inputpicUser").value;
    const inputpicAlamat = document.getElementById("inputpicAlamat").value;
    const inputpicTlp = document.getElementById("inputpicTlp").value;
    const inputpicEmail = document.getElementById("inputpicEmail").value;



    document.getElementById('noTagihan').textContent = inputNoTagihan;
    document.getElementById('tanggalTagihan').textContent = inputtanggalTagihan;

    console.log(inputdueDateTagihan);
    document.getElementById('dueDateTagihan').textContent = inputdueDateTagihan;


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
            cell2.textContent = namaItems[i].value;
            cell4.textContent = hargaSatuans[i].value;
            cell3.textContent = jumlahs[i].value;
            cell5.textContent = subtotals[i].value;
        }
    };





}















