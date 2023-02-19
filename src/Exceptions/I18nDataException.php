<?php

namespace JuiceCRM\GeoData\Exceptions;

use Exception;
use Throwable;

class GeoDataException extends Exception implements Throwable
{
	public function __construct(string $message)
	{
		parent::__construct($message);
	}
}