<?php

namespace Encryption\AES;

class AESDecryptor implements \Encryption\AbstractDecryptor
{
	private $aesCoreObj;

	public function __construct()
	{
		// To be able to store the encryption key and initialization vector for AES logic, Singleton pattern should be applied here
		$this->aesCoreObj = AESCore::getInstance();
	}

	public function decrypt($encryptedText, $key = null) : string
	{
		return openssl_decrypt($encryptedText, $this->aesCoreObj->getCipher(), $this->aesCoreObj->getEncryptionKey(), 0, $this->aesCoreObj->getIv());
	}
}
