<?php
namespace App\Services;

class FormatService
{
   
    public function currencyVN($amount, $decimals = 3): string
    {
        return number_format($amount, decimals: $decimals, decimal_separator: ',', thousands_separator: '.') . ' ₫';
    }




public function formatNameToUsername(string $name): string
{
    // Bước 1: Xóa khoảng trắng đầu/cuối và chuyển về chữ thường
    $name = strtolower(trim($name));

    // Bước 2: Xóa tất cả khoảng trắng giữa các từ
    $name = str_replace(' ', '', $name);

    // Bước 3 (tuỳ chọn): Loại bỏ dấu tiếng Việt
    $name = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $name);
    $name = preg_replace('/[^a-z]/', '', $name); // chỉ giữ a-z

    return $name;
}






}