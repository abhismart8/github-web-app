@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <a href="/logout" class="btn btn-danger mt-15" style="float: right;"> Logout </a>
    </div>
    <div class="col-sm-12 text-center">
        <div class="mt-15">
            <div class="access_token">
                <div class="form-group">
                    <label><strong> Enter your Github Personal Access Token </strong></label>
                    <div class="row">
                        <div class="@if((Auth::user()->github->personal_access_token??null)) col-sm-10 @else col-sm-12 @endif">
                            <input type="password" class="form-control" id="access-token" placeholder="Enter Access Token"
                            value="{{Auth::user()->github->personal_access_token??''}}"/>
                        </div>
                        @if((Auth::user()->github->personal_access_token??null))
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-warning" id="reveal-access-token"> Reveal </button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" id="save-access-token"> Save </button>
                </div>
            </div>
        </div>

        <div class="" style="margin-bottom: 100px;">
            @if((Auth::user()->github->personal_access_token??null))
            <h1> My Repositories </h1>
            <button type="button" class="btn btn-primary" id="get-all-repo"> Get All Repositories </button>
            <button type="button" class="btn btn-primary" id="get-starred-repo"> Get Starred Repositories </button>
            <div class="starred-repo-div">
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('post-scripts')
<script src="{{ asset('js/index.js') }}"></script>
<script>
    // save github access token
    document.getElementById('save-access-token').addEventListener('click', function(){
        saveAccessToken("{{route('update-user')}}", document.getElementById('access-token').value);
    });

    @if((Auth::user()->github->personal_access_token??null))
    // get all repos
    document.getElementById('get-all-repo').addEventListener('click', function(){
        getAllRepo("{{route('get-all-repo')}}");
    });

    // get all starred repos
    document.getElementById('get-starred-repo').addEventListener('click', function(){
        getAllStarredRepo("{{route('get-all-starred-repo')}}");
    });
    @endif

</script>
@endpush