<?php declare(strict_types=1);

namespace PHPStan\Node;

use PHPStan\Analyser\Scope;
use PhpParser\Node\Expr;

/**
 * @api
 */
final class MatchExpressionArmBody
{
	public function __construct(private Scope $scope, private Expr $body)
	{
	}

	public function getScope(): Scope
	{
		return $this->scope;
	}

	public function getBody(): Expr
	{
		return $this->body;
	}
}
