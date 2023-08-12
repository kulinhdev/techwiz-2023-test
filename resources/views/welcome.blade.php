<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* ! tailwindcss v3.2.4 | MIT License | https://tailwindcss.com */
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        ::after,
        ::before {
            --tw-content: ''
        }

        html {
            line-height: 1.5;
            -webkit-text-size-adjust: 100%;
            -moz-tab-size: 4;
            tab-size: 4;
            font-family: Figtree, sans-serif;
            font-feature-settings: normal
        }

        body {
            margin: 0;
            line-height: inherit
        }

        hr {
            height: 0;
            color: inherit;
            border-top-width: 1px
        }

        abbr:where([title]) {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: inherit;
            font-weight: inherit
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        b,
        strong {
            font-weight: bolder
        }

        code,
        kbd,
        pre,
        samp {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1em
        }

        small {
            font-size: 80%
        }

        sub,
        sup {
            font-size: 75%;
            line-height: 0;
            position: relative;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        table {
            text-indent: 0;
            border-color: inherit;
            border-collapse: collapse
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            font-size: 100%;
            font-weight: inherit;
            line-height: inherit;
            color: inherit;
            margin: 0;
            padding: 0
        }

        button,
        select {
            text-transform: none
        }

        [type=button],
        [type=reset],
        [type=submit],
        button {
            -webkit-appearance: button;
            background-color: transparent;
            background-image: none
        }

        :-moz-focusring {
            outline: auto
        }

        :-moz-ui-invalid {
            box-shadow: none
        }

        progress {
            vertical-align: baseline
        }

        ::-webkit-inner-spin-button,
        ::-webkit-outer-spin-button {
            height: auto
        }

        [type=search] {
            -webkit-appearance: textfield;
            outline-offset: -2px
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-file-upload-button {
            -webkit-appearance: button;
            font: inherit
        }

        summary {
            display: list-item
        }

        blockquote,
        dd,
        dl,
        figure,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        p,
        pre {
            margin: 0
        }

        fieldset {
            margin: 0;
            padding: 0
        }

        legend {
            padding: 0
        }

        menu,
        ol,
        ul {
            list-style: none;
            margin: 0;
            padding: 0
        }

        textarea {
            resize: vertical
        }

        input::placeholder,
        textarea::placeholder {
            opacity: 1;
            color: #9ca3af
        }

        [role=button],
        button {
            cursor: pointer
        }

        :disabled {
            cursor: default
        }

        audio,
        canvas,
        embed,
        iframe,
        img,
        object,
        svg,
        video {
            display: block;
            vertical-align: middle
        }

        img,
        video {
            max-width: 100%;
            height: auto
        }

        [hidden] {
            display: none
        }

        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::-webkit-backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .relative {
            position: relative
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .mx-6 {
            margin-left: 1.5rem;
            margin-right: 1.5rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-16 {
            margin-top: 4rem
        }

        .mt-6 {
            margin-top: 1.5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .mr-1 {
            margin-right: 0.25rem
        }

        .flex {
            display: flex
        }

        .inline-flex {
            display: inline-flex
        }

        .grid {
            display: grid
        }

        .h-16 {
            height: 4rem
        }

        .h-7 {
            height: 1.75rem
        }

        .h-6 {
            height: 1.5rem
        }

        .h-5 {
            height: 1.25rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .w-auto {
            width: auto
        }

        .w-16 {
            width: 4rem
        }

        .w-7 {
            width: 1.75rem
        }

        .w-6 {
            width: 1.5rem
        }

        .w-5 {
            width: 1.25rem
        }

        .max-w-7xl {
            max-width: 80rem
        }

        .shrink-0 {
            flex-shrink: 0
        }

        .scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .gap-6 {
            gap: 1.5rem
        }

        .gap-4 {
            gap: 1rem
        }

        .self-center {
            align-self: center
        }

        .rounded-lg {
            border-radius: 0.5rem
        }

        .rounded-full {
            border-radius: 9999px
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-red-50 {
            --tw-bg-opacity: 1;
            background-color: rgb(254 242 242 / var(--tw-bg-opacity))
        }

        .bg-dots-darker {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
        }

        .from-gray-700\/50 {
            --tw-gradient-from: rgb(55 65 81 / 0.5);
            --tw-gradient-to: rgb(55 65 81 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to)
        }

        .via-transparent {
            --tw-gradient-to: rgb(0 0 0 / 0);
            --tw-gradient-stops: var(--tw-gradient-from), transparent, var(--tw-gradient-to)
        }

        .bg-center {
            background-position: center
        }

        .stroke-red-500 {
            stroke: #ef4444
        }

        .stroke-gray-400 {
            stroke: #9ca3af
        }

        .p-6 {
            padding: 1.5rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .text-center {
            text-align: center
        }

        .text-right {
            text-align: right
        }

        .text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem
        }

        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem
        }

        .font-semibold {
            font-weight: 600
        }

        .text-uppercase {
            text-transform: uppercase
        }

        .leading-relaxed {
            line-height: 1.625
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .underline {
            -webkit-text-decoration-line: underline;
            text-decoration-line: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .shadow-2xl {
            --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .shadow-gray-500\/20 {
            --tw-shadow-color: rgb(107 114 128 / 0.2);
            --tw-shadow: var(--tw-shadow-colored)
        }

        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms
        }

        .selection\:bg-red-500 *::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white *::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .selection\:bg-red-500::selection {
            --tw-bg-opacity: 1;
            background-color: rgb(239 68 68 / var(--tw-bg-opacity))
        }

        .selection\:text-white::selection {
            --tw-text-opacity: 1;
            color: rgb(255 255 255 / var(--tw-text-opacity))
        }

        .hover\:text-gray-900:hover {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .hover\:text-gray-700:hover {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .focus\:rounded-sm:focus {
            border-radius: 0.125rem
        }

        .focus\:outline:focus {
            outline-style: solid
        }

        .focus\:outline-2:focus {
            outline-width: 2px
        }

        .focus\:outline-red-500:focus {
            outline-color: #ef4444
        }

        .group:hover .group-hover\:stroke-gray-600 {
            stroke: #4b5563
        }

        .z-10 {
            z-index: 10
        }

        @media (prefers-reduced-motion: no-preference) {
            .motion-safe\:hover\:scale-\[1\.01\]:hover {
                --tw-scale-x: 1.01;
                --tw-scale-y: 1.01;
                transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-800\/50 {
                background-color: rgb(31 41 55 / 0.5)
            }

            .dark\:bg-red-800\/20 {
                background-color: rgb(153 27 27 / 0.2)
            }

            .dark\:bg-dots-lighter {
                background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E")
            }

            .dark\:bg-gradient-to-bl {
                background-image: linear-gradient(to bottom left, var(--tw-gradient-stops))
            }

            .dark\:stroke-gray-600 {
                stroke: #4b5563
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:shadow-none {
                --tw-shadow: 0 0 #0000;
                --tw-shadow-colored: 0 0 #0000;
                box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
            }

            .dark\:ring-1 {
                --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
                --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
                box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)
            }

            .dark\:ring-inset {
                --tw-ring-inset: inset
            }

            .dark\:ring-white\/5 {
                --tw-ring-color: rgb(255 255 255 / 0.05)
            }

            .dark\:hover\:text-white:hover {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .group:hover .dark\:group-hover\:stroke-gray-400 {
                stroke: #9ca3af
            }
        }

        @media (min-width: 640px) {
            .sm\:fixed {
                position: fixed
            }

            .sm\:top-0 {
                top: 0px
            }

            .sm\:right-0 {
                right: 0px
            }

            .sm\:ml-0 {
                margin-left: 0px
            }

            .sm\:flex {
                display: flex
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-center {
                justify-content: center
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:gap-8 {
                gap: 2rem
            }

            .lg\:p-8 {
                padding: 2rem
            }
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="header">
            <div class="sm:fixed sm:top-0 sm:left-0 p-6 text-right z-10">
                <a href="{{ route('home') }}"
                    class="ml-4 font-semibold text-uppercase text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Bkap_01</a>
            </div>
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
                @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <svg viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M800.3741 715.205382l-26.369787 44.840142a25.935191 25.935191 0 0 0-3.579031 13.140156v14.520639a45.364215 45.364215 0 0 0 5.611409 21.84487l13.485277 24.529143 31.175914-66.467714 5.867054-64.588723a1.712822 1.712822 0 0 0-1.70004-1.866209 28.402165 28.402165 0 0 0-24.490796 14.047696zM183.962749 302.798783h-7.043021l-14.060478 16.335719 10.570923 31.482688 0.677459 2.096289a12.386003 12.386003 0 0 0 17.153783 7.362578 19.927532 19.927532 0 0 0 11.043866-21.090717l-3.195563-20.068137zM169.352634 731.247109h24.452449a16.616928 16.616928 0 0 1 15.965034 11.900277l3.553466 11.887495A20.643338 20.643338 0 0 0 229.454786 769.491609c7.413707 1.278225 15.696606 2.735402 17.42221 2.735402s12.501043 7.963343 21.72983 15.134187a17.217694 17.217694 0 0 1 2.466975 24.938175l-2.083508 2.403064q-0.268427 0.306774-0.562419 0.600765l-22.113297 22.35616L193.012584 801.447241l-29.309706-61.226991a6.263304 6.263304 0 0 1 5.649756-8.973141zM315.862814 146.484615l-30.089423 37.375307a11.248382 11.248382 0 0 1-0.805282 0.894758L265.193964 204.516042a11.248382 11.248382 0 0 0-1.112056 1.278226l-18.930516 25.807368a11.248382 11.248382 0 0 0-2.070725 8.244553l3.834676 26.676561a11.248382 11.248382 0 0 1 0 3.323386l-0.102258 0.62633a11.248382 11.248382 0 0 0 18.010194 10.634834l72.526502-56.114089a11.248382 11.248382 0 0 0 4.37153-9.062617c-0.153387-10.507012-0.421814-32.28797 0.089476-34.320348s25.82015-21.576442 36.250468-29.527004a11.2356 11.2356 0 0 0 4.42266-8.947577v-15.006365a11.248382 11.248382 0 0 0-16.616929-9.880681l-46.565746 25.411118a11.248382 11.248382 0 0 0-3.438426 2.824878z"
                            fill="#2FA65B"></path>
                        <path
                            d="M509.194385 93.374356a5.483586 5.483586 0 0 0-0.703024 4.831691c3.208345 9.791206 13.804833 44.520586 5.176812 50.553809-10.072415 7.043021-27.187851 21.359144-16.105638 31.214261s-45.300303-27.622448-60.408926 9.855117-34.21809 46.425142-33.233857 64.537594 15.09584 0 21.141846 0 6.966328 32.262406-17.115436 42.33482-73.497953-23.161442-66.467714 14.060478 26.178053 56.587032 6.046006 64.435336-20.132048 58.38933 2.019596 51.346309 34.307566-3.016612 34.307566-13.089027 11.00552-58.38933 24.081764-51.346309 29.194665 1.278225 32.211276 11.069431-18.125234 23.161442 3.016612 25.168255c14.418381 1.367701 19.467371-18.32975 21.231322-30.996962a5.483586 5.483586 0 0 1 8.947576-3.425644c9.100964 7.669352 25.359989 7.669352 26.676562 7.4904 10.826568-1.546653 31.712769-29.399181 32.722566-32.466922 0.383468-1.150403 2.671491-6.109917 5.355764-11.798019 6.135481-13.012333 12.015317-20.886201 25.564506-25.564505l9.714512-1.81508a15.172534 15.172534 0 0 0 2.876006-0.140605 5.496369 5.496369 0 0 1 2.901572 0.447379l28.721721 15.236445a5.496369 5.496369 0 0 1 1.086492 9.369391c-9.484431 7.26032-25.564505 19.556847-31.840591 24.375756-9.177657 7.043021-26.293094 0.217298-29.309706 17.115436s-2.019596 19.173379 9.062617 26.178054c7.988908 5.112901 25.423901-1.994031 34.512083-6.391127a5.483586 5.483586 0 0 1 7.669351 3.425644l6.570078 22.458418a5.496369 5.496369 0 0 1-4.077539 6.902417l-37.822685 8.449069-43.843127 8.321246a68.257229 68.257229 0 0 1-32.224059-1.648911l-21.934345-6.544513a5.496369 5.496369 0 0 0-0.830847-0.178951l-27.699141-3.834676a82.995166 82.995166 0 0 0-52.931308 10.455882l-37.324178 21.72983a5.509151 5.509151 0 0 0-0.805282 0.562419l-1.431612 1.278225a198.124916 198.124916 0 0 0-56.587033 79.697345l-0.306774 0.805282a71.209929 71.209929 0 0 0-1.955684 45.786029l7.388142 25.181038a99.062458 99.062458 0 0 0 29.143536 46.01611l0.715806 0.639112a100.979796 100.979796 0 0 0 56.996064 25.065998l25.845715 2.55645a36.173775 36.173775 0 0 0 31.508253-12.93564 5.496369 5.496369 0 0 1 4.333184-1.994031l14.201082 0.268427a46.75748 46.75748 0 0 1 44.367199 35.061719l6.889634 26.702126a5.496369 5.496369 0 0 0 1.278226 2.364717l21.44862 23.174224a32.224059 32.224059 0 0 1 7.004674 31.840591l-1.393266 4.665522a40.583652 40.583652 0 0 0 10.302496 41.619015L600.613056 887.088333a5.496369 5.496369 0 0 0 1.482741 1.022581l37.899379 17.895153a5.496369 5.496369 0 0 0 3.476773 0.409032l35.176759-7.375359a5.496369 5.496369 0 0 0 4.115886-3.745201l23.340393-75.082952 17.294388-48.649253a172.113032 172.113032 0 0 0 9.177657-73.868638l-1.201532-12.782253a116.535797 116.535797 0 0 1 5.04899-46.540182L754.153475 583.139148a5.496369 5.496369 0 0 1 0.383467-0.894758l28.721722-54.068929a5.496369 5.496369 0 0 0-5.803143-7.988908L740.617069 526.628809a42.462643 42.462643 0 0 1-18.764347-0.933105L674.750121 512.568331a5.496369 5.496369 0 0 1-3.131652-2.313588L641.771909 463.995771l-0.217298-0.357903a5.496369 5.496369 0 0 1 8.385158-6.800159l37.96329 32.364664a5.496369 5.496369 0 0 0 2.121854 1.124838l37.196355 10.085198a5.496369 5.496369 0 0 0 5.112901-1.278226L759.266376 474.860686a5.496369 5.496369 0 0 0 1.469959-2.185766l16.847009-45.84994a5.496369 5.496369 0 0 0-0.230081-4.320401l-5.534715-11.286729a5.496369 5.496369 0 0 0-4.320402-3.042176L718.056393 402.640958a5.496369 5.496369 0 0 1-3.400079-1.700039l-10.813786-11.504028a5.496369 5.496369 0 0 1 2.313588-8.947577l12.322092-3.988062a5.496369 5.496369 0 0 1 1.188749-0.242863l72.718235-6.697901a5.496369 5.496369 0 0 1 5.023426 2.339153L821.899414 407.280916a5.496369 5.496369 0 0 0 2.198547 1.853427L867.711007 429.483689a5.406893 5.406893 0 0 1 0.651895 0.357903c3.272257 2.109072 31.073656 20.170395 31.073656 23.953941V425.265545a5.44524 5.44524 0 0 0-0.153387-1.278225l-11.2356-46.016109a122.581803 122.581803 0 0 1-3.400079-23.902813L883.254226 320.834541a5.496369 5.496369 0 0 0-1.13762-3.118869L752.325613 149.130542a5.496369 5.496369 0 0 0-2.697056-1.891774L525.594015 76.489a5.496369 5.496369 0 0 0-6.173828 2.109071z"
                            fill="#178E3B"></path>
                        <path
                            d="M511.993698 965.558582a453.233114 453.233114 0 0 1-176.395086-870.637574 453.233114 453.233114 0 0 1 352.790173 835.013436 450.318761 450.318761 0 0 1-176.395087 35.624138z m0-852.576251c-220.250995 0-399.445395 179.1944-399.445395 399.445395s179.1944 399.445395 399.445395 399.445395 399.445395-179.1944 399.445395-399.445395-179.181618-399.445395-399.445395-399.445395z"
                            fill="#203529"></path>
                        <path
                            d="M642.359893 920.002634a19.019992 19.019992 0 0 1-8.11673-1.81508l-37.899379-17.895154a18.866605 18.866605 0 0 1-5.112902-3.540684l-54.733605-53.238082A53.685461 53.685461 0 0 1 522.794702 788.077004l1.469959-4.512135a18.828258 18.828258 0 0 0-4.090321-18.585395l-21.44862-23.174224a18.968863 18.968863 0 0 1-4.435442-8.103948l-6.889634-26.702126a33.438373 33.438373 0 0 0-31.636075-24.989304l-10.583705-0.204516a49.505664 49.505664 0 0 1-40.558088 14.827413l-25.845715-2.556451a113.65979 113.65979 0 0 1-64.57594-28.402165l-0.715806-0.639113a112.381565 112.381565 0 0 1-33.093252-52.304977l-7.388142-25.181038a84.107222 84.107222 0 0 1 2.313587-54.52909l0.306775-0.805282a212.1087 212.1087 0 0 1 60.43449-85.104238l1.431612-1.278225a18.956081 18.956081 0 0 1 2.748185-1.942903l5.598626-3.246692c-10.622052 0.140605-19.735798-6.672336-23.928377-18.534266-6.391126-17.895154-1.278225-50.809454 20.783943-59.41191l0.332339-0.140605c-0.447379-3.23391-2.812096-9.778423-4.614394-14.75072a215.866683 215.866683 0 0 1-10.085197-34.512082c-2.249676-11.913059-0.242863-21.065152 5.982094-27.200633 10.225802-10.110762 25.98632-6.915199 41.184418-3.834676 9.637818 1.968467 21.627571 4.409877 27.277328 2.04516a18.917734 18.917734 0 0 0 9.497213-8.845319 16.847009 16.847009 0 0 1-11.35064-1.380483c-6.391126-3.182781-9.867899-9.573907-10.391971-18.994427-0.7925-14.201083 6.391126-24.28628 13.958219-34.882768 6.058788-8.500198 13.613099-19.083903 20.221524-35.483533 6.902416-17.115436 21.461402-26.139707 41.005467-25.411118a79.249966 79.249966 0 0 1 17.166565 2.735402c3.310603-7.439271 10.149109-14.916889 20.681685-22.63737 0.319556-5.112901-1.70004-18.406444-7.822739-37.068532a19.019992 19.019992 0 0 1 2.415846-16.616929l10.225802-14.776284a18.828258 18.828258 0 0 1 21.244104-7.273102l224.034542 70.749769a18.828258 18.828258 0 0 1 9.292697 6.493384l129.778212 168.649041a18.815476 18.815476 0 0 1 3.911369 10.72431l1.41883 33.233857a109.4033 109.4033 0 0 0 3.016611 21.244104l11.235601 46.01611a18.892169 18.892169 0 0 1 0.536854 4.48657v28.887891a13.421365 13.421365 0 0 1-25.628416 5.573062c-3.706853-3.374515-14.277776-10.928826-25.679546-18.304185l-43.114538-20.119266a18.943298 18.943298 0 0 1-7.554311-6.391126l-21.870435-31.597729L722.197843 389.475238l0.191734 0.204516 46.591311 5.112901a18.828258 18.828258 0 0 1 14.891324 10.468665l5.534715 11.286729a19.00721 19.00721 0 0 1 0.779718 14.852978l-16.847009 45.84994a18.981645 18.981645 0 0 1-5.112901 7.503182L741.371222 509.193816a18.866605 18.866605 0 0 1-9.561125 4.627176 29.105189 29.105189 0 0 0 6.506167-0.39625l36.825669-6.455038A18.917734 18.917734 0 0 1 795.056683 534.46433l-28.389383 53.442598-17.511686 54.631348a102.539231 102.539231 0 0 0-4.461006 41.184418l1.201531 12.782252a186.787058 186.787058 0 0 1-9.893463 79.620652L718.836111 824.455295l-23.2637 74.827307a18.930516 18.930516 0 0 1-14.175518 12.897293l-35.17676 7.37536a18.815476 18.815476 0 0 1-3.86024 0.447379z m-33.336115-43.459659l34.294784 16.246243 28.005916-5.867054 21.95991-70.634728 0.166169-0.51129L710.693816 767.126892a159.778158 159.778158 0 0 0 8.461851-68.103842l-1.201532-12.782252a129.241356 129.241356 0 0 1 5.624191-51.908728L741.371222 579.036045a18.968863 18.968863 0 0 1 1.278225-3.093305l21.116282-39.740024-20.835072 3.655724a56.241912 56.241912 0 0 1-24.695312-1.278225l-47.115384-13.16572a18.892169 18.892169 0 0 1-10.801003-7.950561l-29.84656-46.195061c-0.255645-0.39625-0.498508-0.805282-0.728588-1.278226a18.917734 18.917734 0 0 1 28.887891-23.429869l36.608371 31.214261 31.303737 8.487416 22.305031-20.157612 15.006364-40.839298-2.134636-4.345966-45.172481-5.010643a18.930516 18.930516 0 0 1-11.721325-5.867054l-10.813786-11.504027a18.917734 18.917734 0 0 1 7.988908-30.933051l12.322091-3.988063a18.930516 18.930516 0 0 1 4.077539-0.843629l72.718235-6.6979a18.943298 18.943298 0 0 1 17.30717 8.218988l23.289265 33.642889 41.670143 19.441806a18.956081 18.956081 0 0 1 2.262459 1.278226c1.060927 0.677459 5.189595 3.361732 10.149109 6.736247l-10.788222-44.137118a136.335507 136.335507 0 0 1-3.757982-26.472046l-1.278225-30.7541-126.7616-164.750454-216.020069-68.231664-4.665522 6.749029c13.919873 44.367199 6.800158 56.446428-1.086492 61.955579s-11.580721 9.612254-13.152938 11.887494c6.97911 7.669352 3.527902 14.840195 2.21133 16.974832-0.945887 1.559435-6.237739 9.113746-17.064307 5.509151-1.124838-0.370685-2.377499-0.869193-3.962499-1.482741-29.552568-11.504027-36.582807-5.752014-39.791152 2.185765-7.797174 19.35233-16.731969 31.878938-23.2637 41.031031-1.41883 1.994031-2.658709 3.7452-3.732418 5.317417a16.962049 16.962049 0 0 1 2.466975-0.178952c6.391126 0 14.060478 4.090321 16.335719 15.556002 3.131652 15.619913-3.566248 42.258127-28.274343 52.586187-13.267978 5.547498-29.05406 2.32637-42.986716-0.51129a124.575834 124.575834 0 0 0-15.786082-2.556451c0.063911 0.62633 0.178952 1.380483 0.345121 2.288024a190.596169 190.596169 0 0 0 8.947577 30.408979c3.489555 9.650601 6.237739 17.281606 6.276086 24.848699 0 6.46782-2.224112 18.21471-17.498904 24.17124-1.278225 0.485726-3.757982 3.438426-5.253506 9.30548-1.751169 6.889634-1.073709 13.191285 0 16.220678a148.031268 148.031268 0 0 1 20.720032-4.499353l2.978265-0.485725c1.776733-14.060478 9.049835-48.201875 24.51636-57.430661a18.764347 18.764347 0 0 1 18.904952-0.511291c3.34895 1.802298 7.797174 2.236894 12.501043 2.709838 7.26032 0.715806 18.853823 1.853427 24.40132 11.964188a18.904952 18.904952 0 0 1 30.843576-11.273946c3.655724 3.093305 11.887495 4.269272 15.88834 4.37153 5.534715-2.927136 19.032774-18.674871 22.535111-24.490796 0.549637-1.380483 1.840644-4.307619 5.521934-12.130358 7.298666-15.49209 15.415397-26.344223 33.336114-32.56918a13.459712 13.459712 0 0 1 1.942903-0.51129l9.714512-1.81508a13.408583 13.408583 0 0 1 3.157216-0.204516l0.613548-0.063911a18.904952 18.904952 0 0 1 9.970157 1.53387l0.7925 0.383468 28.440512 15.09584a18.917734 18.917734 0 0 1 3.23391 32.032326c-9.471649 7.247537-25.564505 19.544064-31.815027 24.362973-6.07157 4.665522-12.871728 5.752014-18.316968 6.621207a36.493331 36.493331 0 0 0-5.700884 1.188749 7.298666 7.298666 0 0 0-0.242863 1.009798 68.346705 68.346705 0 0 0-1.278225 9.522779 44.622844 44.622844 0 0 0 3.834675 2.55645c1.955685 0.217298 9.088182-0.562419 22.074951-6.774594a18.904952 18.904952 0 0 1 26.293093 11.772455l6.570078 22.458418a18.917734 18.917734 0 0 1-14.060478 23.762207l-37.822685 8.449069-0.421815 0.089476-43.843126 8.321247a82.023715 82.023715 0 0 1-38.564056-1.981249l-21.359145-6.391127-27.085593-3.706853a69.90614 69.90614 0 0 0-44.367199 8.768625l-36.838452 21.384709-0.894758 0.754153a185.189276 185.189276 0 0 0-52.752356 74.290452l-0.306774 0.805282a57.520137 57.520137 0 0 0-1.610564 37.183573l7.388142 25.181038a85.564399 85.564399 0 0 0 25.19382 39.829499l0.715806 0.639113a86.919318 86.919318 0 0 0 49.416189 21.729829l25.845714 2.556451a22.714063 22.714063 0 0 0 19.825274-8.129513 18.815476 18.815476 0 0 1 14.942454-6.851287l14.201082 0.268427a60.357797 60.357797 0 0 1 57.111105 45.121352l6.391126 24.759223 20.093702 21.72983a45.683771 45.683771 0 0 1 9.919028 45.108569L548.359207 796.33434a26.983335 26.983335 0 0 0 6.889634 27.852528zM449.13058 411.588535l17.626726 2.415846a18.994427 18.994427 0 0 1 2.83766 0.613548l21.934346 6.544513a55.065944 55.065944 0 0 0 25.884061 1.278226l43.638611-8.295682 29.399181-6.557296-1.661693-5.67532c-17.243259 6.902416-30.051076 7.4904-38.98587 1.802297-17.038743-10.852132-18.713218-19.467371-15.070276-39.855063a33.233857 33.233857 0 0 1 1.981249-6.915199c-3.285039 4.154232-6.263304 7.515965-6.518949 7.797174-14.610115 16.450759-23.071966 19.326766-28.120956 20.055355A61.661587 61.661587 0 0 1 475.500367 380.655484c-5.803143 22.790756-17.562815 29.360834-26.369787 30.933051z m-41.567886-34.908332c-4.76778 8.819754-10.225802 30.677406-10.225802 36.915146v0.102258a97.068427 97.068427 0 0 1 34.333131-4.218144 18.470355 18.470355 0 0 1-9.394956-8.346811c-4.358748-8.270117-0.600766-16.143985 2.198548-21.256886h-0.242863a69.561019 69.561019 0 0 1-16.668058-3.246692z m153.923887-9.356609z m-217.374989-5.176812z m201.346044-18.559831a23.37874 23.37874 0 0 1-1.968467 3.834676c6.391126-5.470804 14.46951-6.774594 19.339548-7.554312 2.134636-0.345121 5.368546-0.856411 6.237739-1.41883l22.011039-16.859791-15.760517-8.423504h-0.703024l-7.337013 1.367701c-7.912214 2.939918-11.670197 7.068586-16.987614 18.342532-3.86024 8.308464-4.691087 10.276931-4.831691 10.660399z m0.089476-0.242863l-0.076694 0.217298z m-24.810353-10.034068z m53.685461-46.821392zM520.238251 100.979796zM259.352475 296.944511A24.733659 24.733659 0 0 1 234.951155 268.427305v-0.306774l-3.770765-26.357005a24.541925 24.541925 0 0 1 4.576047-18.074105l18.930516-25.807368a24.759223 24.759223 0 0 1 2.454192-2.850442l19.684669-19.684669L306.838543 138.048329a24.554707 24.554707 0 0 1 7.400925-6.186611l46.565746-25.411118a24.669748 24.669748 0 0 1 36.493331 21.653136V143.16123a24.810352 24.810352 0 0 1-9.714512 19.620757c-17.652291 13.44693-27.021682 21.026806-31.239825 24.644183 0 4.780562 0 13.830397 0.178951 28.325472a24.784788 24.784788 0 0 1-9.573907 19.876403l-72.526501 56.114089a24.605836 24.605836 0 0 1-15.070276 5.202377z m-1.41883-58.082556l3.681289 25.807368a24.68253 24.68253 0 0 1 0.242862 2.876007l67.822633-52.407236c-0.472943-32.748131 0-34.665469 0.51129-36.685065 1.278225-5.112901 1.725604-6.889634 40.276878-36.288815v-10.379189l-42.986716 23.455433-29.820995 37.068533a24.861481 24.861481 0 0 1-1.776733 1.968467l-19.646322 19.646322z m69.816664-83.966617zM246.378488 851.055163a13.383019 13.383019 0 0 1-7.541529-2.313588l-53.353122-36.237686a13.421365 13.421365 0 0 1-4.563264-5.304635l-29.322488-61.175861a19.684669 19.684669 0 0 1 17.754549-28.184867h24.452449a30.268374 30.268374 0 0 1 28.82398 21.486967l3.553466 11.887495a7.183626 7.183626 0 0 0 5.636974 5.04899c11.504027 2.057943 14.699591 2.454193 15.440961 2.55645 4.93395 0.076694 8.730279 1.802298 29.616479 17.895154a30.677406 30.677406 0 0 1 4.333184 44.367199l-2.083507 2.403063c-0.370685 0.421814-0.754153 0.830846-1.150403 1.278225l-22.113297 22.35616a13.408583 13.408583 0 0 1-9.484432 3.936934z m-42.820546-58.734451l41.133289 27.929222 14.264994-14.418381 2.070725-2.377499a3.834676 3.834676 0 0 0-0.549637-5.509151c-10.519794-8.129513-15.249227-11.376205-17.204912-12.628865-2.556451-0.332339-7.26032-1.060927-16.182332-2.658709a33.898534 33.898534 0 0 1-26.638214-23.787772l-3.553467-11.887495a3.259474 3.259474 0 0 0-3.106087-2.313588h-13.063462z m43.319054-6.710682z m0-26.842731z"
                            fill="#203529"></path>
                        <path
                            d="M789.637008 839.793999a13.421365 13.421365 0 0 1-11.759672-6.953546L764.379277 808.324093a58.938967 58.938967 0 0 1-7.273102-28.31269v-14.520639a39.38212 39.38212 0 0 1 5.432457-19.953096l26.369788-44.840143A41.9897 41.9897 0 0 1 824.979937 680.015841a15.134187 15.134187 0 0 1 15.070275 16.616928l-5.867054 64.57594a13.421365 13.421365 0 0 1-1.278225 4.486571l-31.175914 66.467714a13.421365 13.421365 0 0 1-11.721326 7.669351z m21.729829-124.332972l-25.679545 43.676957a12.526608 12.526608 0 0 0-1.725604 6.391127v14.520639a32.032325 32.032325 0 0 0 3.949716 15.338703l0.779717 1.406048 18.968863-40.430265zM185.854522 374.711736a25.807368 25.807368 0 0 1-24.554707-17.895154l-0.651895-2.019595-10.545358-31.405995a13.421365 13.421365 0 0 1 2.55645-13.037898l14.060478-16.335719a13.421365 13.421365 0 0 1 10.161891-4.65274h7.043021a13.421365 13.421365 0 0 1 9.791206 4.243708l15.09584 16.105638a13.421365 13.421365 0 0 1 3.46399 7.068586l3.195564 20.068137a33.553413 33.553413 0 0 1-18.483138 35.304582 25.794586 25.794586 0 0 1-11.133342 2.55645zM177.980655 322.112767l8.142295 24.28628v0.153387l0.281209 0.856411a6.557296 6.557296 0 0 0 2.556451-6.263304l-2.556451-16.003381-5.752014-6.135481z"
                            fill="#203529"></path>
                        <path
                            d="M511.993698 1023.999041A511.584097 511.584097 0 0 1 0.000569 511.99313a13.421365 13.421365 0 0 1 26.84273 0C26.843299 779.512895 244.486715 997.143529 511.993698 997.143529s485.163181-217.630633 485.163182-485.150399S779.513464 26.842731 511.993698 26.842731a13.421365 13.421365 0 0 1 0-26.842731 512.133734 512.133734 0 0 1 199.300884 983.76051 508.797566 508.797566 0 0 1-199.300884 40.238531z"
                            fill="#203529"></path>
                    </g>
                </svg>
            </div>

            <div class="mt-16">
            </div>

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Techwiz 2023</h1>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
