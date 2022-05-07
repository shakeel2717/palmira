<?php
// generating 6 digit unique user code

use App\Models\admin\Token;
use App\Models\options;
use App\Models\User;
use App\Models\user\Customer;

function generate_token()
{
    $option = options::where('name', 'token_length')->first();
    $option->value = $option->value + 1;
    $length = $option->value;
    $option->save();
    return sprintf('%05d', $length++);
}
