<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Category;


class UserController extends Controller
{
    public function userIndex(){  
       
        $id = Auth::id();
        $sumContactsAll = Contact::all()->count();
        $sumContacts = Contact::select()->where('user_id', $id)->count();
        //$sumContacts = count($contacts);

        $sumTickets = Ticket::select()->where('user_id', $id)->count();
        //$sumTickets = count($tickets);

        $openTickets = Ticket::select()->where('user_id', $id)->where('status','Otvoreno')->count();
        //$openTickets = count($tickets);

        $closeTickets = Ticket::select()->where('user_id', $id)->where('status','Zatvoreno')->count();
        //$closeTickets = count($tickets);

        $proposalTicket = Category::where('name', 'Prijedlog')
                                    ->pluck('id');
                                    
        $proposalTicket = Ticket::where('user_id', $id)
                                ->where('category_id', $proposalTicket)
                                ->count();

        $complaintTicket = Category::where('name', 'Pritužba')
                                  ->pluck('id');

        $complaintTicket = Ticket::where('user_id', $id)
                                ->where('category_id', $complaintTicket)
                                ->count();
        
        $complaintHardTicket = Category::where('name', 'Žalba')
                                ->pluck('id');
                                
        $complaintHardTicket  = Ticket::where('user_id', $id)
                            ->where('category_id', $complaintHardTicket )
                            ->count();

        
      return view('dashboard', compact('sumContacts','sumContactsAll', 'sumTickets','openTickets',
                                        'closeTickets', 'proposalTicket','complaintTicket','complaintHardTicket'));
                            
    }

}
