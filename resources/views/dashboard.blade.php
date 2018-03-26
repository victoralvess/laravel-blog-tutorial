@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h3>Your Blog Posts</h3>
                    @if(isset($posts) && count($posts) > 0)
                        <table class="table table-striped">
                            <thead>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)                      
                                   <tr>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                                        </td>
                                        <td>
                                            {!!Form::open(['action'=>['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=>'pull-right' ])!!}        
                                                {{Form::hidden('_method', 'DELETE')}}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                        </td>
                                    </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        You don't have any posts.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
