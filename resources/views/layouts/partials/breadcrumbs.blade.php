@if (count($breadcrumbs))
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        @foreach ($breadcrumbs as $breadcrumb)
                            <nav class="bradcaump-content">
                                @if ($breadcrumb->url && !$loop->last)
                                    <a class="breadcrumb_item" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                                    <span class="brd-separetor">/</span>
                                    <span class="breadcrumb_item">{{ $breadcrumb->title }}</span>
                                @else
                                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                                @endif
                            </nav>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
