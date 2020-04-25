SELECT
tb_kabupaten.id_kabupaten as id_kabupaten,
tb_suspect.date_created as tanggal,
COUNT(tb_odp.id_odp) as odp_hari_ini,
COUNT(tb_pdp.id_pdp) as pdp_hari_ini,
COUNT(tb_suspect.id_suspect) as suspect_hari_ini
FROM tb_kabupaten
RIGHT JOIN tb_odp ON tb_kabupaten.id_kabupaten = tb_odp.id_kabupaten
RIGHT JOIN tb_pdp ON tb_kabupaten.id_kabupaten = tb_pdp.id_kabupaten
LEFT JOIN tb_suspect ON tb_kabupaten.id_kabupaten = tb_suspect.id_kabupaten
GROUP BY tb_suspect.date_created