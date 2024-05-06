<div>
    <div class="second-navbar-2">
        <div class="second-search" style="position: relative">
            <div id="second-search-container">
                <i class="fa-regular fa-magnifying-glass"></i>
                <input wire:model.live='query' wire:keydown.escape='resetAll' wire:keydown.tab='resetAll' type="search"
                id="second-search" placeholder="Search Products">
            </div>
            @if (!empty($query))
            <div class="position-fixed" style="top: 0;bottom: 0;left: 0;right: 0" wire:click='resetAll'></div>
                <div class="second-search-container-dropdown">
                    @if (!empty($results))
                        @foreach ($results as $result)
                            <a href="{{ route('product.detail', $result['slug']) }}">
                                <span>{{ $result['title'] }}</span>
                                <i style="font-weight: normal" class="fa-solid fa-arrow-up-left-from-circle"></i>
                            </a>
                        @endforeach
                    @else
                        <a>
                            <span>No Results !</span>
                        </a>
                    @endif
                </div>
            @endif
        </div>

    </div>
</div>
