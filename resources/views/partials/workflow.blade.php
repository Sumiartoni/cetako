@php
    $workflowSettings = \App\Models\SiteSetting::getGroup('workflow');
    $steps = [];
    $defaultSteps = [
        1 => ['num' => '01', 'img' => 'order.png', 'title' => 'Konsultasi & Order', 'desc' => 'Hubungi kami untuk konsultasi kebutuhan cetak Anda. Tim kami siap memberikan rekomendasi terbaik.'],
        2 => ['num' => '02', 'img' => 'qA.png', 'title' => 'Desain & Approval', 'desc' => 'Tim desainer kami membuatkan layout dan menunggu persetujuan Anda sebelum masuk produksi.'],
        3 => ['num' => '03', 'img' => 'print.png', 'title' => 'Proses Produksi', 'desc' => 'Produksi dikerjakan dengan mesin modern dan melalui quality control yang ketat di setiap tahap.'],
        4 => ['num' => '04', 'img' => 'packaging.png', 'title' => 'Packaging & Delivery', 'desc' => 'Hasil cetak dikemas rapi dengan perlindungan maksimal dan dikirim tepat waktu ke lokasi Anda.']
    ];

    for ($i = 1; $i <= 4; $i++) {
        $steps[] = [
            'num' => $defaultSteps[$i]['num'],
            'img' => $defaultSteps[$i]['img'],
            'title' => $workflowSettings['workflow_' . $i . '_title'] ?? $defaultSteps[$i]['title'],
            'desc' => $workflowSettings['workflow_' . $i . '_desc'] ?? $defaultSteps[$i]['desc'],
        ];
    }
@endphp
<section class="section workflow" id="alur-kerja">
    <div class="container">
        <div class="section-header">
            <div class="section-badge" style="background:rgba(255,255,255,0.1);color:white;"><i data-lucide="git-branch" style="width:14px;height:14px;"></i> Alur Kerja</div>
            <h2 class="section-title" style="color:white;">Proses Mudah &<br>Transparan</h2>
            <p class="section-subtitle" style="color:rgba(255,255,255,0.7);">{{ $workflowSettings['workflow_subtitle'] ?? 'Empat langkah sederhana untuk mendapatkan hasil cetakan terbaik.' }}</p>
        </div>
        <div class="workflow-grid">
            @foreach($steps as $i => $step)
            @if(!empty($step['title']))
            <div class="workflow-step animate-on-scroll animate-delay-{{ $i + 1 }}">
                <div class="workflow-step-num">{{ $step['num'] }}</div>
                <div class="workflow-step-img">
                    <img src="{{ asset('images/' . $step['img']) }}" alt="{{ $step['title'] }}">
                </div>
                <h3 class="workflow-step-title">{{ $step['title'] }}</h3>
                <p class="workflow-step-desc">{{ $step['desc'] }}</p>
                @if($i < 3)
                <div class="workflow-arrow">
                    <i data-lucide="chevron-right" style="width:24px;height:24px;"></i>
                </div>
                @endif
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
