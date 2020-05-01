SELECT 
tb_kabupaten.id_kabupaten as id_kabupaten,
tb_kabupaten.nama_kab as nama_kab,
tb_kabupaten.logo_path as logo,
COUNT(tb_suspect.id_suspect) as jumlah_suspect,
COUNT(Distinct CASE WHEN tb_suspect.status = 'POSITIF' THEN tb_suspect.id_suspect END) as positif,
COUNT(Distinct CASE WHEN tb_suspect.status = 'SEMBUH' THEN tb_suspect.id_suspect END) as sembuh,
COUNT(Distinct CASE WHEN tb_suspect.status = 'MENINGGAL' THEN tb_suspect.id_suspect END) as meninggal
FROM tb_suspect
LEFT JOIN tb_kabupaten ON tb_suspect.id_kabupaten = tb_kabupaten.id_kabupaten
GROUP BY id_kabupaten