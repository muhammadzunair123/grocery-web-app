<div>
    <div class="second-navbar">
        <div class="second-navbar-1">
            <div>
                <button style="padding: 0px;border: 0px;border-radius: 40px;outline: none;"><i
                        id="back-arrow-second-navbar" class="fa-solid fa-arrow-left"></i></button>
            </div>
            <div>
                <span id="second-navbar-title">All Categories</span>
            </div>
        </div>
        <div class="second-navbar-2">
            <div class="second-search">
                <div id="second-search-container">
                    <i class="fa-regular fa-magnifying-glass"></i>
                    <input type="search" id="second-search" placeholder="Search Products">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="grid-container p-2">
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <a wire:navigate href="{{route('products',$category->slug)}}" class="grid-item" style="height: max-content !important">
                        <div
                            style="display: flex;flex-direction: column;justify-content: center;text-align: center;gap: 5px;">
                            <div><img src="{{ asset('storage/' . $category->image) }}" alt=""></div>
                            <span class="category-span-tag">{{ $category->name }}</span>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>

    </div>
</div>
