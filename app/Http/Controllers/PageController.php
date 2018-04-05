<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Mail;

class PageController extends Controller
{
    public function getIndex() {
    	$posts = Post::orderBy("created_at", "desc")->limit(4)->get();
    	return view('pages/welcome')->withPosts($posts);
    }
	
	public function getAbout() {
		$first = 'Jurica';
		$last = 'Šoštarić';
		
		$fullname = "$first $last";
		$email = "juraos1@yahoo.com";
		$data = [];
		$data["email"] = $email;
		$data["fullname"] = $fullname;
		
		//return view('pages/about')->withFullname($fullname)->withEmail($email);
		return view("pages/about")->withData($data);
	}
	
	public function getContact() {
		return view('pages/contact');
	}
	
	public function postContact(Request $request) {
		$this->validate($request, array(
			"email" => "required|email",
			"subject" => "min:3",
			"message" => "min:10"
		));
		
		$data = array(
			"email" => $request->email,
			"subject" => $request->subject,
			"bodyMessage" => $request->message
		);
		
		Mail::send("emails.contact", $data, function($message) use ($data) {
			$message->from($data["email"]);
			$message->to("juraos1@yahoo.com");
			$message->subject($data["subject"]);
		});
		
		Session::flash("success", "Your Email was Sent!");
		
		return redirect("/");
		
	}
}
