<?php

namespace Encryption;

interface AbstractDecryptor
{
	public function decrypt($text, $key) : string;
}
