<div>
    @php
        $tableId = uniqid('grid');
    @endphp
    <div id="{{$tableId}}"></div>

    <script type="module">
        import { Grid } from 'https://cdn.skypack.dev/gridjs';
        import { Grid } from "https://cdn.jsdelivr.net/npm/gridjs@7.1.1/dist/gridjs.module.js";

        import {
        Grid,
        html
    } from "https://unpkg.com/gridjs?module";
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
