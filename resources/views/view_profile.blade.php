@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
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
                    <button type="button" class="btn btn-warning btn-lg" data-toggle='modal' data-target='#myModal'>Transfer Credit</button>
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

                            @if(count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <p>{{$error}}</p>
                                    @endforeach
                                </div>
                            @endif
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
