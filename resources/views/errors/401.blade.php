@extends('errors.minimal2')

@section('title', '401 Unauthorized')

@section('content')

<div class="flex min-h-screen items-center justify-center">
    <div class="space-y-4 p-4">
        <div class="flex flex-col items-start space-y-3 sm:flex-row sm:items-center sm:space-x-3 sm:space-y-0">
            <p class="text-9xl font-semibold text-yellow-500">401</p>
            <div class="space-y-2">
                <h1 id="pageTitle" class="flex items-center space-x-2">
                    <svg
                        aria-hidden="true"
                        class="h-6 w-6 text-yellow-500"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 11V7m0 8h.01M4.5 12a7.5 7.5 0 0115 0v1.5a2.5 2.5 0 01-2.5 2.5h-10a2.5 2.5 0 01-2.5-2.5V12z"
                        />
                    </svg>
                    <span class="text-xl font-medium text-gray-600 dark:text-gray-300 sm:text-2xl">
                        Unauthorized Access
                    </span>
                </h1>
                <p class="text-base font-normal text-gray-600 dark:text-gray-300">
                    You do not have permission to access this page.
                </p>
                <p class="text-base font-normal text-gray-600 dark:text-gray-300">
                    Please
                    <a href="{{ url('/login') }}" class="text-blue-600 hover:underline dark:text-blue-500">log in</a>
                    to continue.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
