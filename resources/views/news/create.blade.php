<form action="{{route('news.store')}}" method="POST" style="display: block">
    @csrf
    <input name="title" value="" placeholder="Название">
    <input name="desc" value="" placeholder="Краткое описание">
    <input name="description" value="" placeholder="Детальное описание">
    <button type="submit">Сохранить</button>
</form>
