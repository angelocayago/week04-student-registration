@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')

<div class="max-w-4xl mx-auto px-4 py-10">

    @if(session('success'))

        <div class="mb-6 p-4 rounded-lg bg-green-100 border border-green-300 text-green-800">

            <strong>Success!</strong>
            {{ session('success') }}

        </div>

    @endif


    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

        <!-- HEADER -->
        <div class="bg-emerald-800 text-white px-8 py-8">

            <h1 class="text-3xl font-bold">
                Student Profile
            </h1>

            <p class="mt-2 text-emerald-100">
                Registration information
            </p>

        </div>


        <div class="p-8">

            <!-- PROFILE -->
            <div class="flex flex-col md:flex-row items-center md:items-start gap-8 mb-10">

                <div>

                    <img
                        src="{{ asset('storage/' . $student->profile_picture) }}"
                        alt="Student Profile Picture"
                        class="w-40 h-40 rounded-full object-cover border-4 border-emerald-600 shadow-lg"
                    >

                </div>


                <div class="text-center md:text-left">

                    <h2 class="text-3xl font-bold text-gray-800">

                        {{ $student->first_name }}

                        @if($student->middle_name)
                            {{ $student->middle_name }}
                        @endif

                        {{ $student->last_name }}

                    </h2>

                    <p class="text-emerald-700 font-semibold mt-2">
                        Student ID: {{ $student->student_id }}
                    </p>

                    <p class="text-gray-600 mt-1">
                        {{ $student->program }}
                    </p>

                    <p class="text-gray-600">
                        {{ $student->year_level }}
                    </p>

                </div>

            </div>


            <!-- DETAILS -->
            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-gray-50 rounded-lg p-5">

                    <p class="text-sm text-gray-500">
                        Email Address
                    </p>

                    <p class="font-semibold mt-1">
                        {{ $student->email }}
                    </p>

                </div>


                <div class="bg-gray-50 rounded-lg p-5">

                    <p class="text-sm text-gray-500">
                        Mobile Number
                    </p>

                    <p class="font-semibold mt-1">
                        {{ $student->mobile_number }}
                    </p>

                </div>


                <div class="bg-gray-50 rounded-lg p-5">

                    <p class="text-sm text-gray-500">
                        Date of Birth
                    </p>

                    <p class="font-semibold mt-1">
                        {{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}
                    </p>

                </div>


                <div class="bg-gray-50 rounded-lg p-5">

                    <p class="text-sm text-gray-500">
                        Gender
                    </p>

                    <p class="font-semibold mt-1">
                        {{ $student->gender }}
                    </p>

                </div>


                <div class="bg-gray-50 rounded-lg p-5 md:col-span-2">

                    <p class="text-sm text-gray-500">
                        Address
                    </p>

                    <p class="font-semibold mt-1">
                        {{ $student->address }}
                    </p>

                </div>

            </div>


            <!-- BUTTONS -->
            <div class="mt-8 flex flex-col sm:flex-row gap-4">

                <a
                    href="{{ route('students.edit', $student->id) }}"
                    class="flex-1 text-center bg-amber-600 text-white font-bold py-3 rounded-lg hover:bg-amber-700 transition"
                >
                    Edit Profile
                </a>

                <a
                    href="{{ route('students.create') }}"
                    class="flex-1 text-center bg-emerald-700 text-white font-bold py-3 rounded-lg hover:bg-emerald-800 transition"
                >
                    Register Another Student
                </a>

                <a
                    href="{{ route('students.index') }}"
                    class="flex-1 text-center bg-gray-200 text-gray-800 font-bold py-3 rounded-lg hover:bg-gray-300 transition"
                >
                    View All Students
                </a>

            </div>

        </div>

    </div>

</div>

@endsection