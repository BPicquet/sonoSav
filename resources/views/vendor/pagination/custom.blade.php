@if($paginator->hasPages())
    <ul class="pagination">
        <!-- Si on est sur la première page -->
        @if($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link" rel="prev">Précédent</span>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">
                    Précédent
                </a>
            </li>
        @endif

        @foreach ($elements as $elem)
            @if(is_string($elem))
                <li class="page-item disabled">
                    <span class="page-link">{{ $elem }}</span>
                </li>
            @endif

            @if(is_array($elem))
                @foreach($elem as $page => $url)
                    @if($page == $paginator->currentPage())
                        <li class="page-item active my-active">
                            <span class="page-link">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <a href="{{ $url }}" class="page-link">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- On vérifie qu'il reste des pages -->
        @if($paginator->hasMorePages())
            <li class="page-item">
                <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next">
                    Suivant
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link" rel="prev">Suivant</span>
            </li>
        @endif
    </ul>
@endif

