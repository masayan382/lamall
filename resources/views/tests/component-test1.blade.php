<x-tests.app>
    <x-slot name="header">ヘッダー１</x-slot>
    コンポーネント１

    <x-tests.card title="タイトル１" content="本文１" :message="$message"></x-tests.card>
    <x-tests.card title="タイトル2"></x-tests.card>
    <x-tests.card title="CSS変更したい" class="bg-red-300"></x-tests.card>
</x-tests.app>
