@if (count($errors) > 0 )
  <div class="alert alert-danger" role="alert"> 
    <ul>
    @foreach ( $errors->all() as $element)
      <li>{{ $element }}</li>     
    @endforeach
    </ul> 
  </div>
@endif