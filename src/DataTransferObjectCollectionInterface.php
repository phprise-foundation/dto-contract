<?php

declare(strict_types=1);

namespace Phprise\DataTransferObject\Contract;

use Doctrine\Common\Collections\Collection;

/**
 * @template TKey of array-key
 * @template T of DataTransferObjectInterface
 * @extends Collection<TKey, T>
 */
interface DataTransferObjectCollectionInterface extends Collection, DataTransferObjectInterface
{
    /**
     * @return class-string<T>
     */
    public static function getItemClass(): string;
}
