<div>
    <div class="second-navbar">
        <div class="second-navbar-1">
            <div>
                <a href="{{ url()->previous() }}" style="padding: 0px;border: 0px;border-radius: 40px;outline: none;"><i
                        id="back-arrow-second-navbar" class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div>
                @if ($category)
                    <span id="second-navbar-title">{{ $category->name }}</span>
                @endif
            </div>
        </div>
        @livewire('products-page-search')
    </div>

    @if ($subcategories->isNotEmpty())
        <div class="third-navbar">
            <ul id="menu">
                @foreach ($subcategories as $subcategory)
                    <li><a href="#{{ urlencode($subcategory->slug) }}">{{ $subcategory->name }}</a></li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($subcategories->isNotEmpty())

        @foreach ($subcategories as $subcategory)
            <div class="container mt-3" id="{{ $subcategory->slug }}">
                <h4>{{ $subcategory->name }}</h4>
                <div class="container mt-3">
                    <div class="product-grid-container p-2">

                        @if ($products->isNotEmpty())
                            @foreach ($products->where('subcategory_id', $subcategory->id) as $product)
                                <div class="grid-item-product">
                                    <div class="grid-product-card" style="border-radius: 4px;">
                                        <div>
                                            <a style="cursor: pointer" wire:click='addToCart({{$product->id}})' id="plus"><img width="70%"
                                                    src="{{ asset('front-assets/assets/plus (3).png') }}" alt=""></a>
                                                    <div class="loading-product-home" wire:loading wire:target="addToCart({{ $product->id }})"><div style="display: flex;height: 100%">
                                                        <div class="loader-product-card"></div></div></div>

                                        </div>
                                        @php
                                            $productImage = $product->ProductImages->first();
                                        @endphp
                                        <a href="{{ route('product.detail', $product->slug) }}" class="view-btns"
                                            data-target="popup1" data-name="Product 1"
                                            data-description="Description of Product 1." data-price="19.99">
                                            <div class="product-card-1 d-flex justify-content-center">
                                                @if (!empty($productImage->image))
                                                    <img src="{{ asset('storage/' . $productImage->image) }}"
                                                        class="quick-view-product-img" width="100px" alt="">
                                                @else
                                                    <img src="{{ asset('admin-assets/img/empty-folder.png') }}"
                                                        class="quick-view-product-img" width="100px" alt="">
                                                @endif
                                            </div>
                                            <div class="product-card-2">
                                                <span class="mart-product-price">Rs. {{ $product->price }}</span>
                                                @if ($product->compare_price)
                                                    <span class="mart-product-price"
                                                        style="color: red !important;text-decoration:line-through;font-size:0.6rem;opacity:0.7">Rs.
                                                        {{ $product->compare_price }}</span>
                                                @endif
                                            </div>
                                            <div class="product-card-3">
                                                <span class="mart-product-name">{{ $product->title }}</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif



                    </div>



                </div>
            </div>
        @endforeach

    @endif

    {{-- <div class="container mt-3">
        <div class="product-grid-container p-2">

            @if ($products->isNotEmpty())
                @foreach ($products as $product)
                    <div class="grid-item-product">
                        <div class="grid-product-card" style="border-radius: 4px;">
                            <div>
                                <a href="#" id="plus" href=""><img width="70%"
                                        src="{{ asset('front-assets/assets/plus (3).png') }}" alt=""></a>
                            </div>
                            @php
                                $productImage = $product->ProductImages->first();
                            @endphp
                            <a href="{{ route('product.detail', $product->slug) }}" class="view-btns"
                                data-target="popup1" data-name="Product 1"
                                data-description="Description of Product 1." data-price="19.99">
                                <div class="product-card-1 d-flex justify-content-center">
                                    @if (!empty($productImage->image))
                                        <img src="{{ asset('storage/' . $productImage->image) }}"
                                            class="quick-view-product-img" width="100px" alt="">
                                    @else
                                        <img src="{{ asset('admin-assets/img/empty-folder.png') }}"
                                            class="quick-view-product-img" width="100px" alt="">
                                    @endif
                                </div>
                                <div class="product-card-2">
                                    <span class="mart-product-price">Rs. {{ $product->price }}</span>
                                    @if ($product->compare_price)
                                        <span class="mart-product-price"
                                            style="color: red !important;text-decoration:line-through;font-size:0.6rem;opacity:0.7">Rs.
                                            {{ $product->compare_price }}</span>
                                    @endif
                                </div>
                                <div class="product-card-3">
                                    <span class="mart-product-name">{{ $product->title }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>



    </div> --}}
</div>
