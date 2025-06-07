<?php declare(strict_types=1);

namespace PHPStan\Rules\Properties;

use Attribute;
use PHPStan\Analyser\Scope;
use PHPStan\DependencyInjection\RegisteredRule;
use PHPStan\Node\InPropertyHookNode;
use PHPStan\Rules\AttributesCheck;
use PHPStan\Rules\Rule;
use PhpParser\Node;

/**
 * @implements Rule<InPropertyHookNode>
 */
#[RegisteredRule(level: 0)]
final class PropertyHookAttributesRule implements Rule
{
	public function __construct(private AttributesCheck $attributesCheck)
	{
	}

	public function getNodeType(): string
	{
		return InPropertyHookNode::class;
	}

	public function processNode(Node $node, Scope $scope): array
	{
		return $this->attributesCheck->check(
			$scope,
			$node->getOriginalNode()->attrGroups,
			Attribute::TARGET_METHOD,
			'method',
		);
	}
}
