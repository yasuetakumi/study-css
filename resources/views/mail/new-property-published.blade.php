<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            /* margin: 0; */
            font-size: 12px;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f8fafc;
        }

        p {
            margin: 0;
        }

        a {
            color: rgba(0, 0, 0, 0.5);
            text-decoration: none;
            background-color: transparent;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        ol, ul, dl {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        dt {
            font-weight: 700;
        }

        /* Card */
        .card {
            margin-bottom: 1rem;
            position: relative;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
        }

        .card-header {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            border-bottom-right-radius: 1px solid rgba(0, 0, 0, 0.125);
        }

        .card-header{
            border-radius: 0.25rem 0.25rem 0 0;
        }

        .card-secondary .card-header {
            background-color: #6c757d;
        }

        .card-secondary .card-header, .card-secondary .card-header a {
            color: #ffffff;
        }

        .card-body {
            -webkit-box-flex: 1;
            flex: 1 1 auto;
            padding: 1.25rem;
        }
        /* END - Card */

        /* Row */
        .row {
            display: -webkit-box;
            display: flex;
            margin-right: -15px;
            margin-left: -15px;
        }
        /* END Row */

        /* Cold */
        .col-xl, .col-xl-auto, .col-xl-12, .col-xl-11, .col-xl-10, .col-xl-9, .col-xl-8, .col-xl-7, .col-xl-6, .col-xl-5, .col-xl-4, .col-xl-3, .col-xl-2, .col-xl-1, .col-lg, .col-lg-auto, .col-lg-12, .col-lg-11, .col-lg-10, .col-lg-9, .col-lg-8, .col-lg-7, .col-lg-6, .col-lg-5, .col-lg-4, .col-lg-3, .col-lg-2, .col-lg-1, .col-md, .col-md-auto, .col-md-12, .col-md-11, .col-md-10, .col-md-9, .col-md-8, .col-md-7, .col-md-6, .col-md-5, .col-md-4, .col-md-3, .col-md-2, .col-md-1, .col-sm, .col-sm-auto, .col-sm-12, .col-sm-11, .col-sm-10, .col-sm-9, .col-sm-8, .col-sm-7, .col-sm-6, .col-sm-5, .col-sm-4, .col-sm-3, .col-sm-2, .col-sm-1, .col, .col-auto, .col-12, .col-11, .col-10, .col-9, .col-8, .col-7, .col-6, .col-5, .col-4, .col-3, .col-2, .col-1 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }

        .col-5 {
            -webkit-box-flex: 0;
            flex: 0 0 41.6666666667%;
            max-width: 41.6666666667%;
        }

        .col-7 {
            -webkit-box-flex: 0;
            flex: 0 0 58.3333333333%;
            max-width: 58.3333333333%;
        }

        /* Helper */
        .d-flex {
            display: -webkit-box !important;
            display: flex !important;
        }

        .flex-column {
            -webkit-box-orient: vertical !important;
            -webkit-box-direction: normal !important;
            flex-direction: column !important;
        }

        .flex-grow-1 {
            -webkit-box-flex: 1 !important;
            flex-grow: 1 !important;
        }

        .align-items-center {
            -webkit-box-align: center !important;
            align-items: center !important;
        }

        .mb-0, .my-0 {
            margin-bottom: 0 !important;
        }

        .mb-3, .my-3 {
            margin-bottom: 1rem !important;
        }

        .p-2 {
            padding: 0.5rem !important;
        }

        .p-1 {
            padding: 0.25rem !important;
        }

        .position-relative {
            position: relative !important;
        }

        .position-absolute {
            position: absolute !important;
        }

        .w-100 {
            width: 100% !important;
        }

        .rounded-sm {
            border-radius: 0.2rem !important;
        }

        .bg-secondary {
            background-color: #6c757d !important;
        }

        .bg-secondary, .bg-secondary > a {
            color: #ffffff !important;
        }

        .text-dark {
            color: #343a40 !important;
        }

        .text-info {
            color: #6cb2eb !important;
        }
        /* END - Helper */
    </style>
</head>
<body>
    <p>This is email is to inform you that new properties have been published which match your saved search</p>

    <p>Properties</p>
    @foreach ($row->properties as $property)
        @include('mail._components.property_list')
    @endforeach

    <p>????????????:
        <span><span style="color: rgb(243, 78, 5)">[????????????] </span>{{ $row->searchCondition['????????????'] ?? ' ??? '}} </span>

        {{-- Surface Area --}}
        <span>
            <span style="color: rgb(243, 78, 5)">[??????] </span>
            @if ($row->searchCondition['????????????'] && $row->searchCondition['????????????'])
                {{ $row->searchCondition['????????????'] . '???' . $row->searchCondition['????????????'] }}
            @elseif ($row->searchCondition['????????????'] && !$row->searchCondition['????????????'])
                {{ $row->searchCondition['????????????'] . '???????????????' }}
            @elseif (!$row->searchCondition['????????????'] && $row->searchCondition['????????????'])
                {{ '???????????????' . $row->searchCondition['????????????'] }}
            @else
            ???
            @endif
        </span>

        {{-- Rent Amount --}}
        <span>
            <span style="color: rgb(243, 78, 5)">[??????] </span>
            @if ($row->searchCondition['????????????'] && $row->searchCondition['????????????'])
                {{ $row->searchCondition['????????????'] . '???' . $row->searchCondition['????????????'] }}
            @elseif ($row->searchCondition['????????????'] && !$row->searchCondition['????????????'])
                {{ $row->searchCondition['????????????'] . '???????????????'}}
            @elseif (!$row->searchCondition['????????????'] && $row->searchCondition['????????????'])
                {{ '???????????????' . $row->searchCondition['????????????'] }}
            @else
            ???
            @endif
        </span>

        <span><span style="color: rgb(243, 78, 5)">[??????????????????] </span> {{ $row->searchCondition['?????????????????? ? sc.??????????????????'] ?? ' ??? '}}</span>
        <span><span style="color: rgb(243, 78, 5)">[??????] </span>{{ $row->searchCondition['??????'] ?? ' ??? '}}</span>

        {{-- transfer_price --}}
        <span>
            <span style="color: rgb(243, 78, 5)">[?????????] </span>
            @if ($row->searchCondition['???????????????'] && $row->searchCondition['???????????????'])
                {{ $row->searchCondition['???????????????'] . '???' . $row->searchCondition['???????????????'] }}
            @elseif ($row->searchCondition['???????????????'] && !$row->searchCondition['???????????????'])
                {{$row->searchCondition['???????????????'] . '???????????????'}}
            @elseif (!$row->searchCondition['???????????????'] && $row->searchCondition['???????????????'])
                {{'???????????????' . $row->searchCondition['???????????????'] }}
            @else
            ???
            @endif
        </span>

        <span><span style="color: rgb(243, 78, 5)">[??????(??????)] </span>{{ $row->searchCondition['??????_??????'] ?? ' ??? ' }}</span>
        <span><span style="color: rgb(243, 78, 5)">[??????(??????)] </span>{{ $row->searchCondition['??????_??????'] ?? ' ??? '}}</span>
        <span><span style="color: rgb(243, 78, 5)">[??????????????????] </span>{{ $row->searchCondition['??????????????????'] ?? ' ??? '}}</span>
        <span><span style="color: rgb(243, 78, 5)">[??????????????????] </span>{{ $row->searchCondition['??????????????????'] ?? ' ??? '}}</span>
        <span><span style="color: rgb(243, 78, 5)"> [???????????????????????????????????????] </span> {{ $row->searchCondition['?????????????????????_???????????????'] ?? ' ??? '}}</span>


        {{-- @foreach ($row->searchCondition as $conditionKey => $condition)
        <span>
            <span style="color: rgb(243, 78, 5);">{{ $conditionKey }}</span>
            {{ $condition }}
        </span>
        @endforeach --}}
    </p>
</body>
</html>
