<?php

declare(strict_types=1);

namespace App\Infrastructure\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    protected $total;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'number' => $this->number,
            'date' => $this->date,
            'due_date' => $this->due_date,
            'company' => $this->getCompanyData(),
            'billed_company' => $this->company,
            'products' => $this->buildProducts(),
            'total' => number_format($this->total)
        ];
    }

    protected function buildProducts()
    {
        $this->total = 0;
        $products = [];

        foreach ($this->lines as $line)
        {
            $lineTotal = $line->quantity * $line->product->price;
            $this->total += $lineTotal;

            $products[] = [
                'name' => $line->product->name,
                'quantity' => $line->quantity,
                'price' => number_format($line->product->price),
                'total' => number_format($lineTotal)
            ];
        }

        return $products;
    }

    protected function getCompanyData()
    {
        return [
            'name' => config('company.name'),
            'street' => config('company.street'),
            'city' => config('company.city'),
            'zip' => config('company.zip'),
            'phone' => config('company.phone'),
            'email' => config('company.email'),
        ];
    }
}
