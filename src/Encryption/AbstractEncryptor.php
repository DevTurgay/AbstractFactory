<?php 

namespace Encryption;

interface AbstractEncryptor
{
	public function encrypt($text, $key) : string;
}