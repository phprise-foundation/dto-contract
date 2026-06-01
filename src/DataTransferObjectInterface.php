<?php

declare(strict_types=1);

namespace Phprise\DataTransferObject\Contract;

use JsonSerializable;
use Phprise\Common\Contract\Arrayable;
use Phprise\Common\Contract\ArrayHydratable;
use Phprise\Common\Contract\CamelCaseArrayable;
use Phprise\Common\Contract\CamelCaseJsonable;
use Phprise\Common\Contract\Jsonable;
use Phprise\Common\Contract\JsonHydratable;
use Phprise\Common\Contract\SnakeCaseArrayable;
use Phprise\Common\Contract\SnakeCaseJsonable;
use Phprise\Common\Contract\TemplateFormattable;

interface DataTransferObjectInterface extends
    Arrayable,
    ArrayHydratable,
    JsonSerializable,
    JsonHydratable,
    Jsonable,
    SnakeCaseArrayable,
    SnakeCaseJsonable,
    CamelCaseArrayable,
    CamelCaseJsonable,
    TemplateFormattable,
    EntityHydrator
{
}
