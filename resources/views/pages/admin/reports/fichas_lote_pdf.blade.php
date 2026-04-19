{{-- resources/views/pages/admin/reports/fichas_lote_pdf.blade.php --}}
{{-- Loop que gera UMA ficha por página para cada apoio --}}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
@foreach($signatures as $index => $sig)

    {{-- Inclui a ficha individual passando $sig corretamente --}}
    @include('pages.admin.reports.ficha_apoio_pct', ['sig' => $sig])

    {{-- Quebra de página entre fichas, exceto na última --}}
    @if(!$loop->last)
        <div class="page-break"></div>
    @endif

@endforeach
</body>
</html>
