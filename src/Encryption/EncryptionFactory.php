<?php 

namespace Encryption;

interface EncryptionFactory
{
	public function encryptor() : AbstractEncryptor;
	public function decryptor() : AbstractDecryptor;
}
