<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session('error') }}
                </div>
            @endif

            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Password</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a wire:navigate href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="card">
                    <form action="" wire:submit.prevent ="ChangePassword">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name">Old Password</label>
                                        <input type="password" wire:model="old_password" id="name"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            placeholder="Old Password">
                                        @error('old_password')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name">New Password</label>
                                        <input type="password" wire:model="new_password" id="name"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            placeholder="Enter New Password">
                                        @error('new_password')
                                            <p class="invalid-feedback">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="name">Confirm Password</label>
                                        <input type="password" wire:model="confirm_password" id="name"
                                            class="form-control @error('confirm_password') is-invalid @enderror"
                                            placeholder="Confirm New Password">
                                        @error('confirm_password')
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
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a wire:navigate href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
            </form>
    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
