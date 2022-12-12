<?php
class HomeView extends View {
    function index() {
?>
<br>
<br>


<font color='white'><font size="7">SyntXNET</font>
    <p> <font size="5">Selamat Datang  <b><?php echo $_SESSION['user']->userName; ?></b></p>
    <br> SyntXNEt Merupakan warung internet yang cukup di gemari para gamers yang berada di nusantara. 
    Di SyntXNEt sering juga diadakan beberapa turnament berbagai jenis game. 
    <p>Game yang pernah bertanding di SyntXNEt antara lain:
    <p>POINT BLANK,
    ATLANTIKA,
    LOST SAGA,
    DOTA, dan masi banyak lagi. Selain untuk bermain game, di SyntXNET pelanggan juga dapat melakukan pembuatan tugas, editing video dan foto, print, internet dan browsing
    seperti : Menonton YouTube, Mendownload sesuatu dan banyak lagi.  </p>
    <br>
    SyntXNET sering terpilih sebagai tempat untuk melakukan pertandingan game, dikarenakan SyntXNET memiliki spesifikasi
    yang baik untuk menjalankan banyak game dan banyak aplikasi, dan juga SyntXNET memiliki banyak unit Komputer yaitu 20 unit
    dan juga memiliki 2 lantai dengan 10 unit komputer di lantai 1 dan 10 unit lagi di lantai 2.
    <br>
    <br>
    Pengunjung dapat menikmati layanan kami pada :
    <p>Hari Senin sampai dengan Minggu pada pukul 07:00 - 00:00 Wib dan SyntXNET akan tutup pada saat hari-hari besar atau saat
        hari libur nasional.
    <p>
    Pengunjung dapat melakukan pemesanan secara online dengan cara memesan di website ini, dan pengunjung juga dapat
    melihat data pelanggan yang telah terdaftar di SyntXNET ini.
    <p>--ENJOY GAMMING--</p>
    </p>
    </p>
<?php
    }
}
?>