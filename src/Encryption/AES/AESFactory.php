<?php

namespace Encryption\AES;

class AESFactory implements \Encryption\EncryptionFactory
{
	public function encryptor() : \Encryption\AbstractEncryptor
	{
		return new AESEncryptor();
	}
	public function decryptor() : \Encryption\AbstractDecryptor
	{
		return new AESDecryptor();
	}
}
