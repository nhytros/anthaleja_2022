<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Character;
use Illuminate\Http\Request;
use App\Models\BankTransition;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function __construct(Request $request = null)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cid = Character::id();
        $transitions = BankTransition::where('character_id', $cid)
            ->orWhere('receiver_id', $cid)
            ->orderBy('created_at', 'desc')
            ->paginate(96);
        return view('frontend.bank.index', [
            'title' => 'Anthal Bank',
            'transitions' => $transitions,
        ]);
    }

    public function atm()
    {
        $character = Auth::user()->character;
        // $half_bank = (intval($character->bank_amount / 200) * 100) > 1e9 ? 1e9 : intval($character->bank_amount / 200) * 100;
        // $max_bank = (intval($character->bank_amount / 100) * 100) > 2e9 ? 2e9 : intval($character->bank_amount / 100);
        // $half_cash = (intval($character->cash / 200) * 100) > 1e9 ? 1e9 : intval($character->cash / 200) * 100;
        // $max_cash = (intval($character->cash / 100) * 100) > 2e9 ? 2e9 : intval($character->cash / 100) * 100;
        // $wdata = array_unique([50, 100, 200, $half_bank > 200 ? $half_bank : null, $max_bank > 200 ? $max_bank : null]);
        // $ddata = array_unique([50, 100, 200, $half_cash > 200 ? $half_cash : null, $max_cash > 200 ? $max_cash : null]);
        $wdata = array_unique([50, 100, 200]);
        $ddata = array_unique([50, 100, 200]);
        return view('frontend.bank.atm', [
            'title' => 'Bank',
            'wdata' => $wdata,
            'ddata' => $ddata,
        ]);
    }

    public function withdraw(Request $request)
    {
        $character = Auth::user()->character;
        $amount = self::setAmount($request);
        if ($character->bank_amount < $amount) {
            return redirect()->back()->with('danger', 'You do not have enough funds to withdraw');
        }
        $character->bank_amount -= $amount;
        $character->cash += $amount;
        $character->save();
        self::writeLogs(Auth::id(), Character::id(), 'Withdraw', $amount, 'outcome');
        return redirect()->back()->with('success', 'Withdraw success. Thanks for using our services');
    }

    public function deposit(Request $request)
    {
        $character = Auth::user()->character;
        $amount = self::setAmount($request);
        if ($character->cash < $amount) {
            return redirect()->back()->with('danger', 'You do not have enough funds to withdraw');
        }
        $character->cash -= $amount;
        $character->bank_amount += $amount;
        $character->save();
        self::writeLogs(Auth::id(), Character::id(), 'Deposit', $amount, 'income');
        return redirect()->back()->with('success', 'Withdraw success. Thanks for using our services');
    }

    public function transfer(Request $request)
    {
        $receiver = Character::where('bank_account', 'ATH-' . $request->bank_account)->first();
        $character = Auth::user()->character;
        if ($receiver->id == $character->id) {
            return redirect()->back()->with('warning', 'You cannot transfer to yourself');
        }
        if (!$receiver) {
            return redirect()->back()->with('warning', 'Account unavailable');
        }
        $receiver->bank_amount += $request->amount;
        $character->bank_amount -= $request->amount;
        $receiver->save();
        $character->save();
        self::writeLogs(Auth::id(), Character::id(), 'Transfer to ' . $request->bank_account, $request->amount, 'outcome');
        self::writeLogs($receiver->user->id, $receiver->id, 'Transfer received from ' . Auth::user()->character->bank_account, $request->amount, 'income');

        return redirect()->back()->with('success', 'Withdraw success. Thanks for using our services');
    }

    private function setAmount($request)
    {
        if ($request->amount) {
            return $request->amount;
        } elseif ($request->amount_x) {
            return $request->amount_x;
        }
    }

    private function writeLogs($uid, $cid, $action, $amount, $in_out)
    {
        Log::create([
            'user_id' => $uid,
            'character_id' => $cid,
            'action' => $action . ' ' . toAthel($amount),
        ]);
        BankTransition::create([
            'character_id' => $cid,
            $in_out => $amount,
            'description' => $action,
        ]);
    }
}
