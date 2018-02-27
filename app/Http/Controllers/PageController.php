<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function getIndex() {
    	return view('pages/welcome');
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
}
