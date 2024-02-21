<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\JsonResponse;
use App\Models\Menu;
use Illuminate\Support\Facades\Redirect;

class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }
    public function create(){
        return view('admin.menu.add',[
            'title' => 'Add new dashboard',
            'menus' => $this->menuService->getParent()
        ]);
    }
    public function store(CreateFormRequest $request){

        $result = $this -> menuService -> create($request);
        return redirect()->back();
    }
    public function index(){
        return view('admin.menu.list',[
            'title' => 'List Dashboard lastest',
            'menus' =>$this->menuService->getAll(),

        ]);
    }
    public function show(Menu $menu)
    {
        // dd($menu);
        return view('admin.menu.edit',[
            'title' => 'List Dashboard'. $menu->name, //dat ten cho title
            'menu'=> $menu, //lay ra thanh phan trong id
            'menus' => $this->menuService->getParent() //lay ra id cha
        ]);
    }

    public function update(Menu $menu,CreateFormRequest $request )
    {
        $this->menuService->update($request, $menu);
        return Redirect()->route('menu.list');
    }


    public function destroy(Request $request): JsonResponse{

        $result = $this->menuService->destroy($request);
        // dd($result);
        if($result){
            return response()->json([
                'error' => false,
                'message'=> "delete success",
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }

}
