## Responsi
NIM : `137`\
Bahasa : `PHP, HTML, CSS, JavaScript`\
Database : `db_responsi (tb_jabatan, tb_pegawai)`\
DBMS : `MySQL`\
Query yang digunakan : `SELECT, INSERT, UPDATE, DELETE`\
\

```
-----------------
| tb_pegawai    |
-----------------
| id_pegawai*   |     
| nik           |
| nama          |
| alamat        |
| id_jabatan    |<----+
| foto_path     |     |
-----------------     |
                      |
                      |
                      |
-----------------     |
| tb_jabatan    |     |
-----------------     |
| id_jabatan*   |=----+
| nama_jabatan  |
-----------------
```