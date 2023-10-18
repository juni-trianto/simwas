<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
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
    public function index(Request $request)
    {
        
        $key = $request->get('key');
        if($key != null)
        {
          $page_data['database']    = User::where('username', 'like', '%' . $key . '%')->orWhere('name', 'like', '%' . $key . '%')->Paginate(10);

        }else{
            $page_data['database']   = User::latest()->Paginate(10);
        }
        $page_data['page_title']  = 'Manajemen User' ;
        return view('pages/master/user/data', $page_data);
    }

    public function create(Request $request)
    {
        if(isset($_POST['submit']))
        {
             //validate form
        $this->validate($request, [
            'name'               => 'required',
            'username'            => 'required|unique:users,username',
            'nip'               => 'required|unique:users,nip',
            'email'              => 'required|email|unique:users,email',
            'newpassword'           => 'required|min:6',
            'confirm_password'   => 'required|same:newpassword',
            'role'               => 'required',
        ]);
           //create post
           User::create([
            'name'     => $request->name,
            'username'     => $request->username,
            'nip'     => $request->nip,
            'email'   => $request->email,
            'role'   => $request->role,
            'password'   => Hash::make($request->newpassword) ,
        ]);

        return redirect()->route('user.create')->with(['success' => 'User  Berhasil ditambahkan!']);
    }else{
            $page_data['page_title']  = 'Tambah User';
            return view('pages/master/user/create', $page_data);
        }
    }

    public function edit(string $id)
    {
        //get post by ID
        $page_data['result'] = user::findOrFail($id);
        $page_data['page_title'] = 'Edit user';
        return view('pages/master/user/edit', $page_data);
    }

         /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
               //validate form
         $this->validate($request, [
            'name'        => 'required',
            'username'    => 'required',
            'nip'         => 'required',
            'email'       => 'required|email',
            'role'        => 'required',
        ]);
        //get post by ID
        $post = User::findOrFail($id);
        $post->update([
            'name'     => $request->name,
            'username'     => $request->username,
            'nip'     => $request->nip,
            'email'   => $request->email,
            'role'   => $request->role,
        ]);
        //redirect to index
        return redirect()->route('user')->with(['success' => 'Data User Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        //get post by ID
        $post = User::findOrFail($id);
        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('user')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
