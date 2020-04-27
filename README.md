<p align="center"><img src="https://live.staticflickr.com/65535/49784089877_0d7c611050_c.jpg" width="500px"></p>

<p align="center">
  <a href="https://travis-ci.com/Ekhel/backend-kawal-corona-papua"><img src="https://travis-ci.com/Ekhel/backend-kawal-corona-papua.svg?branch=master" alt="Build Status" target="_blank"></a>
  <a href="https://gitter.im/jayapura_django/community?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge"><img src="https://badges.gitter.im/jayapura_django/community.svg" alt="Gitter" target="_blank"></a>
  <a href="https://github.com/Ekhel/frontend-kawal-corona-papua/blob/master/LICENSE"><img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License: MIT" target="_blank"></a>
</p>

## Tentang Kawal-Corona Papua :
  - Kawal Corona Papua adalah Web Applikasi sekaligus dapat Menjadi Portal Informasi Live Data Kasus Covid 19 di Papua, Sedikit Sumbangsih dari Kami untuk Papua, Project ini Open Source, Siapa Saja Boleh untuk Berkontribusi.
------------------------------------------------------------------------------------------------------------------------

## System Requirements :
* Bahasa Utama :
  - PHP

* Framework :
  - CodeIgniter 3.1

* DBMS :
  - MySql
  - Postgre

* Library :
  - Indo Tanggal
  - REST_Controllers

* Frontend :
  - [Kawal Corona Papua](https://github.com/Ekhel/frontend-kawal-corona-papua)

* HOST
  - [Hostinger](https://hostinger.co.id)

------------------------------------------------------------------------------

## Sumber WEB dan API :

* WEB :
  - [Kawal Corona Indonesia](https://kawalcorona.com)
  - [Ethical Hacker Indonesia](https://hack.co.id)
  - [Kawal Corona Papua](https://kawal-corona.herokuapp.com)


* API Services :
  - [Data Indonesia : https://api.kawalcorona.com/indonesia](https://api.kawalcorona.com/indonesia)

  - [Data Provinsi : https://api.kawalcorona.com/indonesia/provinsi](https://api.kawalcorona.com/indonesia/provinsi)

  - [Data Global Per Negara : https://api.kawalcorona.com/](https://api.kawalcorona.com/) 

  - [Data Global Positif : https://api.kawalcorona.com/positif/](https://api.kawalcorona.com/positif)

  - [Data Global Meninggal : https://api.kawalcorona.com/meningggal/](https://api.kawalcorona.com/meniggal)
  
  - [Data Global Sembuh : https://api.kawalcorona.com/sembuh/](https://api.kawalcorona.com/sembuh)


* Backend API (Data Khusus Provinsi Papua)
  - [API ROOT](https://kawal-corona.herokuapp.com/api/)
  - [API Kabupaten](https://kawal-corona.herokuapp.com/api/kabupeten/)
  
    ```javascripts
    {
      "count": 23,
      "next": "https://kawal-corona.herokuapp.com/api/kabupaten/?page=2",
      "previous": null,
      "results": [
        {
          "id_kabupaten": 1,
          "nama": "Jayapura Kota",
          "lon": "-",
          "lat": "-"
        }
      ] 
    }
    ```

  - [API Personal Positif](https://kawal-corona.herokuapp.com/api/penderita/)

    ```javascripts
    {
      "count": 3,
      "next": "null",
      "previous": null,
      "results": [
        {
          "id_penderita": 1,
          "nama_lengkap": "-----",
          "lokasi": 8,
          "gender": "perempuan",
          "status": "perawatan"
        },
      ] 
    }
    ```

  - [API Rumah Sakit Rujukan](https://kawal-corona.herokuapp.com/api/rumahsakit/)

    ```javascripts
    {
      "count": 1,
      "next": "null",
      "previous": null,
      "results": [
        {
            "id_rs": 1,
            "rumah_sakit": "RSUD JAYAPURA",
            "lokasi": "Jayapura Kota",
            "lat": "-",
            "lon": "-"
        },
      ]
    }
    ```

  - [API Informasi](https://kawal-corona.herokuapp.com/api/informasi/)
  - [API Papan Informasi](https://kawal-corona.herokuapp.com/api/papaninfo/)

    ```javascripts
    {
      "count": 1,
      "next": "null",
      "previous": null,
      "results": [
        {
            "id_item": 1,
            "tanggal": "2020-04-04",
            "odp": "6723",
            "pdp": "44",
            "positif": "18",
            "sembuh": "3",
            "meninggal": "1"
        }
      ]
    }
    ```
----------------------------------------------------------------------------------------------------------

## Halaman Yang Tersedia :
  - [x] Dashboard
  - [x] Data Kabupaten
  - [x] CRUD Rumah Sakit
  - [x] CRUD ODP
  - [x] CRUD PDP
  - [x] CRUD Suspect
  - [x] Rekap Per Kabupaten
  - [x] Notifikasi ODP, PDP, SUSPECT Per hari (Jika ada inputan Baru)
  - [x] Send Data item ODP Ke PDP
  - [x] Send Data item ODP Ke Suspect
  - [x] Send Data item PDP Ke Suspect
  - [x] Print out ODP, PDP, SUSPECT
  - [x] Backup Database & File

--------------------------------------------------------------------------------------------------------------

## Yang Akan dikerjakan : 
  - [ ] Grafik Line Untuk ODP, PDP dan Suscpect
---------------------------------------------------------------------------------------------------------------


## Kontribusi Data & Project :
  - Saya Belum Memiliki Sumber Data yang benar" valid.
  - Sebagian Data Kasus di Provinsi Papua yang ada pada database backend diambil dari 60% Hasil Tracking Media.
  - Jika teman" ingin Berkontribusi terkait data dengan sangat senang hati saya akan menerima.
  - email saya terkait Data : **michaekarafir@gmail.com**
  - Atau bisa chat pada gitter klik pada badge gitter diatas, **chat on gitter**
  - Project ini Open Source siapa saja boleh untuk Berkontribusi Termasuk Data dan Repository.
  - Saran dan Masukan Sangat Saya butuhkan.

  Salam Sehat
  Michael.
    
