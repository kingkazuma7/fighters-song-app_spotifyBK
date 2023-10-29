<!DOCTYPE html>
<html>
<head>
    <title>Players</title>
</head>
<body>
    <h1>格闘家の入場曲</h1>
    <ul>
        @foreach ($players as $player)
            <li>格闘家: {{ $player['name'] }}</li>
            @if(isset($player['spotifyUrl']))
                <li>入場曲: <a href="{{ $player['spotifyUrl'] }}">{{ $player['entranceSong'] }}</a></li>
            @else
                <li>入場曲: {{ $player['entranceSong'] }}</li>
            @endif

        @endforeach
    </ul>
</body>
</html>
