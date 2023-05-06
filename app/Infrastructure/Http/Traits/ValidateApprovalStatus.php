<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Traits;

use App\Domain\Enums\StatusEnum;
use LogicException;

trait ValidateApprovalStatus
{
    public function throwExceptionIfResolved($invoice)
    {
        if (StatusEnum::tryFrom($invoice->status) !== StatusEnum::DRAFT)
        {
            throw new LogicException('invoce status is already resolved');        
        }
    }
}
