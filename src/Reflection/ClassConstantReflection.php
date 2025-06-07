<?php declare(strict_types=1);

namespace PHPStan\Reflection;

use PHPStan\Type\Type;
use PhpParser\Node\Expr;

/** @api */
interface ClassConstantReflection extends ClassMemberReflection, ConstantReflection
{
	public function getValueExpr(): Expr;

	public function isFinal(): bool;

	public function hasPhpDocType(): bool;

	public function getPhpDocType(): ?Type;

	public function hasNativeType(): bool;

	public function getNativeType(): ?Type;

	/**
	 * @return list<AttributeReflection>
	 */
	public function getAttributes(): array;
}
