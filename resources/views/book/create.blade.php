<h1>Book新規作成画面</h1>
 
<form action="{{ route('book.store')}}" method="POST">
    @csrf
    <p>タイトル<input type="text" name="title" value="{{ old('title') }}"></p>
    <p>
        @foreach($tags as $tag)
        <label>
            <input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->name }}
        </label>
        @endforeach
    </p>
    <input type="submit" value="登録する">
</form>