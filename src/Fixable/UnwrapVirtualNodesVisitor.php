<?php declare(strict_types=1);

namespace PHPStan\Fixable;

use PHPStan\Node\Expr\AlwaysRememberedExpr;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

final class UnwrapVirtualNodesVisitor extends NodeVisitorAbstract
{
	public function enterNode(Node $node): ?Node
	{
		if (! $node instanceof Node\Expr\Match_) {
			return null;
		}

		if (! $node->cond instanceof AlwaysRememberedExpr) {
			return null;
		}

		$node->cond = $node->cond->expr;

		return $node;
	}
}
