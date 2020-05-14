SELECT
COUNT(DISTINCT tb_suspect.id_suspect) as Confirm,
COUNT(DISTINCT CASE WHEN tb_suspect.status = 'POSITIF' THEN tb_suspect.id_suspect END) as Positif,
COUNT(DISTINCT CASE WHEN tb_suspect.status = 'SEMBUH' THEN tb_suspect.id_suspect END) as Sembuh,
COUNT(DISTINCT CASE WHEN tb_suspect.status = 'MENINGGAL' THEN tb_suspect.id_suspect END) as Positif
FROM tb_suspect