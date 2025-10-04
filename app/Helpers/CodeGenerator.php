<?php
namespace App\Helpers;

use Illuminate\Support\Str;
use Carbon\Carbon;

$CodeInvoice = CodeGenerator::productCode();

class CodeGenerator
{
    public static function invoiceCode()
    {
        return 'INV' . now()->format('YmdHis') . strtoupper(Str::random(4));
    }

    public static function productCode()
    {
        return 'PROD' . strtoupper(Str::random(6));
    }

    public static function workshopCode()
    {
        return 'WRK' . strtoupper(Str::random(8));
    }

    public static function customerCode()
    {
        return 'CST' . strtoupper(Str::random(6));
    }

    public static function serviceTypeCode()
    {
        return 'ST' . strtoupper(Str::random(6));
    }

    public static function transactionCode()
    {
        return now()->format('YmdHis') . strtoupper(Str::random(5));
    }

    public static function voucherCode()
    {
        return 'VCHR' . now()->format('Ymd') . strtoupper(Str::random(5));
    }

}
