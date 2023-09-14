<?php

namespace App\Dto\Financial;

class GetStatisticsDTO
{
    private float $total;
    private int $expensesCount;

    public function __construct(float $total, int $expensesCount)
    {
        $this->total = $total;
        $this->expensesCount = $expensesCount;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    public function getExpensesCount(): int
    {
        return $this->expensesCount;
    }

    public function setExpensesCount(int $expensesCount): void
    {
        $this->expensesCount = $expensesCount;
    }
}
