<?php
use App\Mail\OrderEmail;
use App\Models\CustomerAdress;
use App\Models\Order;
// use Illuminate\Support\Facades\Mail;
use App\Models\ProductImage;
use PHPMailer\PHPMailer\PHPMailer;use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function getProductImage ($productId) {
    return ProductImage::where('product_id',$productId)->first();
}

function getCustomerAddress($user_id){
    return   CustomerAdress::where('user_id',$user_id)->first();
}


// function orderEmail($orderId,$user='customer'){


//     // $order = Order::where('id',$orderId)->with('items')->first();

//     // if( $user == 'customer'){
//     //     $subject = 'Thanks for your order';
//     //     $email = $order->email;
//     // }
//     // else{
//     //     $subject = 'You have recieved an order';
//     //     $email = 'muhammadzunjair321@gmail.com';
//     // }

//     // $mailData = [
//     //     'subject' => $subject,
//     //     'order' => $order,
//     //     'userType' => $user,
//     // ];

//     // Mail::to($email)->send(new OrderEmail($mailData));

// }

function orderEmail($orderId, $user ='customer'){

    $order = Order::where('id',$orderId)->with('items')->first();

    if( $user == 'customer'){
        $subject = 'Thanks for your order';
        $email = $order->email;
    }
    else{
        $subject = 'You have recieved an order';
        $email = 'muhammadzunjair321@gmail.com';
    }

    $mailData = [
        'subject' => $subject,
        'order' => $order,
        'userType' => $user,
    ];

    Mail::to($email)->send(new OrderEmail($mailData));

}








?>
