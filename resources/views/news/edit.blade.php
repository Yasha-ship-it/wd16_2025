<form action="{{route('news.update', $new['id'])}}" method="post" style="display: block">
    @csrf
    @method('PATCH')
    <input name="title" value="{{$new['title']}}" placeholder="Название">
    <input name="desc" value="{{$new['desc']}}" placeholder="Краткое описание">
    <input name="description" value="{{$new['description']}}" placeholder="Детальное описание">
    <button type="submit">Сохранить</button>
</form>
