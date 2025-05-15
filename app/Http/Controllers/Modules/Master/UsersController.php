<?php

namespace App\Http\Controllers\Modules\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $data = User::latest()->paginate(5);
        $result = [
            'user'=>$user,
            'data'=>$data
        ];
        
        return view('modules.masters.users.index', $result);
    }

    public function create()
    {
        $user = Auth::user();

        $result = [
            'user'=>$user
            
        ];
        
        return view('modules.masters.users.create', $result);
    }


    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);


        //return redirect()->route('home');
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id)
    {
        //get post by ID
        $user = Auth::user();
        $data = User::findOrFail($id);
        $result = [
            'user'=>$user,
            'data'=>$data
        ];
        //render view with post
        return view('modules.masters.users.edit', $result);
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //get post by ID
        $post = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        
        $post->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $post = User::findOrFail($id);

        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}



