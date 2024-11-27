<!DOCTYPE html>
<html>
<head>
    <title>Song Create</title>
</head>
<body>
<a href="{{route('songs.index')}}">Back</a>
<h1>Song Create</h1>
<form action="{{ route('songs.store') }}" method="post">
    @csrf
    <label for="name">Song Name:</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}">
    <br><br>

    <label for="artist">Singer:</label>
    <input type="text" id="singer" name="singer" value="{{ old('singer') }}">
    <br><br>

    <button type="submit">Create Song</button>
</form>
</body>
</html>
