@extends('layouts.page')

@section('meta_title', 'Kontakt')
@section('seo_title', '')
@section('seo_description', '')

@section('pageheader')
    @include('layouts.partials.page-header', ['title' => 'Rezerwacja', 'header_file' => 'pageheader.jpg'])
@stop

@section('content')
    <div id="page-content" class="page-content page-{{$page->slug}}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {!! parse_text($page->content) !!}
                </div>

                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success border-0 mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning border-0 mt-3">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <form method="post" id="register" action="{{ route("reservation.form") }}" class="validateForm">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-md-4 form-input">
                                <label for="form_name">Imię i nazwisko <span class="text-danger">*</span></label>
                                <input name="form_name" id="form_name" class="validate[required] form-control @error('form_name') is-invalid @enderror" type="text" value="{{ old('form_name') }}">

                                @error('form_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-4 form-input">
                                <label for="form_email">E-mail <span class="text-danger">*</span></label>
                                <input name="form_email" id="form_email" class="validate[required] form-control @error('form_email') is-invalid @enderror" type="text" value="{{ old('form_email') }}">

                                @error('form_email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-4 form-input">
                                <label for="form_phone">Telefon</label>
                                <input name="form_phone" id="form_phone" class="form-control @error('form_phone') is-invalid @enderror" type="text" value="{{ old('form_phone') }}">

                                @error('form_phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-4 form-input mt-4">
                                <label for="form_checkin">Data przyjazdu</label>
                                <input name="form_checkin" id="form_checkin" class="validate[required] form-control @error('form_checkin') is-invalid @enderror" type="text" value="{{ old('form_checkin') ?: request()->input('checkin') }}">

                                @error('form_checkin')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-4 form-input mt-4">
                                <label for="form_checkout">Data wyjazdu</label>
                                <input name="form_checkout" id="form_checkout" class="validate[required] form-control @error('form_checkout') is-invalid @enderror" type="text" value="{{ old('form_checkout') ?: request()->input('checkout') }}">

                                @error('form_checkout')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-12 mt-1 form-input mt-4">
                                <label for="form_message">Treść wiadomości <span class="text-danger">*</span></label>
                                <textarea rows="5" cols="1" name="form_message" id="form_message" class="validate[required] form-control @error('form_message') is-invalid @enderror">{{ old('form_message') }}</textarea>

                                @error('form_message')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="obowiazek">
                                    {!! $obligation->obligation !!}
                                </div>
                            </div>

                            <div class="rodo-rules">
                                @foreach ($rules as $r)
                                    <div class="col-12">
                                        <div class="rules clearfix">
                                            <label for="rule_{{$r->id}}" class="rules-text"><input name="rule_{{$r->id}}" id="rule_{{$r->id}}" value="1" type="checkbox" @if($r->required === 1) class="validate[required]" @endif data-prompt-position="topLeft:0"> {!! $r->text !!}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="col-12">
                                <div class="form-input mb-0 textarea">
                                    <input name="page" type="hidden" value="Rezerwacja">
                                    <script type="text/javascript">
                                        document.write("<button type=\"submit\">WYŚLIJ WIADOMOŚĆ</button>");
                                    </script>
                                    <noscript><b>Do poprawnego działania, Java musi być włączona.</b></noscript>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('/js/datepicker/bootstrap-datepicker.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('/js/datepicker/bootstrap-datepicker.pl.min.js') }}" charset="utf-8"></script>
    <link href="{{ asset('/js/datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <script src="{{ asset('js/validation.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/pl.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".validateForm").validationEngine({
                validateNonVisibleFields: true,
                updatePromptsPosition:true,
                promptPosition : "topRight:-137px"
            });
        });

        const today = new Date(), tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 1);

        $('#form_checkin').datepicker({
            format: 'yyyy/mm/dd',
            language: 'pl',
            startDate: today
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        $('#form_checkout').datepicker({
            format: 'yyyy/mm/dd',
            language: 'pl',
            startDate: tomorrow
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        @if (session('success')||session('warning'))
        $(window).load(function() {
            const aboveHeight = $('header').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $('.alert').offset().top-aboveHeight
            }, 1500, 'easeInOutExpo');
        });
        @endif
    </script>
@endpush