<?php
include 'header.php'
    ?>

<section id="hero-navbar">
</section>

<style>
    #map-box {
        position: relative;
    }

    #legend {
        position: absolute;
        top: 25px;
        right: 350px;
        background-color: #fff;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-size: 12px;
        z-index: 1000;
    }



    html,
    body {
        height: 100%;
        font-family: 'Roboto', sans-serif;
    }

    /* Ganti ukuran gambar sesuai kebutuhan */
    .carousel-inner img {
        width: 290px;
        height: 200px;
        box-shadow: 2px 2px 4px #888888;
        border-radius: 5px;
        object-fit: cover;
        /* Untuk memastikan gambar tetap proporsional */
    }

    /* Ganti lebar carousel agar muat lebih dari satu gambar */
    .carousel-inner {
        display: flex;
        flex-wrap: nowrap;
    }

    /* Ganti lebar tombol navigasi */
    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
    }

    /* Atur jarak antara gambar-gambar dalam satu slide */
    .carousel-inner .carousel-item {
        margin-right: 5px;
        /* Atur spasi antar gambar */
    }

    /* Hapus margin pada item terakhir agar tidak ada jarak ekstra */
    .carousel-inner .carousel-item:last-child {
        margin-right: 0;
    }
</style>