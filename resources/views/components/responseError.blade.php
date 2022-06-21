@if($errors->has('errorFlash'))
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="div_alert_danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        </div>
    </div>
@endif
