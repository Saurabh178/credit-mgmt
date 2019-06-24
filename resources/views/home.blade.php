@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home Page</div>

                <div class="form-group text-center" style="margin: 15px;">
                        <a href="{{route('display_all')}}" >
                            <button type="submit" class="btn btn-success btn-lg" style="border-radius: 10px;">View All User</button>
                        </a>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
