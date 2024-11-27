<!DOCTYPE html>
<html>
<head>
    <title>Song Detail</title>
</head>
<body>
<h1>Song Details</h1>
<p> <h2>{{ $song->title }}</h2></p>
<p>{{$song->singer}}</p>
<a href="{{route('index')}}">Go Back</a>
</body>
</html>
