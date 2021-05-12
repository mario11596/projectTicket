<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



use App\Models\Contact;
use App\Models\Ticket;

class ContactsController extends Controller{

    public function index(){  //izlistava sve
       
      $id = Auth::id();
      $contacts = Contact::select()->where('user_id', $id)->get();

    return view('index', compact('contacts'));
    }

    public function create(){ //novi kontakt

        return view('create');
    }

    public function store(Request $request){ //spremamo novi kontakt

        $user_id = Auth::id();

        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
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
        return view('edit', compact('contact'));


        /*$contact = Contact::find($id);
        return view('edit', compact('contact'));*/
    }

    public function update(Request $request,$id){ //spremiti promjene kontakt

        $user_id = Auth::id();
        $contact = Contact::where("id","=",$id)->get()->first();

        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required',
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

    public function destory(Contact $contact){ //brisanje kontakata
      
     
            $contact->delete();
            return redirect('/contact')->with('warning', 'Uspješno je izbrisan kontakt');
        
    }

    public function show(Contact $contact){ //pokazuje specificirano
        

        return view('show', compact('contact'));
    }
    //tražilica
    public function search(Request $request){
        $search = $request->input('search');
   

        $contacts = Contact::query()
                    ->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->get();
        return view('index', compact('contacts'));
    }


  
}
