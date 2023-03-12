
@props(['category'])

<option value="{{ $category->id }}">{{ $category->title }}

    @foreach ($category->children as $child)
        
            <x-select-options :category="$child" />
            
    @endforeach

</option>