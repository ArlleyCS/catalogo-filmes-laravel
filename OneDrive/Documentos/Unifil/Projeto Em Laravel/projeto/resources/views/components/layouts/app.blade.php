<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <script>
        // Lógica para tema claro/escuro
        window.setAppearance = function(appearance) {
            let setDark = () => document.documentElement.classList.add('dark')
            let setLight = () => document.documentElement.classList.remove('dark')
            let setButtons = (appearance) => {
                document.querySelectorAll('button[onclick^="setAppearance"]').forEach((button) => {
                    button.setAttribute('aria-pressed', String(appearance === button.value))
                })
            }
            if (appearance === 'system') {
                let media = window.matchMedia('(prefers-color-scheme: dark)')
                window.localStorage.removeItem('appearance')
                media.matches ? setDark() : setLight()
            } else if (appearance === 'dark') {
                window.localStorage.setItem('appearance', 'dark')
                setDark()
            } else if (appearance === 'light') {
                window.localStorage.setItem('appearance', 'light')
                setLight()
            }
            if (document.readyState === 'complete') {
                setButtons(appearance)
            } else {
                document.addEventListener("DOMContentLoaded", () => setButtons(appearance))
            }
        }
        window.setAppearance(window.localStorage.getItem('appearance') || 'system')
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 antialiased" x-data="{ formSubmitted: false }">

    <div class="min-h-screen flex flex-col">

        <x-layouts.app.header />

        <div class="flex flex-1 overflow-hidden">

            {{-- O MENU LATERAL FOI REMOVIDO DAQUI --}}
            {{-- <x-layouts.app.sidebar /> --}}

            <main class="flex-1 overflow-auto bg-gray-900">
                
                {{-- Bloco para exibir mensagens de sessão (flash) --}}
                @if (session('success'))
                    <div class="p-4 sm:p-6">
                        <div class="mb-4 rounded-lg bg-green-900 border border-green-700 px-6 py-5 text-base text-green-200">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                
                {{ $slot }}

            </main>
        </div>
    </div>
</body>

</html>