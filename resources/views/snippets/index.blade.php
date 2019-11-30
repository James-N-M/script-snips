@extends('layouts.app')

@section('content')
    <div class="row">
        @include('partials/languages')

        <div class="col-md-10">
                <div class="text-center shadow mb-4 pt-1 pb-1">
                    @if (isset($language))
                        <div class="d-flex align-items-center justify-content-center">
                            <h2 class="mr-3" style="font-size: 52px;">{{$language->name}} snips</h2>
                            <form action="/languages/{{$language->name}}/favorites" method="post">
                                @csrf
                                @if($language->isFavorited())
                                    <button class="btn btn-warning" type="submit">
                                        <i class="fas fa-check"></i> Following
                                    </button>
                                @else
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-terminal"></i> Follow
                                    </button>
                                @endif
                            </form>
                        </div>
                    @else
                        <h2 style="font-size: 52px;">snips</h2>
                    @endif
                </div>

                @include('partials/snippets')

                {{ $snippets->links() }}
        </div>
    </div>
@endsection
