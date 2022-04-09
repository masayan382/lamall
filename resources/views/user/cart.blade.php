<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            カート
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <div class="mb-2 md:flex md:items-center">
                                <div class="md:w-3/12">
                                    @if ($product->imageFirst->filename !== null)
                                        <img src="{{ asset('storage/products/' . $product->imageFirst->filename) }}">
                                    @else
                                        <img src="">
                                    @endif
                                </div>
                                <div class="md:ml-2 md:w-4/12">{{ $product->name }}</div>
                                <div class="flex justify-around md:w-3/12">
                                    <div>{{ $product->pivot->quantity }}個</div>
                                    <div>{{ number_format($product->pivot->quantity * $product->price) }}<span
                                            class="text-sm text-gray-700">円(税込)</span></div>
                                </div>
                                <div class="md:w-2/12">
                                    <form method="post"
                                        action="{{ route('user.cart.delete', ['item' => $product->id]) }}">
                                        @csrf
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-2">
                            小計: {{ number_format($totalPrice) }}<span class="text-sm text-gray-700">円(税込)</span>
                        </div>
                        <div>
                            <button
                                class="ml-auto flex rounded border-0 bg-indigo-500 py-2 px-6 text-white hover:bg-indigo-600 focus:outline-none"
                                data-micromodal-trigger="modal-1">購入する
                            </button>
                        </div>

                        <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                                <div class="modal__container" role="dialog" aria-modal="true"
                                    aria-labelledby="modal-1-title">
                                    <header class="modal__header">
                                        <h2 class="font-bold text-indigo-600" id="modal-1-title">
                                            決済時の注意
                                        </h2>
                                        <button class="modal__close" aria-label="Close modal"
                                            data-micromodal-close></button>
                                    </header>
                                    <main class="modal__content" id="modal-1-content">
                                        <p>
                                            この先で決済を行います。決済用のテストカードをご用意しております。
                                        </p>
                                        <p class="mt-4">
                                            ①カード番号：<span class="font-bold">4242-4242-4242-4242</span><br>
                                            ②カード有効期限:<span class="font-bold">未来の日付</span><br>
                                            ③CVC:<span class="font-bold">111</span><br>
                                        </p>
                                        <p class="mt-4">
                                            そのほかの情報は任意のものをご入力ください。<br>
                                            なお、開発モードとなっていますので実際の決済は行われません。
                                        </p>
                                    </main>
                                    <footer class="flex justify-end">
                                        <div class="flex">
                                            <button onclick="location.href='{{ route('user.cart.checkout') }}'"
                                                class="ml-4 flex rounded border-0 bg-indigo-500 py-2 px-6 text-white hover:bg-indigo-600 focus:outline-none">購入する</button>
                                            <button data-micromodal-close aria-label="Close this dialog window"
                                                class="ml-2 flex rounded border border-indigo-500 bg-transparent py-2 px-6 text-indigo-500 hover:bg-indigo-100 focus:outline-none">閉じる</button>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    @else
                        カートに商品が入っていません。
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        MicroModal.init();
    </script>
</x-app-layout>
