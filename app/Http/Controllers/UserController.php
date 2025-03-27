<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request){
        $this->authorize('viewAny', $request->user);
        return new UserCollection(User::paginate(10));
    }

    public function show(Request $request, User $user){
        $this->authorize('view', $request->user);
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user){
        $this->authorize('update', $user);

        $user->update($request->all());
        return response()->json(['message'=>'User successfully updated'], 201);
    }

    public function destroy(Request $request, User $user){
        $this->authorize('delete', $request->user);
        $user->delete();
        return response()->json([], 204);
    }
}
