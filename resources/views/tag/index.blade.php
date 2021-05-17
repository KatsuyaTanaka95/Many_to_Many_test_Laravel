<h1>Tag一覧画面</h1>
<p><a href="{{ route('tag.create') }}">新規追加</a></p>
 
@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif
 
<table border="1">
    <tr>
        <th>tag name</th>
        <th>book title</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach ($tags as $tag)
    <tr>
        <td>{{ $tag->name }}</td>
        <td>
            @foreach ($tag->books as $book)
            <a href="{{ route('book.show',$book->id)}}">{{ $book->title }}</a>
            @endforeach
        </td>
        <td><a href="{{ route('tag.edit',$tag->id)}}">編集</a></td>
        <td>
            <form action="{{ route('tag.destroy', $tag->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="削除">
            </form>
        </td>
    </tr>
    @endforeach
</table>