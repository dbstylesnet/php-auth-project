<?php
namespace App\Authentication\Service;

use App\Authentication\Service\AuthenticationServiceInterface;
use App\Authentication\UserTokenInterface;
use App\Authentication\UserToken;
use App\Authentication\UserInterface;
use App\Authentication\Encoder\UserPasswordEncoder;
use App\Authentication\Repository\UserRepositoryInterface;

class AuthenticationService implements AuthenticationServiceInterface
{
    private $userRepo;

    private $userPasswordEncoder;

    public function __construct(
        UserRepositoryInterface $userRepoInterface
    ) {
        $this->userRepo = $userRepoInterface;
    }

    public function authenticate($credentials) {
        if (empty($credentials)) {
            return new UserToken(null);
        }

        $credArray = explode('_', $credentials);
        $id = $credArray[0];
        $hash = $credArray[1];
        $user = $this->userRepo->findById($id);

        if (!$user) {
            return new UserToken(null);
        }

        if (!hash_equals($hash, $user->getPassword())) {
            return new UserToken(null);
        }

        return new UserToken($user);
    }

    public function generateCredentials(UserInterface $user) {
        return $user->getId() . '_' . $user->getPassword();
    }
}
