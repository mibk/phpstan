<?php declare(strict_types=1);

namespace PHPStan\Fixable;

use PHPStan\Node\VirtualNode;
use PHPStan\ShouldNotHappenException;
use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;

final class ReplacingNodeVisitor extends NodeVisitorAbstract
{
	private bool $found = false;

	/**
	 * @param callable(Node): Node $newNodeCallable
	 */
	public function __construct(private Node $originalNode, private $newNodeCallable)
	{
	}

	public function enterNode(Node $node): ?Node
	{
		$origNode = $node->getAttribute('origNode');
		if ($origNode !== $this->originalNode) {
			return null;
		}

		$this->found = true;

		$callable = $this->newNodeCallable;
		$newNode = $callable($node);
		if ($newNode instanceof VirtualNode) {
			throw new ShouldNotHappenException('Cannot print VirtualNode.');
		}

		return $newNode;
	}

	public function isFound(): bool
	{
		return $this->found;
	}
}
