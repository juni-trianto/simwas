<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Http\Resources\MenuResource;

class MenuController extends Controller
{
    //
    public function index()
    {
        //get all posts
        $menu = Menu::all();

        //return collection of menu as a resource
        return new MenuResource(true, 'List Data Menu', $menu);
    }
}
