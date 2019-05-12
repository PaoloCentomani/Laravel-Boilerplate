@if ($analyticsId = config('boilerplate.analytics_id'))
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $analyticsId }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', '{{ $analyticsId }}');
</script>
@endif
