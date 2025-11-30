<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Midtrans Configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    // Generate Snap Token untuk pembayaran
    public function getSnapToken(Request $request)
    {
        $user = Auth::user();
        
        // Data produk dari request
        $items = $request->items; // Array of items dengan structure: [{id, name, price, quantity}]
        $totalAmount = $request->total_amount;
        $orderId = 'ORDER-' . time() . '-' . $user->id;

        try {
            $transactionDetails = [
                'order_id' => $orderId,
                'gross_amount' => (int)$totalAmount,
            ];

            $itemDetails = [];
            foreach ($items as $item) {
                $itemDetails[] = [
                    'id' => $item['id'],
                    'price' => (int)$item['price'],
                    'quantity' => (int)$item['quantity'],
                    'name' => $item['name'],
                ];
            }

            $customerDetails = [
                'first_name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '08123456789',
            ];

            $payload = [
                'transaction_details' => $transactionDetails,
                'item_details' => $itemDetails,
                'customer_details' => $customerDetails,
            ];

            $snapToken = Snap::getSnapToken($payload);

            return response()->json([
                'status' => 'success',
                'snap_token' => $snapToken,
                'order_id' => $orderId,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    // Handle Midtrans Callback/Notification
    public function handleCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        // Validasi signature untuk keamanan
        if ($hashed !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $orderId = $request->order_id;
        $statusCode = $request->status_code;
        $paymentStatus = $request->transaction_status;

        // Update status pembayaran di database Anda
        // Contoh: Jika Anda punya model Order
        // $order = Order::where('order_id', $orderId)->first();

        if ($paymentStatus == 'capture' || $paymentStatus == 'settlement') {
            // Pembayaran berhasil
            // Update order status ke 'paid'
            // $order->update(['payment_status' => 'paid']);
            return response()->json(['message' => 'Payment success']);
        } elseif ($paymentStatus == 'pending') {
            // Pembayaran pending
            // $order->update(['payment_status' => 'pending']);
            return response()->json(['message' => 'Payment pending']);
        } elseif ($paymentStatus == 'deny') {
            // Pembayaran ditolak
            // $order->update(['payment_status' => 'denied']);
            return response()->json(['message' => 'Payment denied']);
        } elseif ($paymentStatus == 'expire') {
            // Pembayaran expired
            // $order->update(['payment_status' => 'expired']);
            return response()->json(['message' => 'Payment expired']);
        }
    }
    public function checkPaymentStatus($orderId)
    {
        try {
            $status = Transaction::status($orderId);
            $transactionStatus = is_object($status) ? $status->transaction_status : ($status['transaction_status'] ?? null);
            $paymentType = is_object($status) ? ($status->payment_type ?? null) : ($status['payment_type'] ?? null);
        return response()->json([
            'status' => 'success',
            'transaction_status' => $transactionStatus,
            'payment_type' => $paymentType,
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}