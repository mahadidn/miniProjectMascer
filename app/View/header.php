<?php define('BASEURL', 'https://localhost') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title'] ?></title>
    <link rel="icon" type="image/x-icon" href="/img/logo-sekolah-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        <?php 
        require $model['css'] ?>
    </style>
    <style>
        <?php require __DIR__ . '/style.css' ?>
    </style>
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-lg">
        <a class="navbar-brand" href="/">SDN 005 Bukit Bestari</a>
        <?php if($model['fitur']['login'] == true){  ?>
        <a class="navbar-brand" href="/">Profil Saya</a>
        <?php } ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
                <?php if($model['fitur']['login'] != true){  ?>
                <li class="nav-item">
                    <a class="nav-link active" href="/user/login">Login</a>
                </li>
                <?php } ?>
                <?php if($model['fitur']['tambahAkun']){ ?>
            <li class="nav-item dropdown link-sosmed" style="margin-left: -10px;">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Tambah Akun
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/admin/tambah/guru">Akun Guru</a></li>
                    <li><a class="dropdown-item" href="/admin/tambah/admin">Akun Admin</a></li>
                </ul>
            </li>
            <?php } ?>
            <li class="nav-item dropdown link-sosmed">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sosial Media
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Facebook</a></li>
                    <li><a class="dropdown-item" href="#">Instagram</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </div>
</nav>