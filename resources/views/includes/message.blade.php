@if(Session('success'))
     <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        {{Session('success')}}
    </div>
@endif

@if(Session('warning'))
     <div class="alert alert-warning fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        {{Session('warning')}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <a href="#" class="close" data-dismiss="alert">×</a>
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif