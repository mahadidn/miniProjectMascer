

<div class="container ipad-air-logo">
    <!-- foto -->
    <div>
        <img src="../img/logo-sekolah.jpeg" alt="logo sekolah" class="fakeImg">
    </div>
    
    <!-- tulisan sekolah -->
    <div class="tulisan-sekolah">
        <h1>SDN 005 Bukit Bestari</h1>
        <p><b>Alamat: </b>Jl. Brigjen Katamso KM. 2 GG. Meranti Kec. Bukit Bestari, Tanjung Pinang, Kepulauan Riau</p>
    </div>

    <?php if(isset($model['error'])){ ?>
    <div class="row responsive-tablet">
        <div class="alert alert-danger" role="alert">
            <?= $model['error'] ?>
        </div>
    </div>
    <?php } ?>
    <!-- Login -->
    <div class="container login-container rounded-2">
        <h2 class="text-center mb-lg-5">LOGIN</h2>

        <div>
            <form action="/user/login" method="post">
                <input class="form-control" name="username" id="username" type="text" placeholder="Username" aria-label="default input example">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control mt-3" aria-describedby="passwordHelpBlock">
                <button class="btn btn-lg btn-outline-dark btn-login" type="submit">Log in</button>
            </form>
            <hr>
            <a href="#" class="text-decoration-none text-black ms-5">Lupa password?</a>
        </div>

    </div>
</div>
    