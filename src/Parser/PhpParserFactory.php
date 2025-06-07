<?php declare(strict_types=1);

namespace PHPStan\Parser;

use PHPStan\Php\PhpVersion;
use PhpParser\Lexer;
use PhpParser\Parser\Php7;
use PhpParser\Parser\Php8;
use PhpParser\ParserAbstract;

final class PhpParserFactory
{
	public function __construct(private Lexer $lexer, private PhpVersion $phpVersion)
	{
	}

	public function create(): ParserAbstract
	{
		$phpVersion = \PhpParser\PhpVersion::fromString($this->phpVersion->getVersionString());
		if ($this->phpVersion->getVersionId() >= 80000) {
			return new Php8($this->lexer, $phpVersion);
		}

		return new Php7($this->lexer, $phpVersion);
	}
}
