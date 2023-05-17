<?php

function dated($date)
{
    return date('l, j F Y, H:i', strtotime($date));
}

function trx()
{
    $trx_code = 'TRX';
    $rand_chars = substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', 8)), 0, 8);
    return $trx_code . $rand_chars;
}

function days(string $invested_at, int $days): array
{
    $invested = new DateTimeImmutable($invested_at);
    $investment_period = new DateInterval("P{$days}D");

    $investment_end = $invested->add($investment_period);
    $now = new DateTimeImmutable();

    $remaining_days = $now->diff($investment_end)->days;

    return [
        'date' => $investment_end->format('d M Y'),
        'day' => $remaining_days
    ];
}