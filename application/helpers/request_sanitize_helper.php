<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function sanitizeRequest(array $request): array
{
    foreach ($request as $key => $value) {
        $request[$key] = trim($value);
    }
    return $request;
}
