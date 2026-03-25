<?php declare(strict_types=1);

namespace PHPStan\Rules\Properties;

use PHPStan\Analyser\Scope;
use PHPStan\DependencyInjection\RegisteredRule;
use PHPStan\Node\PropertyAssignNode;
use PHPStan\Rules\Rule;
use PhpParser\Node;

/**
 * @implements Rule<PropertyAssignNode>
 */
#[RegisteredRule(level: 0)]
final class AccessStaticPropertiesInAssignRule implements Rule
{
	public function __construct(private AccessStaticPropertiesRule $accessStaticPropertiesRule)
	{
	}

	public function getNodeType(): string
	{
		return PropertyAssignNode::class;
	}

	public function processNode(Node $node, Scope $scope): array
	{
		if (! $node->getPropertyFetch() instanceof Node\Expr\StaticPropertyFetch) {
			return [];
		}

		if ($node->isAssignOp()) {
			return [];
		}

		return $this->accessStaticPropertiesRule->processNode($node->getPropertyFetch(), $scope);
	}
}
