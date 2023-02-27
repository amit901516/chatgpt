<html>
    <head>
        <title>
            test
        </title>
    </head>
    <body>
        <h1>chatGPT api integration</h1>
        <form  method="POST" action="{{route('result')}}"> 
            @csrf
            <label>
                create Article on:
            </label><br><br>
            <input type="text" name="topic" placeholder="kuch likho"><br><br>
            <button>generate</button>
        </form>
        @if (isset($result))
            <h3>Ai work:</h3>
            <p>{{$result}}</p>
        @endif
    </body>
</html>