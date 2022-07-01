@extends('layouts.dash')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit Game Data
                        <a href="{{ url('dashboard') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-game/'.$game->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$game->name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" value="{{$game->price}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{$game->description}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Game Image</label>
                            <input type="file" name="profile_image" class="form-control">
                            <img src="{{ asset('uploads/game/'.$game->profile_image) }}" width="70px" height="70px" alt="Image">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Game</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection