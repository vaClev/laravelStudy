<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    
    <form action="/request-form" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title">
        <textarea type="text" name="content"></textarea>

        <select name="status_id" id="">
            <option disabled selected>Выберите статус</option>
            @foreach($status as $value)
                <option value="{{ $value->id }}">{{ $value->name }}</option>
            @endforeach
        </select>

        <input type="file" name="image">

        <button type="submit">отправть</button>
    </form>

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>ок!</strong> {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('delete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>ок!</strong> {{ session()->get('delete') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/posts" method="GET">

        <select name="status_id" id="">
            <option value="0">Показывать все</option>
            
            @foreach($status as $value)
                
                <option value="{{ $value->id }}" {{ $value->id == $active_status? 'selected="selected"': ''}}">{{ $value->name }}</option>
            @endforeach
        </select>

        <button>Выбрать</button>

    </form>

    @foreach($posts as $post)
        <div>
            <img src="{{ asset($post->file) }}" alt="">
            <h3>{{ $post->title }}<a href="/post-delete/{{ $post->id}}">х</a></h3>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>


