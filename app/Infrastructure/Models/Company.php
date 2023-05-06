<?php

declare(strict_types=1);

namespace App\Infrastructure\Models;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'companies';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'name', 'street', 'city', 'zip', 'phone', 'email'];

    protected static function newFactory()
    {
        return CompanyFactory::new();
    }
}
