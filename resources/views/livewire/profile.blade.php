<div>
    <div class="profile-container">
        <div class="profile-container-1">
            <h3 class="mb-4">Profile</h3>
            <div class="profile-container-1-row">
                <div class="profile-container-1-col">
                    <div>
                        <div style="font-weight: 500;font-size: 1.3rem">Account</div>
                        <div><a href="{{ route('user.logout') }}">Logout</a></div>
                    </div>
                </div>
                <div id="my_orders" class="profile-container-1-col">
                    <div>
                        <div style="font-weight: 500;font-size: 1.3rem">Account Detail</div>
                        <div>{{ Auth::user()->name }}&nbsp;{{ Auth::user()->last_name }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div  class="profile-container-2">
            <h4>My Orders</h4>
            <div class="profile-table-container">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">ORDERS #</th>
                            <th scope="col">SHIPPING DATE</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ORDER AMOUNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($orders->isNotEmpty())
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">
                                        <a class="order-no-button" href="{{route('user.order.detail',$order->id)}}">{{ $order->id }}</a>
                                    </th>
                                    @if ($order->status != 'cancelled' && $order->shippped_date != null)
                                        <td >
                                            {{ \Carbon\Carbon::parse($order->shippped_date)->format('d M, Y') }}</td>
                                    @else
                                        <td >-</td>
                                    @endif
                                    <td>
                                        @if ($order->status == 'delivered')
                                            <button style="cursor: default !important" class="btn btn-success">Delivered</button>
                                        @elseif ($order->status == 'shipped')
                                            <button style="cursor: default !important" class="btn btn-info">Shipped</button>
                                            @elseif ($order->status == 'cancelled')
                                            <button style="cursor: default !important" class="btn btn-dark">Cancelled</button>
                                        @else
                                            <button style="cursor: default !important" class="btn btn-warning">Pending</button>
                                        @endif
                                    </td>
                                    {{-- <td><button class="order-status-button">Pending</button></td> --}}
                                    <td>PKR {{ number_format($order->grand_total, 2) }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" style="padding: 20px !important">
                                    <h4>Orders Not Found</h4>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
