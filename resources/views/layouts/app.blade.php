<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Student Registration System')
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- NAVBAR -->
    <nav class="bg-emerald-800 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4">

            <div class="flex items-center justify-between">

                <a href="{{ route('students.create') }}"
                   class="text-xl font-bold">
                    Student Registration
                </a>

                <div class="flex gap-3">

                    <a href="{{ route('students.create') }}"
                       class="px-4 py-2 rounded-lg hover:bg-emerald-700 transition">
                        Register
                    </a>

                    <a href="{{ route('students.index') }}"
                       class="px-4 py-2 rounded-lg hover:bg-emerald-700 transition">
                        Students
                    </a>

                </div>

            </div>

        </div>
    </nav>


    <!-- MAIN CONTENT -->
    <main class="min-h-screen">

        @yield('content')

    </main>


    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-300 text-center py-6">

        <p>
            Student Registration System
        </p>

        <p class="text-sm mt-1">
            ITST 302 – Client-Server Technologies
        </p>

    </footer>

</body>
</html>