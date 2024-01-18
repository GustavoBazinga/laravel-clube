@isset($routeRead)
    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ $routeRead }}">
        {{ $titleRead ?? __('Ver') }}
    </a> 
@endisset
    
@isset($routeEdit)
    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ $routeEdit }}">
        {{ $titleEdit ?? __('Editar') }}
    </a> 
@endisset

@isset($routeDelete)              
    <form id="formDelete" action="{{ $routeDelete }}" method="POST" class="inline-flex">
        @csrf
        @method('DELETE')
        <input type="hidden" name="toDelete" value="{{ $valueToDelete ?? null }}">
        <button name="{{ $deleteBottonName ?? null }}" id="buttonDelete" type="submit" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
            {{ $titleDelete ?? __('Apagar') }}
        </button>
    </form>         
@endisset           
@isset($routeCreate)
    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ $routeCreate }}">
        {{ $titleCreate ?? __('Criar') }}
    </a>  
@endisset
