<?php

$teguh_koneksi = mysqli_connect('localhost', 'root', '', 'teguh_hotel');

if (!$teguh_koneksi) {
    die ("Koneksi gagal. " . mysqli_connect_error()); // close koneksi
}
