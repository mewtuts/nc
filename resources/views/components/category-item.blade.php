@props(['category'])


<div>
    <a href="{{ $category->id }}">
        {{ $category->title }} ({{ $category->id }}) 

        @foreach ($category->getFiles as $file)
            <div class='ml-3'> file: {{ $file->file_name }} </div> 
        @endforeach
            @foreach ($category->children as $child)

                <div class="ml-7">

                    <x-category-item :category="$child" />
                    
                </div>
                
            @endforeach

    </a>
</div>