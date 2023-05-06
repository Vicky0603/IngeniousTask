<?php

declare(strict_types=1);

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'invoice_product_lines';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'invoice_id', 'product_id', 'quantity'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
