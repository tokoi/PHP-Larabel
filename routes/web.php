<?php

use App\Book;
use Illuminate\Http\Request;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//本のダッシュボードを表示するルーティング

Route::get('/', function () {
    
    $books = Book::orderBy('created_at', 'asc')->get(); 
    
    return view('books',[
        
        'books' => $books
        
        ]);
});

//本の編集

Route::post('/booksedit/{books}',function(Book $books){
    
  
    
    //{books}id値を取得→Book $books id 値の1レコード 取得
    return view('booksedit', ['book' => $books]);
    
});

//本の更新処理

Route::post('/books/update',function(Request $request)
{

 //バリデーション 
    $validator = Validator::make($request->all(), [ 
        
        'id' => 'require',
        'item_name' => 'required | min:3 | max:255',
        'item_number' => 'required | min:1 | max:3',
        'item_amount' => 'required | max:6',
        'published' => 'required',
    ]); 


    //バリデーション： エラー 
    if ($validator->fails()) 
    { 
        return redirect('/') 
        ->withInput() 
        ->withErrors($validator); 
    
    } 
    
    // データ更新
    
    $books = Book::find($request->id); 
    $books->item_name = $request->item_name; 
    $books->item_number = $request->item_number; 
    $books->item_amount = $request->item_amount; 
    $books->published = $request->published; 
    $books->save(); 
    return redirect('/');



}

);





//新しい「本」を追加するルーティング

Route::post('/books', function (Request $request) 
{

 //バリデーション 

    //バリデーション 
    $validator = Validator::make($request->all(), [ 
        'item_name' => 'required | min:3 | max:255',
        'item_number' => 'required | min:3 | max:3',
        'item_amount' => 'required | max:6',
        'published' => 'required',
    ]); 

 
    //バリデーション： エラー 
    if ($validator->fails()) 
    { 
        return redirect('/') 
        ->withInput() 
        ->withErrors($validator); 
    
    } 
    
    // Eloquent モデル 
    
    $books = new Book; 
    $books->item_name = $request->item_name; 
    $books->item_number = $request->item_number; 
    $books->item_amount = $request->item_amount; 
    $books->published = $request->published; 
    $books->save(); 
    return redirect('/');

});


//本を削除する

Route::delete('book/{book}', function(Book $book){
    
    $book->delete();
    return redirect('/');

});