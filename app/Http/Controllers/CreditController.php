<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AccountValidation;
use App\Profile;
use App\Account;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::get();
        return view('view_users', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        $profiles = Profile::get();
        return view('view_profile', compact('profile', 'profiles'));

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
    public function update(AccountValidation $request, $id)
    {
        $amount = intval(request('amount'));
        $reciever_name = request('reciever');

        $amount_value = DB::table('accounts')->where('profile_id', $id)->pluck('amount');

        
        if($amount_value[0] < $amount)
        {
            $data = "<script type='text/javascript'>
                    alert('Insufficient Balance!');
                    window.location.href = '/view_user/$id'</script>";
            echo $data;
            return;
        }

        if($reciever_name != 'none')
        {
            $reciever_id = DB::table('profiles')->where('name', $reciever_name)->pluck('id');

            DB::update('update accounts set amount = amount - ? where profile_id = ?', [$amount, $id]);
            DB::update('update accounts set amount = amount + ? where profile_id = ?', [$amount, $reciever_id[0]]);

            $amount_value_sender = DB::table('accounts')->where('profile_id', $id)->pluck('amount');
            $amount_value_reciever = DB::table('accounts')->where('profile_id', $reciever_id[0])->pluck('amount');

            if($amount_value_sender[0] <= 1500)
            {
                DB::update('update accounts set remark = ? where profile_id = ?', ['Low on Balance!', $id]);
            }
            else
            {
                DB::update('update accounts set remark = ? where profile_id = ?', ['Sufficient Balance!', $id]);
            }

            if($amount_value_reciever[0] <= 1500)
            {
                DB::update('update accounts set remark = ? where profile_id = ?', ['Low on Balance!', $reciever_id[0]]);
            }
            else
            {
                DB::update('update accounts set remark = ? where profile_id = ?', ['Sufficient Balance!', $reciever_id[0]]);
            }

            return redirect()->to('/view_user/'.$id);
        }   
        else
        {
            $data = "<script type='text/javascript'>
                    alert('Please Select a user to transfer credit!');
                    window.location.href = '/view_user/$id'</script>";
            echo $data;
            return;
        }
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
