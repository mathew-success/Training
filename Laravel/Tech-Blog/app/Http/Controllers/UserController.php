<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users/view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = [
            [
                'name' => 'Sathish',
                'email' => 'sathish@gmail.com'
            ],
            [
                'name' => 'Jack',
                'email' => 'jack@gmail.com'
            ],
            [
                'name' => 'Leo',
                'email' => 'leo@gmail.com'
            ],
            [
                'name' => 'Kin',
                'email' => 'kin@gmail.com'
            ],
        ];

        $dbUsers = User::get()->toArray();
        $dbGetUser = User::pluck('email')->toArray();

        $collectionUser = collect($users)->pluck('email')->toArray();  
        $collectionDbUser = collect($dbGetUser)->toArray(); 

        $newUsersList = array_diff($collectionUser,$collectionDbUser); 

        $newUserString = collect($newUsersList)->toArray(); 

        $filtered = collect($users)->whereIn('email', $newUserString);

        $newUserDetails = $filtered->all();


        $existingUsers = [];
        $newUsers = [];
        $existingEmails = [];


        foreach($users as $key=>$user){
            if(isset($dbUsers[$key]['email']) && !empty($dbUsers[$key]['email'])){
                $existingUsers[$key] = ['name' => $dbUsers[$key]['name'], 'email' => $dbUsers[$key]['email']];
                $existingEmails[$key] = $dbUsers[$key]['email'];

                if(!in_array($dbUsers[$key]['email'],$users)){
                    $newUsers[$key] = [
                        'name' => $user['name'],
                        'email' => $user['email']
                    ];
                }
            }
        }

        $existingMails = implode(', ',$existingEmails);

        //dd(['Existing Users'],$existingUsers, ['Existing Emails'],$existingMails, ['New Users'],$newUserDetails);

        return view('users/view', compact('existingMails','existingUsers','newUserDetails'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
