<?php

namespace Mdn\MiniProjectSekolah\Service;

use Mdn\MiniProjectSekolah\Model\Domain\Admin;
use Mdn\MiniProjectSekolah\Model\Domain\Guru;
use Mdn\MiniProjectSekolah\Model\Domain\Session;
use Mdn\MiniProjectSekolah\Model\Domain\SessionAdmin;
use Mdn\MiniProjectSekolah\Model\Domain\SessionGuru;
use Mdn\MiniProjectSekolah\Repository\LoginRepository;
use Mdn\MiniProjectSekolah\Repository\SessionRepository;

class SessionService {
    public static string $COOKIE_NAME = 'X-SDN005BukitBestari-Session';

    private SessionRepository $sessionRepository;
    private LoginRepository $loginRepository;

    public function __construct(SessionRepository $sessionRepository, LoginRepository $loginRepository){
        $this->sessionRepository = $sessionRepository;
        $this->loginRepository = $loginRepository;
    }

    public function create(string $usernameSession): SessionAdmin|SessionGuru {
        $user = $this->loginRepository->findByUsername($usernameSession);

        if ($user->userType == "guru"){
            $session = new SessionGuru();
            $session->userId = uniqid();
            $session->usernameSession = $usernameSession;
            
            $this->sessionRepository->save($session);
            setcookie(self::$COOKIE_NAME, $session->userId, time() + (60*60*24*30), "/");

            return $session;
        }else if($user->userType == "admin") {
            
            $session = new SessionAdmin();
            $session->userId = uniqid();
            $session->usernameSession = $usernameSession;
    
            $this->sessionRepository->save($session);
            setcookie(self::$COOKIE_NAME, $session->userId, time() + (60*60*24*30), "/");
    
            return $session;
        }

    }

    public function destroy(){
        $sessionUserId = $_COOKIE[self::$COOKIE_NAME] ?? '';
        var_dump($sessionUserId);
        $this->sessionRepository->deleteByUserId($sessionUserId);

        setcookie(self::$COOKIE_NAME, '', 1, '/');
    }

    public function current(): Admin|Guru|null {
        $sessionUserId = $_COOKIE[self::$COOKIE_NAME] ?? '';

        $session = $this->sessionRepository->findByUserId($sessionUserId);
        if ($session == null){
            return null;
        }
        return $this->loginRepository->findByUsername($session->usernameSession);

    }

}
