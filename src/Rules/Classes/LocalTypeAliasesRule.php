<?php declare(strict_types=1);

namespace PHPStan\Rules\Classes;

use PHPStan\Analyser\Scope;
use PHPStan\DependencyInjection\RegisteredRule;
use PHPStan\Node\InClassNode;
use PHPStan\Rules\Rule;
use PhpParser\Node;

/**
 * @implements Rule<InClassNode>
 */
#[RegisteredRule(level: 0)]
final class LocalTypeAliasesRule implements Rule
{
	public function __construct(private LocalTypeAliasesCheck $check)
	{
	}

	public function getNodeType(): string
	{
		return InClassNode::class;
	}

	public function processNode(Node $node, Scope $scope): array
	{
		return $this->check->check($scope, $node->getClassReflection(), $node->getOriginalNode());
	}
}
