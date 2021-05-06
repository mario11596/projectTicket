<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Contact;

class ContactsController extends Controller{

    public function index(){  //izlistava sve
       
      $id = Auth::id();
      $contacts = Contact::select()->where('user_id', $id)->get();

    return view('index', compact('contacts'));
    }

    public function create(){ //novi kontakt

        return view('create');
    }

    public function store(){ //spremamo novi kontakt

        $user_id = Auth::id();

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

        return redirect('/contact');
    }
    
    public function edit($id){ //uređivanje kontakta
        $contact = Contact::find($id);
        return view('edit', compact('contact'));
    }

    public function update($id){ //spremiti promjene kontakt

        $user_id = Auth::id();
        $contact = Contact::where("id","=",$id)->get()->first();
      
        $contact->name = request('name');
        $contact->age = request('age');
        $contact->address = request('address');
        $contact->mobile = request('mobile');
        $contact->email = request('email');
        $contact->currentaccountbalance = request('currentaccountbalance');
        $contact->credit = request('credit');
        $contact->user_id = $user_id;
    
        $contact->save();

        return redirect('/contact');
    }

    public function destory(Contact $contact){ //brisanje kontakata
        $contact->delete();

        return redirect('/contact'); 
    }

    public function show($id){ //pokazuje specificirano
        $contact = Contact::findOrFail($id);

        return view('show', compact('contact'));
    }
  
}
