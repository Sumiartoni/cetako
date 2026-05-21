@php
    $stats = \App\Models\Stat::active()->ordered()->get();
    if ($stats->isEmpty()) {
        $stats = collect([
            (object)['icon' => 'users', 'value' => 500, 'suffix' => '+', 'label' => 'Klien Puas'],
            (object)['icon' => 'file-check', 'value' => 10000, 'suffix' => '+', 'label' => 'Proyek Selesai'],
            (object)['icon' => 'printer', 'value' => 15, 'suffix' => '', 'label' => 'Mesin Produksi'],
            (object)['icon' => 'award', 'value' => 8, 'suffix' => ' Tahun', 'label' => 'Pengalaman'],
        ]);
    }
@endphp
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            @foreach($stats as $i => $stat)
            <div class="stat-item animate-on-scroll {{ $i > 0 ? 'animate-delay-' . $i : '' }}">
                <div class="stat-icon"><i data-lucide="{{ $stat->icon }}" style="width:28px;height:28px;"></i></div>
                <div class="stat-number" data-target="{{ $stat->value }}" data-suffix="{{ $stat->suffix }}">0</div>
                <div class="stat-label">{{ $stat->label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>
