<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admins.categories');
    }

    public function all(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'created_at'
        );

        $totalData = Category::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $categories = Category::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        } else {
            $search = $request->input('search.value');

            $categories = Category::where('created_at', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Category::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = array();
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $nestedData['id'] = $category->id;
                $nestedData['name'] = $category->name;
                /* $nestedData['body'] = substr(strip_tags($category->body),0,50)."...";*/
                $nestedData['created_at'] = date('j M Y h:i a', strtotime($category->created_at));
                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
        echo json_encode($json_data);
    }

    public function store(Request $request)
    {
        $category=new Category();
        $category->name=$request->input('name');
        $category->save();
        return \response()->json(["message"=>"Data saved"],201);
    }

    public function show($id)
    {
        $category=Category::find($id);
        if(!$category){
            return \response()->json(["message"=>"Not found"],404);
        }
        return \response()->json($category,200);
    }

    public function update(Request $request)
    {
        $category=Category::find($request->input('id'));
        if(!$category){
            return \response()->json(["message"=>"Not found"],404);
        }
        $category->name=$request->input('name');
        $category->update();
        return \response()->json(["message"=>"Data updated"],204);
    }


    public function destroy($id)
    {
        $category=Category::find($id);
        if(!$category){
            return \response()->json(["message"=>"Not found"],404);
        }
        $category->delete();
        return \response()->json(["message"=>"Data deleted"],200);
    }
}
