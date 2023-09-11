<?php

namespace App\Dto\Financial;

use Carbon\Carbon;

class ExpenseDTO
{
    private int $id;
    private string $description;
    private Carbon $date;
    private float $amount;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDate(): Carbon
    {
        return $this->date;
    }

    public function setDate(Carbon $date): void
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
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }
    private int $userId;

    public function __construct()
    {
        $this->id = 0;
        $this->description = '';
        $this->date = Carbon::now();
        $this->amount = 0.0;
        $this->userId = 0;
    }
}
