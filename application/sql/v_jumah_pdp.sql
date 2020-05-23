SELECT 
tb_kabupaten.id_kabupaten as id_kabupaten,
tb_kabupaten.nama_kab as nama_kab,
tb_kabupaten.logo_path as logo,
COUNT(DISTINCT id_pdp) as jumlah_pdp
FROM tb_pdp
LEFT JOIN tb_kabupaten ON tb_pdp.id_kabupaten = tb_kabupaten.id_kabupaten
GROUP BY id_kabupaten