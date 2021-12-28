# Abstract Factory - Encryption

The repository targets demonstration of a nice example for the usage of Abstract Factory design pattern. Abstract Factory is a creational design pattern that lets you produce families of related objects without specifying their concrete classes ([see more](https://pip.pypa.io/en/stable/)).

I have implemented an Encryption class which allows the client to encrypt data with 3 Encryption algorithms (Vigenere, Affine and AES). Hence, the main aim of the repository is practicing the Abstract Factory pattern rather than providing an Encryption library.

## Installation

```bash
git clone https://github.com/DevTurgay/AbstractFactory-Encryption.git
```

## Usage

```php
<?php

spl_autoload_register(function ($class_name)
{
	// base directory for the namespace prefix (might be customized)
    $base_dir = str_replace('\\','/',__DIR__.'/src/');

	$file = '';
	$file = $base_dir . str_replace('\\', '/', $class_name) . '.php';

	if(file_exists($file))
		include_once $file;
});

// Sample of Vigenere
use Encryption\Vigenere\VigenereFactory;
$encryption = new VigenereFactory();

// Sample of Affine
use Encryption\Affine\AffineFactory;
$encryption = new AffineFactory;

// Sample of AES
use Encryption\AES\AESFactory;
$encryption = new AESFactory;
```

## Contributing
Pull requests are welcome. I will be very glad to get constructive feedbacks and correction suggestions.

## DOC
According to the Abstract Factory pattern structure, there are interfaces under `src/Encrpytion` called `EncryptionFactory` (general encryption interface), `AbstractEncryptor` and `AbstractDecryptor`. And through those interfaces all types of encryption algorithms can be implemented by creating a `General Factory` class and `Encryptor` and `Decryptor` classes. I have personally preferred taking the core algorithm outside of those classes.

Btw, in AES algorithm to be a key and iv (initial vector) should be used, thus I have implemented a Singleton pattern too to be able to save the key and iv which is created in constructor.

## Example
An example of the usage can be found in `example/index.php`
