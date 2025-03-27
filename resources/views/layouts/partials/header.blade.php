<header>
    <div class="header-holder" style="height: 90px;">
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-2 col-xl-3 d-flex justify-content-start align-items-center">
                        <a href="/" id="logo">
                            <img src="{{ asset('images/logo.png') }}" alt="{{ settings()->get("page_title") }}">
                        </a>
                    </div>
                    <div class="col-6 col-lg-10 col-xl-9">
                        <nav>
                            <ul class="mb-0 list-unstyled mainmenu">
                                <li><a href="/">Strona główna</a></li>
                                <li class="{{ isset($page) && $page->uri == 'regulamin' ? 'active' : '' }}"><a href="/regulamin/">REGULAMIN</a></li>
                                <li class="{{ isset($page) && $page->uri == 'domki' ? 'active' : '' }}"><a href="/domki/">Domki</a></li>
                                <li class="{{ isset($page) && $page->uri == 'pokoje' ? 'active' : '' }}"><a href="/pokoje/">Pokoje</a></li>
                                <li class="{{ isset($page) && $page->uri == 'pole-namiotowe' ? 'active' : '' }}"><a href="/pole-namiotowe/">Pole namiotowe</a></li>
                                <li class="{{ isset($page) && $page->uri == 'nocleg' ? 'active' : '' }}"><a href="/nocleg/">Nocleg</a></li>
                                <li class="{{ isset($page) && $page->uri == 'rezerwacja' ? 'active' : '' }}"><a href="/rezerwacja/">Rezerwacja</a></li>
                                <li class="{{ isset($page) && $page->uri == 'kontakt' ? 'active' : '' }}"><a href="/kontakt/">Kontakt</a></li>
                            </ul>
                            <a href="#" id="triggermenu" class="menu-menu">Menu</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>