<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;


class ContactsController extends Controller{

    public function index(){  
       
        $contacts = Contact::select()->where('user_id', Auth::id())->paginate(5);

        return view('contacts.index', compact('contacts'));
    }

    public function create(){ 

        return view('contacts.create');
    }

    public function store(Request $request){ 


        $request->validate([
            'name' => 'required|max:30',
            'age' => 'required|integer|min:18',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'currentaccountbalance' => 'required',
            'credit' => 'required',
        ]);
        $data = array_merge($request->all(), ['user_id' => Auth::id()]);
        $contact = Contact::query()->create($data);


        return redirect('/contact')->with('success', 'Uspješno je spremljen novi kontakt');
    }
    
    public function edit(Contact $contact){
    
        if($contact->user_id != Auth::id()){
            return redirect('/contact');
        }
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request,$id){ 

        $contact = Contact::where("id","=",$id)->get()->first();

        $request->validate([
            'name' => 'required',
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
        $contact->user_id = Auth::id();
    
        $contact->save();

        return redirect('/contact')->with('info', 'Uspješno je ažuriran kontakt');
    }

    public function destroy($id){ 
        $check_id_date = Ticket::where('contact_id', $id)->get();
       
        if(count($check_id_date) > 0){
            return redirect('/contact')->with('warning', 'Kontakt ima zahtjev, nemožete ga obrisati');
        } else {
            Contact::where('id',$id)->delete();
            return redirect('/contact')->with('warning', 'Uspješno je izbrisan kontakt');
        }
    }

    public function show(Contact $contact){ 
        $tickets = $contact->ticket;
        $number = 0;

        return view('contacts.show', compact('contact','tickets','number'));
    }
    
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
