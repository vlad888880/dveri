@foreach($glass as $item)
    @if($item->id_variation == $model)
        <div color_glass="{{ $item->name_glass }}" group_glass="{{ $item->group_glass }}"
            variation_id="{{ $item->id_variation }}" variation_name="{{ $item->name_variation }}"
            src_image="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}"
            class="model-material__item model-material__item--material  js--variation js--glass-this selected js--default-select --glass">
            <img class="model-material__photo" src="{{ asset('storage/app/glasses') }}/{{ $item->img_glass }}" title="{{ $item->name_glass }}" />
        </div>
    @else
        <div color_glass="{{ $item->name_glass }}" group_glass="{{ $item->group_glass }}"
            variation_id="{{ $item->id_variation }}" variation_name="{{ $item->name_variation }}"
            src_image="{{ asset('storage/app/variation') }}/{{ $item->img_variation }}"
            class="model-material__item model-material__item--material  js--variation js--glass-this">
            <img class="model-material__photo" src="{{ asset('storage/app/glasses') }}/{{ $item->img_glass }}" title="{{ $item->name_glass }}" />
        </div>
    @endif
@endforeach
