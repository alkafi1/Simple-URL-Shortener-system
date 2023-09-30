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
                        <table class="table tabled-borderd">
                            <tr>
                                <th>Sl</th>
                                <th>original Link</th>
                                <th>Short Link</th>
                            </tr>
                            {{$links}}
                            @forelse ($links as $key=>$link)
                            <tr>
                                <td>{{ $links->firstItem() + $key }}</td>
                                <td><a href="{{$link->original_link}}" targe="_blank">{{$link->original_link}}</a></td>
                                <td><a href="{{$link->original_link}}" targe="_blank">{{url($link->short_link)}}</a></td>
                            </tr>
                            @empty
                                <td colspan="3">No Data</td>
                            @endforelse
                            
                        </table>
                        {!!$links->links()!!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
