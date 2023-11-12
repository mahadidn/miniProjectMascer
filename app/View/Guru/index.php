

<div class="container ipad-air-logo">
    <!-- foto -->
    <div>
        <img src="/img/logo-sekolah.jpeg" alt="logo sekolah" class="fakeImg">
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
        <a href="/guru/logout">
            <b class="text-decoration-none text-black float-end">Logout</b>
        </a>
    </div>
    <div class="container rounded-2">
        <h2 class="mt-4 mb-lg-5">Selamat Datang <?= $model['data']['name'] ?> </h2>

        <div class="container" style="background-color: aliceblue; padding: 20px;box-shadow: 2px 2px 2px gray;">
            <div class="container-fluid bg-dark text-white mb-3" style="padding: 10px; border-radius: 10px;">
                <b>Profil Guru</b>
            </div>

            <div class="text-center p-2">
                <img class="rounded" src="/imgGuru/profilBlank.jpeg" width="100px" alt="profil">
            </div>

            <table class="table p-4">
                <tr>
                    <td>
                        Email  
                    </td>
                    <td>
                        <input class="rounded-1 mb-3" type="text" value="<?=  $model['data']['email'] ?>" aria-label="Disabled input example" disabled readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        NIP 
                    </td>
                    <td>
                        <input class="rounded-1 mb-3" type="text" value="<?=  $model['data']['nip'] ?>" aria-label="Disabled input example" disabled readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nama 
                    </td>
                    <td>
                        <input class="rounded-1 mb-3" type="text" value="<?=  $model['data']['name'] ?>" aria-label="Disabled input example" disabled readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis Kelamin 
                    </td>
                    <td>
                        <input class="rounded-1 mb-3" type="text" value="<?=  $model['data']['jk'] ?>" aria-label="Disabled input example" disabled readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tanggal Lahir  
                    </td>
                    <td>
                        <input class="rounded-1 mb-3" type="text" value="<?=  $model['data']['tanggalLahir'] ?>" aria-label="Disabled input example" disabled readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        Jabatan
                    </td>
                    <td>
                        <input class="rounded-1 mb-3" type="text" value="<?=  $model['data']['jabatan'] ?>" aria-label="Disabled input example" disabled readonly>
                    </td>
                </tr>
            </table>
            <a class="btn btn-outline-primary p-2" href="/guru/edit">Edit Profil</a>
        </div>
        
    </div>
</div>