<div class="catalog-section__grid">         
    @foreach($door as $item)
        <div class="product-card catalog-section__product-card">
            <a href="{{ route('model', ['id' => $item->id_door, 'model' => $item->id_variation, 'type' => $item->type_variation]) }}"
                class="product-card__link">
                <img src="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}" alt="Фото"
                    class="product-card__image">
                <div class="product-card__text">
                    <h2 class="product-card__name title4">
                        {{ $item->name_door }}
                    </h2>
                    <h3 class="button-text product-card__price">
                        {{ $item->name_variation }}
                    </h3>
                </div>
                @if(isset($item->is_new))
                <div class="product-card__sale-label">
                    Новинка
                </div>
                @endif
                @if(isset($item->is_best_price))
                <div class="product-card__best-price-label">
                    Лучшая цена
                </div>
                @endif
            </a>
        </div>
    @endforeach
</div>
<div class="cnt" data="{{ $cnt }}" style="display:none"></div>
{{ $door->links('pagination') }}