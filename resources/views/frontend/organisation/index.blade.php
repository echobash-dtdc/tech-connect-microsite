@extends('frontend.front-layout')

@section('title', 'Org Chart')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">DTDC Org Structure</h2>

    <!-- Toggle Buttons -->
    @if($organisation['image'])
        <div class="text-center mb-4">
            <button class="btn btn-outline-primary me-2" onclick="toggleView('mermaid')">Mermaid View</button>
            <button class="btn btn-outline-secondary" onclick="toggleView('image')">Image View</button>
        </div>
    @endif

    <!-- Mermaid View (scrollable) -->
    <div id="mermaidView" class="position-relative mb-4" style="display: block;">
        <div class="mermaid-scroll">
            <div class="mermaid" id="org-chart">
graph TD
    CIO[Rishi Sareen<br/>CIO]
    %% Arunraja side
    CIO --> Arunraja[Arunraja Karthick<br/>Hd IT Svrc & Security]
    Arunraja --> InfraDelivery[IT Infra & Zonal IT Delivery]
    Arunraja --> DBTeam[DB Team]
    Arunraja --> InfoSec[Information Security]
    Arunraja --> USD[Unified Service Desk]
    InfraDelivery --> ZonalIT[Zonal IT]
    InfraDelivery --> ROBranch[RO & Branch IT]
    InfraDelivery --> COInfra["CO IT Infra<br/>(DC, NW & NW Security)"]
    InfraDelivery --> CloudOps[CloudOps & DevOps]
    InfraDelivery --> Procurement[IT Procurement & Vendor Management]
    InfraDelivery --> FinOps[IT FinOps]
    InfoSec --> SOC[Managed SOC]
    USD --> CentralDesk[Centralized Service Desk]
    CentralDesk --> FSD[Functional Support Desk]
    %% Suraj side
    CIO --> Suraj[Suraj Sud<br/>Hd Product & Engineering]
    Suraj --> Engg[Engineering]
    Suraj --> QA[Quality Assurance]
    Suraj --> Delivery[Delivery Management]
    Suraj --> ProductMgmt[Product Management & Support]
    Engg --> Portfolios[Functional Portfolios]
    Engg --> Architects[Architects]
    Engg --> DataMgmt[Data Management]
    DataMgmt --> AI[AI/ML]
    QA --> UX[User Experience]
    UX --> Writers["UI / UX & Technical Writers"]
    ProductMgmt --> PMs[Product Managers]
    ProductMgmt --> Support[Technical Support]
    %% Pallav side
    CIO --> Pallav[Pallav Jagoori<br/>Platform Lead]
            </div>
        </div>
    </div>

    <!-- Static Image View -->
    <div id="imageView" style="display: none;">
        <img src="{{ ENV('BASEROW_DOMAIN').$organisation['image'][0]['url'] ?? '' }}" alt="Org Chart" class="img-fluid w-100">
    </div>
</div>
@endsection

@push('styles')
<style>
.mermaid-scroll {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 10px;
    text-align: center;
}

#mermaid-graph {
    display: inline-block;
    transform-origin: center center;
    transition: transform 0.2s ease;
}
.mermaid-wrapper {
    overflow-x: auto;
    overflow-y: hidden;
    -webkit-overflow-scrolling: touch;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 10px;
    max-width: 100%;
}

.mermaid svg {
    width: 100%;
    height: auto;
    min-width: 600px;
    max-width: 100%;
    display: block;
}
</style>
@endpush

@push('scripts')
<!-- Mermaid.js -->
<script type="module">
    import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs';
    mermaid.initialize({ startOnLoad: true });
</script>
<script>
let scale = 1;

function zoomIn() {
    scale += 0.1;
    updateZoom();
}

function zoomOut() {
    scale = Math.max(0.5, scale - 0.1);
    updateZoom();
}

function resetZoom() {
    scale = 1;
    updateZoom();
}

function updateZoom() {
    document.getElementById('mermaid-graph').style.transform = `scale(${scale})`;
}
</script>

<script>
    function toggleView(view) {
        document.getElementById('mermaidView').style.display = view === 'mermaid' ? 'block' : 'none';
        document.getElementById('imageView').style.display = view === 'image' ? 'block' : 'none';
    }
</script>
@endpush