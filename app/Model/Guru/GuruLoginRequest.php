<?php

namespace Mdn\MiniProjectSekolah\Model\Guru;

class GuruLoginRequest {
    public ?string $mode = null;
    public ?string $nip = null;
    public string $username;
    public string $name;
    public ?string $email = null;
    public string $password;
    public ?string $jabatan = null;
    public ?string $tglLahir = null;
    public string $jenisKelamin;
    public ?string $fotoProfil = null;
}
