<?php
return [

    'config' => [
        'environment' => env('BRAINTREE_ENVIRONMENT', ''),
        'merchant_id' => env('BRAINTREE_MERCHANT_ID', ''),
        'public_key' => env('BRAINTREE_PUBLIC_KEY', ''),
        'private_key' => env('BRAINTREE_PRIVATE_KEY', '')
    ],
];
