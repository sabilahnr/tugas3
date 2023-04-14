var id_motor = document.getElementById('id_motor');
var nama = document.getElementById('nama');
var harga = document.getElementById('harga');
var tahun = document.getElementById('tahun');
var select = document.getElementById('select');
var container = document.getElementById('container');
var struk = document.getElementById('struk');
var jumlah = document.getElementById('jumlah');
var hitung = document.getElementById('hitung');
var final = document.getElementById('final');


//Untuk menjalankan ajax kita butuh trigger

// tambahkan event ketika id Motor ditulis
id_motor.addEventListener('keyup', function() {

    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function() {
        //4 berarti siap (sumbernya sdh ready).  Sumber siap menerima data kita
        //status 200 itu berarti jg sumbernya sdh oke/sumbernya ada
        //innerHTML digunakan untuk mengirim
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax

    //Kita buka koneksi ajaxnya
    //Ada beberapa parameter: methodnya mau (GET/POST), sumber datanya dari mana(PENTING) dan kita juga memberikan datanya kemudian ditambah stringnya, mau singronus(False) atau asingronus(true)
    xhr.open('GET', 'ajax/data.php?id_motor=' + id_motor.value, true);
    xhr.send();
});

// tambahkan event ketika nama Motor ditulis
nama.addEventListener('keyup', function() {

    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function() {
        //4 berarti siap (sumbernya sdh ready).  Sumber siap menerima data kita
        //status 200 itu berarti jg sumbernya sdh oke
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax

    //Kita buka koneksi ajaxnya
    //Ada beberapa parameter: methodnya mau apa(GET/POST), sumber datanya dari mana(PENTING), mau singronus(False) atau asingronus(true)
    xhr.open('GET', 'ajax/data.php?nama=' + nama.value, true);
    xhr.send();
});

// tambahkan event ketika nama Motor ditulis
harga.addEventListener('keyup', function() {

    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function() {
        //4 berarti siap (sumbernya sdh ready).  Sumber siap menerima data kita
        //status 200 itu berarti jg sumbernya sdh oke/sumbernya ada
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open('GET', 'ajax/data.php?harga=' + harga.value, true);
    xhr.send();
});

// tambahkan event ketika nama Motor ditulis
tahun.addEventListener('keyup', function() {

    //buat object ajax
    var xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function() {
        //4 berarti siap (sumbernya sdh ready).  Sumber siap menerima data kita
        //status 200 itu berarti jg sumbernya sdh oke/sumbernya ada
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    //eksekusi ajax
    xhr.open('GET', 'ajax/data.php?tahun=' + tahun.value, true);
    xhr.send();
});

//Untuk Mengirim Data Tambah
function sendData() {
    var select = document.getElementById("select").value; //mengambil value dari select
    var httpr = new XMLHttpRequest();
    httpr.open("POST", "ajax/tambah.php", true); // Yang diopen value nya
    //manggil Server
    httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    httpr.onreadystatechange = function() {
        if (httpr.readyState == 4 && httpr.status == 200) {
            //Tidak dilakukan aksi
        }
    }

    httpr.send("select=" + select); //Parameter select menampung variabel select
}

//untuk fungsi jumlah data
function kolom(kolom) {
    var struk = document.getElementById('struk');
    console.log(kolom);

    var jumlah = document.getElementById("jumlah" + kolom).value;
    console.log(jumlah);
    //console.log(document.getElementById("jumlah"+kolom).value);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/jumlah.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            struk.innerHTML = xhr.responseText;
        }
    }
    xhr.send("id=" + kolom + "&jumlah=" + jumlah);
}

//untuk hitung data berguna seperti sensor
hitung.addEventListener('click', function() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            final.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', 'ajax/total.php', true);
    xhr.send();
});

//untuk menghapus atau membatalkan semua transaksi
del.addEventListener('click', function() {
    var tanya = confirm("Apakah Anda Yakin Untuk Membatalkan Transaksi");
    if (tanya == true) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                window.location = "../TugasUTS_V3420067/index.php";
            }
        }
        xhr.open('GET', 'ajax/delete.php', true);
        xhr.send();
    }
});