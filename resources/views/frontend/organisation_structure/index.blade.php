@extends('frontend.front-layout')

@section('title', 'Org Chart')

@section('content')
  <div class="container my-5">
    <h2 class="text-center mb-4">DTDC Org Structure</h2>

    <div style="overflow-x: auto; -webkit-overflow-scrolling: touch; mermaid-wrapper">
        <div class="mermaid" style="min-width: 900px;">
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
@push('styles')
<style>
/* Add to your layout's <style> section or CSS file */
.mermaid-wrapper {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    position: relative;
}

.mermaid-wrapper::after {
    content: "⇆";
    position: absolute;
    right: 10px;
    bottom: 10px;
    font-size: 18px;
    color: #999;
}
</style>
@endpush
@endsection