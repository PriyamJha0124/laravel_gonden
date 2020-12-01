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
          {{Form::label('contact','Contact')}}
          <div class="form-group {{$errors->has('contact') ? 'has-error' : ''}} "></div>
          {{Form::text('contact', null,['class' => 'form-control','id' => 'contact','placeholder' => 'Enter Contact'])}}          
        </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
      {{Form::label('city','City')}}
      <div class="form-group {{$errors->has('city') ? 'has-error' : ''}} "></div>
      {{Form::text('city', null,['class' => 'form-control','id' => 'city','placeholder' => 'Enter City'])}}          
    </div>
  </div>

    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('gender','Gender')}}
        <div class="form-group {{$errors->has('gender') ? 'has-error' : ''}} "></div>
        {{Form::select('gender', ['male' => 'male', 'female' => 'female'], null, ['class' => 'form-control', 'id' => 'gender'])}}
      </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      {{Form::label('birthdate','Date of Birth')}}
      <div class="form-group {{$errors->has('birthdate') ? 'has-error' : ''}} "></div>
      {{Form::date('birthdate', null,['class' => 'form-control','id' => 'birthdate','placeholder' => 'Enter Birthdate'])}}          
    </div>
  </div>
    
    <div class="col-md-12">
      {{Form::button(isset($model)? 'Update' : 'Save', ['class' => 'btn btn-dark','type' => 'submit'])}}
    </div>   
</div>