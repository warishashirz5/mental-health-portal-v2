<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mental Health Portal — @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-blue-900 text-white px-6 py-4 flex justify-between items-center shadow">
        <span class="font-bold text-xl">🧠 Mental Health Portal</span>
        @if(session('auth_user'))
        <div class="flex items-center gap-4">
            <span class="text-sm">Welcome, {{ session('auth_user.name') }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 px-4 py-1 rounded hover:bg-red-600 text-sm">Logout</button>
            </form>
        </div>
        @endif
    </nav>

    <main class="max-w-6xl mx-auto mt-8 px-4 pb-12">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 p-3 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-800 p-3 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-800 p-3 mb-4 rounded">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>