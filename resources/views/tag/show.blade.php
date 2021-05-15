<h1>{{ $tag->name }}タグBook一覧</h1>
 
<ul>
    @foreach ($tag->books as $book)
    <li>{{ $book->title }}</li>
    @endforeach
</ul>