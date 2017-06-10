<?php

Route::get('/', array('as' => 'task',function(){

	$items = Auth::user()->items;
	

	return View::make('task', array(
		'items' => $items
	));
}))->before('auth');


Route::post('/', function(){
	$id =Input::get('id');
	$item = task::findOrFail($id);
	
	if ($item->user_id == Auth::user()->id){
	$item-> mark();
	}

	return View::make('/task');
})->before('csrf');


Route::get('/new',array('as' => 'new', function(){

	return View::make('new');
}));

Route::post('new',function(){
	$rules = array('content' => 'required|min:3|max:255');
	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
		return Redirect::route('new')->withErrors($validator);
	}

	$item =new Item;
	$item->content = Input::get('content');
	$item->user_id = Auth::user()->id;
	$item->save();

	return redirect::route('new');
})->before('csrf');

Route::get('/delete/{task}', array( 'as' => 'delete' , function( Item $task){
	$task->delete();

}));

Route::bind('task', function($value,$route){

			if ($task->user_id == Auth::user()->id){
				return Item::where('id', $value)->first();
			};
});

Route::get('/login', array('as' => 'login',function(){

 return View::make('login');
}))->before('guest');



Route::post('login', function(){

	$rules = array('username' => 'required' , 'password' => 'required');
	$validator = Validator::make(Input::all(), $rules);


		if ($validator->fails()) {
			return Redirect::route('login')->withErrors($validator);
		}

		$auth = Auth::attempt(array(
			'name'=> Input::get('username'),
			'password'=> Input::get('password')
		), false);

		if (!$auth) {
			return Redirect::route('login')->withErrors(array(
				'Invalide identifiant'
			));
		}
		

		return Redirect::route('task');
	
})->before('csrf');