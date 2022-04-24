@php
if ($type === 'shops') {
    $path = 'storage/shops/';
}
if ($type === 'products') {
    $path = 'storage/products/';
}

@endphp

<div class="flex justify-center">
    @if (empty($filename))
        <img src="{{ url('images/no_image.jpg') }}">
    @else
        <img src="{{ url($path . $filename) }}">
    @endif
</div>
