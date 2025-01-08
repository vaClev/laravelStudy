<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Models\News;

class IndexController extends Controller
{
    public function posts(Request $request){
        // dd(DB::select('select * from posts'));

        $posts = DB::table('posts')->get();

        if(isset($request->status_id) && $request->status_id != 0){
            $posts = DB::table('posts')->where('status_id', $request->status_id )->get();
        }

        $status = DB::table('status')->get();


        $active_status = $request->status_id;
        
        return view('new_post', compact('posts', 'status', 'active_status'));
    }

    public function messages(): array
    {
        return [
            'title.max:3' => 'sdf',
            'content.max:3' => 'dsfdsf',
        ];
    }

    public function request_form(Request $request): RedirectResponse{

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:3',
            'content' => 'required|max:3',
            'status_id' => 'required',
            'image' => 'image',
        ], [
            'title.max' => 'Поле title не больше 3х символов',
            'title.required' => 'обязательное поле',
        ]);

        if ($validator->fails()) {
            return redirect('/posts')
                        ->withErrors($validator)
                        ->withInput();
        }

        $path = null;
        if($request->image){
            $file = $request->file('image')->store('files', 'public');
            $path = Storage::url($file);
        }
        

        DB::table('posts')->updateOrInsert(
            ['title' => $request->title],
            [
                'title' => $request->title, 
                'content' => $request->content, 
                'status_id' => $request->status_id,
                'file' => $path
            ]
            
        );

        return redirect()->route('list-news')->with('success', 'Добавлено!');
    
    }

    public function post_delete($id){

        $post_delete = DB::table('posts')->where('id',  $id)->first();
        DB::table('posts')->where('id',  $id)->delete();

        return redirect()->route('list-news')->with('delete', "пост {$post_delete->title} успешно удален!");
    }

    public function news(){

        $news = News::paginate(10);

        return view('news', compact('news'));
    }

    public function news_card($id){
        $news = News::where('id', $id)->first();

        $comments = $news->comments;

        return view('news-card', compact('news', 'comments'));
    }


   
    // ввести новое поле в новости "статус" опубликовано или нет

    // при создании выводить select

    // при выводе сделать тоже select для показа по фильтру (по умолчанию все)


}
