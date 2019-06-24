@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Users</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($profiles as $profile)
                                <tr>
                                    <td>{{$profile->name}}</td>
                                    <td>{{$profile->email}}</td>
                                    <td>{{$profile->phone}}</td>
                                    <td>{{$profile->city}}</td>
                                    <td>
                                        <a href="{{route('display_single', [$profile->id])}}">
                                            <button type="submit" class="btn btn-success">View</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
