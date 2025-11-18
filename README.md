# TP8DPBO2425C2

Saya Farah Maulida dengan NIM 2410024 mengerjakan Tugas Praktikum 8 dalam mata kuliah Desain dan Pemrograman Berbasis Objek untuk keberkahan-Nya maka saya tidak akan melakukan kecurangan seperti yang telah di spesifikasikan Aamiin.

# Penjelasan Alur

Proyek ini merupakan sebuah aplikasi sederhana untuk mengelola data Lecturer dan Course menggunakan bahasa pemrograman PHP dan database MySQL, dengan struktur arsitektur MVC (Model–View–Controller). Melalui aplikasi ini, pengguna dapat melakukan berbagai operasi dasar seperti membuat, membaca, memperbarui, dan menghapus (CRUD) data dosen serta mata kuliah. Selain itu, tabel Course memiliki relasi langsung dengan Lecturer, sehingga setiap mata kuliah terhubung ke dosen tertentu.

Penjelasan tabel pada database :

1. Tabel lecturers : Tabel lecturers digunakan untuk menyimpan data dosen. Tabel ini menjadi tabel utama yang berisi informasi mengenai setiap dosen yang terdaftar dalam sistem. Setiap dosen memiliki ID unik yang digunakan sebagai primary key dan menjadi acuan untuk relasi dari tabel lain. Data dalam tabel ini mencakup identitas dasar dosen seperti nama, NIDN, nomor telepon, dan tanggal bergabung. Tabel ini berdiri sendiri, namun menjadi referensi bagi tabel lain, terutama tabel courses. Kolom dalam tabel:

id — Primary key
name — Nama dosen
nidn — Nomor identitas dosen
phone — Nomor telepon
join_date — Tanggal dosen bergabung

2. Tabel courses : Tabel courses menyimpan data mata kuliah yang ditawarkan. Setiap mata kuliah memiliki ID unik sebagai primary key dan beberapa atribut seperti nama mata kuliah, kode, serta jumlah SKS. Hal yang paling penting adalah adanya kolom lecturer_id, yang berperan sebagai foreign key dan menjadi relasi ke tabel lecturers. Dengan relasi ini, satu dosen dapat mengajar banyak mata kuliah (relasi one-to-many). Kolom dalam tabel:

id — Primary key
course_name — Nama mata kuliah
course_code — Kode mata kuliah
credits — Jumlah SKS
lecturer_id — Foreign key yang merujuk ke lecturers.id

Penjelasan konsep MVC :

1. Model : Bagian Model berfungsi sebagai jembatan antara aplikasi dan database. Model berisi fungsi-fungsi untuk menjalankan query seperti mengambil semua lecturer, mencari course berdasarkan ID, menyimpan data baru, melakukan update, atau menghapus entri tertentu. Setiap entitas utama (Lecturer dan Course) memiliki file Model masing-masing. Dengan pemisahan ini, jika suatu saat struktur tabel berubah, hanya file model yang perlu diperbarui tanpa memengaruhi tampilan atau controller.
2. Controller : Controller adalah bagian yang menerima setiap permintaan yang dikirimkan pengguna. Controller akan memeriksa tindakan apa yang diminta (menambah, mengedit, menampilkan data, dll), kemudian memanggil fungsi yang tepat dari Model. Setelah Controller mendapatkan data yang dibutuhkan, data tersebut dikirim ke View untuk ditampilkan kepada pengguna. Dengan cara ini, Controller menjaga agar proses aplikasi tetap terstruktur dan logika pengolahan data tidak bercampur dengan tampilan.
3. View : View bertugas menampilkan data atau form input kepada pengguna dengan cara yang mudah dipahami, karena View hanya fokus pada tampilan, desain antarmuka dapat diubah kapan saja tanpa memodifikasi logika aplikasi yang berada di Model dan Controller.
4. Router (index.php) : Semua permintaan pengguna diarahkan melalui file index.php. File ini berfungsi sebagai router sederhana yang menentukan controller mana yang harus dijalankan berdasarkan parameter yang dikirimkan melalui URL. Dengan adanya router ini, pengguna dapat mengakses informasi lecturer ataupun course dari satu pintu utama.

Aplikasi ini menyediakan serangkaian fitur dasar yang memungkinkan pengguna untuk mengelola data dosen (Lecturer) dan mata kuliah (Course) dengan mudah. Pada bagian Lecturer, pengguna dapat menambah dosen baru dengan mengisi form yang disediakan, melihat daftar seluruh dosen yang tersimpan, mengubah data dosen tertentu jika terdapat kesalahan atau perubahan informasi, serta menghapus dosen dari sistem. Setiap lecturer memiliki ID unik yang nantinya digunakan sebagai relasi ke tabel mata kuliah.

Pada bagian Course, pengguna juga dapat melakukan operasi CRUD yang sama seperti membuat course baru, melihat daftar course, mengedit course, dan menghapusnya. Setiap course memiliki relasi langsung ke lecturer melalui lecturer_id, sehingga pengguna dapat menentukan dosen pengajar untuk setiap mata kuliah. Fitur ini membantu memahami konsep relasi satu ke banyak (one-to-many) di dalam database, karena satu dosen dapat mengajar banyak course.

# Dokumentasi

