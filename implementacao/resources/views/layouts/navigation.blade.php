<nav class="bg-gradient-to-r from-blue-200 to-white px-6 py-4 shadow">
    <div class="flex flex-col container mx-auto md:flex-row md:items-center md:justify-between">
        <div class="flex justify-between items-center">
            <div>
                @if(Auth::guard('professor')->check())
                    <a href="{{ route('index_professor') }}" class="text-gray-800 text-xl font-bold md:text-2xl">Logo</a>
                @elseif(Auth::guard('aluno')->check())
                    <a href="{{ route('index_aluno') }}" class="text-gray-800 text-xl font-bold md:text-2xl">Logo</a>
                @elseif(Auth::guard('empresa')->check())
                    <a href="{{ route('index_empresa') }}" class="text-gray-800 text-xl font-bold md:text-2xl">Logo</a>
                @endif
            </div>
        </div>

        <div class="md:flex flex-col md:flex-row md:-mx-4 hidden">

            <div x-data="{ dropdownOpen: false }" @click.away="dropdownOpen = false" class="relative my-1 md:mx-4 md:my-0">
                <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                    @if(Auth::guard('professor')->check())
                        <span class="text-gray-800">{{ $professor->nome }}</span>
                    @elseif(Auth::guard('aluno')->check())
                        <span class="text-gray-800">{{ $aluno->nome }}</span>
                    @elseif(Auth::guard('empresa')->check())
                        <span class="text-gray-800">{{ $empresa->nome }}</span>
                    @endif
                </button>

                <div x-show="dropdownOpen" class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10">
                    <a href="{{ route('perfil') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-400 hover:text-white">Perfil</a>
                    <div class="border-t"></div>
                    @if(Auth::guard('professor')->check())
                        <form method="POST" action="{{ route('logout.professor') }}">
                            @csrf
                            <a href="{{ route('logout.professor') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                class='block px-4 py-2 text-sm text-gray-700 hover:bg-blue-400 hover:text-white'>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @elseif(Auth::guard('aluno')->check())
                        <form method="POST" action="{{ route('logout.aluno') }}">
                            @csrf
                            <a href="{{ route('logout.aluno') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                class='block px-4 py-2 text-sm text-gray-700 hover:bg-blue-400 hover:text-white'>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @elseif(Auth::guard('empresa')->check())
                        <form method="POST" action="{{ route('logout.empresa') }}">
                            @csrf
                            <a href="{{ route('logout.empresa') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                class='block px-4 py-2 text-sm text-gray-700 hover:bg-blue-400 hover:text-white'>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @endif
                </div>
            </div>

        </div>

    </div>

</nav>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
