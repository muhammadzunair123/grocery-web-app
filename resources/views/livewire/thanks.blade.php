<div>
    <div class="thanks-container">
        <div class="thanks-container-1">THANK YOU FOR YOUR ORDER! :)</div>
        <div class="thanks-container-2">
            <div class="thanks-container-row">
                <div class="thanks-container-col">
                    <div>Order Number:</div>
                    <div>{{$orderId}}</div>
                </div>
                <div class="thanks-container-col">
                    <div>Date:</div>
                    <div>{{$DateTime}}</div>
                </div>
                <div class="thanks-container-col">
                    <div>Total</div>
                    <div>Rs. {{number_format($GrandTotal, 2)}}</div>
                </div>
                <div class="thanks-container-col">
                    <div>Payment Method</div>
                    <div>Cash On Delivery</div>
                </div>
            </div>
        </div>
    </div>
</div>
