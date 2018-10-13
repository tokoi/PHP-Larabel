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


//新しい「本」を追加するルーティング

Route::post('/books', function(Request $request){
    
    //バリデーション 
    $validator = Validator::make($request->all(), [ 
        'item_name' => 'required|max:255', 
    ]); 
    
    //バリデーション： エラー 
    if ($validator->fails()) { 
        return redirect('/') 
        ->withInput() 
        ->withErrors($validator); 
    
    } 
    
    // Eloquent モデル 
    
    $books = new Book; 
    $books->item_name = $request->item_name; 
    $books->item_number = '1'; 
    $books->item_amount = '1000'; 
    $books->published = '2017-03-07 00:00:00'; 
    $books->save(); 
    return redirect('/');

});


//本を削除する

Route::delete('book/{book}', function(Book $book){
    
    $book->delete();
    return redirect('/');

});