<div class="pt-5">
    <div class="mb-4">
        <h2>メーカー一覧</h2>
        @foreach ($vendors as $vendor)
            <div class="mb-3">
                <label class="sidebar-label"><a href="{{ route('products', ['vendor' => $vendor->id]) }}"
                        class="h5 link-dark text-decoration-none">{{ $vendor->name }}</a></label>
            </div>
        @endforeach

        <h2>W数一覧</h2>
        @foreach ($wattages as $wattage)
            <div class="mb-3">
                <label class="sidebar-label"><a href="{{ route('products', ['wattage' => $wattage->id]) }}"
                        class="h5 link-dark text-decoration-none">{{ $wattage->watt }}W</a></label>
            </div>
        @endforeach
    </div>
</div>
