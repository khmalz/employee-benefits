<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;

class BenefitData
{
    public int $amount;

    public function __construct(
        public int $employee_id,
        public string $employee_nik,
        public string $type,
        string $amount,
        public string $message,
        public ?UploadedFile $file = null,
    ) {
        $this->amount = (int) str_replace(['.', ','], '', $amount);
    }

    public static function fromArray(array $data): self
    {
        return new self(
            employee_id: $data['employee_id'],
            employee_nik: $data['employee_nik'],
            type: $data['type'],
            amount: $data['amount'],
            message: $data['message'],
            file: $data['file'] ?? null,
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
