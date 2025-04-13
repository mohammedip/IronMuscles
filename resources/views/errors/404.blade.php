@extends('errors.minimal2')

@section('title', '404 Not Found')

@section('content')

<div class="flex min-h-screen items-center justify-center">
    <div class="space-y-4 p-4">
        <div class="flex flex-col items-start space-y-3 sm:flex-row sm:items-center sm:space-x-3 sm:space-y-0">
            <p class="text-9xl font-semibold text-red-500">404</p>
            <div class="space-y-2">
                <h1 id="pageTitle" class="flex items-center space-x-2">
                    <svg
                        aria-hidden="true"
                        class="h-6 w-6 text-red-500"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                        />
                    </svg>
                    <span class="text-xl font-medium text-gray-600 dark:text-gray-300 sm:text-2xl">
                        Oops! Page not found.
                    </span>
                </h1>
                <p class="text-base font-normal text-gray-600 dark:text-gray-300">
                    The page you are looking for was not found.
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
