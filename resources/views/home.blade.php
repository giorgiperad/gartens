@extends('layouts.app')
@section('content')
<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root {
    --primary-color: #2563eb;
    --success-color: #059669;
    --warning-color: #d97706;
    --danger-color: #dc2626;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-600: #4b5563;
    --gray-900: #111827;
}

body {
    background: var(--gray-50);
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    color: var(--gray-900);
}

/* Header */
.modern-header {
    background: linear-gradient(90deg, #2563eb, #059669);
    padding: 2rem 1.5rem;
    margin-bottom: 2rem;
    border-radius: 0 0 20px 20px;
    color: white;
}
.modern-header h1 {
    font-size: 2.25rem;
    font-weight: 800;
}
.modern-header p {
    font-size: 1rem;
    opacity: 0.9;
}
.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.header-emblem img {
    height: 72px;
    width: auto;
    object-fit: contain;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: transform 0.4s ease;
    cursor: pointer;
}
.header-emblem img:hover {
    transform: scale(1.2);
}

/* Cards */
.stat-card {
    border-radius: 14px;
    padding: 1.5rem;
    background: rgba(255,255,255,0.8);
    backdrop-filter: blur(12px);
    border: 1px solid var(--gray-200);
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    transition: transform 0.2s, box-shadow 0.2s;
    height: 100%;
    color: inherit;
    text-decoration: none;
    display: block;
}
.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
}
.stat-card-content p {
    font-size: 0.95rem;
    font-weight: 600;
    margin: 0 0 0.25rem 0;
    color: var(--gray-600);
}
.stat-card-content h3 {
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
}
.stat-card-icon i {
    font-size: 1.75rem;
    color: var(--gray-600);
    transition: transform 0.3s;
}
.stat-card:hover .stat-card-icon i {
    transform: scale(1.1) rotate(5deg);
}

/* Shimmer placeholder */
.shimmer {
    position: relative;
    overflow: hidden;
    background: var(--gray-200);
    border-radius: 6px;
    height: 2rem;
    width: 4rem;
}
.shimmer::after {
    content: "";
    position: absolute;
    top: 0; left: -100px;
    width: 100px; height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.6), transparent);
    animation: shimmer 1.5s infinite;
}
@keyframes shimmer {
    100% { left: 100%; }
}

/* Info Card */
.info-card {
    background: white;
    border-radius: 14px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
    margin: 1.5rem 0;   /* top and bottom spacing */
}
.info-card-header {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid var(--gray-200);
}
.info-card-header h2 {
    font-size: 1.25rem;
    font-weight: 700;
    margin: 0;
}
.info-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 1.5rem;
    border-bottom: 1px solid var(--gray-100);
}
.info-row:last-child { border-bottom: none; }
.info-row h3 {
    font-size: 1rem;
    font-weight: 600;
    margin: 0;
}
.info-row p {
    font-size: 0.85rem;
    color: var(--gray-600);
    margin: 0;
}

