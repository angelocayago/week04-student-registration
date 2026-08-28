@extends('layouts.app')

@section('title', 'Registered Students')

@section('content')

<div class="max-w-7xl mx-auto px-4 py-10">

    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-8">

        <div>

            <h1 class="text-3xl font-bold text-emerald-800">
                Registered Students
            </h1>

            <p class="text-gray-600 mt-1">
                List of registered students
            </p>

        </div>

        <a
            href="{{ route('students.create') }}"
            class="bg-emerald-700 text-white px-6 py-3 rounded-lg font-bold hover:bg-emerald-800 transition"
        >
            + Register Student
        </a>

    </div>


    @if(session('success'))

        <div class="mb-6 p-4 rounded-lg bg-green-100 border border-green-300 text-green-800">

            <strong>Success!</strong>
            {{ session('success') }}

        </div>

    @endif


    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        @if($students->count() > 0)

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-emerald-800 text-white">

                        <tr>

                            <th class="px-6 py-4 text-left">
                                Student
                            </th>

                            <th class="px-6 py-4 text-left">
                                Student ID
                            </th>

                            <th class="px-6 py-4 text-left">
                                Email
                            </th>

                            <th class="px-6 py-4 text-left">
                                Program
                            </th>

                            <th class="px-6 py-4 text-left">
                                Year
                            </th>

                            <th class="px-6 py-4 text-center">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($students as $student)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <img
                                            src="{{ asset('storage/' . $student->profile_picture) }}"
                                            class="w-12 h-12 rounded-full object-cover"
                                            alt="Profile"
                                        >

                                        <div>

                                            <p class="font-bold">
                                                {{ $student->first_name }}
                                                {{ $student->last_name }}
                                            </p>

                                            <p class="text-sm text-gray-500">
                                                {{ $student->gender }}
                                            </p>

                                        </div>

                                    </div>

                                </td>


                                <td class="px-6 py-4">
                                    {{ $student->student_id }}
                                </td>


                                <td class="px-6 py-4">
                                    {{ $student->email }}
                                </td>


                                <td class="px-6 py-4">
                                    {{ $student->program }}
                                </td>


                                <td class="px-6 py-4">
                                    {{ $student->year_level }}
                                </td>


                                <td class="px-6 py-4 text-center">

                                    <a
                                        href="{{ route('students.show', $student->id) }}"
                                        class="inline-block bg-emerald-700 text-white px-4 py-2 rounded-lg hover:bg-emerald-800"
                                    >
                                        View
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center py-16">

                <div class="text-5xl mb-4">
                    🎓
                </div>

                <h2 class="text-2xl font-bold">
                    No Students Registered
                </h2>

                <p class="text-gray-500 mt-2 mb-6">
                    Start by registering your first student.
                </p>

                <a
                    href="{{ route('students.create') }}"
                    class="inline-block bg-emerald-700 text-white px-6 py-3 rounded-lg font-bold hover:bg-emerald-800"
                >
                    Register Student
                </a>

            </div>

        @endif

    </div>

</div>

@endsection