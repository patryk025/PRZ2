<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function index()
    {
        return view(
            'users.index',
            [
                'users' => User::with('roles')->get()
            ]
        );
    }

    public function create()
    {
        return view(
            'users.form'
        );
    }

    public function edit(User $user)
    {
        return view(
            'users.form'
        );
    }

    public function update(Request $request, User $user)
{
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->save();
    return redirect()->route('users.index')->with('success', 'Użytkownik został zaktualizowany.');
}

    public function delete()
    {
        return view(
            'users.form'
        );
    }

    public function store(Request $request)
{
    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->save();

    return redirect()->route('users.index');
    /*return redirect()->route('users.create');
    return redirect()->route('users.edit');
    return redirect()->route('users.destroy');*/
    return redirect()->route('users.create')->with('success', 'Użytkownik został dodany.');
}

    // public function async(Request $request) {
    //     return User::query()
    //         ->select('id', 'name')
    //         ->orderBy('name')
    //         ->when(
    //             $request->search,
    //             fn (Builder $query)
    //                 => $query->where('name', 'like', "%{$request->search}%")
    //         )->when(
    //             $request->exists('selected'),
    //             fn (Builder $query) => $query->whereIn(
    //                 'id',
    //                 array_map(
    //                     fn (array $item) => $item['id'],
    //                     array_filter(
    //                         $request->input('selected', []),
    //                         fn ($item) => (is_array($item) && isset($item['id']))
    //                     )
    //                 )
    //             ),
    //             fn (Builder $query) => $query->limit(10)
    //         )->get();
    // }
}
