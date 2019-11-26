<?php
namespace App\Authentication;

use App\Authentication\UserInterface;

class User implements UserInterface
{
    /**
     * Id of user
     * @param int|null $id
     */
    private $id;

    /**
     * Login of user
     * @param string $login
     */
    private $login;

    /**
     * Password of user
     * @param string $password
     */
    private $password;

    /**
     * Salt added to password
     * @param string $salt
     */
    private $salt;

    public function __construct(
        string $login, 
        string $password, 
        ?string $salt,
        ?int $id 
    ) {
        $this->login = $login;
        $this->password = $password;
        $this->salt = $salt;
        $this->id = $id;
    }

	/**
	 * @inheritDoc
	 */
    public function getId(): ?int
    {
        return $this->id;
    }

	/**
	 * @inheritDoc
	 */
    public function getLogin(): string
    {
        return $this->login;
    }

	/**
	 * @inheritDoc
	 */
    public function getPassword(): string
    {
        return $this->password;
    }

	/**
	 * @inheritDoc
	 */
    public function getSalt(): ?string
    {
        return $this->salt;
    }
}
