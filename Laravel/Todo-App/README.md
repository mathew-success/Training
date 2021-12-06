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

## errors :

	- We can display the validation errors in the blade file.
	
	<div class="alert alret-warning">
		@if($errors->any())
			@foreach($errors->all() as $error)
				{{ $error }}
			@endforeach
		@endif
	</div>
	
    
## Validation custom error messages :
    	
    	- Using the below example to display the custom validation errors in the blade file,
    	
	$messages = [
		'name.required' => 'custom reuired name mesg'
	];

     
## Blade form old value
    - Using the below example to show the old input data after submitting the form,
      
       o vale = "{{old('name')}}"
   
   
## Password confirmation validation,

	- In the new user create the page, using the below method to validate the confirmed password
	
	In form,
	
		<input type="password" name="password">
		<input type="password" name="password_confirmation">
	
	In Validation,
	
		$request->validate([
			'password' => 'required|confirm',
		]);
   
   
 
## database configuration :

	- config/database.php file is having the actual database details from the environment file. Here we can also add the multiple database connections. 
   
   
## Migration :

	a. Create the table using the below migration command,
	
		> php artisan make:migration create_table_names_table
		
		> We have to create the table in the plural. 
	
	b. We can also add the new columns in the existing table and also edit the existing columns using the change() method.
	
		> ex : $table->string('name')->nullable()->change();
		
	c. Schema::create
	
		> We can use the above syntax to create the new table.
	
	d. Schema::table
	
		> We can use the above syntax to edit or add new columns in the existing table.
 
 ## ORM :
 
 	a. Model,
 	
 		> We have to create the model in singular form and create the table as the plural form.
 	
 		> Create the model using the below command,
 		
 			o php artisan make:model ModelName
 	
 		> Model represents the table name. We can access the table using the model.
 		
 		> Fillable and guarded
 		
 			o Using the Fillable to mention the column names and the mentioned columns will be used for store records.
 			
 			o Using guarded to mention the field name and that field will not accept/store the input data. 
 			
 			
        b. Store data,
        
        	> We have three methods to store the data.
        	
        		1. Object oriented method - $user = new ModelName;
        		
        		2. Create - ModelName::create(['data'=>'value']);
        		
        		3. Insert - We can store the array data in one time. Ex : ModelName::insert(Array1,Array2); 
