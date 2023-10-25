<!DOCTYPE html>
<html>
<head>
    <title>Players</title>
</head>
<body>
    <h1>格闘家の入場曲</h1>
    <ul>
        @foreach ($players as $player)
            <li><strong>格闘家:</strong> {{ $player['name'] }}</li>
            <li><strong>入場曲:</strong> {{ $player['entranceSong'] }}</li>
        @endforeach
    </ul>
</body>
</html>
