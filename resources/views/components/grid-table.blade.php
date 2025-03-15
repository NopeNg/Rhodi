<div>
    @php
        $tableId = uniqid('grid');
    @endphp
    <div id="{{$tableId}}"></div>

    <script type="module">
        const grid = new Grid({
            @if(!empty($headers))
            columns: @js($headers),
            @endif
            pagination: true,
            search: @js($searchable ?? true),
            sort: @js($sortable ?? true),
            data: @json($data)
        });
        grid.render(document.getElementById('{{$tableId}}'))
    </script>
</div>
