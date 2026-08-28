@extends('layouts.app')

@section('title', 'Student Registration')

@section('content')

<div class="max-w-5xl mx-auto px-4 py-10">

    <!-- HEADER -->
    <div class="text-center mb-8">

        <h1 class="text-4xl font-bold text-emerald-800">
            Student Registration
        </h1>

        <p class="text-gray-600 mt-2">
            Register your student information below.
        </p>

    </div>


    <!-- SUCCESS MESSAGE -->
    @if(session('success'))

        <div class="mb-6 p-4 rounded-lg bg-green-100 border border-green-300 text-green-800">

            <strong>Success!</strong>

            {{ session('success') }}

        </div>

    @endif


    <!-- VALIDATION ERRORS -->
    @if($errors->any())

        <div class="mb-6 p-5 rounded-lg bg-red-100 border border-red-300 text-red-800">

            <h3 class="font-bold mb-2">
                Please fix the following errors:
            </h3>

            <ul class="list-disc ml-5 space-y-1">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- FORM -->
    <form action="{{ route('students.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow-xl p-8">

        @csrf


        <!-- SECTION: PERSONAL INFORMATION -->
        <div class="mb-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-5 border-b pb-3">
                Personal Information
            </h2>

            <div class="grid md:grid-cols-2 gap-6">


                <!-- STUDENT ID -->
                <div>

                    <label class="block font-semibold mb-2">
                        Student ID *
                    </label>

                    <input
                        type="text"
                        name="student_id"
                        value="{{ old('student_id') }}"
                        placeholder="e.g. 2026-00001"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                    @error('student_id')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- FIRST NAME -->
                <div>

                    <label class="block font-semibold mb-2">
                        First Name *
                    </label>

                    <input
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        placeholder="First name"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                    @error('first_name')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- MIDDLE NAME -->
                <div>

                    <label class="block font-semibold mb-2">
                        Middle Name
                    </label>

                    <input
                        type="text"
                        name="middle_name"
                        value="{{ old('middle_name') }}"
                        placeholder="Middle name (optional)"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                    @error('middle_name')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- LAST NAME -->
                <div>

                    <label class="block font-semibold mb-2">
                        Last Name *
                    </label>

                    <input
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        placeholder="Last name"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                    @error('last_name')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- EMAIL -->
                <div>

                    <label class="block font-semibold mb-2">
                        Email Address *
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="student@example.com"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                    @error('email')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- MOBILE -->
                <div>

                    <label class="block font-semibold mb-2">
                        Mobile Number *
                    </label>

                    <input
                        type="text"
                        name="mobile_number"
                        value="{{ old('mobile_number') }}"
                        placeholder="09123456789"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                    @error('mobile_number')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- DATE OF BIRTH -->
                <div>

                    <label class="block font-semibold mb-2">
                        Date of Birth *
                    </label>

                    <input
                        type="date"
                        name="date_of_birth"
                        value="{{ old('date_of_birth') }}"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                    @error('date_of_birth')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- GENDER -->
                <div>

                    <label class="block font-semibold mb-2">
                        Gender *
                    </label>

                    <select
                        name="gender"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                        <option value="">
                            Select Gender
                        </option>

                        <option value="Male"
                            {{ old('gender') == 'Male' ? 'selected' : '' }}>
                            Male
                        </option>

                        <option value="Female"
                            {{ old('gender') == 'Female' ? 'selected' : '' }}>
                            Female
                        </option>

                        <option value="Other"
                            {{ old('gender') == 'Other' ? 'selected' : '' }}>
                            Other
                        </option>

                    </select>

                    @error('gender')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>


        <!-- ACADEMIC INFORMATION -->
        <div class="mb-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-5 border-b pb-3">
                Academic Information
            </h2>

            <div class="grid md:grid-cols-2 gap-6">


                <!-- PROGRAM -->
                <div>

                    <label class="block font-semibold mb-2">
                        Program *
                    </label>

                    <select
                        name="program"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                        <option value="">
                            Select Program
                        </option>

                        <option value="BS Information Technology"
                            {{ old('program') == 'BS Information Technology' ? 'selected' : '' }}>
                            BS Information Technology
                        </option>

                        <option value="BS Computer Science"
                            {{ old('program') == 'BS Computer Science' ? 'selected' : '' }}>
                            BS Computer Science
                        </option>

                        <option value="BS Information Systems"
                            {{ old('program') == 'BS Information Systems' ? 'selected' : '' }}>
                            BS Information Systems
                        </option>

                        <option value="BS Computer Engineering"
                            {{ old('program') == 'BS Computer Engineering' ? 'selected' : '' }}>
                            BS Computer Engineering
                        </option>

                    </select>

                    @error('program')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- YEAR LEVEL -->
                <div>

                    <label class="block font-semibold mb-2">
                        Year Level *
                    </label>

                    <select
                        name="year_level"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >

                        <option value="">
                            Select Year Level
                        </option>

                        @foreach([
                            '1st Year',
                            '2nd Year',
                            '3rd Year',
                            '4th Year',
                            '5th Year'
                        ] as $year)

                            <option value="{{ $year }}"
                                {{ old('year_level') == $year ? 'selected' : '' }}>

                                {{ $year }}

                            </option>

                        @endforeach

                    </select>

                    @error('year_level')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- ADDRESS -->
                <div class="md:col-span-2">

                    <label class="block font-semibold mb-2">
                        Address *
                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        placeholder="Complete address"
                        class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-emerald-500 focus:outline-none"
                    >{{ old('address') }}</textarea>

                    @error('address')
                        <p class="text-red-600 text-sm mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>


        <!-- PROFILE PICTURE -->
        <div class="mb-8">

            <h2 class="text-2xl font-bold text-gray-800 mb-5 border-b pb-3">
                Profile Picture
            </h2>

            <label class="block font-semibold mb-2">
                Upload Profile Picture *
            </label>

            <input
                type="file"
                name="profile_picture"
                accept=".jpg,.jpeg,.png"
                class="w-full border rounded-lg px-4 py-3 bg-gray-50"
            >

            <p class="text-gray-500 text-sm mt-2">
                JPG or PNG only. Maximum file size: 2 MB.
            </p>

            @error('profile_picture')
                <p class="text-red-600 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>


        <!-- BUTTONS -->
        <div class="flex flex-col sm:flex-row gap-4">

            <button
                type="submit"
                class="flex-1 bg-emerald-700 text-white font-bold py-3 rounded-lg hover:bg-emerald-800 transition"
            >
                Register Student
            </button>

            <a
                href="{{ route('students.index') }}"
                class="flex-1 text-center bg-gray-200 text-gray-800 font-bold py-3 rounded-lg hover:bg-gray-300 transition"
            >
                View Students
            </a>

        </div>

    </form>

</div>

@endsection