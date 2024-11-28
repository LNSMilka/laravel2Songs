<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Create New Album</title>
    @vite('resources/css/app.css')
</head>
<body class="container mx-auto px-4">
<h1 class="text-3xl font-bold mb-4">Create New Album</h1>
<a href="{{ route('albums.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block my-3">Go Back To Albums</a>

<form action="{{ route('albums.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
        <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Year:</label>
        <input type="number" name="year" id="year" value="{{ old('year') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-4">
        <label for="times_sold" class="block text-gray-700 text-sm font-bold mb-2">Times Sold:</label>
        <input type="number" name="times_sold" id="times_sold" value="{{ old('times_sold') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Create Album
    </button>
</form>
</body>
</html>
