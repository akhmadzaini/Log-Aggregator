## Log Aggregator

Log Aggragetor merupakan aplikasi penyedia RESTful API untuk plugin [Moodle Timespend](https://github.com/akhmadzaini/plugintimespend.git). Aplikasi ini berfungsi sebagai media penyimpanan durasi partisipasi peserta pada sistem moodle. Kami sangat menyarankan log aggregator ditempatkan pada mesin yang terpisah dengan server Moodle, agar tidak mengganggu kinerja server Moodle yang sebenarnya. Pastikan anda telah menginstal plugin [Moodle timespend](https://github.com/akhmadzaini/plugintimespend.git) pada sistem moodle yang dikehendaki. 

### Dokumentasi

- Buat database mysql
- Buat tabel dengan nama timespend dengan struktur : 
- Ekstrak aplikasi log agregator, simpan file aplikasi pada document root Log Aggregator
- Lakukan penyesuaian **database** pada file .env yang tersimpan pada folder aplikasi
- Lakukan penyesuaian target url aggregator pada plugin timespend moodle.   

