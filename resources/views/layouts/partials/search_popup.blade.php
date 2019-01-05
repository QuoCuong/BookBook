<div class="brown--color box-search-content search_active block-bg close__top">
	<form method="GET" action="{{ route('search') }}" id="search_mini_form" class="minisearch">
		<div class="field__search">
			<input type="text" name="q" placeholder="Tìm kiếm sản phẩm mong muốn...">
			<div class="action">
				<a id="btn-search" href="#"><i class="zmdi zmdi-search"></i></a>
			</div>
		</div>
	</form>
	<div class="close__wrap">
		<span>@lang('labels.close')</span>
	</div>
</div>