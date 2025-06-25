
        document.getElementById("tampilkan_tagihan").addEventListener("click", tampilkan_nilai_form);

        function tampilkan_nilai_form(){
            const inputNoTagihan = document.getElementById("inputnoTagihan").value;
            const inputtanggalTagihan = document.getElementById("inputtanggalTagihan").value;
            const inputdueDateTagihan = document.getElementById("inputdueDateTagihan").value;



            console.log(inputNoTagihan);
            document.getElementById('noTagihan').textContent = inputNoTagihan;

        }


        // const inputNoTagihan = document.getElementById("noTagihan");
        // const spanNoTagihan = document.getElementById("noTagihanSpan");
        // const inputUpTagihan = document.getElementById("upTagihan");
        // const spanUpTagihan = document.getElementById("upTagihanSpan");
        // const inputTanggalTagihan = document.getElementById("tanggalTagihan");
        // const spanTanggalTagihan = document.getElementById("tanggalTagihanSpan");

        // inputTanggalTagihan.addEventListener("input", function() {
        //     spanNoTagihan.textContent = inputNoTagihan.value;
        //     spanUpTagihan.textContent= inputUpTagihan.value;
        //     spanTanggalTagihan.textContent= inputTanggalTagihan.value;
        // });
