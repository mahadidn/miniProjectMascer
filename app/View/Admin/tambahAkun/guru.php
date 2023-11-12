
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
        
        <a href="/">
            <img src="/imgGuru/home.png" alt="home" width="30px"> <b style="text-decoration: none; color: black;">Tambah Akun</b>
        </a>
        <a href="/admin/logout">
            <b class="text-decoration-none text-black float-end">Logout</b>
        </a>
    </div>
    <div class="container rounded-2">

        <div class="container" style="background-color: aliceblue; padding: 20px;box-shadow: 2px 2px 2px gray;">
            <div class="container-fluid bg-dark text-white mb-3" style="padding: 10px; border-radius: 10px;">
                <b>Tambah Akun Guru </b>
            </div>

            <div class="text-center p-2">
                <img class="rounded" src="/imgGuru/profilBlank.jpeg" width="100px" alt="profil">
            </div>

            <table class="table p-4">
                <form action="" method="post">
                    <tr>
                        <td colspan="2">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Foto Profil</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email  
                        </td>
                        <td>
                            <input type="email" class="rounded-2" id="exampleInputEmail1" placeholder="contoh: nama@gmail.com" value="<?=  $model['data']['email'] ?? '' ?>" aria-describedby="emailHelp">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Username
                        </td>
                        <td>
                            <input type="email" name="emailAdmin" class="rounded-2" id="exampleInputEmail1" placeholder="contoh: nama@gmail.com" aria-describedby="emailHelp">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password
                        </td>
                        <td>
                            <input type="password" name="passwordAdmin" placeholder="Masukkan Password" class="rounded-2" id="exampleInputNip">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ulangi Password
                        </td>
                        <td>
                            <input type="password" name="passwordAdmin2" placeholder="Ulangi Password" class="rounded-2" id="exampleInputNip">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            NIP 
                        </td>
                        <td>
                            <input type="nip" placeholder="Masukkan NIP" class="rounded-2" value="<?=  $model['data']['nip'] ?? '' ?>" id="exampleInputNip">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="exampleInputNama">Nama</label>
                        </td>
                        <td>
                            <input type="nama" placeholder="Masukkan nama" class="rounded-2" id="exampleInputNama">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Jenis Jelamin
                        </td>
                        <td>
                            <div class="">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                    <option value="laki-laki">laki-laki</option>
                                    <option value="perempuan">perempuan</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tanggal Lahir  
                        </td>
                        <td>
                            <input type="date" class="rounded-2" id="exampleInputLahir" style="width: 58.8%;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Jabatan
                        </td>
                        <td>
                            <input type="text" placeholder="Masukkan Jabatan" class="rounded-2" value="<?=  $model['data']['jabatan'] ?>" id="exampleInputJabatan">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-outline-info">Konfirmasi</button>
                        </td>
                    </tr>
                </form>
            </table>
            <a class="btn btn-outline-primary p-2" href="/">Kembali ke profil</a>
        </div>
        
    </div>
</div>
