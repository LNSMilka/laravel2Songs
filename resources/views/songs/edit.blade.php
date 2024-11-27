<!DOCTYPE html>
<html>
<head>
    <title>Song Edit</title>
</head>
<body>
<h1>Song Edit</h1>
<form action="{{route('songs.update', $song->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{old('title', $song->title)}}" required>
    </div>
    <div>
        <label for="singer">Title:</label>
        <input type="text" name="singer" id="singer" value="{{old('singer', $song->singer)}}" required>
    </div>
    <button type="submit">Edit song</button>
</form>
</body>
</html>
