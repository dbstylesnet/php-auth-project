<?php
namespace App\Authentication;

/**
 * This class stores information about the user and participates in authentication processes.
 *
 * Interface UserTokenInterface
 * @package App\Authentication
 */
interface UserTokenInterface
{
	/**
	 * The method returns the corresponding user, if any.
	 *
	 * @return UserInterface|null
	 */
	public function getUser(): ?UserInterface;

	/**
	 * The method returns true if the request came from an anonym, otherwise false
	 *
	 * @return bool
	 */
	public function isAnonymous();
}
