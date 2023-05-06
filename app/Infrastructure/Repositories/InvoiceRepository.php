<?php

declare(strict_types=1);

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Models\Invoice;

class InvoiceRepository
{
    public static function get(string $id)
    {
        return Invoice::findOrFail($id);
    }

    public static function getWithDetails(string $id)
    {
        return Invoice::with(['company', 'lines'])->findOrFail($id);
    }
}
