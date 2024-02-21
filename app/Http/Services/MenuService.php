<?php
namespace App\Http\Services\Menu;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Menu;
class MenuService{
    public function getParent(){
        return Menu::where('parent_id',0)->get();
    }

    public function getAll(){

        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function create($request){
        try{
            // $menu = new Menu();
            // $menu->name = (string) $request->input('name');
            // $menu->parent_id = (int) $request->input('parent_id');
            // $menu->description = (string) $request->input('description');
            // $menu->active = (string) $request->input('active');
            // $menu->slug = Str::slug( $request->input('slug'),'-');
            // $menu->content = (string) $request->input('content');
            // $menu->save();

            Menu::create([ //tạo danh mục
                'name'=> (string)$request->input('name'),
                'parent_id'=> (int)$request->input('parent_id'),
                'description'=> (string)$request->input('description'),
                'content'=> (string)$request->input('content'),
                'active'=> (string)$request->input('active'),
                'slug'=> Str::slug($request->input('slug'),'-')

            ]);
            Session::flash('success','create dashboard successfully');//tạo message khi tạo dashboard thành công bằng session flash
        }catch(\Exception $err){
            Session::flash('error', $err->getMessage());

            return false;
        }
        return true;
    }
    public function destroy($request){

        $id = (int) $request->input('id');

        $menu = Menu::where('id', $id)->first();
        if($menu){
            // dd($menu);
            return Menu::where('id',$id)->orwhere('parent_id',$id)->delete();
        }
        return false;
    }
    public function update($request, $menu): bool
    {
        // $menu->name = (string) $request->input('name');
        // $menu->parent_id = (string) $request->input('parent_id');
        // $menu->description = (string) $request->input('description');
        // $menu->active = (string) $request->input('active');
        // $menu->slug = Str::slug($request->input('slug'));
        // $menu->content = (string)$request->input('content');
        // $menu->save();
        if($request->input('parent_id') != $menu->id){
            $menu->fill($request->input());
            $menu->save();
            Session::flash('messsage','update successfully');
            return true;
        }
    }
}
?>