    @extends('layouts.layout')

    @section('content')
        <div class="row">
            <div class="col-3">
                @include('shared.sidebar')
            </div>
            <div class="col-6">
                <h1>Terms</h1>
                <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio laboriosam quia nemo exercitationem quasi
                    nam
                    officiis sit ex. Soluta enim optio quos praesentium dolorum possimus eius sint quibusdam exercitationem
                    quasi
                    asperiores, odio debitis reprehenderit quo vero! Nemo inventore, similique aperiam facere laudantium
                    ullam ex
                    incidunt blanditiis perferendis tenetur corrupti sit!
                </div>
            </div>
            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    @endsection
