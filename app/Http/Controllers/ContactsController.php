<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



use App\Models\Contact;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;

use function PHPUnit\Framework\isEmpty;

class ContactsController extends Controller{

    public function index(){  //izlistava sve
       
      $id = Auth::id();
      $contacts = Contact::select()->where('user_id', $id)->paginate(5);

    return view('contacts.index', compact('contacts'));
    }

    public function create(){ //novi kontakt

        return view('contacts.create');
    }

    public function store(Request $request){ //spremamo novi kontakt

        $user_id = Auth::id();

        $request->validate([
            'name' => 'required|alpha|max:30',
            'age' => 'required|integer|min:18',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'currentaccountbalance' => 'required',
            'credit' => 'required',
        ]);
    
        $contact = new Contact();
        $contact->name = request('name');
        $contact->age = request('age');
        $contact->address = request('address');
        $contact->mobile = request('mobile');
        $contact->email = request('email');
        $contact->currentaccountbalance = request('currentaccountbalance');
        $contact->credit = request('credit');
        $contact->user_id = $user_id;
        $contact->save();

        return redirect('/contact')->with('success', 'Uspješno je spremljen novi kontakt');
    }
    
    public function edit($id){ //uređivanje kontakta
        $contact = Contact::findorFail($id);

        if($contact->user_id != Auth::id()){
            return redirect('/contact');
        }
        return view('contacts.edit', compact('contact'));

    }

    public function update(Request $request,$id){ //spremiti promjene kontakt

        $user_id = Auth::id();
        $contact = Contact::where("id","=",$id)->get()->first();

        $request->validate([
            'name' => 'required|alpha|max:30',
            'age' => 'required|integer|min:18',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'currentaccountbalance' => 'required',
            'credit' => 'required',
        ]);
      
        $contact->name = request('name');
        $contact->age = request('age');
        $contact->address = request('address');
        $contact->mobile = request('mobile');
        $contact->email = request('email');
        $contact->currentaccountbalance = request('currentaccountbalance');
        $contact->credit = request('credit');
        $contact->user_id = $user_id;
    
        $contact->save();

        //return redirect('/contact');
        return redirect('/contact')->with('info', 'Uspješno je ažuriran kontakt');
    }

    public function destroy($id){ //brisanje kontakata
        $check_id_date = Ticket::where('contact_id', $id)->get();
       

        if(count($check_id_date) > 0){
            return redirect('/contact')->with('warning', 'Kontakt ima zahtjev, nemožete ga obrisati');
        } else {
            Contact::where('id',$id)->delete();
            return redirect('/contact')->with('warning', 'Uspješno je izbrisan kontakt');
        }
  
    }

    public function show($id){ //pokazuje specificirano
        $number = 0;
        $contact = Contact::where('id',$id)->first();
        $tickets = Ticket::where('contact_id',$id)->get();

        return view('contacts.show', compact('contact','tickets','number'));
    }
    //tražilica
    public function search(Request $request){
        $search = $request->input('search') ?: "";

        $contacts = Contact::query()
        ->where('user_id', Auth::id())
        ->where(function(Builder $builder) use ($search){
            $builder->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%");
        })
        ->orderBy('id')
        ->paginate(5);
        
      if(count($contacts) > 0){
            return view('contacts.index', compact('contacts','search'));
        } else {
            return redirect('/contact')->with('warning', 'Nema traženog korisnika!');
        }
    }


  
}
