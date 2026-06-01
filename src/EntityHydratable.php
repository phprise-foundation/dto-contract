<?php

declare(strict_types=1);

namespace Phprise\Dto\Contract;

interface EntityHydratable
{
    public const int USE_DEFAULTS = 0;
    public const int USE_STRICT = 1;
    public const int CAMEL_TO_SNAKE = 2;
    public const int SNAKE_TO_CAMEL = 4;
    public const int USE_CALLBACKS = 8;
    public const int THROW_ON_FAIL = 16;

    /**
     * Creates a DTO instance from an entity.
     *
     * @template T of object
     * @param T $entity The entity to convert to DTO
     * @param int $flags Bitwise flags to control behavior:
     *                    - USE_DEFAULTS (0): Use default settings
     *                    - USE_STRICT (1): Only use provided type coercers
     *                    - CAMEL_TO_SNAKE (2): Convert entity snakeCase properties to camelCase DTO properties
     *                    - SNAKE_TO_CAMEL (4): Convert entity camelCase properties to snakeCase DTO properties
     *                    - USE_CALLBACKS (8): Execute custom callbacks for property conversion
     *                    - THROW_ON_FAIL (16): Throw exceptions on conversion failures instead of silently skipping
     *                    Flags can be combined using bitwise OR (e.g., USE_STRICT | THROW_ON_FAIL = 17)
     * @param array<string, mixed> $options Additional options:
     *                                      - typeCoercers: array of TypeCoercerInterface instances for custom type coercion
     *                                      - callbacks: array of callbacks for custom property conversion
     *                                      Callbacks structure (key is DTO property name):
     *                                      ```php
     *                                      [
     *                                          'callbacks' => [
     *                                              'dtoPropertyName' => fn (object $entity) => mixed
     *                                          ]
     *                                      ]
     *                                      ```
     * @return static The hydrated DTO instance
     */
    public static function fromEntity(object $entity, int $flags = self::USE_DEFAULTS, array $options = []): static;
}
