<h1>Tag新規作成画面</h1>
 
<form action="{{ route('tag.store')}}" method="POST">
    @csrf
    <p>tag name<input type="text" name="name" value="{{ old('name') }}"></p>
    <p>
        @foreach($books as $book)
        <label>
            <input type="checkbox" name="books[]" value="{{ $book->id }}">{{ $book->title }}
        </label>
        @endforeach
    </p>
    <input type="submit" value="登録する">
</form>