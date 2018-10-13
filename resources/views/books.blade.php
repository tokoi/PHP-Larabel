@extends('layouts.app') 

@section('content') 


    <!-- Bootstrap の 定形 コード… --> 
    
    
    <div class="panel-body"> 
    
        <!-- バリデーションエラーの 表示 に 使用 -->
         @include('common.errors')
        <!-- バリデーションエラーの 表示 に 使用 --> 
        
        <!-- 本 登 録 フォーム --> 
        <form action="{{ url('books')}}" method="POST" 
    class="form-horizontal"> 
                {{csrf_field()}} 
                
                <!-- 本 のタイトル --> 
                <div class="form-group"> 
                    <label for="book" class="col-sm-3 
    control-label">Book</label>
    
                <div class="col-sm-6"> 
                    <input type="text" name="item_name" id="book-name" 
    class="form-control">
                     </div> 
                     
  <label for="amount" class="col-sm-3 
    control-label">金額</label>
    
                <div class="col-sm-6"> 
                    <input type="text" name="item_amount" id="book-amount" 
    class="form-control">
                     </div> 
                </div>                    
                     
                     
                    <label for="number" class="col-sm-3 
    control-label">冊数</label>
    
                <div class="col-sm-6"> 
                    <input type="text" name="item_number" id="book-number" 
    class="form-control">
                     </div> 
                </div> 
    
        <label for="published" class="col-sm-3 
    control-label">公開日</label>
    
                <div class="col-sm-6"> 
                    <input type="text" name="item_published" id="book_published-number" 
    class="form-control">
                     </div> 
                </div> 
                
                
                <!-- 本 登 録 ボタン --> 
                <div> 
                <div class="form-group"> 
                    <div class="col-sm-offset-3 col-sm-6">
                         
                        <button type="submit" class="btn btn-primary"> 
                            <i class="glyphicon glyphicon-plus"></i> Save 
                        </button> 
                     </div>
                </div> 
            </form> 
            <!--　現在の本 -->
            @if(count($books) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        現在の本
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <!-- テーブルヘッダ -->
                            <thead>
                                <th>本一覧<th>
                                <th>&nbsp;<th>    
                            </thead>
                            <!--テーブル本体-->
                            <tbody>
                                @foreach ($books as $book) 
                                    <tr> 
                                    
                                        <!-- 本 タイトル --> 
                                        <td class="table-text"> 
                                            <div>{{ $book->item_name }}</div>
                                        </td>
                                        
                                        <!-- 本 更新ボタン -->
                                        
                                    　　<td> 
                                    　   <form action="{{ url('booksedit/'.$book->id)}}" method="POST"> 
                                    　   {{csrf_field()}}
                                    　   <button type="submit" class="btn btn-primary">
                                    　   <i class="glyphicon glyphicon-pencil"></i> 更新
                                    　   </button>
                                    　   </form>
                                    　   </td>
                                    　  
                                    　   
                                    　
                                        
                                        <!-- 本: 削除 ボタン --> 
                                        <td> 
                                        <form action="{{ url('book/'.$book->id)}}" method="POST"> 
                                        {{csrf_field()}} 
                                        {{method_field('DELETE')}} 
                                        
                                        <button type="submit" class="btn btn-danger"> 
                                            <i class="glyphicon glyphicon-trash"></i> 削除 
                                            </button> 
                                        </form>
                                        </td> 
                                    </tr> 
                                @endforeach 
                            </tbody> 
                        </table> 
                    </div> 
                </div>
            @endif
        <!-- Book: 既 に 登 録 されてる 本 のリスト --> 
        
@endsection
 
