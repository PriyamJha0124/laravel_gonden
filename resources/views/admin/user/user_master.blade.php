<div class="row">
  <div class="col-md-4">
        <div class="form-group">
          {{Form::label('name','Name')}}
          <div class="form-group {{$errors->has('name') ? 'has-error' : ''}} "></div>
          {{Form::text('name', null,['class'=>'form-control','id'=>'name','placeholder'=>'Enter Name'])}}   
        </div>
  </div>    
    <div class="col-md-4">
        <div class="form-group">
          {{Form::label('email','Email')}}
          <div class="form-group {{$errors->has('email') ? 'has-error' : ''}} "></div>
            {{Form::text('email', null,['class' => 'form-control','id' => 'email','placeholder' => 'Enter Email'])}}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">

        {{Form::label('role_id','Role')}}

        <div class="form-group {{$errors->has('role_id') ? 'has-error' : ''}} "></div>
        {{Form::select('role_id', $role_name, null, ['class' => 'form-control', 'id' => 'role_id'])}}
        </div>
    </div>
    
    <div class="col-md-12">
      {{Form::button(isset($model)? 'Update' : 'Save', ['class' => 'btn btn-dark','type' => 'submit'])}}
    </div>   
</div>