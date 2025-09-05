<html>
<head>
    <title>{{ $albums->name }} - Albums Details</title>
@vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $albums->name }}</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <p class="text-gray-700 mb-2"><span class="font-semibold">year:</span> {{ $albums->year }}</p>
        <p class="text-gray-700 mb-2"><span class="font-semibold">Times Sold:</span> {{ $albums->times_sold }}</p>
        @if ($albums->band)
            <a href="{{ route('bands.show', $albums->band->id) }}" class="text-gray-700 mb-2">
                <span class="font-semibold">Band:</span> {{ $albums->band->name }}
            </a>
        @else
            <p class="text-gray-700 mb-2">
                <span class="font-semibold">Band:</span> N/A
            </p>
        @endif


    </div>
    <h2 class="text-xl font-bold mb-4">Songs on This Album</h2>
    <ul class="list-disc pl-5 mb-6">
        @foreach($albums->songs as $song)
            <li><a href="{{route('songs.show', $song->id)}}">{{ $song->title }}</a> </li>
        @endforeach
    </ul>
    <div class="flex space-x-4">
        @auth()
        <a href="{{ route('albums.edit', $albums->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Edit Album
        </a>
        <form action="{{ route('albums.destroy', $albums->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Delete Album
            </button>
        </form>
        @endauth
        <a href="{{ route('albums.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Back to All Albums
        </a>
    </div>
</div>
</body>
</html>
