<html>
<head>
    <title>Edit Band</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-4">Edit Band</h1>

        <form action="{{ route('bands.update', $band->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $band->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                <input type="text" name="genre" id="genre" value="{{ old('genre', $band->genre) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="founded" class="block text-gray-700 text-sm font-bold mb-2">Founded Year:</label>
                <input type="number" name="founded" id="founded" value="{{ old('founded', $band->founded) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Band
            </button>
        </form>
    </div>
</body>
</html>
