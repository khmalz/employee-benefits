<?php

namespace App\DTO;

class ResponseData
{
    public function __construct(
        public string $status,
        public string $message,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            status: $data['status'],
            message: $data['message'],
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
