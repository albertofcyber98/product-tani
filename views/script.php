<script type="text/javascript">
    var harga_produk = '<?= $result['harga_produk'] ?>'
    var stock_produk = '<?= $result['stok_produk'] ?>'
    let a = 0;
    const sub_total = document.getElementById("subTotal");
    const jumlah = document.getElementById("jumlah");

    function rubah(angka) {
        let reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    function getJumlah(val) {
        if (val > stock_produk) {
            let angka = stock_produk * harga_produk;
            sub_total.innerHTML = "Rp. " + rubah(angka) + "/ " + a + " Kg";
            jumlah.value = stock_produk
        } else {
            let angka = val * harga_produk;
            sub_total.innerHTML = "Rp. " + rubah(angka) + "/ " + a + " Kg";
        }
    }

    function inc() {
        let jumlah = document.getElementById("jumlah");
        jumlah.value = a;
        if (a < stock_produk) {
            a++;
        }
        jumlah.value = a;
        let angka = a * harga_produk;
        sub_total.innerHTML = "Rp. " + rubah(angka) + "/ " + a + " Kg";
    }

    function dec() {
        let jumlah = document.getElementById("jumlah");
        jumlah.value = a;
        if (a >= 1) {
            a--;
        }
        jumlah.value = a;
        let angka = a * harga_produk;
        sub_total.innerHTML = "Rp. " + rubah(angka) + "/ " + a + " Kg";
    }
</script>
<script src="asset/bootstrap/js/bootstrap.min.js"></script>
<script src="asset/aos/js/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="asset/sweetalert/sweetalert.min.js"></script>