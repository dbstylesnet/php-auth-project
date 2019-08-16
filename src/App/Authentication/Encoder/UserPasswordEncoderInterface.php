<?php

namespace App\Authentication\Encoder;

/**
 * Интерфейс предоставляет услуги по шифрованию пароля
 *
 * Interface UserPasswordEncoderInterface
 * @package App\Authentication\Encoder
 */
interface UserPasswordEncoderInterface
{
	/**
	 * Метод принимает чистый пароль и соль (опциональна) и возвращает в зашифрованном виде.
	 *
	 * @param string $rawPassword
	 * @param null|string $salt
	 * @return string
	 */
	public function encodePassword(string $rawPassword, ?string $salt = null): string;
}

// receive passowrd, salt , salt can generated from backend, null as salt

// class that receives that raw pass and returns hash

// hash functions in php - read about different hashes and implement passworrd interface.

