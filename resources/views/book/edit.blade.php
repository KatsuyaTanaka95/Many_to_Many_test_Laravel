<h1>編集画面</h1>
<p><a href="{{ route('book.index') }}">Book一覧画面</a></p>
 
@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif
 
<form action="{{ route('book.update',$book->id)}}" method="POST">
    @csrf
    @method('PUT')
    <p>タイトル<input type="text" name="title" value="{{ $book->title }}"></p>
    <p>
        @foreach ($tagList as $tag)
        <label class="checkbox">
            <input type="checkbox" name="tags[]" value="{{$tag->id}}" @if(in_array($tag->id,$tags)) checked @endif>
            {{ $tag->name }}
        </label>
        @endforeach
    </p>
    <input type="submit" value="編集する">
</form>