<div>
    {{-- <div class="sticky-banner sb9-bg-light sb9-shadow-sm js-sticky-banner" style="z-index: 10000;"
        data-target-in="#behtar-mart-m">
        <div class="sticky-search-container">
            <i class="fa-regular fa-magnifying-glass"></i>
            <input placeholder="Search Products" id="sticky-search" type="search">
        </div>
    </div> --}}

    <div class="behtar-mart-container" id="behtar-mart-m">
        <div class="behtar-mart-container-main-1">
            <div class="behtar-mart-container-1">
                <button id="behtar_button">BEHTAR</button>
                <button id="mart_button">MART</button>
            </div>
            <div class="behtar-mart-container-2">
                <button onclick="openPopup()" id="shop_information_button" data-bs-toggle="modal" data-bs-target="#exampleModal">SHOP INFORMATION</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><b>SHOP INFORMATION</b></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="d-flex gap-1" style="justify-content: space-between">
                                    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa-regular fa-clock"></i>&nbsp;
                                        Now open until 23:59
                                    </a>
                                    {{-- <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                      View More
                                    </button> --}}
                                  </p>
                                  <div class="collapse" id="collapseExample">
                                    <div class="card card-body" style="font-weight: 500">
                                        <div style="font-weight: 600;color:black">Monday - Sunday </div>
                                        00:00 - 01:30 <br>
                                        07:00 - 23:59
                                    </div>
                                  </div>
                            </div>
                            <div class="p-3 border">
                                <div class="card card-body" style="font-weight: 400">
                                    <div style="font-weight: 700;color:black">Delivery fee</div>
                                    Enjoy complimentary delivery for orders over Rs 3000! <br> For orders below Rs 3000, a nominal delivery fee of Rs 80 applies. Happy shopping!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <livewire:search-drop-down-home />
    </div>
    <div id="slider" class="mt-3">
        <input type="radio" name="slider" id="slide1" checked>
        <!-- <input type="radio" name="slider" id="slide2">
            <input type="radio" name="slider" id="slide3">
            <input type="radio" name="slider" id="slide4"> -->
        <div id="slides">
            <div id="overflow">
                <div class="inner">
                    <div class="slide slide_1">
                        <div class="slide-content dnone-1">
                            <img style="border-radius: 10px !important;background-size: cover;" width="100%"
                                src="{{ asset('front-assets/assets/ramazan-web.jpg') }}" id="myImage" alt="">
                        </div>
                        <div class="slide-content dnone-2">
                            <img style="border-radius: 10px !important;background-size: cover;" width="100%"
                                src="{{ asset('front-assets/assets/ramazan-mobile.jpg') }}" id="myImage"
                                alt="">
                        </div>
                    </div>
                    <!-- <div class="slide slide_2">
                        <div class="slide-content">
                           <h2>Slide 2</h2>
                           <p>Content for Slide 2</p>
                        </div>
                     </div>
                     <div class="slide slide_3">
                        <div class="slide-content">
                           <h2>Slide 3</h2>
                           <p>Content for Slide 3</p>
                        </div>
                     </div>
                     <div class="slide slide_4">
                        <div class="slide-content">
                           <h2>Slide 4</h2>
                           <p>Content for Slide 4</p>
                        </div>
                     </div> -->
                </div>
            </div>
        </div>
        <div id="controls">
            <label for="slide1"></label>
            <!-- <label for="slide2"></label>
               <label for="slide3"></label>
               <label for="slide4"></label> -->
        </div>
        <div id="bullets">
            <label for="slide1"></label>
            <!-- <label for="slide2"></label>
               <label for="slide3"></label>
               <label for="slide4"></label> -->
        </div>
    </div>
    <div class="p-lg-3 p-1">
        <div class="contianer-title">
            <div>
                <a href="categories.html" id="all_categories" class="btn">ALL CATEGORIES</a>
            </div>
            <div>
                <a href="{{ route('all.categories') }}" class="view_all_button">View all</a>
            </div>
        </div>
        <div class="mt-2 ms-1 " wire:ignore>
            <ul class="lightSlider">
                @if ($categories->isNotEmpty())
                    @foreach ($categories as $category)
                        <li class="p-2 px-0" style="height:170px">
                            <a href="{{ route('products', $category->slug) }}" style="text-decoration: none">
                                <div class="all-category-card me-4">
                                    <img src="{{ asset('storage/' . $category->image) }}" width="" alt="">
                                    <div>
                                        <span class="all-category-title">{{ $category->name }}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="container mt-2 ms-2">
        </div>
    </div>
    <div wire:ignore>
        @if ($categories->isNotEmpty())
            @foreach ($categories as $category)
                <div class="p-lg-3 p-1" wire:key={{ $category->id }}>
                    <div class="contianer-title">
                        <div>
                            <button id="iftar_essentials" class="btn">{{ $category->name }}</button>
                        </div>
                        <div>
                            <a href="{{ route('products', $category->slug) }}" class="view_all_button">View all</a>
                        </div>
                    </div>
                    <div class=" mt-2 me_2">
                        <ul class="lightSlider">
                            @foreach ($products->where('category_id', $category->id) as $product)
                                {{-- @php
                                echo $category->id;
                                $product = $product->where('category_id', 7)->get();
                            @endphp --}}
                                <li class="p-3 px-2">
                                    <div wire:key={{ $product->id }} class="product-card">
                                        <div>
                                            <div>
                                                <a style="cursor: pointer"
                                                    wire:click='addToCart({{ $product->id }})' id="plus"><img
                                                        width="70%"
                                                        src="{{ asset('front-assets/assets/plus (3).png') }}"
                                                        alt=""></a>
                                                <div class="loading-product-home" wire:loading
                                                    wire:target="addToCart({{ $product->id }})">
                                                    <div style="display: flex;height: 100%">
                                                        <div class="loader-product-card"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('product.detail', $product->slug) }}"
                                            style="text-decoration: none !important">
                                            @php
                                                $productImage = $product->ProductImages->first();
                                            @endphp
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
            @endforeach
        @endif
    </div>
    {{-- <div class="p-lg-3 p-1">
        <div class="contianer-title">
            <div>
                <button id="iftar_essentials" class="btn">IFTAR ESSENTIALS</button>
            </div>
            <div>
                <a href="products.html" class="view_all_button">View all</a>
            </div>
        </div>
        <div class=" mt-2 me_2">
            <ul class="lightSlider">
                @php
                    $products = $products->get();
                @endphp
                @if ($products->isNotEmpty())

                    @foreach ($products as $product)
                        <li class="p-3 px-2">
                            <div class="product-card">
                                <div>
                                    <div>
                                        <a id="plus" href=""><img width="70%"
                                                src="{{ asset('front-assets/assets/plus (3).png') }}"
                                                alt=""></a>
                                    </div>
                                </div>

                                <div>
                                    @php
                                        $productImage = $product->ProductImages->first();
                                    @endphp

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
                                        <a class="mart-product-name" href="">{{ $product->title }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="container mt-4 ms-2">
        </div>
    </div> --}}



</div>

{{--

@section('scripts')
    <script>
        function changeImageSource() {
            var image = document.getElementById('myImage');
            if (window.matchMedia('(max-width: 600px)').matches) {
                image.src = "{{ asset('front-assets/assets/ramazan-mobile.jpg') }}"; // Change source for small screens
            } else if (window.matchMedia('(min-width: 301px) and (max-width: 1200px)').matches) {
                image.src = "{{ asset('front-assets/assets/ramazan-mobile.jpg') }}"; // Change source for medium screens
            } else {
                image.src = "{{ asset('front-assets/assets/ramazan-web.jpg') }}"; // Change source for large screens
            }
        }
        console.log('Hello Homiee');
    </script>
@endsection --}}
