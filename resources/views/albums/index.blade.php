<html>
<head>
    <title>Albums List</title>
    @vite('resources/css/app.css')
</head>
</html>
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">Albums</h1>
    @auth
    <a href="{{ route('albums.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create New Album</a>
    @endauth
    <a href="{{ route('bands.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Go to Bands</a>
    <a href="{{ route('songs.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Go to Songs</a>@auth
        <a href="{{ route('dashboard') }}" class="inline-block float-right">
            <img src="data:image/jpeg;base64,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" class="rounded-full border-0 w-12 h-12" alt="Profile">
        </a>
    @else
        <a href="{{ route('dashboard') }}" class="inline-block float-right">
            <img src="https://lastfm.freetls.fastly.net/i/u/avatar42s/818148bf682d429dc215c1705eb27b98.png" class="rounded-full border-0 w-15 h-15" alt="Profile">
        </a>
    @endauth
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($albums as $album)
            <div class="bg-white shadow-md rounded-lg p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $album->name }}</h2>
                <p class="text-gray-600 mb-2">Year: {{ $album->year }}</p>
                <p class="text-gray-600 mb-2">Times sold: {{ $album->times_sold }}</p>
                <a href="{{ route('albums.show', $album->id) }}" class="text-blue-500 hover:underline">View Details</a>
            </div>
        @endforeach
    </div>
</div>
