<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email', 'Email: ', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
    {!! Form::label('password', 'Password: ', ['class' => 'control-label']) !!}
    @php
        $passwordOptions = ['class' => 'form-control'];
        if ($formMode === 'create') {
            $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
        }
    @endphp
    {!! Form::password('password', $passwordOptions) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('confirmed') ? ' has-error' : ''}}">
    {!! Form::label('confirmed', 'Confirm Password ', ['class' => 'control-label']) !!}
    @php
        $passwordOptions = ['class' => 'form-control'];
        if ($formMode === 'create') {
            $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
        }
    @endphp
    {!! Form::password('password_confirmation', $passwordOptions) !!}
    {!! $errors->first('confirmed', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
    {!! Form::label('role', 'Role: ', ['class' => 'control-label']) !!}
    {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => false]) !!}
</div>

<div class="form-group{{ $errors->has('counties') ? ' has-error' : ''}}">
    {!! Form::label('user-counties', 'Counties: ', ['class' => 'control-label']) !!}
    {!! Form::select('user-counties[]', [],  null, ['class' => 'user-counties form-control', 'multiple' => true]) !!}
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

@section('extra-js')

<style>
.select2-container .select2-selection--single{
   height:40px !important;
   width:100%;
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
   
   color:#858796 !important;
   line-height:35px !important;

}
.select2-container--default .select2-selection--single {
  border: 1px solid #d1d3e2;
   width:100%;
}
</style>
<script>
    $(document).ready(function() {
        var select2Counties = $('.user-counties');
        var user_counties= @json($user_counties);
        var counties= @json($counties);
        select2Counties.select2(
          { 
            placeholder: "Select County",
            allowClear: true ,
            width: "100%",
            
         }
        );
        if(counties){
              var option = null;
              counties.forEach(function(d) {
                  option= new Option(d, d, false, false); 
                  select2Counties.append(option);
              });
        }
        if(user_counties){
            select2Counties.val(user_counties).trigger('change')
        }
    });

    </script>
@endsection
