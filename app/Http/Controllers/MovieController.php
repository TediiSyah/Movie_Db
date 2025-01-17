<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    // -----------------CATEGORY---------------------
    function AddCategory(Request $request) {
        $validator = Validator::make($request->all(),[
            "category"=>'required',
        ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors(),
            ]);
        }   
        $data = [
            'category_name'=>$request->get('category'),
        ];
        try {
            $insert = Category::create($data);
            return Response()->json(["status"=>true, "message"=>"Data berhasil ditambahkan"]);
        } catch (Exception $e) {
            return Response()->json(["status"=>false,"message"=>$e]);
        }
    }

    function getCategory(){
        try {
            $category = Category::get();
            return response()->json([
                'status' => true,
                'message'=>'berhasil load data categoryy',
                'data'=> $category,
            ]);
        } catch (exception $e) {
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data user. ', $e,
            ]);
        }
    }

    function getDetailCategory($id){
        try {
            $category = Category::where('id',$id)->first();
            return response()->json([
            'status'=>true,
            'message'=>'berhasil load data detail user',
            'data'=>$category,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'=> false,
                'message'=>'gagal load data detail user. ', $e,
            ]);
        }
    }

    function update_category($id, Request $request){
        $validator = Validator ::make ($request->all(),[
            "category"=>'required',
        ]);

        if ($validator-> fails()) {
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors(),
            ]);
        }
        $data = [
            'category_name'=>$request->get('category'), 
        ];
        try {
            $update = Category::where('id',$id)->update($data);
            return Response()->json([
                'status'=>true,
                'message'=>'Data berhasil di update'
            ]);
        } catch (Exception $e) {
            return Response()->json([
                "status"=>false,
                'message'=>$e,
            ]);
        }
    }

    function hapus_category($id){
        try {
            Category::where('id',$id)->delete();
            return Response()->json([
                "status"=>true,
                'message'=>'Data Berhasil Dihapus'
            ]);
        } catch (Exception $e) {
            return Response()->json([
                "status"=>false,
                'message'=>'gagal hapus user.',$e,
            ]);
        }
    }

    // --------------------MOVIE-------------------------
    function AddMovie(Request $request) {
        $validator = Validator::make($request->all(),[
            "title"=>'required',
            "voteaverage"=>'required',
            "overview"=>'required',
            "posterpath"=>'required',
            "category_id"=>'required',
        ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors(),
            ]);
        }   
        $data = [
            "title"=>$request->get('title'),
            "voteaverage"=>$request->get('voteaverage'),
            "overview"=>$request->get('overview'),
            "posterpath"=>$request->get('posterpath'),
            "category_id"=>$request->get('category_id')
            
            
        ];
        try {
            $insert = Movie::create($data);
            return Response()->json(["status"=>true, "message"=>"Data berhasil ditambahkan"]);
        } catch (Exception $e) {
            return Response()->json(["status"=>false,"message"=>$e]);
        }
    }

    function getMovie(){
        try {
            $movie = Movie::get();
            return response()->json([
                'status' => true,
                'message'=>'berhasil load data movie',
                'data'=> $movie,
            ]);
        } catch (exception $e) {
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data user. ', $e,
            ]);
        }
    }

    function getDetailMovie($id){
        try {
            $category = Movie::where('id',$id)->first();
            return response()->json([
            'status'=>true,
            'message'=>'berhasil load data detail user',
            'data'=>$category,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status'=> false,
                'message'=>'gagal load data detail user. ', $e,
            ]);
        }
    }

    function update_movie($id, Request $request){
        $validator = Validator ::make ($request->all(),[
            "title"=>'required',
            "voteaverage"=>'required',
            "overview"=>'required',
            "posterpath"=>'required',
            "category_id"=>'required',
        ]);

        if ($validator-> fails()) {
            return response()->json([
                'status'=>false,
                'message'=>$validator->errors(),
            ]);
        }
        $data = [
            "title"=>$request->get('title'),
            "voteaverage"=>$request->get('voteaverage'),
            "overview"=>$request->get('overview'),
            "posterpath"=>$request->get('posterpath'),
            "category_id"=>$request->get('category_id')
            
        ];
        try {
            $update = Movie::where('id',$id)->update($data);
            return Response()->json([
                'status'=>true,
                'message'=>'Data berhasil di update'
            ]);
        } catch (Exception $e) {
            return Response()->json([
                "status"=>false,
                'message'=>$e,
            ]);
        }
    }

    function hapus_movie($id){
        try {
            Movie::where('id',$id)->delete();
            return Response()->json([
                "status"=>true,
                'message'=>'Data Berhasil Dihapus'
            ]);
        } catch (Exception $e) {
            return Response()->json([
                "status"=>false,
                'message'=>'gagal hapus user.',$e,
            ]);
        }
    }
}
