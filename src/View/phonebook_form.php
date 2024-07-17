<!DOCTYPE html>
<html lang="en">
<head>
    <title>Phonebook</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex flex-col items-center p-10">
<form action="/add" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-sm">
    <div class="mb-4">
        <label for="lastname" class="block text-gray-700 text-sm font-bold mb-2">Last name:</label>
        <input type="text" id="lastname" name="lastname" placeholder="Smith" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="firstname" class="block text-gray-700 text-sm font-bold mb-2">First name:</label>
        <input type="text" id="firstname" name="firstname" placeholder="Will" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="mb-4">
        <label for="number" class="block text-gray-700 text-sm font-bold mb-2">Phone number:</label>
        <input type="text" id="phonenumber" name="phonenumber" placeholder="0151567412" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add</button>
    </div>
</form>

<form action="/search" method="get" class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-sm">
    <div class="mb-4">
        <label for="input" class="block text-gray-700 text-sm font-bold mb-2">Search:</label>
        <input type="text" id="search" name="search" placeholder="567" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>
    <div class="flex items-center justify-between">
        <input type="submit" value="Search"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
    </div>
</form>
</body>
</html>
