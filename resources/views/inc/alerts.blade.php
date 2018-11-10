@if(count($errors))
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{$error}}
    </div>
  @endforeach
@endif

@if(session('success'))
  <div class="alert text-monospace font-weight-bold" style="color:	#006400; background: #9ACD32">
    {{session('success')}}
  </div>
@endif

@if(session('error'))
  <div class="alert text-monospace font-weight-bold" style="color: #8B0000; background: #FF6347">
    {{session('error')}}
  </div>
@endif
