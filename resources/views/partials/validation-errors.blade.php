<div class="row">
  <div class="col-md-12">
    <div id="messages"></div>
      @if($errors->any())         
        <div class="alert alert-error alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          {!! implode('', $errors->all('<div>:message</div>')) !!}           
        </div>
      @endif   
  </div>
</div>