<?php

namespace App\Dto\Financial;

use JsonSerializable;

class CreateExpenseDTO implements JsonSerializable
{
    private string $description;
    private string $date;
    private float $amount;
    private int $fk_user_id;

    public function __construct()
    {
        $this->description = '';
        $this->date = '';
        $this->amount = 0.0;
        $this->fk_user_id = 0;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getUserId(): int
    {
        return $this->fk_user_id;
    }

    public function setFkUserId(int $userId): void
    {
        $this->fk_user_id = $userId;
    }

    public function jsonSerialize(): array
    {
        return [
            'description' => $this->description,
            'date' => $this->date,
            'amount' => $this->amount,
            'fk_user_id' => $this->fk_user_id,
        ];
    }

}
