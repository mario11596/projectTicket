<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Ticket;
use App\Models\User;



class UserController extends Controller
{
    public function userIndex(){  
       
        $id = Auth::id();
        $sumContactsAll = Contact::all()->count();
        $contacts = Contact::select()->where('user_id', $id)->get();
        $sumContacts = count($contacts);

        $tickets = Ticket::select()->where('user_id', $id)->get();
        $sumTickets = count($tickets);

        $tickets = Ticket::select()->where('user_id', $id)->where('status','Otvoreno')->get();
        $openTickets = count($tickets);

        $tickets = Ticket::select()->where('user_id', $id)->where('status','Zatvoreno')->get();
        $closeTickets = count($tickets);

      return view('dashboard', compact('sumContacts','sumContactsAll', 'sumTickets','openTickets','closeTickets'));
                            
    }

}
