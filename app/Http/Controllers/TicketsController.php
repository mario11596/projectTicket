<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Ticket;
use App\Models\Contact;
use App\Models\User;

class TicketsController extends Controller
{
   public function ticket_index(){  
       
       /* $id = Auth::id();
        $tickets = Ticket::select()->where('user_id', $id)->get();
  
      return view('tickets.index', compact('tickets'));*/

      $id = Auth::id();
      $tickets = Ticket::select()->where('user_id', $id)->get()->load("contact");
      return view('tickets.index', compact('tickets'));
    }

    public function ticket_create(){ //novi kontakt

        $categories = Category::all();

        return view('tickets.create', compact('categories'));
    }

    public function ticket_store(Request $request){ 

        $user_id = Auth::id();

        $request->validate([
            'category' => 'required',
            'title' => 'required',
            'priority' => 'required',
            'message' => 'required', 
            'name_contact' => 'required'
        ]);

        $find_id = Contact::where('name', "=", $request->name_contact)->first()->id;

    
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
        return redirect('/ticket')->with('success', 'Uspješno je spremljen novi zahtjev');
    }
    public function ticket_close($id){
        $ticket = Ticket::where('id',$id)->firstOrFail();
        $ticket->status = "Zatvoreno";
        $ticket->save();

        return redirect('/ticket')->with('warning', 'Uspješno je zatvoren zahtjev korisnika ' );  
    }
    public function ticket_open($id){
        $ticket = Ticket::where('id',$id)->firstOrFail();
        $ticket->status = "Otvoreno";
        $ticket->save();

        return redirect('/ticket')->with('warning', 'Uspješno je ponovno otvoren zahtjev korisnika ' );  
    }
 
    public function ticket_destory(Ticket $ticket){
        $ticket->delete();

        return redirect('/ticket')->with('warning', 'Uspješno je izbrisan zahtjev korisnika');
    }

    
   
}
