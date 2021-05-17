<h1>編集画面</h1>
<p><a href="{{ route('tag.index') }}">Tag一覧画面</a></p>
 
@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif
 
<form action="{{ route('tag.update',$tag->id)}}" method="POST">
    @csrf
    @method('PUT')
    <p>tag name<input type="text" name="name" value="{{ $tag->name }}"></p>
    <p>
        @foreach ($bookList as $book)
        <label class="checkbox">
            <input type="checkbox" name="books[]" value="{{$book->id}}" @if(in_array($book->id,$books)) checked @endif>
            {{ $book->title }}
        </label>
        @endforeach
    </p>
    <input type="submit" value="編集する">
</form>