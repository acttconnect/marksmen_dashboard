@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-page">

    {{-- HEADER --}}
    <section class="dashboard-intro">
        <div class="intro-content">
            <div class="intro-badge"><span></span> ADMIN CONTROL CENTER</div>
            <h1>Dashboard</h1>
            <p>Welcome back, {{ auth()->user()->name ?? 'Admin' }}. Here’s what’s happening across your website.</p>
        </div>

        <div class="intro-date">
            <div class="date-icon"><i class="fa-regular fa-calendar"></i></div>
            <div>
                <small>Today</small>
                <strong>{{ now()->format('d M Y') }}</strong>
            </div>
        </div>
    </section>

    {{-- KPI --}}
    <section class="stats-grid">

        <a href="{{ route('admin.categories.index') }}" class="stat-card">
            <div class="stat-icon navy"><i class="fa-solid fa-layer-group"></i></div>
            <div class="stat-content">
                <span>Categories</span>
                <strong>{{ $stats['categories'] ?? 0 }}</strong>
                <small>Content structure</small>
            </div>
            <i class="fa-solid fa-arrow-up-right stat-arrow"></i>
        </a>

        <a href="{{ route('admin.galleries.index') }}" class="stat-card">
            <div class="stat-icon purple"><i class="fa-solid fa-image"></i></div>
            <div class="stat-content">
                <span>Gallery Items</span>
                <strong>{{ $stats['gallery'] ?? 0 }}</strong>
                <small>Visual content</small>
            </div>
            <i class="fa-solid fa-arrow-up-right stat-arrow"></i>
        </a>

        <a href="{{ route('admin.blogs.index') }}" class="stat-card featured">
            <div class="stat-icon gold"><i class="fa-solid fa-newspaper"></i></div>
            <div class="stat-content">
                <span>Blog Posts</span>
                <strong>{{ $stats['blogs'] ?? 0 }}</strong>
                <small>Published content</small>
            </div>
            <i class="fa-solid fa-arrow-up-right stat-arrow"></i>
        </a>

        <a href="{{ route('admin.product-enquiries.index') }}" class="stat-card">
            <div class="stat-icon green"><i class="fa-solid fa-box-open"></i></div>
            <div class="stat-content">
                <span>Product Enquiries</span>
                <strong>{{ $stats['product_enquiries'] ?? 0 }}</strong>
                <small>Customer interest</small>
            </div>
            <i class="fa-solid fa-arrow-up-right stat-arrow"></i>
        </a>

        <a href="{{ route('admin.contact-enquiries.index') }}" class="stat-card">
            <div class="stat-icon blue"><i class="fa-solid fa-envelope"></i></div>
            <div class="stat-content">
                <span>Contact Enquiries</span>
                <strong>{{ $stats['contact_enquiries'] ?? 0 }}</strong>
                <small>Website messages</small>
            </div>
            <i class="fa-solid fa-arrow-up-right stat-arrow"></i>
        </a>

        <a href="{{ route('admin.jobs.index') }}" class="stat-card">
            <div class="stat-icon orange"><i class="fa-solid fa-briefcase"></i></div>
            <div class="stat-content">
                <span>Job Openings</span>
                <strong>{{ $stats['job_openings'] ?? 0 }}</strong>
                <small>Open positions</small>
            </div>
            <i class="fa-solid fa-arrow-up-right stat-arrow"></i>
        </a>

        <a href="{{ route('admin.applications.index') }}" class="stat-card dark-stat">
            <div class="stat-icon red"><i class="fa-solid fa-file-lines"></i></div>
            <div class="stat-content">
                <span>Applications</span>
                <strong>{{ $stats['job_applications'] ?? 0 }}</strong>
                <small>Candidate pipeline</small>
            </div>
            <i class="fa-solid fa-arrow-up-right stat-arrow"></i>
        </a>

    </section>

    {{-- MAIN GRID --}}
    <section class="main-grid">

        {{-- RECENT PRODUCT ENQUIRIES --}}
        <div class="content-card">
            <div class="card-head">
                <div>
                    <span class="section-label">CUSTOMER ACTIVITY</span>
                    <h2>Product Enquiries</h2>
                </div>
                <a href="{{ route('admin.product-enquiries.index') }}" class="head-link">View all <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="activity-list">
                @forelse($recentProductEnquiries ?? [] as $enquiry)
                    <div class="activity-row">
                        <div class="activity-icon product"><i class="fa-solid fa-box"></i></div>
                        <div class="activity-info">
                            <strong>{{ $enquiry->name }}</strong>
                            <span>{{ $enquiry->mobile }}</span>
                        </div>
                        <div class="activity-date">
                            <small>{{ $enquiry->created_at?->format('d M Y') }}</small>
                            <span>Product</span>
                        </div>
                    </div>
                @empty
                    <div class="empty-box">
                        <i class="fa-regular fa-folder-open"></i>
                        <strong>No product enquiries</strong>
                        <span>New enquiries will appear here.</span>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- QUICK ACCESS DARK --}}
        <div class="content-card dark-card">
            <div class="card-head">
                <div>
                    <span class="section-label light-label">WORKSPACE</span>
                    <h2>Quick Access</h2>
                </div>
            </div>

            <div class="quick-grid">
                <a href="{{ route('admin.blogs.index') }}">
                    <span class="quick-icon"><i class="fa-solid fa-pen-nib"></i></span>
                    <div><strong>Blogs</strong><small>Manage articles</small></div>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>

                <a href="{{ route('admin.galleries.index') }}">
                    <span class="quick-icon"><i class="fa-solid fa-images"></i></span>
                    <div><strong>Gallery</strong><small>Manage media</small></div>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>

                <a href="{{ route('admin.jobs.index') }}">
                    <span class="quick-icon"><i class="fa-solid fa-briefcase"></i></span>
                    <div><strong>Careers</strong><small>Job openings</small></div>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>

                <a href="{{ route('admin.applications.index') }}">
                    <span class="quick-icon"><i class="fa-solid fa-users"></i></span>
                    <div><strong>Applications</strong><small>Review candidates</small></div>
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>

            <div class="dark-footer">
                <div class="shield"><i class="fa-solid fa-shield-halved"></i></div>
                <div><strong>Secure workspace</strong><span>Administration system active</span></div>
                <b></b>
            </div>
        </div>

    </section>

    {{-- APPLICATIONS --}}
    <section class="content-card table-card">
        <div class="card-head">
            <div>
                <span class="section-label">RECRUITMENT</span>
                <h2>Recent Job Applications</h2>
            </div>
            <a href="{{ route('admin.applications.index') }}" class="head-link">View all <i class="fa-solid fa-arrow-right"></i></a>
        </div>

        <div class="table-scroll">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>APPLICANT</th>
                        <th>EMAIL</th>
                        <th>POSITION</th>
                        <th>STATUS</th>
                        <th>DATE</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($recentApplications ?? [] as $application)
                    <tr>
                        <td>
                            <div class="person">
                                <span class="person-avatar">{{ strtoupper(substr($application->full_name ?? 'A', 0, 1)) }}</span>
                                <strong>{{ $application->full_name }}</strong>
                            </div>
                        </td>
                        <td class="muted">{{ $application->email }}</td>
                        <td><span class="position">{{ $application->job->job_title ?? '—' }}</span></td>
                        <td><span class="status status-{{ strtolower($application->status ?? 'pending') }}">{{ ucfirst($application->status ?? 'Pending') }}</span></td>
                        <td class="muted">{{ $application->created_at?->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5"><div class="table-empty">No recent applications found.</div></td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>

    {{-- BOTTOM --}}
    <section class="bottom-grid">

        <div class="content-card">
            <div class="card-head">
                <div>
                    <span class="section-label">PUBLICATIONS</span>
                    <h2>Recent Blogs</h2>
                </div>
                <a href="{{ route('admin.blogs.index') }}" class="head-link">View all <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <div class="blog-list">
                @forelse($recentBlogs ?? [] as $blog)
                    <div class="blog-row">
                        <div class="blog-icon"><i class="fa-solid fa-newspaper"></i></div>
                        <div class="blog-info">
                            <strong>{{ $blog->title }}</strong>
                            <span>{{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('d M Y') : 'Not published' }}</span>
                        </div>
                        <span class="status status-{{ strtolower($blog->status ?? 'draft') }}">{{ ucfirst($blog->status ?? 'Draft') }}</span>
                    </div>
                @empty
                    <div class="empty-box small">No recent blogs found.</div>
                @endforelse
            </div>
        </div>

        {{-- DARK SUMMARY --}}
        <div class="summary-card">
            <div class="summary-top">
                <span class="section-label light-label">SYSTEM OVERVIEW</span>
                <i class="fa-solid fa-chart-simple"></i>
            </div>

            <h2>Everything under control.</h2>
            <p>Your Marksmen administration workspace is ready for content, enquiries and recruitment management.</p>

            <div class="summary-stat">
                <span><i class="fa-solid fa-circle-check"></i> Content management</span>
                <b>READY</b>
            </div>
            <div class="summary-stat">
                <span><i class="fa-solid fa-circle-check"></i> Enquiry management</span>
                <b>READY</b>
            </div>
            <div class="summary-stat">
                <span><i class="fa-solid fa-circle-check"></i> Recruitment</span>
                <b>READY</b>
            </div>
        </div>

    </section>

</div>

<style>
/* =========================================================
   MARKSMEN ADMIN — LIGHT + DARK PREMIUM DASHBOARD
   ========================================================= */

.dashboard-page{
    --gold:#c79b45;
    --gold-dark:#a77c2d;
    --navy:#0d1b2a;
    --navy-2:#12263a;
    --text:#16202d;
    --muted:#7b8796;
    --line:#e8ecf1;
    --soft:#f6f8fa;
    --white:#ffffff;

    margin:-24px;
    padding:28px;
    min-height:100vh;
    background:#f4f6f8;
    color:var(--text);
    font-family:inherit;
}

/* INTRO */
.dashboard-intro{
    position:relative;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:25px;
    padding:30px 32px;
    margin-bottom:20px;
    border:1px solid #e4e8ed;
    border-radius:22px;
    overflow:hidden;
    background:#fff;
    box-shadow:0 8px 28px rgba(18,32,48,.055);
}
.dashboard-intro:after{
    content:"";
    position:absolute;
    width:240px;
    height:240px;
    right:-100px;
    top:-130px;
    border-radius:50%;
    background:rgba(199,155,69,.09);
}
.intro-content{position:relative;z-index:1}
.intro-badge{
    display:flex;
    align-items:center;
    gap:8px;
    margin-bottom:9px;
    color:var(--gold-dark);
    font-size:10px;
    font-weight:800;
    letter-spacing:.16em;
}
.intro-badge span{
    width:6px;height:6px;border-radius:50%;
    background:#32c979;
    box-shadow:0 0 0 4px rgba(50,201,121,.1);
}
.dashboard-intro h1{
    margin:0;
    font-size:30px;
    line-height:1.15;
    font-weight:800;
    letter-spacing:-.04em;
}
.dashboard-intro p{
    margin:8px 0 0;
    color:#7b8795;
    font-size:13px;
}
.intro-date{
    position:relative;
    z-index:2;
    display:flex;
    align-items:center;
    gap:11px;
    padding:10px 14px;
    min-width:145px;
    border:1px solid #e8ebef;
    border-radius:13px;
    background:#fbfcfd;
}
.date-icon{
    width:38px;height:38px;
    display:grid;place-items:center;
    border-radius:10px;
    background:#f8f0e1;
    color:var(--gold-dark);
}
.intro-date small{display:block;color:#9aa4b1;font-size:9px;text-transform:uppercase;letter-spacing:.1em}
.intro-date strong{display:block;margin-top:2px;font-size:12px}

/* STATS */
.stats-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:14px;
    margin-bottom:20px;
}
.stat-card{
    position:relative;
    display:flex;
    align-items:center;
    gap:13px;
    min-height:105px;
    padding:17px;
    overflow:hidden;
    border:1px solid #e4e8ed;
    border-radius:17px;
    background:#fff;
    color:inherit;
    text-decoration:none;
    box-shadow:0 5px 20px rgba(20,35,50,.035);
    transition:.2s ease;
}
.stat-card:before{
    content:"";
    position:absolute;
    left:0;top:0;bottom:0;
    width:3px;
    background:var(--accent);
    opacity:.85;
}
.stat-card:hover{
    transform:translateY(-3px);
    border-color:#d9dee5;
    box-shadow:0 12px 28px rgba(20,35,50,.09);
}
.stat-icon{
    flex:0 0 44px;
    width:44px;height:44px;
    display:grid;place-items:center;
    border-radius:12px;
    font-size:15px;
}
.stat-icon.navy{background:#edf3f8;color:#1e547b}
.stat-icon.purple{background:#f1effb;color:#7565bc}
.stat-icon.gold{background:#f8f0e1;color:#b08435}
.stat-icon.green{background:#eaf8f1;color:#249c69}
.stat-icon.blue{background:#eaf5fb;color:#338eb7}
.stat-icon.orange{background:#fff2e8;color:#c77a35}
.stat-icon.red{background:#fbecef;color:#c75c6b}
.stat-content{min-width:0;flex:1}
.stat-content span{display:block;color:#7b8795;font-size:10px;font-weight:700}
.stat-content strong{display:block;color:#172230;font-size:24px;line-height:1;margin:5px 0}
.stat-content small{display:block;color:#a1aab5;font-size:9px}
.stat-arrow{position:absolute;right:15px;top:14px;color:#b5bec8;font-size:9px}
.stat-card.featured{
    background:linear-gradient(135deg,#fff,#fdf9f1);
    border-color:#eadfc9;
}
.dark-stat{
    background:var(--navy);
    border-color:var(--navy);
    color:#fff;
}
.dark-stat .stat-content span,.dark-stat .stat-content small{color:#91a0b2}
.dark-stat .stat-content strong{color:#fff}
.dark-stat .stat-arrow{color:#7f91a6}

/* CONTENT CARDS */
.main-grid{
    display:grid;
    grid-template-columns:1.35fr .85fr;
    gap:20px;
    margin-bottom:20px;
}
.content-card{
    background:#fff;
    border:1px solid #e4e8ed;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 7px 25px rgba(20,35,50,.045);
}
.card-head{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:15px;
    padding:21px 22px 16px;
}
.section-label{
    display:block;
    color:#a77c2d;
    font-size:9px;
    font-weight:800;
    letter-spacing:.16em;
}
.card-head h2{
    margin:5px 0 0;
    color:#182432;
    font-size:17px;
    font-weight:780;
    letter-spacing:-.025em;
}
.head-link{
    display:flex;
    align-items:center;
    gap:7px;
    color:#a77c2d;
    text-decoration:none;
    font-size:10px;
    font-weight:750;
    margin-top:4px;
}
.head-link:hover{color:#825d20}

/* ACTIVITY */
.activity-list{padding:0 22px 12px}
.activity-row{
    display:flex;
    align-items:center;
    gap:12px;
    padding:13px 0;
    border-top:1px solid #eef0f3;
}
.activity-icon{
    width:39px;height:39px;
    flex:0 0 39px;
    display:grid;place-items:center;
    border-radius:11px;
    font-size:13px;
}
.activity-icon.product{background:#ebf8f1;color:#239867}
.activity-info{min-width:0;flex:1}
.activity-info strong{
    display:block;
    color:#263342;
    font-size:11px;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}
.activity-info span{display:block;color:#9aa4af;font-size:9px;margin-top:3px}
.activity-date{text-align:right}
.activity-date small{display:block;color:#687687;font-size:9px;font-weight:700}
.activity-date span{display:block;color:#b0b7c0;font-size:8px;margin-top:3px}

/* DARK CARD */
.dark-card{
    padding:0 22px 20px;
    background:linear-gradient(145deg,#102236,#0c1a2a);
    border-color:#102236;
    color:#fff;
}
.dark-card .card-head{padding:21px 0 16px}
.dark-card .card-head h2{color:#fff}
.light-label{color:#d7af5b!important}
.quick-grid{display:grid;grid-template-columns:1fr;gap:7px}
.quick-grid a{
    display:flex;
    align-items:center;
    gap:11px;
    padding:10px;
    color:#fff;
    text-decoration:none;
    border:1px solid rgba(255,255,255,.06);
    border-radius:12px;
    background:rgba(255,255,255,.035);
    transition:.2s;
}
.quick-grid a:hover{
    background:rgba(255,255,255,.075);
    border-color:rgba(215,175,91,.22);
    transform:translateX(2px);
}
.quick-icon{
    width:37px;height:37px;
    flex:0 0 37px;
    display:grid;place-items:center;
    border-radius:10px;
    color:#d7af5b;
    background:rgba(215,175,91,.11);
}
.quick-grid a div{min-width:0;flex:1}
.quick-grid strong{display:block;font-size:11px}
.quick-grid small{display:block;color:#8291a4;font-size:8px;margin-top:2px}
.quick-grid a>i{color:#607186;font-size:8px}
.dark-footer{
    display:flex;
    align-items:center;
    gap:10px;
    margin-top:12px;
    padding-top:13px;
    border-top:1px solid rgba(255,255,255,.07);
}
.shield{
    width:31px;height:31px;
    display:grid;place-items:center;
    border-radius:9px;
    color:#52d394;
    background:rgba(82,211,148,.08);
    font-size:11px;
}
.dark-footer div:nth-child(2){flex:1}
.dark-footer strong{display:block;font-size:9px}
.dark-footer span{display:block;color:#65758a;font-size:8px;margin-top:2px}
.dark-footer>b{
    width:6px;height:6px;border-radius:50%;
    background:#52d394;
    box-shadow:0 0 0 4px rgba(82,211,148,.08);
}

/* TABLE */
.table-card{margin-bottom:20px}
.table-scroll{overflow-x:auto;padding:0 9px 10px}
.dashboard-table{width:100%;border-collapse:collapse;min-width:760px}
.dashboard-table th{
    padding:12px 14px;
    border-top:1px solid #edf0f3;
    color:#929ca8;
    text-align:left;
    font-size:8px;
    font-weight:800;
    letter-spacing:.14em;
}
.dashboard-table td{
    padding:12px 14px;
    border-top:1px solid #f0f2f4;
    color:#556273;
    font-size:10px;
}
.dashboard-table tbody tr:hover{background:#fafbfc}
.person{display:flex;align-items:center;gap:9px}
.person-avatar{
    width:30px;height:30px;
    display:grid;place-items:center;
    border-radius:9px;
    background:#f7f0e3;
    color:#a77c2d;
    font-size:10px;
    font-weight:800;
}
.person strong{font-size:10px;color:#273444}
.muted{color:#8d98a6!important}
.position{
    display:inline-block;
    padding:5px 8px;
    border-radius:7px;
    background:#f4f6f8;
    color:#687587;
    font-size:9px;
}
.status{
    display:inline-flex;
    padding:5px 8px;
    border-radius:6px;
    font-size:8px;
    font-weight:800;
    line-height:1;
}
.status-pending{background:#fff4df;color:#b47a21}
.status-approved,.status-active,.status-published{background:#eaf8f1;color:#249766}
.status-rejected,.status-inactive{background:#fcecee;color:#c65e6c}
.status-draft{background:#f0f2f5;color:#7d8897}
.table-empty{text-align:center;padding:30px;color:#9ba5b1;font-size:10px}

/* BOTTOM */
.bottom-grid{
    display:grid;
    grid-template-columns:1.35fr .85fr;
    gap:20px;
}
.blog-list{padding:0 22px 14px}
.blog-row{
    display:flex;
    align-items:center;
    gap:11px;
    padding:11px 0;
    border-top:1px solid #eef0f3;
}
.blog-icon{
    width:36px;height:36px;
    flex:0 0 36px;
    display:grid;place-items:center;
    border-radius:10px;
    background:#f8f0e1;
    color:#ae8233;
    font-size:12px;
}
.blog-info{min-width:0;flex:1}
.blog-info strong{display:block;color:#354150;font-size:10px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.blog-info span{display:block;color:#a0a8b2;font-size:8px;margin-top:3px}

/* SUMMARY DARK */
.summary-card{
    position:relative;
    padding:23px;
    overflow:hidden;
    border-radius:20px;
    color:#fff;
    background:
        radial-gradient(circle at 100% 0,rgba(215,175,91,.14),transparent 35%),
        linear-gradient(145deg,#12263a,#0b1827);
    box-shadow:0 10px 28px rgba(9,23,37,.15);
}
.summary-card:after{
    content:"";
    position:absolute;
    width:170px;height:170px;
    right:-100px;bottom:-100px;
    border:1px solid rgba(215,175,91,.13);
    border-radius:50%;
}
.summary-top{display:flex;justify-content:space-between;align-items:center}
.summary-top>i{color:#d7af5b;font-size:17px}
.summary-card h2{
    margin:15px 0 7px;
    font-size:20px;
    letter-spacing:-.03em;
}
.summary-card>p{
    margin:0 0 18px;
    color:#8292a6;
    font-size:10px;
    line-height:1.6;
}
.summary-stat{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:9px 0;
    border-top:1px solid rgba(255,255,255,.07);
    font-size:9px;
    color:#a7b3c1;
}
.summary-stat span i{color:#4fd395;margin-right:6px;font-size:8px}
.summary-stat b{font-size:8px;color:#4fd395;letter-spacing:.08em}

/* EMPTY */
.empty-box{
    min-height:100px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:#9ba5b1;
    border-top:1px solid #eef0f3;
}
.empty-box i{font-size:21px;margin-bottom:7px;color:#c0c7cf}
.empty-box strong{font-size:10px;color:#687586}
.empty-box span{font-size:8px;margin-top:3px}
.empty-box.small{min-height:80px;border-top:0}

/* RESPONSIVE */
@media(max-width:1200px){
    .stats-grid{grid-template-columns:repeat(3,1fr)}
}
@media(max-width:900px){
    .dashboard-page{margin:-18px;padding:18px}
    .main-grid,.bottom-grid{grid-template-columns:1fr}
    .dashboard-intro{padding:25px}
}
@media(max-width:650px){
    .dashboard-page{margin:-12px;padding:12px}
    .dashboard-intro{
        padding:21px 18px;
        border-radius:17px;
    }
    .dashboard-intro h1{font-size:24px}
    .dashboard-intro p{font-size:11px;line-height:1.5}
    .intro-date{display:none}
    .stats-grid{grid-template-columns:1fr 1fr;gap:9px}
    .stat-card{min-height:96px;padding:14px;gap:9px;border-radius:14px}
    .stat-icon{width:38px;height:38px;flex-basis:38px;border-radius:10px;font-size:13px}
    .stat-content strong{font-size:20px}
    .stat-content span{font-size:9px}
    .stat-content small{font-size:8px}
    .stat-arrow{right:10px;top:10px}
    .card-head{padding:18px 16px 14px}
    .activity-list,.blog-list{padding-left:16px;padding-right:16px}
    .dark-card{padding-left:16px;padding-right:16px}
    .dark-card .card-head{padding-left:0;padding-right:0}
    .content-card,.summary-card{border-radius:16px}
}
@media(max-width:400px){
    .stat-card{min-height:92px;padding:12px}
    .stat-icon{width:34px;height:34px;flex-basis:34px}
    .stat-content strong{font-size:18px}
}
</style>
@endsection
