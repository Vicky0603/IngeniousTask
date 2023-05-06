<?php

declare(strict_types=1);

namespace App\Infrastructure\Models;

use App\Domain\Enums\StatusEnum;
use Database\Factories\InvoiceFactory;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'invoices';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'number', 'date', 'due_date', 'company_id', 'status'];

    public function lines()
    {
        return $this->hasMany(InvoiceLine::class, 'invoice_id', 'id')->with('product');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function approve()
    {
        $this->update(['status' => StatusEnum::APPROVED]);
    }

    public function reject()
    {
        $this->update(['status' => StatusEnum::REJECTED]);
    }

    protected static function newFactory()
    {
        return InvoiceFactory::new();
    }
}
