<?php

namespace App\Authentication\Repository;

use App\Authentication\UserInterface;

/**
 * Domain and data mapping layer
 * @see https://www.martinfowler.com/eaaCatalog/repository.html
 *
 * Interface UserRepositoryInterface
 * @package App\Identification\Repository
 */
interface UserRepositoryInterface
{
	/**
	 * Method finds a user by this given id and returns it. Otherwise returns null
	 *
	 * @param int $id
	 * @return UserInterface|null
	 */
	public function findById(int $id): ?UserInterface;

	/**
	 * Method finds a user by this given login and returns it. Otherwise returns null
	 *
	 * @param string $login
	 * @return UserInterface|null
	 */
	public function findByLogin(string $login): ?UserInterface;

	/**
	 * Method saves the given user into storage
	 *
	 * @param UserInterface $user
	 * @return UserInterface
	 */
	public function save(UserInterface $user): UserInterface;
}