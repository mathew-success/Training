<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## What is Laravel?

Laravel is a PHP framework. It is developed by Taylor Otwell. The first release is in June 2011. It is very fast. And it is an open source. And it is easy to use.

## Composer :

- The composer is a  dependency manager. It is used to manage the dependencies. We can find out the details of installed dependencies in the composer.json file.
- And in composer.lock file we can see the dependency names with descriptions of the particular dependency. The installed dependencies are available in the vendor folder.

## Jetstream :

- Jetstream is used for login, registration, email verification, two-factor authentication, session management. Install this dependency, we can use the below command,
    o - composer require laravel/jetstream
- And we can use the liveware,
	
		o php artisan jetstream:install livewire
		
 - And finally need to install the npm and migrate,
	
		o npm install
		o npm run dev
		o php artisan migrate
 
 ## Route :
 
    - The most basic Laravel routes accept a URI and a closure. Here we can use get, post and view.
   	
   	- "Route::view" will display the static content. And we can also pass the data through a route using a compact, array, and with. Also, we can use the request to show the data.
   	
   	- In route, we can use the middleware for logged-in users to visit the page.
    
 ## Controller :
 
     - We can create the controller using the below command,
	
		> php artisan make:controller ControllerName
	
	 - The controller is the mediator between model and view.
     
 ## CSRF :
 
    - CSRF means Cross-site Request Forgery.
	
	- CSRF token is used for secure form submission. 
	
	- CSRF will generate the token automatically in the form to protect the data submission. 

	- We can use the below code to implement the csrf in form,
	
		o csrf;
		
	- Without csrf token, the page will display the error as "Page is expired".
    
    
 ## Blade template engine :
 
     - We can display the data using the {{}}. Use "blade.php" to save the blade file. 
	
	- In blade file, We need to add the @ symbol before the conditional statments and loops,
	
	    > @if @endif, @switch, @for, @endfor, @forelse, @foreach
	    > @unless, @empty, @isset, @auth
	
	- We can also use the following php tags in blade file,
	
		> @php echo "print"; @endphp
        
 
 ## validation :
 
    Using the validate array to validate the request data in laraval. 
	
	Syntax,
	
		$request->validate([
			'name' => 'required',
		]);
