<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'amount'        => $this->amount,
            'term'          => $this->term,
            'interest_rate' => $this->interest_rate,
            'reason'        => $this->reason,
            'status'        => $this->status,
            'bank'          => $this->bank->name,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
            'dealer'        => [
                'name'    => $this->dealer->name,
                'contact' => [
                    'name'  => $this->dealer->contact->name,
                    'phone' => $this->dealer->contact->phone,
                    'email' => $this->dealer->contact->email,
                ],
            ],
        ];
    }
}
