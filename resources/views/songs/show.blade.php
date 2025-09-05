<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $songs->title }} - Song Details</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $songs->title }}</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <p class="text-gray-700 mb-2"><span class="font-semibold">Singer:</span> {{ $songs->singer }}</p>

        <h2 class="text-xl font-semibold mt-4 mb-2">Albums:</h2>
        @if($songs->albums->count() > 0)
            <ul class="list-disc list-inside">
                @foreach($songs->albums as $album)
                    <li class="text-gray-700"><a href="{{ route('albums.show', $album->id)}}">{{ $album->name }} ({{ $album->year }})</a></li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-700">This song is not associated with any albums.</p>
        @endif
    </div>

    <div class="flex space-x-4">
        @auth
        <a href="{{ route('songs.edit', $songs->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Edit Song
        </a>
        @endauth
        <form action="{{ route('songs.destroy', $songs->id) }}" method="POST">
            @auth
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Delete Song
            </button>
            @endauth
        </form>

        <a href="{{ route('songs.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to All Songs
        </a>
    </div>
</div>
</body>
</html>
