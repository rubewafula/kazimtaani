@extends('layouts.backend')

@section('content')

                <div class="card">
                    <div class="card-header">Manage  {{$user->name}}</div>
                    <div class="card-body">
                    <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

               <div  class="row">
                   <div class="col-md-6" style="border-right:solid #000 1px">
                   {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/admin/users', $user->id],
                            'class' => 'form-horizontal'
                        ]) !!}

                        @include ('admin.users.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}

                   </div>


                   <div class="col-md-6">
                   {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/users', $user->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('Delete User', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete User',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                   
                   </div>

</div>

                      
                        

                    </div>
                </div>
            
@endsection
