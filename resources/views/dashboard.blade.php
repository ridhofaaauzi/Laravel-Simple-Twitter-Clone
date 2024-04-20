@extends("layouts.layout")
    @section("content")
    <div class="row">
        <div class="col-3">
            @include("shared.sidebar")
        </div>
        <div class="col-6">
            @include('shared.success-message')
            @include('shared.submit-idea')
            <hr>

            @forelse ( $ideas as $idea )
            <div class="mt-3">
              @include('shared.idea-card')
            </div>
            @empty
                <h4 class="text-center mt-3">No Results Found</h4>
            @endforelse

            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
        @include("shared.search-bar")
        @include("shared.follow-box")
        </div>
    </div>
    @endsection
