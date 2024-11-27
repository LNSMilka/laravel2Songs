<html>
<head>
    <title>Bands List</title>
    @vite('resources/css/app.css')
</head>
</html>
<div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-4">Bands</h1>
        <a href="{{ route('bands.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Create New Band</a>
    <a href="{{ route('albums.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Go To Albums</a>
    <a href="{{ route('songs.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Go Back To Songs</a>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($bands as $band)
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $band->name }}</h2>
                        <p class="text-gray-600 mb-2">Genre: {{ $band->genre }}</p>
                        <p class="text-gray-600 mb-2">Founded in: {{ $band->founded }}</p>
                        <a href="{{ route('bands.show', $band->id) }}" class="text-blue-500 hover:underline">View Details</a>
                    </div>
                @endforeach
            </div>
</div>
