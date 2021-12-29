<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserGithubData;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        UserGithubData::find($user->github->id)->update(['personal_access_token' => $request['access_token']]);
        return response()->json(['status' => 'success', 'message' => 'Access token saved successfully']);
    }
}
