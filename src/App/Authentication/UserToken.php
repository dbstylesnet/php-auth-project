<?php
namespace App\Authentication;

use App\Authentication\UserTokenInterface;
use App\Authentication\UserInterface;

class UserToken implements UserTokenInterface
{
    private $user;

    public function __construct(
        ?UserInterface $user
    ) {
        $this->user = $user;
    }

    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    public function isAnonymous()
    {
        return empty($this->user);
    }
}
