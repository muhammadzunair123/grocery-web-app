<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Sub Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a wire:navigate href="{{ route('admin.subcategory') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <form action="" wire:submit.prevent = "createSubCategory">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name">Category</label>
                                        <select wire:model="category_id" name="category" id="category"
                                            class="form-control @error('name') is-invalid @enderror">
                                            <option value="">Select Category Here</option>
                                            @if (!empty($categories))
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('category_id')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input wire:model="name" type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                                        @error('name')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">Slug</label>
                                        <input wire:model="slug" type="text" name="slug" id="slug"
                                            class="form-control @error('slug') is-invalid @enderror" placeholder="Slug">
                                        @error('slug')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="image">Image</label><br>
                                    <input wire:model="image" accept="image/jpeg,image/png,image/jpg" id="image"
                                        type="file" class=" @error('image') is-invalid @enderror"
                                        id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    @error('image')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <div wire:loading wire:target="image">
                                        <div class="loader"></div>
                                    </div>

                                </div>
                                <div class="col-md-12">

                                    @if ($image)
                                        <br>
                                        <img style="border-radius: 10px;border:2px solid black;box-shadow:0 .1rem .5rem rgba(0,0,0,.15)"
                                            width="100px" src="{{ $image->temporaryUrl() }}" alt="">
                                        <br><br>
                                    @endif
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status">Status</label>
                                        <select wire:model="status" id="status" class="form-control">
                                            <option value="0">Block</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a wire:navigate href="{{ route('admin.subcategory') }}"
                            class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>

{{-- @push('script')
    <script>
        $("#name").change(function() {
            element = $(this);
            $.ajax({
                url: "{{ route('getSlug') }}",
                type: 'get',
                data: {
                    title: element.val()
                },
                datatype: 'json',
                success: function(response) {
                    $("#slug").val(response["slug"]);
                }
            });
        });
    </script>
@endpush --}}
