# MVCPHP
MVC adalah sebuah konsep dalam pembuatan web yang memisahkan logic,tampilan,dan request ke server;

FUNGSI SETIAP KOMPONEN MVC;
 Models digunakan untuk melakukan request ke server;
 Views digunakan untuk menampilkan user interface;
 Controllers merupakan otak dari kedua komponen tersebut yang melakukan logic;
 
 ALUR KERJA;
 
 User masuk ke web dan controller menyuruh untuk menampilkan view jika user melakukan post/get view memberikan data yang di masukkan user dari view ke controllers
 jika data membutuhkan akses ke server controller menjalankan models untuk melakukan request ke server setelah itu dikembalikan ke controllers dan controllers menyuruh views untuk
 menampilkan data yang didapat dari server;
