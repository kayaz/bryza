<div class="page-head">
    <div class="opacity"></div>
    <h1>{{ $page->title }}</h1>
    <p>{{ $page->title }}</p>
</div>

<div id="page-navigation">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumb m-0" itemscope="" itemtype="http://schema.org/Breadcrumb" role="navigation">
                    <ul class="mb-0 list-unstyled" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="/">
                                <span itemprop="name">Strona główna</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li class="sep">/</li>
                        <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                            <b itemprop="name">{{ $page->title }}</b>
                            <meta itemprop="position" content="2">
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>