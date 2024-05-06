<div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Order: #{{$order->id}}</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{route('admin.orders')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header pt-3">
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <h1 class="h5 mb-3">Shipping Address</h1>
                                        <address>
                                            <strong>{{ $order->first_name }} {{ $order->last_name }}</strong><br>
                                            {{ $order->address }} <br>
                                            @if ($order->apartment)
                                            Apartment: {{ $order->apartment }} <br>
                                            @endif
                                            {{ $order->city }}, {{ $order->zip_code }} <br>
                                            Phone: {{ $order->phone }} <br>
                                            Email: {{ $order->email }} <br>

                                        </address>
                                    </div>



                                    <div class="col-sm-4 invoice-col">
                                        <b>Invoice #</b><br>
                                        <br>
                                        <b>Order ID:</b> {{ $order->id }}<br>
                                        <b>Total:</b> {{ number_format($order->grand_total, 2) }}<br>
                                        <b>Status:</b>
                                        @if ($order->status == 'Pending')
                                            <span class="text-warning">Pending</span>
                                        @elseif ($order->status == 'Shipped')
                                            <span class="text-info">Shipped</span>
                                        @else
                                            <span class="text-success">Delivered</span>
                                        @endif
                                        <br>
                                        <b>Date Purchased:</b>
                                        {{ $order->created_at }}

                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-3">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th width="100">Price</th>
                                            <th width="100">Qty</th>
                                            <th width="100">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ number_format($product->price) }}</td>
                                                <td>{{ $product->qty }}</td>
                                                <td>{{ number_format($product->total, 2) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="3" class="text-right">Subtotal:</th>
                                            <td>{{ number_format($order->subtotal, 2) }}</td>
                                        </tr>

                                        <tr>
                                            <th colspan="3" class="text-right">Shipping:</th>
                                            <td>{{ number_format($order->shipping, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="text-right">Grand Total:</th>
                                            <td>{{ number_format($order->grand_total, 2) }} PKR</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <form wire:submit.prevent='updateOrderStatus' id="changeOrderStatus" id="changeOrderStatus">
                                <div class="card-body">
                                    <h2 class="h4 mb-3">Order Status</h2>
                                    <div class="mb-3">
                                        <select wire:model='status' name="status" id="status" class="form-control">
                                            <option value="pending">Pending</option>
                                            <option value="shipped">Shipped</option>
                                            <option value="delivered">Delivered</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="shipped_date">Shipping Date</label>
                                        <input wire:model='shipping_date' type="text" placeholder="Enter Shipping Date" name="shipped_date" id="shipped_date"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                    <h2 class="h4 mb-3">Send Inovice Email</h2>
                                    <div class="mb-3">
                                        <select wire:model='userType' name="userType" id="userType" class="form-control">
                                            <option value="customer">Customer</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <button wire:click='SendInvoiceEmail' class="btn btn-primary">Send</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div id="message-container"
        style="@if (Session::has('success')) transform: translateX(-50%) translateY(0%); @endif"
        class="message-container">
        <div class="message-child-1">
            <i style="@if (Session::has('success')) opacity:1; transform:scale(1); @endif"
                class="fa-regular fa-circle-check"></i>
        </div>
        <div class="message-child-2">
            {{ Session::get('success') }}
        </div>
        <div class="message-child-3">
            <button onclick="closeMessage()"><i class="fa-regular fa-circle-xmark"></i></button>
        </div>
    </div>
</div>

@section('script')
<script>
    $(document).ready(function() {
        if ($('#shipped_date')) {

            $('#shipped_date').datetimepicker({
                // options here
                format: 'Y-m-d H:i:s',
            });
        }
    });
</script>
@endsection
