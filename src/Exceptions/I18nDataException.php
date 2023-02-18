<?php

namespace JuiceCRM\I18nData\Exceptions;

use Exception;
use Throwable;

class I18nDataException extends Exception implements Throwable
{
	public function __construct(string $message)
	{
		parent::__construct($message);
	}
}