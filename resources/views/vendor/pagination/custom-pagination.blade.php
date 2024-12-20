<div class="flex justify-center items-center mt-6 space-x-2">
    @if ($paginator->onFirstPage())
    <button type="button"  class="border px-3 py-1 bg-white hover:bg-gray-100 disabled">&laquo;</button>
    @else
        <a href="{{$paginator->previousPageUrl()}}" rel="prev">&laquo;</a>
    @endif

    @foreach ($paginator->links() as $element)
        {{$element}}
    @endforeach

    @if ($paginator->hasMorePages())
    <a href="{{$paginator->nextPageUrl()}}" rel="next">&raquo;</a>
    @endif
{{--  
   <button type="button" class="border px-3 py-1 bg-white hover:bg-gray-100">&lt;</button>
    <button type="button" class="border px-3 py-1 bg-white hover:bg-gray-100">1</button>
    <button type="button" class="border px-3 py-1 bg-white hover:bg-gray-100">2</button>
    <button type="button" class="border px-3 py-1 bg-white hover:bg-gray-100">3</button>
    <button type="button" class="border px-3 py-1 bg-white hover:bg-gray-100">...</button>
    <button type="button" class="border px-3 py-1 bg-white hover:bg-gray-100">10</button>
    <button type="button" class="border px-3 py-1 bg-white hover:bg-gray-100">&gt;</button> --}}
</div>
