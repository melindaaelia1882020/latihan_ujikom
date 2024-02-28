<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_paid')->default(false);
            $table->string('payment_receipt')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
    public function checkout()
{
$user_id = Auth::id();
$carts = Cart::where('user_id', $user_id)->get();
if ($carts == null) {
return Redirect::back();
}
$order = Order::create([
'user_id' => $user_id
]);
foreach ($carts as $cart) {
$product = Product::find($cart->product_id);$product->update([
'stock' => $product->stock - $cart->amount
]);
Transaction::create([
'amount' => $cart->amount,
'order_id' => $order->id,
'product_id' => $cart->product_id
]);
}
}
};
