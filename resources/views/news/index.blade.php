<div style="position: relative; display: block">
    <div>
        <a href="{{route('news.create')}}">Создать Новость</a>
    </div>
    <div>
        <a href="{{route('news_api')}}">Посмотреть API</a>
    </div>
</div>
<div style="position: relative; display: block">
    @foreach($news as $new)
        <div style="display: inline-block;width: 20%; margin: 20px">
            <div>
                {{$new['title']}}
            </div>
            <div>
                {{$new['desc']}}
            </div>
            <div>
                <a href="{{route('news.show', $new['id'])}}">Подробнее</a>
            </div>
            <div>
                <a href="{{route('news.edit', $new['id'])}}">Редактирование</a>
            </div>
            <div>
                <form action="{{route('news.destroy', $new['id'])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach
    {{$news->links()}}
</div>
