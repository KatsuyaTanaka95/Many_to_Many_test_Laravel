<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Tag;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('book.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        // attachメソッドを利用して、中間テーブルにデータを追加しています。
        $book->tags()->attach(request()->tags);
        return redirect()->route('book.index')->with('success', '新規登録完了しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $tags = $book->tags->pluck('id')->toArray();
        $tagList = Tag::all();
        return view('book.edit', compact('book', 'tags', 'tagList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = [
            'title' => $request->title,
        ];
        Book::where('id', $id)->update($update);
        $book = Book::find($id);
        // syncメソッドを利用して、中間テーブルの更新をおこなっています。
        $book->tags()->sync(request()->tags);
        return back()->with('success', '編集完了しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        // detachメソッドを利用すると中間テーブルから関連するデータも削除されます。
        // ただし、マイグレーションファイルにて外部キー制約を設定しているため、ここではdetachメソッドがなくても削除されます。
        $book->tags()->detach();
        return redirect()->route('book.index')->with('success', '削除完了しました');
    }
}
