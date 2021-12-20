<?php

namespace Encryption\AES;

class AESCore
{
	/*
	Affine Logic:
	$newSymbol	 	= $x = $a*symbol+b
	$originalSymbol = $a = ($x-b)/symbol
	*/

	/*
	 * @var chiper
	*/
	private $cipher;

	/*
	 * @var encryptionKey
	*/
	private $encryptionKey;

	/*
	 * @var ivSize
	*/
	private $ivSize;

	/*
	 * @var iv
	*/
	private $iv;

	public function getCipher()
	{
		return $this->cipher;
	}

	protected function setCipher($cipher)
	{
		$this->cipher = $cipher;
	}

	public function getEncryptionKey()
	{
		return $this->encryptionKey;
	}

	protected function setEncryptionKey($encryptionKey)
	{
		$this->encryptionKey = $encryptionKey;
	}

	protected function getIvSize()
	{
		return $this->ivSize;
	}

	protected function setIvSize($ivSize)
	{
		$this->ivSize = $ivSize;
	}

	public function getIv()
	{
		return $this->iv;
	}

	protected function setIv($iv)
	{
		$this->iv = $iv;
	}


	protected function __construct()
	{
		//Define cipher
		$this->setCipher("aes-256-cbc");
		//Generate a 256-bit encryption key ($encryptionKey)
		$this->setEncryptionKey(openssl_random_pseudo_bytes(32));
		// Generate an initialization vector Size
		$this->setIvSize(openssl_cipher_iv_length($this->getCipher()));
		// Generate an initialization vector
		$this->setIv(openssl_random_pseudo_bytes($this->getIvSize()));
	}

	protected static $instances = [];
	public static function getInstance() //  Singleton pattern implemented here
	{	
		$class = self::class;
		if(!isset(self::$instances[$class]))
			self::$instances[$class] = new static();

		return self::$instances[$class];
	}
}
