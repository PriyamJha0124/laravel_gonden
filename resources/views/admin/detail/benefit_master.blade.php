<!-- form start -->
  <div class="row">
    
    <div class="col-md-6">
      <div class="form-group">
        {{Form::label('name','Benefit Name')}}
        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}} "></div>
        {{Form::text('name', null,['class' => 'form-control','id' => 'name','placeholder' => 'Enter Benefit Name'])}} 
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        {{Form::label('logo','Logo')}}
        <div class="form-group {{$errors->has('logo') ? 'has-error' : ''}} "></div>
        <input type="file" name="logo">
      </div>
    </div>
    
    <div class="col-md-12">
      <div class="form-group">
        {{Form::label('description','Description')}}
        <div class="form-group {{$errors->has('description') ? 'has-error' : ''}} "></div>
        {{Form::textarea('description', null,['class' => 'form-control','id' => 'description','placeholder' => 'Enter Description', 'rows' => '3'])}} 
      </div>
    </div>

    <div class="col-md-12">
      {{Form::button(isset($model)? 'Update' : 'Save', ['class' => 'btn btn-dark','type' => 'submit'])}}
    </div>
  </div>
                          
                          