<h1>{{ $book->title }}ブックtag一覧</h1>
 
<ul>
    @foreach ($book->tags as $tag)
    <li>{{ $tag->name }}</li>
    @endforeach
</ul>