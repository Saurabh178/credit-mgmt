@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-image: url(https://images.pexels.com/photos/242236/pexels-photo-242236.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);">
                <div class="card-header">
                    <a href="#" style="font-size: 20px;">Account Information!</a>
                    <a href="{{route('display_all')}}" style="font-size: 20px; float: right;">All User's</a>
                </div>

                <div class="card-body" style="font-size: 18px; text-align: center; font-family: initial;">
                    <p><b>Name:</b> {{$profile->name}}</p>
                    <p><b>Email:</b> {{$profile->email}}</p>
                    <p><b>Phone:</b> {{$profile->phone}}</p>
                    <p><b>City:</b> {{$profile->city}}</p>
                    <p><b>Amount:</b> {{$profile->account->amount}}<b>&#8377</b></p>
                    <p><b>Remark:</b> {{$profile->account->remark}}</p>
                </div>

                <a href="#" class="text-center">
                    @if($profile->account->amount > 1500)
                        <button type="button" class="btn btn-success btn-lg" id="change" data-toggle='modal' data-target='#myModal'>Transfer Credit</button>
                    @else
                        <button type="button" class="btn btn-danger btn-lg" id="change" data-toggle='modal' data-target='#myModal'>Transfer Credit</button>
                    @endif

                    @if(Session::has('message'))
                        <div class="alert alert-success" style="margin-top: 10px;">{{Session::get('message')}}</div>
                    @endif
                </a>
                <br>

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Fill Form to Transfer Credit!</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <div class="modal-body">
                                <div>
                                    @include('modal_form')
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style type="text/css">
   #change:hover{
    background-color: #FFFF33;
    color: black;
   } 
</style>

