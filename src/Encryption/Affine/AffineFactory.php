<?php

namespace Encryption\Affine;

class AffineFactory implements \Encryption\EncryptionFactory
{
	public function encryptor() : \Encryption\AbstractEncryptor
	{
		return new AffineEncryptor();
	}
	public function decryptor() : \Encryption\AbstractDecryptor
	{
		return new AffineDecryptor();
	}
}
