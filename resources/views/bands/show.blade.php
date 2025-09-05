<html>
<head>
    <title>{{ $band->name }} - Band Details</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $band->name }}</h1>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <p class="text-gray-700 mb-2"><span class="font-semibold">Genre:</span> {{ $band->genre }}</p>
        <p class="text-gray-700 mb-2"><span class="font-semibold">Founded in:</span> {{ $band->founded }}</p>
    </div>

    <div class="container mx-auto px-4 py-8">

        @if ($band->albums->count() > 0)
            <h2 class="text-xl font-bold mb-4">Albums by {{ $band->name }}</h2>
            <ul class="list-disc pl-5 mb-6">
                @foreach ($band->albums as $album)
                    <li><a href="{{ route('albums.show', $album->id) }}">{{ $album->name }}</a></li>
                @endforeach
            </ul>
        @else
            <p>No albums found for {{ $band->name }}.</p>
        @endif
        <div class="flex space-x-4 mt-6">
            @auth
                <a href="{{ route('bands.edit', $band->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Edit Band
                </a>
            <form action="{{ route('bands.destroy', $band->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Delete Band
                    </button>
            </form>
            @endauth
            <a href="{{ route('bands.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to All Bands
            </a>
        </div>
    </div>
</div>
</body>
</html>
