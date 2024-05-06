<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Product</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{route('admin.product')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <form action="" wire:submit.prevent="CreateProduct">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="title">Title</label>
                                                <input wire:model='title' type="text" name="title" id="title"
                                                    class="form-control @error('title') is-invalid @enderror"
                                                    placeholder="Title">
                                                @error('title')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="title">Slug</label>
                                                <input wire:model='slug' type="text" name="title" id="title"
                                                    class="form-control @error('slug') is-invalid @enderror"
                                                    placeholder="Slug">
                                                @error('slug')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="description">Description</label>
                                            <div class="mb-3">
                                                <textarea wire:model='description' name="description" id="description" cols="30" rows="10"
                                                    placeholder="Description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Product Images</label>
                                        <input wire:model="images" multiple
                                            class="form-control @error('images') is-invalid @enderror" type="file"
                                            accept="image/jpeg,image/png,image/jpg" id="formFile">
                                        @error('images')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                        <div wire:loading wire:target="images">
                                            <div class="loader"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container text-left pb-2">
                                    <div class="row align-items-start">
                                        @if ($images)
                                            @foreach ($images as $image)
                                                <div class="col">
                                                    <img style="border-radius: 10px;border:2px solid black;box-shadow:0 .1rem .5rem rgba(0,0,0,.15)"
                                                        width="100px" src="{{ $image->temporaryUrl() }}"
                                                        alt="">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Pricing</h2>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="price">Price</label>
                                                <input wire:model='price' type="text" name="price" id="price"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    placeholder="Price">
                                                @error('price')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="compare_price">Compare at Price</label>
                                                <input wire:model='compare_price' type="text" name="compare_price"
                                                    id="compare_price"
                                                    class="form-control @error('compare_price') is-invalid @enderror"
                                                    placeholder="Compare Price">
                                                @error('compare_price')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                                <p class="text-muted mt-3">
                                                    To show a reduced price, move the product’s original price into
                                                    Compare
                                                    at price. Enter a lower value into Price.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Inventory</h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="sku">SKU (Stock Keeping Unit)</label>
                                                <input wire:model='sku' type="text" name="sku" id="sku"
                                                    class="form-control  @error('sku') is-invalid @enderror"
                                                    placeholder="sku">
                                                @error('sku')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="barcode">Barcode</label>
                                                <input wire:model='barcode' type="text" name="barcode"
                                                    id="barcode" class="form-control" placeholder="Barcode">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input wire:model='track_qty'
                                                        class="custom-control-input @error('track_qty') is-invalid @enderror"
                                                        type="checkbox" id="track_qty" name="track_qty" checked>

                                                    <label for="track_qty" class="custom-control-label">Track
                                                        Quantity</label>

                                                    @error('track_qty')
                                                        <p class="invalid-feedback">
                                                            {{ $message }}
                                                        </p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input wire:model='qty' type="number" min="0" name="qty"
                                                    id="qty"
                                                    class="form-control @error('qty') is-invalid @enderror"
                                                    placeholder="Qty">
                                                @error('qty')
                                                    <p class="invalid-feedback">
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Product status</h2>
                                    <div class="mb-3">
                                        <select wire:model='status' name="status" id="status"
                                            class="form-control">
                                            <option value="0">Block</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="h4  mb-3">Product category</h2>
                                    <div class="mb-3">
                                        <label for="category">Category</label>
                                        <select wire:model.live ="categoryid" name="category" id="category"
                                            class="form-control @error('categoryid') is-invalid @enderror">
                                            <option value="">Select Category Here</option>
                                            @foreach ($this->categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('categoryid')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="category">Sub category</label>
                                        <select wire:model.live="subcategory_id" name="sub_category"
                                            id="sub_category" class="form-control">
                                            <option value="">Select SubCategory Here</option>
                                            @foreach ($this->subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Product brand</h2>
                                    <div class="mb-3">
                                        <select wire:model='brand_id' name="status" id="status"
                                            class="form-control">
                                            <option value="">Select Brand Here</option>
                                            @foreach ($this->brands as $brand)
                                                <option value="{{ $brand->id }}"> {{ $brand->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Featured product</h2>
                                    <div class="mb-3">
                                        <select wire:model='is_featured' name="status" id="status"
                                            class="form-control @error('is_featured') is-invalid @enderror">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                        @error('is_featured')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pb-5 pt-3">
                        <button class="btn btn-primary">Create</button>
                        <a href="{{route('admin.product')}}" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
