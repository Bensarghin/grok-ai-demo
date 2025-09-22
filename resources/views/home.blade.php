<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <form action="{{ route('prompt.submit') }}" method="POST" class="max-w-2xl mx-auto p-4">
        @csrf
        <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <textarea id="prompt" rows="4" name="prompt"
                    class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                    placeholder="What do you want to know..." required></textarea>
            </div>
            <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600 border-gray-200">
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                    Send
                </button>
            </div>
        </div>
        @error('prompt')
            <p class="text-red-200 text-xs mt-1">{{ $message }}</p>
        @enderror
    </form>

    @if (session('response'))
        <div class="max-w-2xl mx-auto p-4">
            <div class="p-4 mb-4 text-sm text-gray-700 bg-gray-100 rounded-lg dark:bg-gray-200 dark:text-gray-800"
                role="alert">
                <span class="font-medium">Response:</span> {{ session('response') }}
            </div>
        </div>
    @endif
</body>

</html>
