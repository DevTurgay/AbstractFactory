<?php

namespace Encryption\Vigenere;

class VigenereFactory implements \Encryption\EncryptionFactory
{
	public function encryptor() : \Encryption\AbstractEncryptor
	{
		return new VigenereEncryptor();
	}
	public function decryptor() : \Encryption\AbstractDecryptor
	{
		return new VigenereDecryptor();
	}
}
