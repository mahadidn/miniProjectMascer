<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title'] ?></title>
    <link rel="icon" type="image/x-icon" href="/img/logo-sekolah-removebg-preview.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container ipad-air-logo">
    <!-- foto -->
    <div>
        <img src="/imgGuru/logo-sekolah.jpeg" alt="logo sekolah" class="fakeImg">
    </div>
    
    <!-- tulisan sekolah -->
    <div class="tulisan-sekolah">
        <h1>SDN 005 Bukit Bestari</h1>
        <p><b>Alamat: </b>Jl. Brigjen Katamso KM. 2 GG. Meranti Kec. Bukit Bestari, Tanjung Pinang, Kepulauan Riau</p>
    </div>

    <!-- halaman guru -->
    <div class="container" style="margin-top: 10%;background-color: #0093E9;background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);padding: 20px; border-radius: 5px;">
        
        <a href="#">
            <img src="/imgGuru/home.png" alt="home" width="30px"> <b style="text-decoration: none; color: black;">Halaman Guru</b>
        </a>
        <a href="#">
            <b class="text-decoration-none text-black float-end">Logout</b>
        </a>
    </div>
    <div class="container rounded-2">

        <div class="container" style="background-color: aliceblue; padding: 20px;box-shadow: 2px 2px 2px gray;">
            <div class="container-fluid bg-dark text-white mb-3" style="padding: 10px; border-radius: 10px;">
                <b>Edit Profil </b>
            </div>


            <table class="table p-4">
                <form action="" method="post">
                    
                    <tr>
                        <td>
                            Username
                        </td>
                        <td>
                            <input type="email" class="rounded-2" id="exampleInputEmail1" placeholder="contoh: nama@gmail.com" aria-describedby="emailHelp">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            Nama
                        </td>
                        <td>
                            <input type="nip" placeholder="Masukkan NIP" class="rounded-2" id="exampleInputNip">
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                            <button type="submit" class="btn btn-outline-primary">Konfirmasi</button>
                        </td>
                    </tr>
                </form>
            </table>
            <a class="btn btn-outline-primary p-2" href="/admin/profil">Kembali ke profil</a>
        </div>
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>