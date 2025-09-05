<html>
<head>
    <title>Edit Album</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="container mx-auto px-4">
    <a href="{{ route('albums.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block my-3">Go Back To Albums</a>
    <h1 class="text-3xl font-bold mb-4">Edit Album</h1>

    <form action="{{ route('albums.update', $albums->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $albums->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Year:</label>
            <input type="number" name="year" id="year" value="{{ old('year', $albums->year) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="times_sold" class="block text-gray-700 text-sm font-bold mb-2">times_sold:</label>
            <input type="number" name="times_sold" id="times_sold" value="{{ old('times_sold', $albums->times_sold) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="band_id" class="block text-gray-700 text-sm font-bold mb-2">Band:</label>
            <select name="band_id" id="band_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($bands as $band)
                    <option value="{{ $band->id }}" {{ $albums->band_id == $band->id ? 'selected' : '' }}>{{ $band->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Songs:</label>
            @foreach($songs as $song)
                <div>
                    <input type="checkbox" name="songs[]" value="{{ $song->id }}" id="song_{{ $song->id }}"
                        {{ $albums->songs->contains($song->id) ? 'checked' : '' }}>
                    <label for="song_{{ $song->id }}">{{ $song->title }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Update Album
        </button>
    </form>
</div>
</body>
</html>
