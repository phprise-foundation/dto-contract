<?php

declare(strict_types=1);

namespace Phprise\Dto\Contract;

interface EntityHydrator
{
    public const int USE_DEFAULTS = 0;
    public const int USE_STRICT = 1;
    public const int CAMEL_TO_SNAKE = 2;
    public const int SNAKE_TO_CAMEL = 4;
    public const int USE_CALLBACKS = 8;
    public const int THROW_ON_FAIL = 16;

    /**
     * Converts the DTO to an entity instance.
     *
     * @template T of object
     * @param class-string<T>|T $entity The entity class name or instance to hydrate
     * @param int $flags Bitwise flags to control behavior:
     *                    - USE_DEFAULTS (0): Use default settings
     *                    - USE_STRICT (1): Only use provided type coercers
     *                    - CAMEL_TO_SNAKE (2): Convert DTO camelCase properties to snake_case entity properties
     *                    - SNAKE_TO_CAMEL (4): Convert DTO snake_case properties to camelCase entity properties
     *                    - USE_CALLBACKS (8): Execute custom callbacks for property conversion
     *                    - THROW_ON_FAIL (16): Throw exceptions on conversion failures instead of silently skipping
     *                    Flags can be combined using bitwise OR (e.g., USE_STRICT | THROW_ON_FAIL = 17)
     * @param array<string, mixed> $options Additional options:
     *                                      - typeCoercers: array of TypeCoercerInterface instances for custom type coercion
     *                                      - callbacks: array of callbacks for custom property conversion
     *                                      Callbacks structure (key is entity property name):
     *                                      ```php
     *                                      [
     *                                          'callbacks' => [
     *                                              'entityPropertyName' => fn (object $dto) => mixed
     *                                          ]
     *                                      ]
     *                                      ```
     * @return T The hydrated entity instance
     */
    public function toEntity(string|object $entity, int $flags = self::USE_DEFAULTS, array $options = []): object;
}
