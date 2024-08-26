<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function dashboard()
    {
        $users = User::role('user')->orderBy('created_at', 'desc')->get();
        $transactions = Transaction::where('user_id', auth()->user()->id)->get();

        return Inertia::render('Dashboard', [
            'role' => auth()->user()->roles->first()->name,
            'users' => $users,
            'transactions' => $transactions
        ]);
    }

    public function setBalance($user_id){
        if(Auth::user()->hasRole('admin')){
            $user = User::findOrFail($user_id);
            return Inertia::render('Auth/Admin/SetBalance', [
                'user' => $user
            ]);
        }else{
            // Flash a message to the session before redirecting
            session()->flash('message', 'You do not have permission to set the balance.');
            return redirect()->route('dashboard');
        }
    }
    public function updateBalance(Request $request, $user_id){
        if(auth()->user()->hasRole('admin')){
            $user = User::findOrFail($user_id);

            // Calculate the difference
            $difference = $request->balance - $user->balance;

            // Update the user's balance
            $user->balance = $request->balance;
            $user->currency = $request->currency;
            $user->save();

            // Create a new transaction with the calculated difference
            $transaction = new Transaction();
            $transaction->user_id = $user_id;
            $transaction->amount = $difference; // Use the difference here
            $transaction->save();

            session()->flash('success', 'Balance updated successfully.');
            return redirect()->route('dashboard');
        }else{
            session()->flash('message', 'You do not have permission to set the balance.');
            return redirect()->route('dashboard');
        }
    }
}
