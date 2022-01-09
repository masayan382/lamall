<div>
    @if (empty($shop->filename))
        <img src="{{ asset('images/no_image.jpeg') }}" alt="">
    @else
        <img src="{{ asset('storage/shops' . $shop->filename) }}" alt="">
    @endif
</div>
