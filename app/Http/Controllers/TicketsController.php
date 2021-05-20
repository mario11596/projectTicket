<?php

namespace App\Http\Controllers;

use App\Events\NewTicketEvent;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\MyMail;

use App\Models\Ticket;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
   public function ticketIndex(){  
       
        $id = Auth::id();
        $tickets = Ticket::select()->where('user_id', $id)->paginate(5);

        return view('tickets.index', compact('tickets'));
    }

    public function ticketCreate(){

        $categories = Category::all();

        return view('tickets.create', compact('categories'));
    }

    public function ticketStore(Request $request){ 

        $user_id = Auth::id();

        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'priority' => 'required',
            'message' => 'required', 
            'nameContact' => 'required'
        ]);
        
        $find_id = Contact::where('name', "=", $request->nameContact)->pluck('id')->first();

    
        $contact = Contact::findorFail($find_id);

        if($contact->user_id != Auth::id()){
            return redirect('/ticket')->with('info', 'Nemate pristup otvaranju zahtjeva zadanom klijentu!');
        }
        
       
        $ticket = new Ticket();
        $ticket->category_id = request('category');
        $ticket->contact_id = $find_id;
        $ticket->title = request('title');
        $ticket->priority = request('priority');
        $ticket->message = request('message');
        $ticket->status = "Otvoreno";
        $ticket->user_id = $user_id;

        $ticket->save();


        event(new NewTicketEvent($ticket));
        
        return redirect('/ticket')->with('success', 'Uspješno je spremljen novi zahtjev');
    }
    public function ticketClose($id){
        $ticket = Ticket::where('id',$id)->firstOrFail();
        $ticket->status = "Zatvoreno";
        $ticket->save();

        return redirect('/ticket')->with('warning', 'Uspješno je zatvoren zahtjev korisnika ' );  
    }
    public function ticketOpen($id){
        $ticket = Ticket::where('id',$id)->firstOrFail();
        $ticket->status = "Otvoreno";
        $ticket->save();

        return redirect('/ticket')->with('warning', 'Uspješno je ponovno otvoren zahtjev korisnika ' );  
    }
 
    public function ticketDestroy(Ticket $ticket){
        $ticket->delete();

        return redirect('/ticket')->with('warning', 'Uspješno je izbrisan zahtjev korisnika');
    }

    public function ticketCreateUser($name){ 
        $categories = Category::all();

        return view('tickets.create', compact('categories', 'name'));
    }

    public function ticketSearch(Request $request){
        $search = $request->input('search') ?: "";
   
        $tickets = Ticket::query()
                    ->where('user_id', Auth::id())
                    ->where(function(Builder $builder) use ($search){
                    $builder->where('title', 'LIKE', "%{$search}%");
                    })
                    ->orderBy('id')
                    ->paginate(5);

        if(count($tickets) > 0){
            return view('tickets.index', compact('tickets', 'search'));
        } else {
             return redirect('/ticket')->with('warning', 'Nema traženog zahtjeva!');
        }
        
        //return view('tickets.index', compact('tickets'));
    }

    public function ticketShow($id){ 
        $ticket = Ticket::where('id', $id)->first();

        return view('tickets.show', compact('ticket'));
    }
     
}