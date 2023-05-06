<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Controllers;

use App\Infrastructure\Controller;
use App\Infrastructure\Repositories\InvoiceRepository;
use App\Infrastructure\Http\Resources\InvoiceResource;
use App\Infrastructure\Http\Traits\ValidateApprovalStatus;

class InvoiceController extends Controller
{
    use ValidateApprovalStatus;

    public function show(string $uuid)
    {
        $invoice = InvoiceRepository::getWithDetails($uuid);

        return new InvoiceResource($invoice);
    }

    public function approve(string $uuid)
    {
        $invoice = InvoiceRepository::get($uuid);

        $this->throwExceptionIfResolved($invoice);

        $invoice->approve();

        return $this->show($uuid);
    }

    public function reject(string $uuid)
    {
        $invoice = InvoiceRepository::get($uuid);

        $this->throwExceptionIfResolved($invoice);

        $invoice->reject();

        return $this->show($uuid);
    }
}
