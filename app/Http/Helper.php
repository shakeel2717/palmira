<?php
// generating 6 digit unique user code

use App\Models\admin\CounterDepartment;
use App\Models\admin\Token;
use App\Models\Department;
use App\Models\options;
use Illuminate\Support\Facades\Log;

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
    $token = Token::where('counter_id', auth()->user()->counter_id)->where('status', 'open')->first();
    return $token;
}



// checking how much tokens in queue in this counter
function getTokenQueue($department_id)
{
    $count = [];
    $department = Department::find($department_id);

    // getting all counters who serve this department
    $countersDepartment = CounterDepartment::where('department_id', $department->id)->get();
    foreach ($countersDepartment as $countDepart) {
        if ($countDepart->counter->status == 'busy') {
            // $count[] = $countDepart->counter->id;
            $tokens = Token::where('counter_id', $countDepart->counter->id)->where('status', 'queue')->get();
            $count[] = array('counter_id' => $countDepart->counter->id, 'count' => count($tokens));
        }
    }
    // get the less used counter_id from array
    $count = collect($count);
    // get less used counter_id from this collection
    $counter_id = $count->sortBy('count')->first()['counter_id'];
    return $counter_id;
}
