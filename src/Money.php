<?php

namespace Hillel;

use Hillel\Currency;
use InvalidArgumentException;

class Money
{
    private int|float $amount;
    private Currency $currency;

    public function __construct(Currency $currency, int|float $amount)
    {
        $this->setCurrency($currency);
        $this->setAmount($amount);
    }

    public function equals(Money $coin): bool
    {
        return $this->getCurrency() === $coin->getCurrency()
            && $this->getAmount() === $coin->getAmount();
    }

    public function add(Money $coin): Money
    {
        if($coin->getCurrency() !== $this->getCurrency()){
            throw new InvalidArgumentException('Wrong currency');
        }

        return new Money($this->getCurrency(), $this->getAmount() + $coin->getAmount());
    }

    /**
     * @param int|float $amount
     */
    public function setAmount(int|float $amount): void
    {
        $this->amount = $amount;
    }


    /**
     * @param Currency $currency
     */
    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return int|float
     */
    public function getAmount(): int|float
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

}