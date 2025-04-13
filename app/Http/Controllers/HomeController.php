<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coach;
use App\Models\Adherent;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\NewsletterSubscription;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\NewsLetterRequest;
use App\Mail\NewsletterSubscriptionMail;

class HomeController extends Controller
{
    public function index(){

        $adherentCount=Adherent::count();
        $coachCount=Coach::count();
        $experienceYear=Carbon::now()->year - 2008;

        return view('pages/home',compact('adherentCount','coachCount','experienceYear'));
    }

    public function submitContactForm(ContactUsRequest $request){

        $request->validated();

        $contactMessage = new ContactUsMail($request->name, $request->email, $request->message);

        Mail::to('reidamohammed@gmail.com')->send($contactMessage);

        return back()->with('status', 'Your message has been sent successfully!');
    }

    public function submitNewsletter(NewsLetterRequest $request){

        $data=$request->validated();

        
        NewsletterSubscription::create($data);

        Mail::to($request->email)->send(new NewsletterSubscriptionMail());


        return back()->with('status', 'Thank you for subscribing to our newsletter!');
    }
}
