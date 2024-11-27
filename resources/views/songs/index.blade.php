<!DOCTYPE html>
<html>
<head>
    <title>Song List</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-3xl font-bold mb-6">Song List</h1>
    <div class="mb-6 space-x-4">
        <a href="{{ route('songs.create') }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">Create</a>
        <a href="{{ route('bands.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Bands</a>
        <a href="{{ route('albums.index') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">Albums</a>
    </div>
    <ul class="space-y-4">
        @foreach($songs as $song)
            <li class="flex items-center justify-between bg-white p-4 rounded shadow">
                <a href="{{ route('songs.show', $song->id) }}" class="text-blue-600 hover:underline">{{ $song->title }}</a>
                <div class="space-x-2">
                    <a href="{{ route('songs.destroy', $song->id) }}" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">Delete</a>
                    <a href="{{ route('songs.edit', $song->id) }}" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-300">Edit</a>
                </div>
            </li>
        @endforeach
    </ul>
</body>
</html>
