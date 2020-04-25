SELECT 
tb_kabupaten.nama_kab as nama_kab,
tb_kabupaten.id_kabupaten as id_kabupaten,
COUNT(tb_suspect.id_suspect) as jumlah_suspect
FROM tb_suspect
LEFT JOIN tb_kabupaten ON tb_suspect.id_kabupaten = tb_kabupaten.id_kabupaten
GROUP BY id_kabupaten