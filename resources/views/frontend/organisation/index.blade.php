@extends('frontend.front-layout')

@section('title', 'Org Chart')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">DTDC Org Structure</h2>

    <!-- Toggle Buttons -->
    <!-- Toggle Buttons -->
    @if($organisation['image'])
        <div class="text-center mb-4">
            <button class="btn btn-outline-primary me-2" onclick="toggleView('mermaid')">Mermaid View</button>
            <button class="btn btn-outline-secondary me-2" onclick="toggleView('image')">Image View</button>
            <button class="btn btn-outline-success" onclick="toggleView('orgchart')">See OrgChart Diagram</button>
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

    <!-- OrgChart.js View -->
    <div id="orgchartView" style="display: none;">
        <div id="orgchartContainer" style="width: 100%; height: 700px;font-size:20px"></div>
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
    function toggleView(view) {
        document.getElementById('mermaidView').style.display = view === 'mermaid' ? 'block' : 'none';
        document.getElementById('imageView').style.display = view === 'image' ? 'block' : 'none';
    }
</script>
<!-- OrgChart.js -->
<script src="https://balkangraph.com/js/OrgChart.js"></script>

<script>
    function toggleView(view) {
        document.getElementById('mermaidView').style.display = view === 'mermaid' ? 'block' : 'none';
        document.getElementById('imageView').style.display = view === 'image' ? 'block' : 'none';
        document.getElementById('orgchartView').style.display = view === 'orgchart' ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function () {
        const chart = new OrgChart(document.getElementById("orgchartContainer"), {
            mouseScroll: OrgChart.action.none,
            enableSearch: true,
            enableDragDrop: false,
            showYScroll: false,
            showXScroll: false,
            scaleInitial: OrgChart.match.boundary, // 👈 Fit to container
    
            nodeBinding: {
                field_0: "name",
                field_1: "title"
            },
            nodes: [
                { id: 1, name: "Rishi Sareen", title: "CIO" },
                { id: 2, pid: 1, name: "Arunraja Karthick", title: "Hd IT Svrc & Security" },
                { id: 3, pid: 1, name: "Suraj Sud", title: "Hd Product & Engineering" },
                { id: 4, pid: 1, name: "Pallav Jagoori", title: "Platform Lead" },
                { id: 5, pid: 2, name: "IT Infra & Zonal IT Delivery" },
                { id: 6, pid: 2, name: "DB Team" },
                { id: 7, pid: 2, name: "Information Security" },
                { id: 8, pid: 2, name: "Unified Service Desk" },
                { id: 9, pid: 5, name: "Zonal IT" },
                { id: 10, pid: 5, name: "RO & Branch IT" },
                { id: 11, pid: 5, name: "CO IT Infra (DC, NW & NW Security)" },
                { id: 12, pid: 5, name: "CloudOps & DevOps" },
                { id: 13, pid: 5, name: "IT Procurement & Vendor Management" },
                { id: 14, pid: 5, name: "IT FinOps" },
                { id: 15, pid: 7, name: "Managed SOC" },
                { id: 16, pid: 8, name: "Centralized Service Desk" },
                { id: 17, pid: 16, name: "Functional Support Desk" },
                { id: 18, pid: 3, name: "Engineering" },
                { id: 19, pid: 3, name: "Quality Assurance" },
                { id: 20, pid: 3, name: "Delivery Management" },
                { id: 21, pid: 3, name: "Product Management & Support" },
                { id: 22, pid: 18, name: "Functional Portfolios" },
                { id: 23, pid: 18, name: "Architects" },
                { id: 24, pid: 18, name: "Data Management" },
                { id: 25, pid: 24, name: "AI/ML" },
                { id: 26, pid: 19, name: "User Experience" },
                { id: 27, pid: 26, name: "UI / UX & Technical Writers" },
                { id: 28, pid: 21, name: "Product Managers" },
                { id: 29, pid: 21, name: "Technical Support" }
            ]
        });

        // Prevent trackpad zoom/pinch on Mac
    });
</script>
@endpush