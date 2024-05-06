<div>
    <div class="second-navbar">
        <div class="second-navbar-1">
            <div>
                <a href="{{ url()->previous() }}" style="padding: 0px;border: 0px;border-radius: 40px;outline: none;"><i
                        id="back-arrow-second-navbar" class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div>
                {{-- <span id="second-navbar-title">Olper’s Ramadan Recipe Ingredients</span> --}}

                <div class="breadcrumbs">
                    <a href="{{ route('products', $productCategory->slug) }}"
                        class="breadcrumbs__item">{{ $productCategory->name }}</a>
                    <a href="/products/{{ $productCategory->slug }}#{{ $productSubCategory->slug }}"
                        class="breadcrumbs__item is-active">{{ $productSubCategory->name }}</a>
                    {{-- <a class="breadcrumbs__item is-active">{{ $product->title }}</a> --}}
                </div>

            </div>
        </div>
        @livewire('product-detail-search')
    </div>
    <div class="product-detail-container">
        <div class="product-detail">
            <div class="product-detail-1">
                <div class="product-detail-1-1">
                    {{-- <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner bg-light">
                            @if ($product->ProductImages->isNotEmpty())
                                @foreach ($product->ProductImages as $key => $productImage)
                                    <div class="carousel-item {{ $key === 0 ? ' active' : '' }}"
                                        style="background-color: white !important;">
                                        <img class="d-block w-100" src="{{ asset('storage/' . $productImage->image) }}"
                                            alt="Image">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev control-res" href="#product-carousel" style="left: 10%;"
                            data-bs-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next control-res" href="#product-carousel" style="right: 10%;"
                            data-bs-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div> --}}
                    <div class="carsoul_product">
                        <div class="carsoul_product__images">

                            @php
                                $firstProductImage = $product->ProductImages->first();
                            @endphp

                            <img src="{{ asset('storage/' . $firstProductImage->image) }}" alt=""
                                class="carsoul_product__main-image" id="carsoul_main-image" />
                            <div class="carsoul_product__slider-wrap">
                                <div class="carsoul_product__slider">
                                    @if ($product->ProductImages->isNotEmpty())
                                        @foreach ($product->ProductImages as $key => $productImage)
                                            <img src="{{ asset('storage/' . $productImage->image) }}" alt=""
                                                class="carsoul_product__image product__image--active {{ $key === 0 ? 'carsoul_product__image product__image--active' : '' }}" />
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-detail-1-2">
                    <div class="product-detail-1-2-1">
                        <span class="product-detail-title">
                            {{ $product->title }}
                        </span>
                    </div>
                    <div class="product-detail-1-2-2">
                        <span class="product-detail-actual-price">Rs. {{ $product->price }}</span>
                        @if ($product->compare_price)
                            <span class="product-detail-discount-price">Rs. {{ $product->compare_price }}</span>
                        @endif
                    </div>
                    @if ($productExistance)
                        <div class="border product-detail-1-2-3 qty-product-detail-main mt-1"
                            style="width: max-content;box-shadow: 0 .1rem .5rem rgba(0, 0, 0, .15);border-radius: 6px;position: relative;">
                            @if ($cartItem != null)
                                <div >
                                    @if ($cartItem->qty > 1)
                                        <button class="minus-product-detail"
                                            wire:click='decrementQuantity("{{ $cartItem->rowId }}")'
                                            style="background: transparent;border:none;transition: 0.2s ease-in-out all;"><i
                                                class="fa-regular fa-square-minus qty-icons"></i></button>
                                    @else
                                        <button class="minus-product-detail"
                                            wire:click='decrementQuantity("{{ $cartItem->rowId }}")'
                                            style="background: transparent;border:none;transition: 0.2s ease-in-out all;"><i
                                                class="fa-solid fa-trash " id="detail-trash"></i></button>
                                    @endif
                                    <span wire:target='decrementQuantity,incrementQuantity' class="qty-product-detail"
                                        style="background: transparent;border:none;font-size: 18px;">{{ $cartItem->qty }}</span>

                                    <button class="plus-product-detail"
                                        wire:click='incrementQuantity("{{ $cartItem->rowId }}")'
                                        style="background: transparent;border:none"><i
                                            class="fa-regular fa-square-plus qty-icons"></i></button>


                                </div>
                                <div wire:loading wire:target='decrementQuantity,incrementQuantity' class="qty-loader-div" style="width: 100%;">
                                    <div class="loader-product-card d-none-mdb" style="width: 1px;"></div>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="product-detail-1-2-3 mt-1">
                            <button wire:click='addToCart({{ $product->id }})' class="product-detail-cart-button">Add
                                To Cart</button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="product-detail-1.5">
                <div class="container my-4 m-0-mob">
                    <h4 class="product-description-title">Product Information</h4>
                    @if ($product->description)
                        <p class="product-description-p">{{ $product->description }}</p>
                    @else
                        <p class="product-description-p">Everthing is Fresh And Organic at Bahtareen Mart !</p>
                    @endif
                </div>
            </div>
            @if ($relatedProducts->isNotEmpty())
                <div class="product-detail-2">
                    <div class="container">
                        <div class="contianer-title">
                            <div>
                                <button id="iftar_essentials" class="btn">RELATED PRODUCTS</button>
                            </div>
                            <div>
                                <a href="{{ route('products', $productCategory->slug) }}" class="view_all_button">View
                                    all</a>
                            </div>
                        </div>
                        <div class="container mt-2 me_2" wire:ignore>
                            <ul class="lightSlider">
                                @foreach ($relatedProducts as $product)
                                    <li class="p-3 px-2">
                                        <div class="product-card">
                                            <div>
                                                <a style="cursor: pointer" id="plus"
                                                    wire:click='addToCart({{ $product->id }})'><img width="70%"
                                                        src="{{ asset('front-assets/assets/plus (3).png') }}"
                                                        alt=""></a>
                                                        <div class="loading-product-home" wire:loading wire:target="addToCart({{ $product->id }})"><div style="display: flex;height: 100%">
                                                            <div class="loader-product-card"></div></div></div>

                                            </div>
                                            @php
                                                $productImage = $product->ProductImages->first();
                                            @endphp
                                            <a href="{{ route('product.detail', $product->slug) }}"
                                                style="text-decoration: none !important">
                                                @if (!empty($productImage->image))
                                                    <div class="product-card-1 d-flex justify-content-center">
                                                        <img src="{{ asset('storage/' . $productImage->image) }}"
                                                            class="product-card-main-img" width="130px" alt="">
                                                    </div>
                                                @else
                                                    <div class="product-card-1 d-flex justify-content-center">
                                                        <img src="{{ asset('admin-assets/img/empty-folder.png') }}"
                                                            class="product-card-main-img" width="130px" alt="">
                                                    </div>
                                                @endif
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
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="container mt-4 ms-2">
                        </div>
                    </div>
                </div>
            @endif
            @if ($peopleAlsoBoughtProducts->isNotEmpty())
                <div class="product-detail-3">
                    <div class="container">
                        <div class="contianer-title">
                            <div>
                                <button id="iftar_essentials" class="btn">PEOPLE ALSO BOUGHT</button>
                            </div>
                            <div>
                                <a href="{{ route('products', $productCategory->slug) }}" class="view_all_button">View all</a>
                            </div>
                        </div>
                        <div class="container mt-2 me_2" wire:ignore>
                            <ul class="lightSlider">
                                @foreach ($peopleAlsoBoughtProducts as $product)
                                    <li class="p-3 px-2">
                                        <div class="product-card">
                                            @php
                                                $productImage = $product->ProductImages->first();
                                            @endphp
                                            <div>
                                                <a id="plus" wire:click='addToCart({{ $product->id }})'
                                                    style="cursor: pointer"><img width="70%"
                                                        src="{{ asset('front-assets/assets/plus (3).png') }}"
                                                        alt=""></a>
                                                        <div class="loading-product-home" wire:loading wire:target="addToCart({{ $product->id }})"><div style="display: flex;height: 100%">
                                                            <div class="loader-product-card"></div></div></div>

                                            </div>
                                            <a href="{{ route('product.detail', $product->slug) }}"
                                                style="text-decoration: none !important">
                                                @if (!empty($productImage->image))
                                                    <div class="product-card-1 d-flex justify-content-center">
                                                        <img src="{{ asset('storage/' . $productImage->image) }}"
                                                            class="product-card-main-img" width="130px"
                                                            alt="">
                                                    </div>
                                                @else
                                                    <div class="product-card-1 d-flex justify-content-center">
                                                        <img src="{{ asset('admin-assets/img/empty-folder.png') }}"
                                                            class="product-card-main-img" width="130px"
                                                            alt="">
                                                    </div>
                                                @endif
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
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="container mt-4 ms-2">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
