<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
//return type redirectResponse
use Illuminate\Http\RedirectResponse;
class MenuController extends Controller
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
    public function index(Request $request)
    {
        if(isset($_POST['submit']))
        {
              //validate form
        $this->validate($request, [
            'judul_menu'     => 'required|',
            'link'   => 'required|',
            'icon'   => 'required|',
        ]);

        //create post
        Menu::create([
            'judul_menu'     => $request->judul_menu,
            'link'           => $request->link,
            'icon'           => $request->icon
        ]);

        //redirect to index
        return redirect()->route('menu')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{

            $page_data['page_title'] = 'Manajemen Menu';
            $page_data['database']   = Menu::latest()->Paginate(10);
            return view('pages/master/menu/data', $page_data);
        }
    }

    public function edit(string $id)
    {
        //get post by ID
        $page_data['result'] = Menu::findOrFail($id);
        $page_data['page_title'] = 'Edit Manajemen Menu';
        return view('pages/master/menu/edit', $page_data);
    }

     /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'judul_menu'     => 'required|',
            'link'   => 'required|',
            'icon'   => 'required|',
        ]);

        //get post by ID
        $post = Menu::findOrFail($id);
        $post->update([
            'judul_menu'     => $request->judul_menu,
            'link'           => $request->link,
            'icon'           => $request->icon
        ]);

        //redirect to index
        return redirect()->route('menu')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get post by ID
        $post = Menu::findOrFail($id);
        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('menu')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
