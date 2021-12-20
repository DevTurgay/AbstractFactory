<?php

namespace Encryption\AES;

class AESEncryptor implements \Encryption\AbstractEncryptor
{
	private $aesCoreObj;

	public function __construct()
	{
		// To be able to store the encryption key and initialization vector for AES logic, Singleton pattern should be applied here
		$this->aesCoreObj = AESCore::getInstance();
	}

	public function encrypt($text, $key = null) : string
	{
		return openssl_encrypt(
			$text,
			$this->aesCoreObj->getCipher(),
			$this->aesCoreObj->getEncryptionKey(),
			0,
			$this->aesCoreObj->getIv()
		);
	}
}
