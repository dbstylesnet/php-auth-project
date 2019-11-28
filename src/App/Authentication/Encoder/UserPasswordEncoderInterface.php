<?php
namespace App\Authentication\Encoder;

/**
 * Interface provides password encryption services
 *
 * Interface UserPasswordEncoderInterface
 * @package App\Authentication\Encoder
 */
interface UserPasswordEncoderInterface
{
	/**
	 * The method accepts a clean password and salt (optional) and returns in encrypted form.
	 *
	 * @param string $rawPassword
	 * @param null|string $salt
	 * @return string
	 */
	public function encodePassword(string $rawPassword, ?string $salt = null): string;
}
