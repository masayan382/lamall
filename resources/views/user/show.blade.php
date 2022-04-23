<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            商品の詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <div class="md:flex md:justify-around">
                        <div class="md:w-1/2">
                            <!-- Slider main container -->
                            <div class="swiper-container">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide">
                                        @if ($product->imageFirst->filename !== null)
                                            <img
                                                src="{{ url('storage/products/' . $product->imageFirst->filename) }}">
                                        @else
                                            <img src="">
                                        @endif
                                    </div>
                                    <div class="swiper-slide">
                                        @if ($product->imageSecond->filename !== null)
                                            <img
                                                src="{{ url('storage/products/' . $product->imageSecond->filename) }}">
                                        @else
                                            <img src="">
                                        @endif
                                    </div>
                                    <div class="swiper-slide">
                                        @if ($product->imageThird->filename !== null)
                                            <img
                                                src="{{ url('storage/products/' . $product->imageThird->filename) }}">
                                        @else
                                            <img src="">
                                        @endif
                                    </div>
                                    <div class="swiper-slide">
                                        @if ($product->imageFourth->filename !== null)
                                            <img
                                                src="{{ url('storage/products/' . $product->imageFourth->filename) }}">
                                        @else
                                            <img src="">
                                        @endif
                                    </div>

                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>

                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>

                                <!-- If we need scrollbar -->
                                <div class="swiper-scrollbar"></div>
                            </div>
                        </div>
                        <div class="ml-4 md:w-1/2">
                            <h2 class="title-font mb-4 text-sm tracking-widest text-gray-500">
                                {{ $product->category->name }}</h2>
                            <h1 class="title-font mb-4 text-3xl font-medium text-gray-900">{{ $product->name }}</h1>
                            <p class="mb-4 leading-relaxed">{{ $product->information }}</p>
                            <div class="flex items-center justify-around">
                                <div>
                                    <span
                                        class="title-font text-2xl font-medium text-gray-900">{{ number_format($product->price) }}</span><span
                                        class="text-sm text-gray-700">円(税込)</span>
                                </div>
                                <form method="post" action="{{ route('user.cart.add') }}">
                                    @csrf
                                    <div class="flex items-center">
                                        <span class="mr-3">数量</span>
                                        <div class="relative">
                                            <select name="quantity"
                                                class="appearance-none rounded border border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                                                @for ($i = 1; $i <= $quantity; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <button
                                        class="ml-auto flex rounded border-0 bg-indigo-500 py-2 px-6 text-white hover:bg-indigo-600 focus:outline-none">カートに入れる</button>
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="my-8 border-t border-gray-400"></div>
                    <div class="mb-4 text-center">この商品を販売しているショップ</div>
                    <div class="mb-4 text-center">{{ $product->shop->name }}</div>
                    <div class="mb-4 text-center">
                        @if ($product->shop->filename !== null)
                            <img class="mx-auto h-40 w-40 rounded-full object-cover"
                                src="{{ url('storage/shops/' . $product->shop->filename) }}">
                        @else
                            <img src="">
                        @endif
                    </div>
                    <div class="mb-4 text-center">
                        <button data-micromodal-trigger="modal-1" href='javascript:;' type="button"
                            class="rounded border-0 bg-gray-400 py-2 px-6 text-white hover:bg-gray-500 focus:outline-none">ショップの詳細を見る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="text-xl text-gray-700" id="modal-1-title">
                        {{ $product->shop->name }}
                    </h2>
                    <button type="button" class="modal__close" aria-label="Close modal"
                        data-micromodal-close></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <p>
                        {{ $product->shop->information }}
                    </p>
                </main>
                <footer class="modal__footer">
                    <button type="button" class="modal__btn" data-micromodal-close
                        aria-label="Close this dialog window">閉じる</button>
                </footer>
            </div>
        </div>
    </div>

    {{-- <script src="{{ mix('js/swiper.js')}}"></script> --}}
    <script src="{{ url('js/swiper.js') }}"></script>
</x-app-layout>
