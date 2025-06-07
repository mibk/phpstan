<?php declare(strict_types=1);

namespace PHPStan\Node\Property;

use PHPStan\Analyser\Scope;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\StaticPropertyFetch;

/**
 * @api
 */
final class PropertyWrite
{
	public function __construct(private PropertyFetch|StaticPropertyFetch $fetch, private Scope $scope, private bool $promotedPropertyWrite)
	{
	}

	/**
	 * @return PropertyFetch|StaticPropertyFetch
	 */
	public function getFetch()
	{
		return $this->fetch;
	}

	public function getScope(): Scope
	{
		return $this->scope;
	}

	public function isPromotedPropertyWrite(): bool
	{
		return $this->promotedPropertyWrite;
	}
}
