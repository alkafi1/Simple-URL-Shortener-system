@extends('layouts.frontend_layout')

@section('frontend_content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header bg-success text-white text-bold">
                        <h4 class="text-center">Welcome to Link shortner </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('big.link') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Here Submit your link</label>
                                @if (session('link'))
                                    <div class="alert alert-primary" role="alert">
                                        Original Link: <a href="{{ session('link')['original_link'] }}"
                                            target="_blank"><strong>{{ session('link')['original_link'] }}</strong></a>
                                    </div>
                                    <div class="alert alert-success" role="alert">
                                        Short Link : <a href="{{ session('link')['original_link'] }}" target="_blank"><strong>{{ session('link')['short_link'] }}</strong></a>
                                    </div>
                                @endif

                                <input class="form-control" type="text" name="original_link" id="">
                                @error('original_link')
                                    <div class="alert alert-warning mt-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
