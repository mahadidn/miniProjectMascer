

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
            <img src="/imgGuru/home.png" alt="home" width="30px"> <b style="text-decoration: none; color: black;">Halaman Admin</b>
        </a>
        <a href="/admin/logout">
            <b class="text-decoration-none text-black float-end">Logout</b>
        </a>
    </div>
    <div class="container rounded-2">
        <h2 class="mt-4 mb-lg-5">Selamat Datang <?= $model['name'] ?></h2>

        <div class="container" style="background-color: aliceblue; padding: 20px;box-shadow: 2px 2px 2px gray;">
            <div class="container-fluid bg-dark text-white mb-3" style="padding: 10px; border-radius: 10px;">
                <b>Profil Admin</b>
            </div>

            <table class="table p-4">
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        <input class="rounded-1 mb-3" type="text" value="<?= $model['username'] ?>" aria-label="Disabled input example" disabled readonly>
                    </td>
                </tr>
                <tr>
                    <td>
                        Name 
                    </td>
                    <td>
                        <input class="rounded-1 mb-3" type="text" value="<?= $model['name'] ?>" aria-label="Disabled input example" disabled readonly>
                    </td>
                </tr>                
            </table>
            <a class="btn btn-outline-primary p-2" href="/admin/edit">Edit Profil</a>
        </div>
        
    </div>
</div>
