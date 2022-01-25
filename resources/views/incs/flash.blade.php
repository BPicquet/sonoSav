@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
  <button class="btn mx-1 close" data-dismiss='alert'>
    <i class="fas fa-times"></i>
  </button>
  <strong>{{ $message }}</strong>
</div>
@endif