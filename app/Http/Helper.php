<?php
// generating 6 digit unique user code

use App\Models\admin\Token;
use App\Models\options;

function generate_token()
{
    $option = options::where('name', 'token_length')->first();
    $option->value = $option->value + 1;
    $length = $option->value;
    $option->save();
    $token = sprintf('%05d', $length++);
    // chekcing if this token already exist
    $check = Token::where('token', $token)->first();
    if ($check) {
        $option = options::where('name', 'token_length')->first();
        $option->value = $option->value + 1;
        $length = $option->value;
        $option->save();
        $token = sprintf('%05d', $length++);
        return $token;
    } else {
        return $token;
    }
}

function getActiveToken()
{
    $token = Token::where('counter_id', auth()->user()->counter_id)->where('status','open')->first();
    return $token;
}
