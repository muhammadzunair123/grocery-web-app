<div>
    <div class="order-detail-container p-3 bg-white" style="border-radius: 8px">
        <div class="order-detail-1">
            <h4>My Order</h4>
            <div class="order-detail-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ORDERS #</th>
                            <th scope="col">DATE PURCHASED</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">SHIPPING DATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <th class="border" scope="row">{{ $order->id }}</th>

                            <td class="border">{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</td>

                            <td class="border"><span class="">
                                    @if ($order->status == 'delivered')
                                        <button style="cursor: default !important"
                                            class="btn btn-success">Delivered</button>
                                    @elseif ($order->status == 'shipped')
                                        <button style="cursor: default !important" class="btn btn-info">Shipped</button>
                                    @elseif ($order->status == 'cancelled')
                                        <button style="cursor: default !important"
                                            class="btn btn-dark">Cancelled</button>
                                    @else
                                        <button style="cursor: default !important"
                                            class="btn btn-warning">Pending</button>
                                    @endif
                                </span></td>

                            @if ($order->status != 'cancelled' && $order->shippped_date != null)
                                <td class="border">
                                    {{ \Carbon\Carbon::parse($order->shippped_date)->format('d M, Y') }}</td>
                            @else
                                <td class="border">-</td>
                            @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="order-detail-2">
            <div class="order-detail-2-1">
                <h5 class="mb-4">ORDER ITEMS</h5>

                @if ($orderItems->isNotEmpty())
                    @foreach ($orderItems as $item)
                        <div class="order-product-container">
                            @php
                                $productImage = getProductImage($item->product_id);
                            @endphp
                            <div class="order-detail-2-1-1">
                                <img src="{{ asset('storage/' . $productImage->image) }}" width="100%"
                                    alt="">
                            </div>
                            <div class="order-detail-2-1-2">
                                <span >{{$item->name}} X {{$item->qty}}</span><br>
                                <span>Rs. {{number_format($item->price,2)}} (Each)</span>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
            <div class="order-detail-2-2">
                <h5 class="mb-4">ORDER TOTAL</h5>
                <div class="order-detail-2-2-col">
                    <div class="order-detail-2-2-col-child">
                        <div style="font-weight: 500">Subtotal</div>
                        <div>Rs. {{ number_format($order->subtotal, 2) }}</div>
                    </div>
                    <div class="order-detail-2-2-col-child">
                        <div style="font-weight: 500">Shipping</div>
                        <div>Rs. {{ number_format($order->shipping, 2) }}</div>
                    </div>
                    <div class="order-detail-2-2-col-child">
                        <div style="font-weight: 500">Total</div>
                        <div>Rs. {{ number_format($order->grand_total, 2) }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
