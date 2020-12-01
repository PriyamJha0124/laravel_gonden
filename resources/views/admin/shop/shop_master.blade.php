<!-- form start -->
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('category_id','Category')}}
        <div class="form-group {{$errors->has('category_id') ? 'has-error' : ''}} "></div>
        {{Form::select('category_id', $category_name, null, ['class' => 'form-control', 'id' => 'category_id'])}}
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('name','Name')}}
        <div class="form-group {{$errors->has('name') ? 'has-error' : ''}} "></div>
        {{Form::text('name', null,['class' => 'form-control','id' => 'name','placeholder' => 'Enter Name'])}} 
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('rating','Rating')}}
        <div class="form-group {{$errors->has('rating') ? 'has-error' : ''}} "></div>
        {{Form::select('rating', ['0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'], null, ['class' => 'form-control', 'id' => 'rating'])}}
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        {{Form::label('price','Price')}}
        <div class="form-group {{$errors->has('price') ? 'has-error' : ''}} "></div>
        {{Form::text('price', null,['class' => 'form-control','id' => 'price','placeholder' => 'Enter Price'])}} 
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        {{Form::label('discount','Discount')}}
        <div class="form-group {{$errors->has('discount') ? 'has-error' : ''}} "></div>
        {{Form::text('discount', null,['class' => 'form-control','id' => 'discount','placeholder' => 'Enter Discount'])}} 
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        {{Form::label('time_from','Open Form')}}
        <div class="form-group {{$errors->has('time_from') ? 'has-error' : ''}} "></div>
        <input type="time" id="time_from" name="time_from" class="form-control"> 
      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">
        {{Form::label('time_to','To')}}
        <div class="form-group {{$errors->has('time_to') ? 'has-error' : ''}} "></div>
        <input type="time" id="time_to" name="time_to" class="form-control"> 
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('city_id','City')}}
        <div class="form-group {{$errors->has('city_id') ? 'has-error' : ''}} "></div>
        {{Form::select('city_id', $city_name, null, ['class' => 'form-control', 'id' => 'city_id'])}}
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('latitude','Latitude')}}
        <div class="form-group {{$errors->has('latitude') ? 'has-error' : ''}} "></div>
        {{Form::text('latitude', null,['class' => 'form-control','id' => 'latitude','placeholder' => 'Enter Latitude'])}} 
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('longitude','Longitude')}}
        <div class="form-group {{$errors->has('longitude') ? 'has-error' : ''}} "></div>
        {{Form::text('longitude', null,['class' => 'form-control','id' => 'longitude','placeholder' => 'Enter Longitude'])}} 
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('location','Location')}}
        <div class="form-group {{$errors->has('location') ? 'has-error' : ''}} "></div>
        {{Form::text('location', null,['class' => 'form-control','id' => 'location','placeholder' => 'Enter Location'])}} 
      </div>
    </div>

    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('contact','Contact No.')}}
        <div class="form-group {{$errors->has('contact') ? 'has-error' : ''}} "></div>
        {{Form::text('contact', null,['class' => 'form-control','id' => 'contact','placeholder' => 'Enter Contact No.'])}} 
      </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
          {{Form::label('picture','Picture')}}
          <div class="form-group {{$errors->has('picture') ? 'has-error' : ''}} "></div>
          <input type="file" name="picture">
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
                          
                          