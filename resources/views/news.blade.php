
@foreach($news as $item)
    <h3>{{ $item->id}} {{ $item->title}}</h3>
    <p>{{ $item->text}}</p>
    <a href="{{ url('/news-card',['id'=> $item->id]) }}">подробнее</a>
@endforeach

{{ $news->onEachSide(2)->links() }}
