<div class="go-to-top"> <i class="fa fa-angle-up"></i></div>

<footer>
	<div class="row">
		<div class="column">
			<p>{{ CommonConfig::getCode(FOOTER_TEXT) }}</p>
		</div>
	</div>
</footer>

{{ HTML::script('assets/js/foundation.min.js') }}
{{ HTML::script('assets/js/home.js') }}

@if(isset($script))
	{{ $script->footer_script }}
@endif

{{ CommonConfig::getCode(CHAT_SCRIPT) }}
