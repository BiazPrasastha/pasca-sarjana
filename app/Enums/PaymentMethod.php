<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case GOPAY = 'GOPAY';
    case OVO = 'OVO';
    case SPAY = 'SHOPEE PAY';
    case DANA = 'DANA';
    case INDOMARET = 'INDOMARET';
    case ALFAMART = 'ALFAMART';
    case BJATENG = 'BANK JATENG';
    case BTRANSFER = 'BANK TRANSFER';

    public static function fromName(string $name): string
    {
        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }
        throw new \ValueError("$name is not a valid backing value for enum " . self::class);
    }
}
