@if($list->count() > 0)
<div class="galeria galeria-tekst">
    @foreach ($list as $p)
        <div class="insidegal">
            <a href="/uploads/gallery/images/{{$p->file}}" class="swipebox" rel="gallery-1" title="">
                <picture>
                    <source type="image/webp" srcset="{{asset('uploads/gallery/images/thumbs/webp/'.$p->file_webp) }}">
                    <source type="image/jpeg" srcset="{{asset('uploads/gallery/images/thumbs/'.$p->file) }}">
                    <img src="{{asset('uploads/gallery/images/thumbs/'.$p->file) }}" alt="{{ $p->name }}">
                </picture>
                <div><i class="las la-search-plus"></i></div>
            </a>
        </div>
    @endforeach
</div>
@endif
