@extends('layouts.page')

@section('meta_title', 'Kontakt')
@section('seo_title', '')
@section('seo_description', '')

@section('pageheader')
    @include('layouts.partials.page-header', ['title' => 'Kontakt', 'header_file' => 'pageheader.jpg'])
@stop

@section('content')
    <div id="page-content" class="page-content page-{{$page->slug}}">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <h2>DANE KONTAKTOWE</h2>
                    {!! parse_text($page->content) !!}
                </div>
                <div class="col-7">
                    <div class="ps-5">
                        <h2>FORMULARZ KONTAKTOWY</h2>
                        <p>Jeżeli są Państwo zainteresowani kontaktem z nami, prosimy o przesłanie wiadomości.</p>
                        <form method="post" id="contact-form" action="{{ route("contact.form") }}" class="validateForm">
                            @if (session('success'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success border-0">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-warning border-0">
                                            {{ session('warning') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-md-4 form-input">
                                    <label for="form_name">Imię <span class="text-danger">*</span></label>
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
                                <div class="col-12 mt-4 form-input">
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

                                <div class="col-12 d-flex justify-content-end">
                                    <div class="form-input mb-0 textarea">
                                        <input name="page" type="hidden" value="Formularz kontaktowy">
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
            <div class="row mt-5">
                <div class="col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d110628.1754459194!2d17.086764435339607!3d54.66813022562265!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46fe6ad236b66261%3A0xeaed1dacf2424174!2sO%C5%9Brodek%20Wypoczynkowy%20Bryza!5e0!3m2!1spl!2spl!4v1695156854409!5m2!1spl!2spl" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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