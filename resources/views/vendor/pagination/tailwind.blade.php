@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Навигация по страницам" class="relative mt-8">
        
        <div class="absolute inset-0 z-0 opacity-[0.07] pointer-events-none"
             style="background-image: url('/images/icon.svg'); background-size: 50px auto; background-repeat: repeat-x; background-position: center;">
        </div>

        <div class="relative z-10 flex items-center justify-between bg-white/50 backdrop-blur-sm p-4 rounded-xl border border-gray-100 shadow-sm">
            
            <div class="flex justify-between flex-1 sm:hidden">
                @if ($paginator->onFirstPage())
                    <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-200 rounded-lg cursor-default">
                        Назад
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors shadow-sm">
                        Назад
                    </a>
                @endif

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="ml-3 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors shadow-sm">
                        Далее
                    </a>
                @else
                    <span class="ml-3 px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-200 rounded-lg cursor-default">
                        Далее
                    </span>
                @endif
            </div>

            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-600">
                        Показано 
                        <span class="font-semibold text-gray-900">{{ $paginator->firstItem() ?? 0 }}</span> 
                        — 
                        <span class="font-semibold text-gray-900">{{ $paginator->lastItem() ?? 0 }}</span> 
                        из 
                        <span class="font-semibold text-gray-900">{{ $paginator->total() }}</span>
                    </p>
                </div>

                <div class="mt-2 sm:mt-0">
                    <span class="relative z-0 inline-flex space-x-1">
                        {{-- Кнопка Назад --}}
                        @if ($paginator->onFirstPage())
                            <span class="relative inline-flex items-center px-3 py-2 text-gray-300 bg-white border border-gray-200 rounded-l-lg cursor-default">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                            </span>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-50 transition-colors shadow-sm">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>
                            </a>
                        @endif

                        {{-- Элементы пагинации (цифры) --}}
                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-200 cursor-default">{{ $element }}</span>
                            @endif

                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-bold text-white bg-gray-900 border border-gray-900 rounded-md z-10 shadow-md">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-md hover:border-gray-400 hover:text-gray-900 transition-all">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Кнопка Вперед --}}
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-3 py-2 text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-50 transition-colors shadow-sm">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                            </a>
                        @else
                            <span class="relative inline-flex items-center px-3 py-2 text-gray-300 bg-white border border-gray-200 rounded-r-lg cursor-default">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                            </span>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </nav>
@endif