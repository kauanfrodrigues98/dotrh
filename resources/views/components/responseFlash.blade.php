@if( !empty( Session::get('responseFlash') ) )
    @if( Session::get('responseFlash') == 'true' )
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="div_alert_success">
                    <span>{{ Session::get('msgFlash') }}</span>
                </div>
            </div>
        </div>
    @else
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="div_alert_danger">
                    <span>{{ Session::get('msgFlash') }}</span>
                </div>
            </div>
        </div>
    @endif
@endif
