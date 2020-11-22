<?php


function presentPrice($price)
{
    return '$'. $price;
}


function productImage($path)
{
    return ($path != null && file_exists('images/products/')) ? asset('images/products/' . $path) : asset('not-found.png');
}

function subTotalPrice($array)
{
    $sum = 0;
    if (!count($array)) {
        return null;
    } else {
        foreach ($array as $id => $value) {
            $sum += $value->price;
        }

        return $sum;
    }

}

function taxPrice($price)
{
    $subTotalPrice = subTotalPrice($price);
    $priceAfterTax = ($subTotalPrice * 14) / 100;
    return number_format($priceAfterTax, 2);

}

function calculateDiscount($price, $discount)
{
    $priceAfterDiscount = ($price * $discount) / 100;
    return number_format($priceAfterDiscount, 2);
}

function getTotalCardAfterTaxesAndDiscount($price, $discount = 0)
{
    $total = subTotalPrice($price);
    $taxes = taxPrice($price);

    $result = ($total + $taxes) - $discount;
    return number_format($result, 2);

}

function getAmountAttribute($value)
{
    return (int)(str_replace("$", '', $value));

}
