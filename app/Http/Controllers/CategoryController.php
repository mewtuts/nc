<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Files;

class CategoryController extends Controller
{
    public function create_sub_category(Request $request){
        
        $request->validate([
            'sub_category_name' => 'required'
        ]);

        $category = new Category();
        $category->title = $request->sub_category_name;
        $category->parent_id = $request->parent_category_id;
        $category->save();

        return redirect('/');

    }

    public function upload_file(Request $request){

        $request->validate([
            'file' => 'required|file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800',
            'parent_category_id' => 'required'
        ]);

        $parent_category = Category::select('id', 'title')->where('id', $request->parent_category_id)->first();

        //Storing the file name
        $uploaded_file = $request->file->getClientOriginalName();
        $file_name = pathinfo($uploaded_file,PATHINFO_FILENAME);

        //Storing the file type
        $file_type = $request->file->extension();

        //Storing the file size in bytes
        $file_size = $request->file->getSize();

        //Storing file path and uploading the file
        $file_path = storage_path($parent_category->title);

        $file = new Files();
        $file->category_id = $request->parent_category_id;
        $file->file_path = $file_path;
        $file->file_name = $file_name;
        $file->file_size = $file_size;
        $file->file_type = $file_type;
        $file->save();

        $request->file('file')->store($parent_category->title);

        return redirect('/');


    }
}
