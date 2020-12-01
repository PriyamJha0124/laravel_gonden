<!-- form start -->
  <div class="row">
    
    <div class="col-md-6">
      <div class="form-group">
        {{Form::label('name','Promo Name')}}
        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}} "></div>
        {{Form::text('name', null,['class' => 'form-control','id' => 'name','placeholder' => 'Enter Promo Name'])}} 
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        {{Form::label('code','Promo Code')}}
        <div class="form-group {{$errors->has('code') ? 'has-error' : ''}} "></div>
        {{Form::text('code', null,['class' => 'form-control','id' => 'code','placeholder' => 'Enter Promo Code'])}} 
      </div>
    </div>

    <div class="col-md-12">
      {{Form::button(isset($model)? 'Update' : 'Save', ['class' => 'btn btn-dark','type' => 'submit'])}}
    </div>
  </div>
                          
                          