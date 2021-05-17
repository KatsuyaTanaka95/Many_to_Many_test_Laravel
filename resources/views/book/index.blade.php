<h1>Book一覧画面</h1>
<p><a href="{{ route('book.create') }}">新規追加</a></p>
 
@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif
 
<table border="1">
    <tr>
        <th>title</th>
        <th>tag</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach ($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>
            @foreach ($book->tags as $tag)
            <a href="{{ route('tag.show',$tag->id)}}">{{ $tag->name }}</a>
            @endforeach
        </td>
        <td><a href="{{ route('book.edit',$book->id)}}">編集</a></td>
        <td>
            <form action="{{ route('book.destroy', $book->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="削除">
            </form>
        </td>
    </tr>
    @endforeach
</table>