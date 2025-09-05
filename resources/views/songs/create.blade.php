<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Create New Song</title>
    @vite('resources/css/app.css')
</head>
<body class="container mx-auto px-4">
<h1 class="text-3xl font-bold mb-4">Create New Song</h1>
<a href="{{ route('songs.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block my-3">Go Back To Songs</a>

{{-- Manual entry form --}}
<form action="{{ route('songs.store') }}" method="POST" class="mb-8">
    @csrf
    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="singer" class="block text-gray-700 text-sm font-bold mb-2">Singer:</label>
        <input type="text" name="singer" id="singer" value="{{ old('singer') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Create Song
    </button>
</form>
    <H2 class="text-1xl font-bold mb-4">
        OR
    </H2>
    <h2 class="text-2xl font-bold mb-4">Add Song from API</h2>

<form action="{{ route('songs.create') }}" method="GET" class="mb-4 flex gap-2 items-center">
    <input
        type="text"
        name="title"
        id="api-search"
        value="{{ request('title') }}"
        placeholder="Search songs"
        class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none"
    />
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Search
    </button>
    <a href="{{ route('songs.create') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-3 rounded">
        Clear
    </a>
</form>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($songsFromAPI as $song)
            <form action="{{ route('songs.store') }}" method="POST" class="bg-white shadow rounded p-4 flex items-center justify-between">
                @csrf
                <div>
                    <div class="font-semibold">{{ $song['name'] ?? '' }}</div>
                    <div class="text-gray-600 text-sm">Artist: {{ $song['artist'] ?? '' }}</div>
                </div>
                <input type="hidden" name="title" value="{{ $song['name'] ?? '' }}">
                <input type="hidden" name="singer" value="{{ $song['artist'] ?? '' }}">
                <button type="submit" class="ml-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add
                </button>
            </form>
        @endforeach
    </div>
</body>
</html>
