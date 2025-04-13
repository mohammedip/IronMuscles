@extends('errors.minimal2')

@section('title', '500 Internal Server Error')

@section('content')

<div class="flex min-h-screen items-center justify-center">
    <div class="space-y-4 p-4">
        <div class="flex flex-col items-start space-y-3 sm:flex-row sm:items-center sm:space-x-3 sm:space-y-0">
            <p class="text-9xl font-semibold text-red-600">500</p>
            <div class="space-y-2">
                <h1 id="pageTitle" class="flex items-center space-x-2">
                    <svg
                        aria-hidden="true"
                        class="h-6 w-6 text-red-600"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4m0 4h.01M5 12h14"
                        />
                    </svg>
                    <span class="text-xl font-medium text-gray-600 dark:text-gray-300 sm:text-2xl">
                        Internal Server Error
                    </span>
                </h1>
                <p class="text-base font-normal text-gray-600 dark:text-gray-300">
                    Something went wrong on our end.
                </p>
                <p class="text-base font-normal text-gray-600 dark:text-gray-300">
                    You may return to
                    <a href="{{ url('/') }}" class="text-blue-600 hover:underline dark:text-blue-500">home page</a>
                    .
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
