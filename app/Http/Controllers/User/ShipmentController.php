<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shipment;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShipmentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shipments = Shipment::whereUserId($user->id)->paginate(10);
        return view('user.shipments.index', ['shipments' => $shipments]);
    }

    public function create()
    {
        return view('user.shipments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sender_name' => 'required',
            'sender_address' => 'required',
            'sender_state' => 'required',
            'sender_phone' => 'required',
            'receiver_name' => 'required',
            'receiver_address' => 'required',
            'receiver_state' => 'required',
            'receiver_phone' => 'required',
            'receiver_email' => 'required',
            'description' => 'required',
        ]);

        $user = Auth::user();
        $data = $request->except(['isPickupAddress']);
        $data['user_id'] = $user->id;
        $data['pickup_state'] = $request->pickup_state ?? $request->sender_state;
        $data['pickup_address'] = $request->pickup_state ?? $request->sender_address;
        $data['tracking_no'] = 'CCC' . $this->randomNumber(7);
        $shipment = Shipment::create($data);

        $transaction = Transaction::create([
            'shipment_id' => $shipment->id,
            'user_id' => $shipment->user_id,
            'amount' => 1500,
        ]);

        return view('user.pay', [
            'shipment_id' => $shipment->id,
            'transaction_id' => $transaction->id,
            'amount' => $transaction->amount * 100,
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $shipment = Shipment::find($id);
        return view('user.shipments.edit', compact('shipment'));
    }

    public function update(Request $request, $id)
    {
        $shipment = Shipment::find($id);
        $data = $request->except(['isPickupAddress']);
        $data['pickup_state'] = $request->pickup_state ?? $request->sender_state;
        $data['pickup_address'] = $request->pickup_state ?? $request->sender_address;
        $shipment->update($data);

        $transaction = Transaction::whereShipmentId($id)->first();

        return view('user.pay', [
            'shipment_id' => $shipment->id,
            'transaction_id' => $transaction->id,
            'amount' => $transaction->amount * 100,
            'user' => Auth::user(),
        ]);
    }


    public function randomNumber($length)
    {
        $result = '';
        for ($i = 0; $i < $length; ++$i) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }

    public function callback(Request $request)
    {
        $paymentDetails = json_decode($request->paystack_data);

        if ($paymentDetails->status === 'success' && $paymentDetails->message === 'Approved') {
            Transaction::whereId($request->transaction_id)->update([
                'status' => true,
                'reference' => $paymentDetails->reference
            ]);

            Shipment::whereId($request->shipment_id)->update([
                'has_paid' => true
            ]);

            return $this->index();
        }
    }
}
