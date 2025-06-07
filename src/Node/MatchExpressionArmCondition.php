<?php declare(strict_types=1);

namespace PHPStan\Node;

use PHPStan\Analyser\Scope;
use PhpParser\Node\Expr;

/**
 * @api
 */
final class MatchExpressionArmCondition
{
	public function __construct(private Expr $condition, private Scope $scope, private int $line)
	{
	}

	public function getCondition(): Expr
	{
		return $this->condition;
	}

	public function getScope(): Scope
	{
		return $this->scope;
	}

	public function getLine(): int
	{
		return $this->line;
	}
}
