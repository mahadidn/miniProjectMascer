<?php

namespace Mdn\MiniProjectSekolah\Model\Guru;

class GuruRegisterRequest {

    public ?string $nip;
    public string $username;
    public ?string $name;
    public ?string $email;
    public string $password;
    public ?string $jabatan;
    public ?string $tglLahir;
    public ?string $jenisKelamin;
    public ?string $fotoProfil;
}
