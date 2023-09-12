<?php

namespace App\Dto\Financial;

use JsonSerializable;

class EditExpenseDTO implements JsonSerializable
{
    private ?string $description = null;
    private ?string $date = null;
    private ?float $amount = null;

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(?float $amount): void
    {
        $this->amount = $amount;
    }

    public function jsonSerialize(): array
    {
        $data = [
            'description' => $this->description,
            'date' => $this->date,
            'amount' => $this->amount,
        ];

        return array_filter($data, function ($value) {
            return $value !== null;
        });
    }
}
