<?php
namespace App\Authentication;

/**
 * Registered User Interface
 *
 * Interface UserInterface
 * @package App\Authentication
 */
interface UserInterface
{
	/**
	 * Returns the id of the user
	 *
	 * @return int
	 */
	public function getId(): ?int;

	/**
	 * Returns the login
	 *
	 * @return string
	 */
	public function getLogin(): string;

	/**
	 * Returns the hash
	 *
	 * @return string
	 */
	public function getPassword(): string;

	/**
	 * Returns the salt
	 *
	 * @return string|null
	 */
	public function getSalt(): ?string;
}
