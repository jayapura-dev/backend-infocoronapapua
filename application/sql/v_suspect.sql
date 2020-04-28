SELECT
id_suspect,
gender,
umur,
tb_suspect.id_rs as id_rs,
tb_suspect.status as status,
tb_suspect.id_kabupaten as id_kabupaten,
tb_rs_rujukan.rumah_sakit as rs,
tb_kabupaten.nama_kab as nama_kab
FROM tb_suspect
LEFT JOIN tb_rs_rujukan ON tb_suspect.id_rs = tb_rs_rujukan.id_rs
LEFT JOIN tb_kabupaten ON tb_suspect.id_kabupaten = tb_kabupaten.id_kabupaten