/* Status Badges */
.status-badge {
    padding: 0.35rem 0.75rem;
    border-radius: 999px;
    font-size: 0.85rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.4rem;
    color: white;
}
.status-badge.active { background: linear-gradient(90deg,#059669,#10b981); }
.status-badge.inactive { background: linear-gradient(90deg,#9ca3af,#6b7280); }
.status-badge.yes { background: linear-gradient(90deg,#2563eb,#3b82f6); }
.status-badge.no { background: linear-gradient(90deg,#dc2626,#ef4444); }

/* Export Card */
.export-card {
    border-radius: 14px;
    background: linear-gradient(135deg, rgba(16,185,129,0.1), rgba(5,150,105,0.15));
    padding: 1.5rem;
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
}
.export-btn {
    background: var(--success-color);
    color: white;
    padding: 0.7rem 1.4rem;
    border-radius: 8px;
    font-weight: 600;
    position: relative;
    overflow: hidden;
    display: inline-flex;
    align-items: center;
}
.export-btn i { margin-right: 0.5rem; }
.export-btn::before {
    content:"";
    position:absolute;
    top:0; left:-75px;
    width:50px; height:100%;
    background:linear-gradient(120deg,rgba(255,255,255,0.6),transparent);
    transform:skewX(-25deg);
}
.export-btn:hover::before {
    animation: shine 0.8s ease;
}
@keyframes shine {
    100% { left:120%; }
}

/* Scroll-to-top */
.scroll-top {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    background: var(--primary-color);
    color: white;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    cursor: pointer;
    transition: transform 0.3s;
}
.scroll-top:hover { transform: scale(1.1); }
</style>

<div class="modern-header">
    <div class="container-fluid header-content">
        <div>
            <h1>ზოგადი ინფორმაცია2</h1>
            <p>სიღნაღის მუნიციპალიტეტის სკოლამდელი აღზრდის დაწესებულებათა გაერთიანება</p>
        </div>
        <div class="header-emblem">
            <img src="{{ asset('images/city-badge.png') }}" alt="City Emblem">
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <!-- Stat Cards -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="#" class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="stat-card-content">
                            <p>მომხმარებელი</p>
                            @if($user_count)
                                <h3>{{$user_count}}</h3>
                            @else
                                <div class="shimmer"></div>
                            @endif
                        </div>
                        <div class="stat-card-icon"><i class="fas fa-users"></i></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('municipalities.list') }}" class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="stat-card-content">
                            <p>მუნიციპალიტეტი</p>
                            @if($municipality_count)
                                <h3>{{$municipality_count}}</h3>
                            @else
                                <div class="shimmer"></div>
                            @endif
                        </div>
                        <div class="stat-card-icon"><i class="fas fa-city"></i></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('kindergarteners.index') }}" class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="stat-card-content">
                            <p>ბავშვი</p>
                            @if($kindergartner_count)
                                <h3>{{$kindergartner_count}}</h3>
                            @else
                                <div class="shimmer"></div>
                            @endif
                        </div>
                        <div class="stat-card-icon"><i class="fas fa-child"></i></div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{ route('kindergartens.list') }}" class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="stat-card-content">
                            <p>ბაღი</p>
                            @if($kindergarten_count)
                                <h3>{{$kindergarten_count}}</h3>
                            @else
                                <div class="shimmer"></div>
                            @endif
                        </div>
                        <div class="stat-card-icon"><i class="fas fa-school"></i></div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Info Card -->
        <div class="info-card">
            <div class="info-card-header">
                <h2><i class="fas fa-info-circle me-2"></i> სისტემის ინფორმაცია</h2>
            </div>
            <div class="info-card-body">
                <div class="info-row">
                    <div>
                        <h3>სწავლის სტატუსი</h3>
                        <p>ამჟამინდელი მდგომარეობა</p>
                    </div>
                    <span class="status-badge {{ data_get($basic,'object.isLearningStart') ? 'active':'inactive' }}">
                        <i class="fas fa-graduation-cap"></i>
                        {{ data_get($basic,'object.isLearningStart') ? 'მიმდინარე':'დასრულებული' }}
                    </span>
                </div>
                <div class="info-row">
                    <div>
                        <h3>სწავლის დაწყების დრო</h3>
                        <p>პროცესის საწყისი თარიღი</p>
                    </div>
                    <span class="status-badge inactive">{{ data_get($date,'object.start') ?: 'მითითებული არ არის' }}</span>
                </div>
                <div class="info-row">
                    <div>
                        <h3>სწავლის დასრულების დრო</h3>
                        <p>პროცესის საბოლოო თარიღი</p>
                    </div>
                    <span class="status-badge inactive">{{ data_get($date,'object.end') ?: 'მითითებული არ არის' }}</span>
                </div>
                <div class="info-row">
                    <div>
                        <h3>პორტირების ნებართვა</h3>
                        <p>მონაცემების გადატანის უფლება</p>
                    </div>
                    <span class="status-badge {{ data_get($basic,'object.canPorting') ? 'yes':'no' }}">
                        <i class="fas {{ data_get($basic,'object.canPorting') ? 'fa-check':'fa-times' }}"></i>
                        {{ data_get($basic,'object.canPorting') ? 'დიახ':'არა' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Export -->
        <div class="export-card d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <i class="fas fa-file-excel text-success me-3" style="font-size:2rem;"></i>
                <div>
                    <h3>მონაცემების ექსპორტი</h3>
                    <p>აღსაზრდელების სრული ცხრილის ჩამოტვირთვა</p>
                </div>
            </div>
            <a href="{{ route('kindergarteners.export') }}" class="export-btn">
                <i class="fas fa-download"></i> Excel ჩამოტვირთვა
            </a>
        </div>
    </div>
</section>

<div class="scroll-top" onclick="window.scrollTo({top:0,behavior:'smooth'})">
    <i class="fas fa-arrow-up"></i>
</div>
@endsection
