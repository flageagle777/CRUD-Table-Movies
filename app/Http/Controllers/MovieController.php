<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;
use App\Models\Category;
use Exception;


class MovieController extends Controller
{
    function addFilm (Request $request){
        $validator = Validator::make($request->all(), [
            "title"=>'required',
            "voteaverage"=>'required',
            "posterpath"=>'required',
            "overview"=>'required',
            "category_id"=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'massage' => $validator->errors(),
            ]);
        }
        
        $data = [
            "title"=>$request->get("title"),
            "voteaverage"=>$request->get("voteaverage"),
            "posterpath"=>$request->get("posterpath"),
            "overview"=>$request->get("overview"),
            "category_id"=>$request->get("category_id"),
        ];
        try {
            $insert = Movie::create($data);
            return Response()->json([
                "status"=>true,'message'=>'Data berhasil ditambahkan'
            ]);

        } catch (Exception $e){
            return Response()->json(["status"=>false,'message'=>$e]);
        }
    }
    function getFilm(){
        try{
            $movie = Movie::get();
            return response()->json([
                'status'=>true,
                'message'=>'berhasil load data film',
                'data'=>$movie,
            ]);
        } catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data film '. $e,
            ]);
        }
    }
    function getDetailFilm($id){
        try{
            $movie = Movie::where('id',$id)->first();
            return response()->json([
                'status'=>true,
                'message'=>'berhasil load data detail film',
                'data'=>$movie,
            ]);
        } catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data detail film. '. $e,
            ]);
        }
    }
    function update_film($id, Request $request) {
        $validator = Validator::make($request->all(), [
            "title"=>'required',
            "voteaverage"=>'required',
            "posterpath"=>'required',
            "overview"=>'required',
            "category_id"=>'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }
        $data = [
            "title"=>$request->get("title"),
            "voteaverage"=>$request->get("voteaverage"),
            "posterpath"=>$request->get("posterpath"),
            "overview"=>$request->get("overview"),
            "category_id"=>$request->get("category_id"),
        ];
        try {
            $update = Movie::where('id',$id)->update($data);
            return Response()->json([
                "status"=>true,
                'message'=>'Data berhasil diupdate'
            ]);


        } catch (Exception $e) {
            return Response()->json([
                "status"=>false,
                'message'=>$e
            ]);
        }
    }
    function hapus_film($id) {
        try{
            Movie::where('id',$id)->delete();
            return Response()->json([
                "status"=>true,
                'message'=>'Data berhasil dihapus'
            ]);
        } catch(Exception $e){
            return Response()->json([
                "status"=>false,
                'message'=>'gagal hapus user. '.$e,
            ]);
        }
    }


    function addCategory (Request $request){
        $validator = Validator::make($request->all(), [
            "category_name"=>'required',
        ]);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'massage' => $validator->errors(),
            ]);
        }
        
        $data = [
            "category_name"=>$request->get("category_name"),
        ];
        try {
            $insert = Category::create($data);
            return Response()->json([
                "status"=>true,'message'=>'Data berhasil ditambahkan'
            ]);

        } catch (Exception $e){
            return Response()->json(["status"=>false,'message'=>$e]);
        }
    }
    function getCategory(){
        try{
            $category = Category::get();
            return response()->json([
                'status'=>true,
                'message'=>'berhasil load data category',
                'data'=>$category,
            ]);
        } catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data category '. $e,
            ]);
        }
    }
    function getDetailCategory($id){
        try{
            $movie = Category::where('id',$id)->first();
            return response()->json([
                'status'=>true,
                'message'=>'berhasil load data detail category',
                'data'=>$movie,
            ]);
        } catch(Exception $e){
            return response()->json([
                'status'=>false,
                'message'=>'gagal load data detail category. '. $e,
            ]);
        }
    }
    function update_category($id, Request $request) {
        $validator = Validator::make($request->all(), [
            "category_name"=>'required',
        ]);


        if($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }
        $data = [
            "category_name"=>$request->get("category_name"),
        ];
        try {
            $update = Category::where('id',$id)->update($data);
            return Response()->json([
                "status"=>true,
                'message'=>'Data berhasil diupdate'
            ]);


        } catch (Exception $e) {
            return Response()->json([
                "status"=>false,
                'message'=>$e
            ]);
        }
    }
    function hapus_category($id) {
        try{
            Category::where('id',$id)->delete();
            return Response()->json([
                "status"=>true,
                'message'=>'Data berhasil dihapus'
            ]);
        } catch(Exception $e){
            return Response()->json([
                "status"=>false,
                'message'=>'gagal hapus category. '.$e,
            ]);
        }
    }
}