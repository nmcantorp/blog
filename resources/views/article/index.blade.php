<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href=" {{ asset('css/master.css') }} ">
        <link rel="stylesheet" type="text/css" href=" {{ asset('plugins/bootstrap/css/bootstrap.css') }} ">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{ $prueba->title }}</div>
                {{ $prueba->content }}
                <br><strong>{{ $prueba->user->name }} | {{ $prueba->category->name }} | 
                @foreach ($prueba->tag as $tags)
                    {{$tags->name}}
                @endforeach</strong>
            </div>
            <div class="content">
                
            </div>
        </div>
    </body>
</html>
