<?php

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('nosotros', function () {
    return view('about');
})->name('about');

Route::get('servicios', function () {
    return view('service');
})->name('service');

Route::get('contactos', function () {
    return view('contact');
})->name('contact');

Route::post('messages',function(){
	//Enviar un correo
	$data = request()->all();
	Mail::send("emails.message", $data, function($message) use ($data) {
		$message->from($data['email'], $data['name'])
				->to('erickjoelac@gmail.com', 'Erick')
				->subject($data['subject']);
	});

	//Responder al Usuario
	return back()->with('flash', $data['name'] . ', Tu mensaje ha sido recibido');
	
})->name('messages');