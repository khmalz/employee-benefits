<?php

namespace App\DTO;

class EmployeeData
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public string $name,
        public string $email,
        public ?string $password,
        public string $nik,
        public string $status,
        public string $tanggal_masuk,
        public string $kesehatan,
        public string $bencana,
        public string $transportasi,
        public string $jabatan,
        public string $makanan,
    ) {
        $this->kesehatan = str_replace(['.', ','], '', $kesehatan);
        $this->bencana = str_replace(['.', ','], '', $bencana);
        $this->transportasi = str_replace(['.', ','], '', $transportasi);
        $this->jabatan = str_replace(['.', ','], '', $jabatan);
        $this->makanan = str_replace(['.', ','], '', $makanan);
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['email'],
            $data['password'] ?? null,
            $data['nik'],
            $data['status'],
            $data['tanggal_masuk'],
            $data['kesehatan'],
            $data['bencana'],
            $data['transportasi'],
            $data['jabatan'],
            $data['makanan']
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
