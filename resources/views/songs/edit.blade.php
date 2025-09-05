<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Edit Song</h1>

    <a href="{{ route('songs.index') }}" class="text-blue-500 hover:text-blue-700 mb-4 inline-block">
        &larr; Back to Songs
    </a>

    <form action="{{ route('songs.update', $songs->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $songs->title) }}" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="singer" class="block text-gray-700 text-sm font-bold mb-2">Singer:</label>
            <input type="text" name="singer" id="singer" value="{{ old('singer', $songs->singer) }}" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Albums:</label>
            <div class="mt-2 space-y-2">
                @foreach($albums as $album)
                    <div class="flex items-center">
                        <input type="checkbox" name="albums[]" value="{{ $album->id }}" id="album_{{ $album->id }}"
                               {{ $songs->albums->contains($album->id) ? 'checked' : '' }}
                               class="form-checkbox h-5 w-5 text-blue-600">
                        <label for="album_{{ $album->id }}" class="ml-2 text-gray-700">{{ $album->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Song
            </button>
        </div>
    </form>
</div>
</body>
</html>
