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
    ){
        $this->userRepo = $userRepoInterface;
    }

    public function authenticate($credentials) {
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

        // return null;

        // $id, $hash =  explode($credentials)
        // ask repository to fetch the user with the given id
        // check that hash from credin are similar to users hash
        // create user token (here user can be null| null | $user)
    }

    public function generateCredentials(UserInterface $user) {
        return $user->getId() . '_' . $user->getPassword();
    }
}
// create token, create test for authetication, create mock of UserRepository
// -> this is id, get me the user
// to test AuthenticationService
// if there is -> this is user otherwise anonymous
// we are using interface because we want to describe the behaviour of the app