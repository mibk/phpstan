<?php declare(strict_types=1);

namespace PHPStan\Type;

use PHPStan\Analyser\Scope;
use PHPStan\Analyser\SpecifiedTypes;
use PHPStan\Analyser\TypeSpecifierContext;
use PHPStan\Reflection\MethodReflection;
use PhpParser\Node\Expr\MethodCall;

/**
 * This is the interface type-specifying extensions implement for non-static methods.
 *
 * To register it in the configuration file use the `phpstan.typeSpecifier.methodTypeSpecifyingExtension` service tag:
 *
 * ```
 * services:
 * 	-
 * *		class: App\PHPStan\MyExtension
 * *		tags:
 * *			- phpstan.typeSpecifier.methodTypeSpecifyingExtension
 * ```
 *
 * Learn more: https://phpstan.org/developing-extensions/type-specifying-extensions
 *
 * @api
 */
interface MethodTypeSpecifyingExtension
{
	/** @return class-string */
	public function getClass(): string;

	public function isMethodSupported(MethodReflection $methodReflection, MethodCall $node, TypeSpecifierContext $context): bool;

	public function specifyTypes(MethodReflection $methodReflection, MethodCall $node, Scope $scope, TypeSpecifierContext $context): SpecifiedTypes;
}
