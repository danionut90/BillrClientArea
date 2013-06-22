<?php

function format_date($date) {
    if (isset($date['date']) && $date['date'] != '') {
        $date = new \DateTime($date['date']);
        return $date->format(DATE_FORMAT);
    }
    return '';
}

function format_datetime($date) {
    if (isset($date['date']) && $date['date'] != '') {
        $date = new \DateTime($date['date']);
        return $date->format(DATE_FORMAT.' H:i:s');
    }
    return '';
}


// Currency code
$fmt = new \NumberFormatter('en', \NumberFormatter::CURRENCY );
$tmp = $fmt->formatCurrency(0, CURRENCY);
$currencyCode = mb_substr($tmp, 0, 1, 'UTF-8');
define('CURRENCY_CODE', $currencyCode);
function format_currency($money) {    
    if (!empty($money)) {
        return CURRENCY_CODE.$money;
    }
    return '';
}


function format_mapping($id, $mappingKey) {
    global $mappings;
    if (isset($mappings[$mappingKey])) {
        if (isset($mappings[$mappingKey][$id])) {
            return $mappings[$mappingKey][$id];
        }
    }
    return '';
}