<html>
<head>

</head>
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-4">Albums</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($albums as $album)
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold mb-2">{{ $album->title }}</h2>
                <p class="text-gray-600">Artist: {{ $album->artist }}</p>
                <p class="text-gray-600">Release Year: {{ $album->release_year }}</p>
            </div>
        @endforeach
    </div>
    <p class="text-gray-600">No albums found.</p>
</div>

</html>

