@extends('layouts.page', ['body_class' => 'homepage'])

@section('meta_title', $page->title)
@section('seo_title', $page->meta_title)
@section('seo_description', $page->meta_description)
@section('seo_robots', $page->meta_robots)

@section('content')
    @include('layouts.partials.page-header', ['page' => $page])

    <div id="page-content" class="page-content page-{{$page->slug}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! parse_text($page->content) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush