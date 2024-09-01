@if (isset($header))
    <table class="table">
        <thead>
            {{ $header }}
        </thead>
    </table>
@endif
<table class="table table-border">
    @if (isset($thead) || isset($subheader))
        <thead>
            {{ isset($subheader) ? $subheader : '' }}
            {{ isset($thead) ? $thead : '' }}
        </thead>
    @endif
    @if (isset($tbody))
        <tbody>
            {{ $tbody }}
        </tbody>
    @else
        <tbody>
            {{ $slot }}
        </tbody>
    @endif
    @if (isset($footer))
        <tfoot>
            {{ $footer }}
        </tfoot>
    @endif
</table>
