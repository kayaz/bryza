@extends('layouts.homepage')

@section('content')
    <div id="slider" class="inheader">
        <ul class="rslidess none">
            @foreach($slider as $s)
                <li>
                    <img src="{{ asset('/uploads/slider/'.$s->file) }}"
                         alt="{{ $s->file_alt }}">
                    <div class="caption">
                        <h1>{{ $s->title }}</h1>
                        <p>{{ $s->text }}</p>
                    </div>

                </li>
            @endforeach
        </ul>

        <div class="booking">
            <form action="/rezerwacja/" method="get">
                <div id="checkin">
                    <span class="label">Przyjazd</span>
                    <span class="date_day"></span>
                    <span class="date_month"></span>
                    <span class="date_year"></span>
                    <input type="hidden" name="checkin" value="{{ \Carbon\Carbon::now()->format('Y/m/d') }}">
                    <button type="button" class="date_change checkin">Zmień datę</button>
                </div>

                <div id="checkout">
                    <span class="label">Wyjazd</span>
                    <span class="date_day"></span>
                    <span class="date_month"></span>
                    <span class="date_year"></span>
                    <input type="hidden" name="checkout" value="{{ \Carbon\Carbon::tomorrow()->format('Y/m/d') }}">
                    <button type="button" class="date_change checkout">Zmień datę</button>
                </div>
                <button type="submit" class="date_check">Sprawdź dostępność</button>
            </form>
        </div>
    </div>

    <div id="oferta">
        <div class="container">
            <div class="row inline inline-tc">
                <div class="col-12 text-center">
                    <h2 data-modaltytul="3">{!! getInline($array, 3, 'modaltytul') !!}</h2>
                    <p class="subh2" data-modaleditor="3">{!! getInline($array, 3, 'modaleditor') !!}</p>
                </div>
                @auth
                    <div class="inline-btn"><button type="button" class="btn btn-primary btn-modal btn-sm" data-bs-toggle="modal" data-bs-target="#inlineModal" data-inline="3" data-hideinput="modaleditortext,modallink,modallinkbutton,file,file_alt" data-method="update" data-imgwidth="570" data-imgheight="380"></button></div>
                @endauth
            </div>
            <div class="row">
                <div class="col-4 inline inline-tc">
                    <div class="oferta-boks p-3">
                        <img src="{{ getInline($array, 4, 'file') }}" alt="{{ getInline($array, 4, 'file_alt') }}" data-img="4" class="w-100">
                        <div>
                            <h3><a href="/domki/" data-modaltytul="4">{!! getInline($array, 4, 'modaltytul') !!}</a></h3>
                            <p>{!! getInline($array, 4, 'modaleditor') !!}</p>
                        </div>
                    </div>
                    @auth
                        <div class="inline-btn"><button type="button" class="btn btn-primary btn-modal btn-sm" data-bs-toggle="modal" data-bs-target="#inlineModal" data-inline="4" data-hideinput="modaleditortext,modallink,modallinkbutton" data-method="update" data-imgwidth="370" data-imgheight="180"></button></div>
                    @endauth
                </div>
                <div class="col-4 inline inline-tc">
                    <div class="oferta-boks d-flex flex-wrap p-3">
                        <img src="{{ getInline($array, 5, 'file') }}" alt="{{ getInline($array, 5, 'file_alt') }}" data-img="5" class="w-100 order-2">
                        <div class="order-1 w-100">
                            <h3><a href="/pokoje/" data-modaltytul="5">{!! getInline($array, 5, 'modaltytul') !!}</a></h3>
                            <p>{!! getInline($array, 5, 'modaleditor') !!}</p>
                        </div>
                    </div>
                    @auth
                        <div class="inline-btn"><button type="button" class="btn btn-primary btn-modal btn-sm" data-bs-toggle="modal" data-bs-target="#inlineModal" data-inline="5" data-hideinput="modaleditortext,modallink,modallinkbutton" data-method="update" data-imgwidth="370" data-imgheight="180"></button></div>
                    @endauth
                </div>
                <div class="col-4 inline inline-tc">
                    <div class="oferta-boks p-3">
                        <img src="{{ getInline($array, 6, 'file') }}" alt="{{ getInline($array, 6, 'file_alt') }}" data-img="6" class="w-100">
                        <div class="div">
                            <h3><a href="/pole-namiotowe/" data-modaltytul="6">{!! getInline($array, 6, 'modaltytul') !!}</a></h3>
                            <p>{!! getInline($array, 6, 'modaleditor') !!}</p>
                        </div>
                    </div>
                    @auth
                        <div class="inline-btn"><button type="button" class="btn btn-primary btn-modal btn-sm" data-bs-toggle="modal" data-bs-target="#inlineModal" data-inline="6" data-hideinput="modaleditortext,modallink,modallinkbutton" data-method="update" data-imgwidth="370" data-imgheight="180"></button></div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div id="paralaxa" class="inline inline-tc">
        <h2 data-modaltytul="2">{!! getInline($array, 2, 'modaltytul') !!}</h2>
        <h3 data-modaleditor="2">{!! getInline($array, 2, 'modaleditor') !!}</h3>
        <a href="/domki/" class="hvr-float-shadow">Nasza oferta</a>
        @auth
            <div class="inline-btn"><button type="button" class="btn btn-primary btn-modal btn-sm" data-bs-toggle="modal" data-bs-target="#inlineModal" data-inline="2" data-hideinput="modaleditortext,modallink,modallinkbutton,file,file_alt" data-method="update" data-imgwidth="570" data-imgheight="380"></button></div>
        @endauth
    </div>

    <div id="atuty">
        <div class="container">
            <div class="row">
                <div class="col-3 p-0">
                    <div class="box box-1">
                        <i class="las la-wifi"></i>
                        <h3>Darmowe wifi</h3>
                        <p>Internet bezprzewodowy Wi-Fi na terenie ośrodka</p>
                    </div>
                </div>
                <div class="col-3 p-0">
                    <div class="box box-2">
                        <i class="las la-tv"></i>
                        <h3>Media</h3>
                        <p>Dostęp do telewizji kablowej w każdym pokoju</p>
                    </div>
                </div>
                <div class="col-3 p-0">
                    <div class="box box-3">
                        <i class="las la-swimming-pool"></i>
                        <h3>Plaża</h3>
                        <p>Tylko 500 m spacerem przez piękny sosnowy las.</p>
                    </div>
                </div>
                <div class="col-3 p-0">
                    <div class="box box-4">
                        <i class="las la-campground"></i>
                        <h3>Pole namiotowe</h3>
                        <p>Oferujemy miejsca pod namioty, przyczepy i samochody campingowe</p>
                    </div>
                </div>
                <div class="col-3 p-0">
                    <div class="box box-5">
                        <i class="las la-bicycle"></i>
                        <h3>Wypoczynek</h3>
                        <p>Możliwość skorzystania z wypożyczalni rowerów i sprzętu plażowego</p>
                    </div>
                </div>
                <div class="col-3 p-0">
                    <div class="box box-6">
                        <i class="las la-utensils"></i>
                        <h3>Wyżywienie</h3>
                        <p>W cenie oferujemy całodzienne wyżywienie (śniadanie, obiad, kolacja)</p>
                    </div>
                </div>
                <div class="col-3 p-0">
                    <div class="box box-7">
                        <i class="las la-car"></i>
                        <h3>Parking</h3>
                        <p>Dla naszych gości posiadamy płatny ogrodzony parking.</p>
                    </div>
                </div>
                <div class="col-3 p-0">
                    <div class="box box-8">
                        <i class="las la-building"></i>
                        <h3>Pokoje</h3>
                        <p>Posiadamy dwa bloki, każdy z 32 pokojami (łazienka + balkon)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="osrodek">
        <div class="container inline inline-tc">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 data-modaltytul="1">{!! getInline($array, 1, 'modaltytul') !!}</h2>
                    <p class="subh2" data-modaleditor="1">{!! getInline($array, 1, 'modaleditor') !!}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <img src="{{ getInline($array, 1, 'file') }}" alt="{{ getInline($array, 1, 'file_alt') }}" data-img="1" class="w-100">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="ps-4" data-modaleditortext="1">
                        {!! getInline($array, 1, 'modaleditortext') !!}
                    </div>
                </div>
            </div>
            @auth
                <div class="inline-btn"><button type="button" class="btn btn-primary btn-modal btn-sm" data-bs-toggle="modal" data-bs-target="#inlineModal" data-inline="1" data-hideinput="modallink,modallinkbutton" data-method="update" data-imgwidth="570" data-imgheight="380"></button></div>
            @endauth
        </div>
    </div>
@endsection