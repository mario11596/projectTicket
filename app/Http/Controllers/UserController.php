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
       
        $sumTickets = Ticket::select()->where('user_id', $id)->count();
       
        $openTickets = Ticket::select()->where('user_id', $id)->where('status','Otvoreno')->count();
    
        $closeTickets = Ticket::select()->where('user_id', $id)->where('status','Zatvoreno')->count();
    
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

        $data = array(
            'sumContacts' => $sumContacts,
            'sumContactsAll' => $sumContactsAll,
            'sumTickets' => $sumTickets,
            'openTickets' => $openTickets,
            'closeTickets' => $closeTickets,
            'proposalTicket' => $proposalTicket,
            'complaintTicket' => $complaintTicket,
            'complaintHardTicket' => $complaintHardTicket
        );
      return view('dashboard', compact('data'));                        
    }
}
