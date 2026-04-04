@extends('layouts.public')

@push('head')
<meta name="robots" content="noindex, nofollow">
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  /* Phone wireframe scoped styles — too granular for Tailwind utilities */
  .wf-phone { width: 280px; max-width: 100%; height: 590px; background: #000012; border-radius: 36px; border: 2.5px solid #2a2a4a; overflow: hidden; position: relative; box-shadow: 0 20px 60px rgba(0,0,0,0.6), 0 0 40px rgba(123,190,253,0.04); }
  .wf-notch { width: 100px; height: 24px; background: #000012; border-radius: 0 0 14px 14px; margin: 0 auto; position: relative; z-index: 10; }
  .wf-screen { background: #000012; height: 100%; overflow: hidden; }
  .wf-hdr { padding: 6px 18px 10px; display: flex; align-items: center; justify-content: space-between; }
  .wf-hdr-title { font-size: 22px; font-weight: 700; letter-spacing: -0.3px; color: #f0f0f0; }
  .wf-avatar { width: 28px; height: 28px; border-radius: 50%; background: #18182e; border: 1.5px solid rgba(123,190,253,0.35); display: flex; align-items: center; justify-content: center; font-size: 12px; color: #7BBEFD; font-weight: 600; }
  .wf-pills { display: flex; gap: 6px; padding: 0 18px 10px; overflow: hidden; }
  .wf-pill { font-size: 11px; font-weight: 500; padding: 5px 14px; border-radius: 20px; background: #18182e; color: #b8b8d0; white-space: nowrap; }
  .wf-pill.active { background: #7BBEFD; color: #000012; font-weight: 600; }
  .wf-scroll { padding: 0 18px; overflow: hidden; }
  .wf-section-label { font-size: 14px; font-weight: 700; margin-bottom: 8px; margin-top: 4px; letter-spacing: -0.2px; color: #f0f0f0; }
  .wf-album-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 14px; }
  .wf-album-tile { background: #0e0e20; border-radius: 8px; overflow: hidden; display: flex; align-items: center; gap: 8px; height: 48px; }
  .wf-album-art { width: 48px; height: 48px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; }
  .wf-album-name { font-size: 11px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; padding-right: 8px; color: #f0f0f0; }
  .wf-pl-row { display: flex; align-items: center; gap: 10px; padding: 7px 0; }
  .wf-pl-art { width: 44px; height: 44px; border-radius: 4px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; }
  .wf-pl-info { flex: 1; min-width: 0; }
  .wf-pl-name { font-size: 13px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: #f0f0f0; }
  .wf-pl-meta { font-size: 10px; color: #8888a0; margin-top: 1px; }
  .wf-np-bar { position: absolute; bottom: 56px; left: 6px; right: 6px; background: #18182e; border-radius: 8px; padding: 8px 12px; display: flex; align-items: center; gap: 10px; box-shadow: 0 4px 20px rgba(0,0,0,0.4); }
  .wf-np-thumb { width: 36px; height: 36px; border-radius: 4px; flex-shrink: 0; display: flex; align-items: center; justify-content: center; }
  .wf-np-info { flex: 1; }
  .wf-np-title { font-size: 12px; font-weight: 600; color: #f0f0f0; }
  .wf-np-artist { font-size: 10px; color: #8888a0; }
  .wf-bnav { position: absolute; bottom: 0; left: 0; right: 0; display: flex; background: linear-gradient(180deg, transparent 0%, #000012 30%); padding: 14px 0 22px; }
  .wf-bnav-item { flex: 1; text-align: center; }
  .wf-bnav-icon { display: flex; justify-content: center; opacity: 0.35; }
  .wf-bnav-label { font-size: 9px; font-weight: 500; color: #8888a0; display: block; margin-top: 3px; opacity: 0.4; }
  .wf-bnav-item.active .wf-bnav-icon { opacity: 1; }
  .wf-bnav-item.active .wf-bnav-label { color: #f0f0f0; opacity: 1; }
  .wf-np-screen { padding: 0 24px; text-align: center; }
  .wf-np-art { width: 220px; height: 220px; border-radius: 8px; margin: 4px auto 18px; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 30px rgba(0,0,0,0.5); position: relative; overflow: hidden; }
  .wf-np-art-label { position: absolute; bottom: 0; left: 0; right: 0; padding: 6px; font-size: 9px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; color: #b8b8d0; background: linear-gradient(transparent, rgba(0,0,18,0.8)); }
  .wf-np-song { font-size: 18px; font-weight: 700; letter-spacing: -0.3px; color: #f0f0f0; }
  .wf-np-artist-name { font-size: 13px; color: #b8b8d0; margin-top: 2px; }
  .wf-progress { margin: 14px 0 4px; }
  .wf-bar { height: 3px; background: #202038; border-radius: 2px; }
  .wf-bar-fill { height: 100%; background: #7BBEFD; border-radius: 2px; }
  .wf-times { display: flex; justify-content: space-between; font-size: 10px; color: #8888a0; margin-top: 4px; }
  .wf-controls { display: flex; align-items: center; justify-content: center; gap: 24px; margin: 12px 0; }
  .wf-ctrl { opacity: 0.5; display: flex; align-items: center; }
  .wf-ctrl-main { opacity: 1; background: #7BBEFD; width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
  .wf-unlock-hint { margin-top: 14px; padding: 12px 14px; background: #0e0e20; border-radius: 10px; display: flex; align-items: center; gap: 10px; text-align: left; }
  .wf-hint-icon { width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .wf-hint-text { flex: 1; }
  .wf-hint-title { font-size: 12px; font-weight: 600; color: #f0f0f0; }
  .wf-hint-sub { font-size: 10px; color: #8888a0; margin-top: 1px; }
  .wf-hint-action { font-size: 11px; font-weight: 600; flex-shrink: 0; }
  .wf-bundle-row { margin-top: 8px; padding: 10px 14px; background: rgba(212,168,67,0.06); border: 1px solid rgba(212,168,67,0.12); border-radius: 10px; display: flex; align-items: center; gap: 10px; text-align: left; }
  .wf-badge { display: inline-block; font-size: 9px; font-weight: 700; padding: 2px 7px; border-radius: 10px; text-transform: uppercase; letter-spacing: 0.8px; }
</style>
@endpush

@section('content')

{{-- SVG icon definitions --}}
<svg xmlns="http://www.w3.org/2000/svg" class="hidden">
  <symbol id="i-home" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></symbol>
  <symbol id="i-music" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></symbol>
  <symbol id="i-unlock" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 9.9-1"/></symbol>
  <symbol id="i-user" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></symbol>
  <symbol id="i-play" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></symbol>
  <symbol id="i-pause" viewBox="0 0 24 24" fill="currentColor"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></symbol>
  <symbol id="i-skip-fwd" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 4 15 12 5 20 5 4"/><line x1="19" y1="5" x2="19" y2="19" stroke="currentColor" stroke-width="2"/></symbol>
  <symbol id="i-skip-back" viewBox="0 0 24 24" fill="currentColor"><polygon points="19 20 9 12 19 4 19 20"/><line x1="5" y1="19" x2="5" y2="5" stroke="currentColor" stroke-width="2"/></symbol>
  <symbol id="i-shuffle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 3 21 3 21 8"/><line x1="4" y1="20" x2="21" y2="3"/><polyline points="21 16 21 21 16 21"/><line x1="15" y1="15" x2="21" y2="21"/><line x1="4" y1="4" x2="9" y2="9"/></symbol>
  <symbol id="i-repeat" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></symbol>
  <symbol id="i-pen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></symbol>
  <symbol id="i-video" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></symbol>
  <symbol id="i-mic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></symbol>
  <symbol id="i-heart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></symbol>
  <symbol id="i-list" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></symbol>
  <symbol id="i-disc" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></symbol>
  <symbol id="i-chevdown" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></symbol>
  <symbol id="i-more" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></symbol>
  <symbol id="i-calendar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></symbol>
  <symbol id="i-map-pin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></symbol>
  <symbol id="i-live" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></symbol>
  <symbol id="i-ticket" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M13 5v2"/><path d="M13 17v2"/><path d="M13 11v2"/></symbol>
  <symbol id="i-star" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></symbol>
</svg>

{{-- HERO --}}
<header class="min-h-[50vh] flex flex-col justify-center px-5 sm:px-10 pt-28 pb-20 max-w-[1200px] mx-auto border-b border-[#7BBEFD]/10" style="font-family: 'Inter', sans-serif;">
  <div class="text-xs font-semibold tracking-[2px] uppercase text-[#7BBEFD] mb-5">Product Design Overview</div>
  <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight leading-[1.1] text-[#f0f0f0]" style="font-family: 'Inter', sans-serif;">Adelitas Way <span class="text-[#7BBEFD]">App</span></h1>
  <p class="text-lg text-[#b8b8d0] mt-4 max-w-[600px] leading-relaxed">Your own app. Free for fans to download, built around your direct connection with them. The free stuff &mdash; music, posts, going live &mdash; keeps people coming back. When they want something personal from you, that's where the money is.</p>
  <div class="flex flex-wrap gap-5 sm:gap-8 mt-10">
    <div class="text-[13px] text-[#8888a0]">Platform <span class="text-[#b8b8d0] font-medium">iOS + Android (Flutter)</span></div>
    <div class="text-[13px] text-[#8888a0]">Price <span class="text-[#b8b8d0] font-medium">Free to download</span></div>
    <div class="text-[13px] text-[#8888a0]">Revenue model <span class="text-[#b8b8d0] font-medium">Unlocks + Bundle upsells</span></div>
    <div class="text-[13px] text-[#8888a0]">Updated <span class="text-[#b8b8d0] font-medium">April 2026</span></div>
  </div>
</header>

{{-- Wrapper for all sections using Inter --}}
<div style="font-family: 'Inter', sans-serif;">

{{-- PHOTO GALLERY --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 max-w-[1200px] mx-auto border-b border-[#7BBEFD]/10">
  <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">The Visual</h3>
  <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Images Pending</h2>
  <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">The app is going to be full of real imagery &mdash; live shots, band photos, album art, behind-the-scenes stuff. More photos and artwork will be added as the build progresses.</p>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 mt-8">
    <div class="sm:col-span-2"><img src="/images/adelitas_way_boseman_mt.webp" alt="Adelitas Way live in Bozeman, MT" class="w-full h-[180px] sm:h-[200px] lg:h-[260px] object-cover rounded-xl"></div>
    <div><img src="/images/adelitas_way_trio.webp" alt="Adelitas Way trio" class="w-full h-[180px] sm:h-[200px] lg:h-[260px] object-cover rounded-xl"></div>
    <div><img src="/images/adelitas_way_lubbock_tx.webp" alt="Adelitas Way in Lubbock, TX" class="w-full h-[180px] sm:h-[200px] lg:h-[260px] object-cover rounded-xl"></div>
    <div><img src="/images/adelitas_way_rapid_city.webp" alt="Adelitas Way in Rapid City" class="w-full h-[180px] sm:h-[200px] lg:h-[260px] object-cover rounded-xl"></div>
    <div class="sm:col-span-2 lg:col-span-1"><img src="/images/adelitas_way_machine_shop.jpg" alt="Adelitas Way at The Machine Shop" class="w-full h-[180px] sm:h-[200px] lg:h-[260px] object-cover object-top rounded-xl"></div>
  </div>
  <div class="mt-5 p-4 sm:p-5 bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl text-sm text-[#b8b8d0] leading-relaxed">More band photography, album artwork, and behind-the-scenes shots will be worked into the app throughout development. The mockups on this page use wireframes for now &mdash; the final product will be loaded with real visuals.</div>
</section>

{{-- FAN JOURNEY --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 max-w-[1200px] mx-auto border-b border-[#7BBEFD]/10">
  <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">How It Works</h3>
  <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">The Fan Journey</h2>
  <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">Every step leads to the next one naturally. Fans show up for the free stuff, they get hooked, and when they're ready to buy something personal &mdash; lyrics, a video, a call &mdash; it's right there waiting.</p>
  <div class="flex flex-col lg:flex-row items-center justify-center gap-0 mt-8">
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-5 sm:p-6 text-center w-full lg:w-[200px]">
      <div class="text-[11px] font-bold text-[#7BBEFD] tracking-[1.5px] uppercase mb-2">Step 1</div>
      <div class="text-[15px] font-bold text-[#f0f0f0] mb-1">Download</div>
      <div class="text-xs text-[#b8b8d0] leading-relaxed">Free on App Store / Play Store. No barrier, just download it.</div>
    </div>
    <div class="text-xl text-[#8888a0] px-2 py-1 lg:rotate-0 rotate-90">&rarr;</div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-5 sm:p-6 text-center w-full lg:w-[200px]">
      <div class="text-[11px] font-bold text-[#7BBEFD] tracking-[1.5px] uppercase mb-2">Step 2</div>
      <div class="text-[15px] font-bold text-[#f0f0f0] mb-1">Explore Free</div>
      <div class="text-xs text-[#b8b8d0] leading-relaxed">Stream the music, check out your feed, catch early drops. They start living in the app.</div>
    </div>
    <div class="text-xl text-[#8888a0] px-2 py-1 lg:rotate-0 rotate-90">&rarr;</div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-5 sm:p-6 text-center w-full lg:w-[200px]">
      <div class="text-[11px] font-bold text-[#7BBEFD] tracking-[1.5px] uppercase mb-2">Step 3</div>
      <div class="text-[15px] font-bold text-[#f0f0f0] mb-1">First Unlock</div>
      <div class="text-xs text-[#b8b8d0] leading-relaxed">While they're listening, they see "handwritten lyrics available." It's a nudge, not a hard sell.</div>
    </div>
    <div class="text-xl text-[#8888a0] px-2 py-1 lg:rotate-0 rotate-90">&rarr;</div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-5 sm:p-6 text-center w-full lg:w-[200px]">
      <div class="text-[11px] font-bold text-[#7BBEFD] tracking-[1.5px] uppercase mb-2">Step 4</div>
      <div class="text-[15px] font-bold text-[#f0f0f0] mb-1">Bundle Upsell</div>
      <div class="text-xs text-[#b8b8d0] leading-relaxed">Right there on the same screen: "Add a personal video from Rick and save." They spend more because the option's right in front of them.</div>
    </div>
  </div>
</section>

{{-- FREE TIER --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 max-w-[1200px] mx-auto border-b border-[#7BBEFD]/10">
  <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">Free Tier</h3>
  <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Give Away the Music, Keep the Audience</h2>
  <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">The music streams free in the app. That's the whole play. Fans open the app to listen, they see your posts, they catch you going live &mdash; and while they're already there, the premium stuff is one tap away. No per-play royalties to deal with, no distributor splits. The music keeps them coming back; the personal stuff makes the money.</p>
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-8">
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <span class="inline-block text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#1db954]/15 text-[#1db954] uppercase tracking-wider mb-3">Free</span>
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Your Independent Catalog</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">All of Getaway, Notorious, Shine On, and Power &mdash; streaming with playlists and offline listening. Fans play it here instead of Spotify, and every time they open the app they're one tap from buying something.</p>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <span class="inline-block text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#1db954]/15 text-[#1db954] uppercase tracking-wider mb-3">Free</span>
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Your Feed + Going Live</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">Post updates, behind-the-scenes clips, voice notes, go live whenever you want. Fans see it in real time. This is what keeps people opening the app between releases.</p>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <span class="inline-block text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#1db954]/15 text-[#1db954] uppercase tracking-wider mb-3">Free</span>
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Early Access Drops</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">New music drops here before it hits streaming platforms. Your inner circle gets it first. That alone is reason enough for people to download &mdash; and every drop is a chance to put a lyric sheet or Song Story in front of them.</p>
    </div>
  </div>
</section>

{{-- UNLOCKS --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 max-w-[1200px] mx-auto border-b border-[#7BBEFD]/10">
  <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">Unlocks</h3>
  <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Where the Money Is</h2>
  <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">While fans are using the free stuff, they see things they can buy &mdash; but it never feels like a paywall. These are things only you can make. Nobody else can write those lyrics or record that video.</p>

  {{-- $5 unreleased callout --}}
  <div class="mt-8 p-7 sm:p-8 bg-linear-to-br from-[#7BBEFD]/[0.06] to-[#7BBEFD]/[0.02] border-[1.5px] border-[#7BBEFD]/20 rounded-2xl">
    <div class="text-[32px] font-extrabold text-[#7BBEFD] mb-1">$5 per song</div>
    <h4 class="text-xl font-bold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Unreleased &amp; Early-Access Songs &mdash; The Easy Win</h4>
    <p class="text-[15px] text-[#b8b8d0] leading-relaxed max-w-[700px]">You've got demos, alternate versions, tracks that didn't make an album, stuff from the vault. Drop them in the app, charge $5 to unlock each one. Same thing with new songs &mdash; before they hit Spotify, fans can pay $5 to hear them early in the app. Fans who are already listening see a locked track and think "it's five bucks, why not." Low price, easy decision, and it gives people a reason to keep checking back for new drops. You can release one a week, one a month, whatever &mdash; every drop is a small payday and a reason to open the app.</p>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-8">
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Handwritten Lyric Sheets</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">Already proven &mdash; now expanded to every song in the independent catalog. Personalized dedications available. A subtle prompt shows up on the now-playing screen while they're listening.</p>
      <div class="text-2xl font-bold text-[#7BBEFD] mt-3">$99 &ndash; $149</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Personal Video Dedications</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">Birthday shoutouts, pep talks, personal messages. The fan writes what they want, you record it whenever you've got a minute. No Cameo taking a cut &mdash; this is all yours.</p>
      <div class="text-2xl font-bold text-[#7BBEFD] mt-3">$99 &ndash; $149</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Acoustic Voice Memos</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">You sing a few lines of their favorite song, say their name. Raw, off-the-cuff, recorded on your phone. The fact that it's not polished is what makes it real.</p>
      <div class="text-2xl font-bold text-[#7BBEFD] mt-3">$99 &ndash; $199</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Premium Video Calls</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">10 minutes, one-on-one with you. Limited slots, so people don't sit on the fence. The most personal thing you can offer.</p>
      <div class="text-2xl font-bold text-[#7BBEFD] mt-3">$500+</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Live Video Streams</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">Go live right in the app &mdash; Q&amp;As, acoustic sessions, backstage on tour, whatever. Free to watch, but while you're talking fans see the unlock options. You mention a song, the lyric sheet pops up.</p>
      <div class="text-2xl font-bold text-[#1db954] mt-3">Free (sells everything else)</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">VIP Tour Packages</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">Meet &amp; greet, early entry, signed merch &mdash; tied to specific dates on tour. Sold right in the Shows tab next to the ticket link. Limited per show so it stays special.</p>
      <div class="text-2xl font-bold text-[#7BBEFD] mt-3">$75 &ndash; $99</div>
    </div>
  </div>
</section>

{{-- BUNDLES --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 max-w-[1200px] mx-auto border-b border-[#7BBEFD]/10">
  <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">Bundles</h3>
  <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Bundles &mdash; Get Them to Spend More</h2>
  <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">When someone taps to buy a lyric sheet, they see the bundle option right next to it. "Add a personal video and save." No popups, no pressure &mdash; just a better deal sitting right there if they want it.</p>
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-8">
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <span class="inline-block text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#d4a843]/15 text-[#d4a843] uppercase tracking-wider mb-3">Most Common</span>
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Song Story Bundle</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">Handwritten lyric sheet + your personal video explaining what inspired the song, dedicated to the buyer. Most people buying a lyric sheet will see this and think "yeah, I want that too."</p>
      <div class="text-2xl font-bold text-[#7BBEFD] mt-3">$249 &ndash; $299</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <span class="inline-block text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#d4a843]/15 text-[#d4a843] uppercase tracking-wider mb-3">Gift Bundle</span>
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Fan Package</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">Lyric sheet + video shoutout + acoustic voice memo. The "give me everything" option. Perfect for birthdays, holidays, anniversaries &mdash; people buy these as gifts.</p>
      <div class="text-2xl font-bold text-[#7BBEFD] mt-3">$399</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7">
      <span class="inline-block text-[10px] font-semibold px-2.5 py-0.5 rounded-full bg-[#d4a843]/15 text-[#d4a843] uppercase tracking-wider mb-3">Limited</span>
      <h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">The Inner Circle</h4>
      <p class="text-sm text-[#b8b8d0] leading-relaxed">Everything in the Fan Package + a 5-minute video call with you. Only a few available. The kind of thing someone tells everyone they know about.</p>
      <div class="text-2xl font-bold text-[#7BBEFD] mt-3">$499</div>
    </div>
  </div>
</section>

{{-- APP MOCKUPS --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 border-b border-[#7BBEFD]/10" style="background: linear-gradient(180deg, rgba(123,190,253,0.02) 0%, transparent 100%); font-family: 'Inter', sans-serif;">
  <div class="max-w-[1200px] mx-auto">
    <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">App Screens</h3>
    <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">What It Actually Looks Like</h2>
    <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">These are wireframes &mdash; the layout and flow, not the final look. The real app will have album artwork, band photos, your branding, and all the visual stuff that makes it feel like an Adelitas Way experience. More detailed mockups with real imagery are coming.</p>

    <div class="flex flex-wrap justify-center items-start gap-8 mt-10">

      {{-- PHONE 1: LIBRARY --}}
      <div class="text-center">
        <div class="wf-phone">
          <div class="wf-screen">
            <div class="wf-notch"></div>
            <div class="wf-hdr">
              <div class="wf-hdr-title">Library</div>
              <div class="wf-avatar">G</div>
            </div>
            <div class="wf-pills">
              <div class="wf-pill active">All</div>
              <div class="wf-pill">Albums</div>
              <div class="wf-pill">Playlists</div>
            </div>
            <div class="wf-scroll">
              <div class="wf-album-grid">
                <div class="wf-album-tile"><div class="wf-album-art" style="background:linear-gradient(135deg,#3a1a1a,#1a0a0a)"><svg width="18" height="18" style="color:#7BBEFD;opacity:.6"><use href="#i-disc"/></svg></div><div class="wf-album-name">Power</div></div>
                <div class="wf-album-tile"><div class="wf-album-art" style="background:linear-gradient(135deg,#1a2a3a,#0a1020)"><svg width="18" height="18" style="color:#7BBEFD;opacity:.6"><use href="#i-disc"/></svg></div><div class="wf-album-name">Shine On</div></div>
                <div class="wf-album-tile"><div class="wf-album-art" style="background:linear-gradient(135deg,#2a2a1a,#10100a)"><svg width="18" height="18" style="color:#7BBEFD;opacity:.6"><use href="#i-disc"/></svg></div><div class="wf-album-name">Notorious</div></div>
                <div class="wf-album-tile"><div class="wf-album-art" style="background:linear-gradient(135deg,#1a3a2a,#0a1a10)"><svg width="18" height="18" style="color:#7BBEFD;opacity:.6"><use href="#i-disc"/></svg></div><div class="wf-album-name">Getaway</div></div>
              </div>
              <div class="wf-section-label">Playlists</div>
              <div class="wf-pl-row"><div class="wf-pl-art" style="background:linear-gradient(135deg,#202038,#0e0e20)"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-list"/></svg></div><div class="wf-pl-info"><div class="wf-pl-name">AW Essentials</div><div class="wf-pl-meta">24 songs &bull; Curated by Rick</div></div></div>
              <div class="wf-pl-row"><div class="wf-pl-art" style="background:linear-gradient(135deg,#2a1a2a,#1a0a1a)"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-heart"/></svg></div><div class="wf-pl-info"><div class="wf-pl-name">Liked Songs</div><div class="wf-pl-meta">12 songs</div></div></div>
              <div class="wf-pl-row"><div class="wf-pl-art" style="background:linear-gradient(135deg,#1a2a1a,#0a1a0a)"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-list"/></svg></div><div class="wf-pl-info"><div class="wf-pl-name">Deep Cuts</div><div class="wf-pl-meta">16 songs &bull; Curated by Rick</div></div></div>
              <div class="wf-pl-row"><div class="wf-pl-art" style="background:linear-gradient(135deg,#2a2a0a,#1a1a00)"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-mic"/></svg></div><div class="wf-pl-info"><div class="wf-pl-name">Acoustic Sessions</div><div class="wf-pl-meta">6 songs &bull; App exclusive</div></div></div>
              <div class="wf-pl-row"><div class="wf-pl-art" style="background:linear-gradient(135deg,#0a1a2a,#000a1a)"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-star"/></svg></div><div class="wf-pl-info"><div class="wf-pl-name">Unreleased Demos</div><div class="wf-pl-meta">3 songs &bull; App exclusive</div></div></div>
            </div>
            <div class="wf-np-bar"><div class="wf-np-thumb" style="background:linear-gradient(135deg,#3a1a1a,#1a0a0a)"><svg width="14" height="14" style="color:#7BBEFD"><use href="#i-play"/></svg></div><div class="wf-np-info"><div class="wf-np-title">Dog on a Leash</div><div class="wf-np-artist">Adelitas Way &bull; Power</div></div><svg width="16" height="16" style="color:#8888a0"><use href="#i-pause"/></svg></div>
            <div class="wf-bnav">
              <div class="wf-bnav-item active"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-home"/></svg></span><span class="wf-bnav-label">Home</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-music"/></svg></span><span class="wf-bnav-label">Music</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-ticket"/></svg></span><span class="wf-bnav-label">Shows</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-unlock"/></svg></span><span class="wf-bnav-label">Unlocks</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-user"/></svg></span><span class="wf-bnav-label">Profile</span></div>
            </div>
          </div>
        </div>
        <div class="mt-3.5 text-[13px] font-semibold text-[#8888a0] tracking-wide">Library &amp; Playlists</div>
      </div>

      {{-- PHONE 2: NOW PLAYING --}}
      <div class="text-center">
        <div class="wf-phone">
          <div class="wf-screen">
            <div class="wf-notch"></div>
            <div style="padding:6px 18px 0;display:flex;justify-content:space-between;align-items:center">
              <svg width="16" height="16" style="color:#8888a0"><use href="#i-chevdown"/></svg>
              <div style="font-size:10px;font-weight:600;color:#8888a0;text-transform:uppercase;letter-spacing:1.5px">Playing from Power</div>
              <svg width="16" height="16" style="color:#8888a0"><use href="#i-more"/></svg>
            </div>
            <div class="wf-np-screen">
              <div class="wf-np-art" style="background:linear-gradient(145deg,#4a1a1a 0%,#1a0808 40%,#0a0a2a 100%)">
                <svg width="48" height="48" style="color:rgba(123,190,253,0.15)"><use href="#i-disc"/></svg>
                <div class="wf-np-art-label">Power &bull; 2023</div>
              </div>
              <div style="display:flex;justify-content:space-between;align-items:center">
                <div style="text-align:left"><div class="wf-np-song">Dog on a Leash</div><div class="wf-np-artist-name">Adelitas Way</div></div>
                <svg width="18" height="18" style="color:#8888a0"><use href="#i-heart"/></svg>
              </div>
              <div class="wf-progress"><div class="wf-bar"><div class="wf-bar-fill" style="width:62%"></div></div><div class="wf-times"><span>2:14</span><span>3:42</span></div></div>
              <div class="wf-controls">
                <span class="wf-ctrl"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-shuffle"/></svg></span>
                <span class="wf-ctrl"><svg width="22" height="22" style="color:#f0f0f0"><use href="#i-skip-back"/></svg></span>
                <span class="wf-ctrl-main"><svg width="20" height="20" style="color:#000012"><use href="#i-pause"/></svg></span>
                <span class="wf-ctrl"><svg width="22" height="22" style="color:#f0f0f0"><use href="#i-skip-fwd"/></svg></span>
                <span class="wf-ctrl"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-repeat"/></svg></span>
              </div>
              <div class="wf-unlock-hint">
                <div class="wf-hint-icon" style="background:rgba(123,190,253,0.12)"><svg width="16" height="16" style="color:#7BBEFD"><use href="#i-pen"/></svg></div>
                <div class="wf-hint-text"><div class="wf-hint-title">Handwritten lyrics available</div><div class="wf-hint-sub">Written and signed by Rick</div></div>
                <div class="wf-hint-action" style="color:#7BBEFD">$99</div>
              </div>
              <div class="wf-bundle-row">
                <div class="wf-hint-icon" style="background:rgba(212,168,67,0.15)"><svg width="16" height="16" style="color:#d4a843"><use href="#i-video"/></svg></div>
                <div class="wf-hint-text"><div class="wf-hint-title" style="color:#d4a843">Song Story Bundle</div><div class="wf-hint-sub">Lyrics + Rick's video about this song</div></div>
                <div class="wf-hint-action" style="color:#d4a843">$249</div>
              </div>
            </div>
            <div class="wf-bnav">
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-home"/></svg></span><span class="wf-bnav-label">Home</span></div>
              <div class="wf-bnav-item active"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-music"/></svg></span><span class="wf-bnav-label">Music</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-ticket"/></svg></span><span class="wf-bnav-label">Shows</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-unlock"/></svg></span><span class="wf-bnav-label">Unlocks</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-user"/></svg></span><span class="wf-bnav-label">Profile</span></div>
            </div>
          </div>
        </div>
        <div class="mt-3.5 text-[13px] font-semibold text-[#8888a0] tracking-wide">Now Playing + Unlock Hints</div>
      </div>

      {{-- PHONE 3: SHOWS --}}
      <div class="text-center">
        <div class="wf-phone">
          <div class="wf-screen">
            <div class="wf-notch"></div>
            <div class="wf-hdr"><div class="wf-hdr-title">Shows</div><div class="wf-avatar">G</div></div>
            <div class="wf-pills"><div class="wf-pill active">Upcoming</div><div class="wf-pill">Past</div><div class="wf-pill">VIP</div></div>
            <div class="wf-scroll">
              @foreach([['18','Oct','Varsity Theater','Minneapolis, MN','$99'],['19','Oct','Q&Z Expo Center','Ringle, WI','$75'],['14','Mar','The Ranch Concert Hall','Fort Myers, FL','$99']] as $show)
              <div style="background:#0e0e20;border-radius:10px;padding:14px;margin-bottom:10px">
                <div style="display:flex;gap:12px;align-items:flex-start">
                  <div style="text-align:center;min-width:40px"><div style="font-size:22px;font-weight:800;color:#7BBEFD;line-height:1">{{ $show[0] }}</div><div style="font-size:10px;font-weight:600;color:#8888a0;text-transform:uppercase">{{ $show[1] }}</div></div>
                  <div style="flex:1"><div style="font-size:14px;font-weight:700;color:#f0f0f0">{{ $show[2] }}</div><div style="font-size:11px;color:#8888a0;margin-top:2px;display:flex;align-items:center;gap:4px"><svg width="10" height="10" style="color:#8888a0"><use href="#i-map-pin"/></svg>{{ $show[3] }}</div><div style="display:flex;gap:6px;margin-top:8px"><div style="font-size:10px;font-weight:600;padding:4px 10px;border-radius:16px;background:#7BBEFD;color:#000012">Tickets</div><div style="font-size:10px;font-weight:600;padding:4px 10px;border-radius:16px;background:rgba(212,168,67,0.15);color:#d4a843">VIP {{ $show[4] }}</div></div></div>
                </div>
              </div>
              @endforeach
              <div style="margin-top:6px;background:linear-gradient(135deg,rgba(212,168,67,0.08),rgba(123,190,253,0.04));border:1px solid rgba(212,168,67,0.15);border-radius:10px;padding:14px">
                <div class="wf-badge" style="background:rgba(212,168,67,0.15);color:#d4a843;margin-bottom:8px">VIP Experience</div>
                <div style="font-size:14px;font-weight:700;color:#f0f0f0">Meet &amp; Greet Package</div>
                <div style="font-size:11px;color:#b8b8d0;margin-top:4px;line-height:1.6">Early venue entry, personal meet &amp; greet with Rick, signed setlist, exclusive merch item, photo opportunity</div>
                <div style="font-size:18px;font-weight:800;color:#d4a843;margin-top:8px">$75 &ndash; $99</div>
                <div style="font-size:10px;color:#8888a0;margin-top:4px">Limited per show &bull; Select your date above</div>
              </div>
            </div>
            <div class="wf-bnav">
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-home"/></svg></span><span class="wf-bnav-label">Home</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-music"/></svg></span><span class="wf-bnav-label">Music</span></div>
              <div class="wf-bnav-item active"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-ticket"/></svg></span><span class="wf-bnav-label">Shows</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-unlock"/></svg></span><span class="wf-bnav-label">Unlocks</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-user"/></svg></span><span class="wf-bnav-label">Profile</span></div>
            </div>
          </div>
        </div>
        <div class="mt-3.5 text-[13px] font-semibold text-[#8888a0] tracking-wide">Tour Dates + VIP</div>
      </div>

      {{-- PHONE 4: LIVE VIDEO --}}
      <div class="text-center">
        <div class="wf-phone">
          <div class="wf-screen">
            <div class="wf-notch"></div>
            <div style="background:linear-gradient(180deg,#1a0a0a 0%,#0a0a2a 50%,#000012 100%);height:280px;display:flex;flex-direction:column;justify-content:space-between;padding:10px 18px 14px;position:relative">
              <div style="display:flex;justify-content:space-between;align-items:flex-start">
                <div style="display:flex;align-items:center;gap:6px"><div style="width:8px;height:8px;border-radius:50%;background:#e53e3e"></div><span style="font-size:11px;font-weight:700;color:#e53e3e;text-transform:uppercase;letter-spacing:1px">Live</span></div>
                <div style="display:flex;align-items:center;gap:4px"><svg width="12" height="12" style="color:#b8b8d0"><use href="#i-live"/></svg><span style="font-size:11px;color:#b8b8d0">847 watching</span></div>
              </div>
              <div style="flex:1;display:flex;align-items:center;justify-content:center"><svg width="56" height="56" style="color:rgba(123,190,253,0.08)"><use href="#i-live"/></svg></div>
              <div><div style="font-size:15px;font-weight:700;color:#f0f0f0">Acoustic Friday</div><div style="font-size:11px;color:#b8b8d0">Rick DeJesus &bull; Started 12 min ago</div></div>
            </div>
            <div class="wf-scroll" style="padding-top:12px">
              <div style="margin-bottom:10px">
                <div style="display:flex;gap:8px;margin-bottom:8px"><div style="width:24px;height:24px;border-radius:50%;background:#202038;flex-shrink:0"></div><div><span style="font-size:11px;font-weight:600;color:#7BBEFD">Sarah M.</span><span style="font-size:11px;color:#b8b8d0"> Play Alive!!!</span></div></div>
                <div style="display:flex;gap:8px;margin-bottom:8px"><div style="width:24px;height:24px;border-radius:50%;background:#202038;flex-shrink:0"></div><div><span style="font-size:11px;font-weight:600;color:#d4a843">Mike T.</span><span style="font-size:11px;color:#b8b8d0"> That was incredible</span></div></div>
                <div style="display:flex;gap:8px;margin-bottom:8px"><div style="width:24px;height:24px;border-radius:50%;background:#202038;flex-shrink:0"></div><div><span style="font-size:11px;font-weight:600;color:#b8b8d0">Jess R.</span><span style="font-size:11px;color:#b8b8d0"> Just ordered the Song Story</span></div></div>
              </div>
              <div style="background:#0e0e20;border-radius:8px;padding:10px 12px;display:flex;align-items:center;gap:10px"><svg width="14" height="14" style="color:#7BBEFD;flex-shrink:0"><use href="#i-pen"/></svg><div style="flex:1;font-size:11px;color:#b8b8d0">Rick mentioned "Alive" &mdash; <span style="color:#7BBEFD;font-weight:600">handwritten lyrics available</span></div></div>
              <div style="margin-top:10px;display:flex;gap:8px;align-items:center"><div style="flex:1;background:#18182e;border-radius:20px;padding:8px 14px;font-size:12px;color:#8888a0">Say something...</div><svg width="16" height="16" style="color:#7BBEFD"><use href="#i-heart"/></svg></div>
            </div>
            <div class="wf-bnav">
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-home"/></svg></span><span class="wf-bnav-label">Home</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-music"/></svg></span><span class="wf-bnav-label">Music</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-ticket"/></svg></span><span class="wf-bnav-label">Shows</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-unlock"/></svg></span><span class="wf-bnav-label">Unlocks</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-user"/></svg></span><span class="wf-bnav-label">Profile</span></div>
            </div>
          </div>
        </div>
        <div class="mt-3.5 text-[13px] font-semibold text-[#8888a0] tracking-wide">Live Video</div>
      </div>

    </div>
  </div>
</section>

{{-- REVENUE MODEL --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 max-w-[1200px] mx-auto border-b border-[#7BBEFD]/10">
  <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">Revenue Model</h3>
  <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">What This Could Look Like</h2>
  <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">These are low-ball numbers based on the audience you already have. No growth needed. Just a small percentage of your existing fans buying personal stuff each month.</p>

  {{-- Responsive table: card layout on mobile, table on md+ --}}
  <div class="mt-6">
    {{-- Mobile card view --}}
    <div class="md:hidden space-y-3">
      @foreach([
        ['Unreleased & Early-Access Songs','$5','80 unlocks','$400'],
        ['Lyric Sheets (standalone)','$99-149','14 orders','$1,680'],
        ['Song Story Bundles','$249-299','6 orders','$1,644'],
        ['Personal Video Dedications','$99-149','12 orders','$1,440'],
        ['Fan Package Bundles','$399','5 orders','$1,995'],
        ['Acoustic Voice Memos','$99-199','8 orders','$1,192'],
        ['Inner Circle / Video Calls','$499','2 orders','$998'],
        ['VIP Tour Packages','$75-99','10/show','$870'],
      ] as $row)
      <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-4">
        <div class="flex justify-between items-start mb-2">
          <div class="text-sm font-semibold text-[#f0f0f0]">{{ $row[0] }}</div>
          <div class="text-base font-bold text-[#7BBEFD] shrink-0 ml-3">{{ $row[3] }}</div>
        </div>
        <div class="flex gap-4 text-xs text-[#8888a0]">
          <span>Price: <span class="text-[#b8b8d0]">{{ $row[1] }}</span></span>
          <span>Volume: <span class="text-[#b8b8d0]">{{ $row[2] }}</span></span>
        </div>
      </div>
      @endforeach
      <div class="bg-[#0e0e20] border-2 border-[#7BBEFD]/30 rounded-xl p-4 flex justify-between items-center">
        <div class="text-base font-bold text-[#f0f0f0]">Total</div>
        <div class="text-xl font-bold text-[#7BBEFD]">$10,219/mo</div>
      </div>
    </div>

    {{-- Desktop table view --}}
    <div class="hidden md:block overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="border-b border-[#7BBEFD]/10">
            <th class="text-left py-3.5 px-4 text-[11px] uppercase tracking-[1.5px] text-[#8888a0] font-semibold">Product</th>
            <th class="text-left py-3.5 px-4 text-[11px] uppercase tracking-[1.5px] text-[#8888a0] font-semibold">Price</th>
            <th class="text-left py-3.5 px-4 text-[11px] uppercase tracking-[1.5px] text-[#8888a0] font-semibold">Monthly Volume</th>
            <th class="text-right py-3.5 px-4 text-[11px] uppercase tracking-[1.5px] text-[#8888a0] font-semibold">Monthly Rev</th>
          </tr>
        </thead>
        <tbody class="text-sm">
          @foreach([
            ['Unreleased & Early-Access Songs','$5','80 unlocks','$400'],
            ['Lyric Sheets (standalone)','$99-149','14 orders','$1,680'],
            ['Song Story Bundles','$249-299','6 orders','$1,644'],
            ['Personal Video Dedications','$99-149','12 orders','$1,440'],
            ['Fan Package Bundles','$399','5 orders','$1,995'],
            ['Acoustic Voice Memos','$99-199','8 orders','$1,192'],
            ['Inner Circle / Video Calls','$499','2 orders','$998'],
            ['VIP Tour Packages','$75-99','10/show','$870'],
          ] as $row)
          <tr class="border-b border-[#7BBEFD]/10">
            <td class="py-3.5 px-4 text-[#b8b8d0]">{{ $row[0] }}</td>
            <td class="py-3.5 px-4 text-[#b8b8d0]">{{ $row[1] }}</td>
            <td class="py-3.5 px-4 text-[#b8b8d0]">{{ $row[2] }}</td>
            <td class="py-3.5 px-4 text-right font-bold text-[#7BBEFD]">{{ $row[3] }}</td>
          </tr>
          @endforeach
          <tr class="border-t-2 border-[#7BBEFD]">
            <td class="py-3.5 px-4 font-bold text-[#f0f0f0]">Total</td>
            <td class="py-3.5 px-4"></td>
            <td class="py-3.5 px-4"></td>
            <td class="py-3.5 px-4 text-right text-lg font-bold text-[#7BBEFD]">$10,219/mo</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-6 text-center">
      <div class="text-3xl sm:text-4xl font-extrabold text-[#7BBEFD] tracking-tight">$122K</div>
      <div class="text-xs text-[#8888a0] mt-1 uppercase tracking-wider">Annual Potential</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-6 text-center">
      <div class="text-3xl sm:text-4xl font-extrabold text-[#7BBEFD] tracking-tight">~2hrs</div>
      <div class="text-xs text-[#8888a0] mt-1 uppercase tracking-wider">Rick's Weekly Time</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-6 text-center">
      <div class="text-3xl sm:text-4xl font-extrabold text-[#7BBEFD] tracking-tight">$212</div>
      <div class="text-xs text-[#8888a0] mt-1 uppercase tracking-wider">Avg Order Value</div>
    </div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-6 text-center">
      <div class="text-3xl sm:text-4xl font-extrabold text-[#7BBEFD] tracking-tight">$0</div>
      <div class="text-xs text-[#8888a0] mt-1 uppercase tracking-wider">Inventory Cost</div>
    </div>
  </div>
</section>

{{-- NO LABEL NEEDED --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 max-w-[1200px] mx-auto border-b border-[#7BBEFD]/10">
  <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">Content Strategy</h3>
  <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">No Label Needed</h2>
  <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">The first three albums are locked up with Virgin. That's fine &mdash; this doesn't need them.</p>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-8">
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">They're not buying catalog access</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">They can stream the old stuff on Spotify for free. What they're buying is you &mdash; handwritten lyrics, personal videos, voice memos. No label's permission needed for any of it.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">4 albums you own outright</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Getaway, Notorious, Shine On, and Power are all yours. Four albums of streamable content, Song Stories, lyric sheets, and behind-the-scenes material. That's plenty to launch with.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">The story writes itself</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">"The real Adelitas Way. No label, no middleman, straight from Rick." Being independent isn't a limitation &mdash; it's the whole point.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">New music drops here first</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Every future release hits the app before it goes to streaming. That's the reason people download it, and the reason they keep coming back.</p></div>
  </div>
</section>

{{-- KEEP THE MONEY SIMPLE --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 max-w-[1200px] mx-auto border-b border-[#7BBEFD]/10">
  <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">Why Free Streaming</h3>
  <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Keep the Money Simple</h2>
  <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">Making the music free inside the app isn't just about getting fans in &mdash; it means you don't have to deal with any streaming payout headaches.</p>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-8">
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">No royalty math</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Normal streaming means tracking every play and splitting pennies between writers, performers, publishers, and labels. Free in-app streaming skips all of that. Zero complexity.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">One place the money goes</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Digital stuff &mdash; song unlocks, video bundles &mdash; goes through Apple and Google's in-app purchase systems. Physical goods like shipped lyric sheets and VIP packages run through Stripe. Two payment channels, but the money all lands in your accounts. No chasing invoices.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">The music sells the other stuff</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">People open the app to listen. While they're listening, they see the personal stuff they can buy. Every play is a chance for someone to grab a lyric sheet or a Song Story. The music pays for itself.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">No middlemen</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">No DistroKid, no TuneCore, no label taking a cut of streaming revenue. The music lives in the app, and the real products make the money. Apple and Google take their 15% cut on in-app purchases &mdash; that's the cost of being in both stores &mdash; but the rest stays with you. No other middlemen.</p></div>
  </div>
</section>

{{-- RICK'S DASHBOARD --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 border-b border-[#7BBEFD]/10" style="background: linear-gradient(180deg, rgba(123,190,253,0.02) 0%, transparent 100%); font-family: 'Inter', sans-serif;">
  <div class="max-w-[1200px] mx-auto">
    <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">Your Dashboard</h3>
    <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Run It All From Your Phone</h2>
    <p class="text-[17px] text-[#b8b8d0] mt-2 max-w-[700px] leading-relaxed">You're on tour, you're in the van, you're backstage. You're not sitting at a laptop. Everything &mdash; filling orders, uploading a song, going live, adding show dates &mdash; works from your phone, one-handed. That's non-negotiable.</p>

    <div class="flex flex-wrap justify-center items-start gap-8 mt-10">

      {{-- ADMIN PHONE 1: ORDERS --}}
      <div class="text-center">
        <div class="wf-phone">
          <div class="wf-screen">
            <div class="wf-notch"></div>
            <div class="wf-hdr"><div class="wf-hdr-title" style="font-size:20px">Orders</div><div style="display:flex;gap:8px;align-items:center"><div style="background:#7BBEFD;padding:2px 8px;border-radius:10px;font-size:11px;font-weight:700;color:#000012">7 new</div></div></div>
            <div class="wf-pills"><div class="wf-pill active">Pending</div><div class="wf-pill">Fulfilled</div><div class="wf-pill">All</div></div>
            <div class="wf-scroll">
              @foreach([
                ['Song Story Bundle','"Dog on a Leash" &bull; For: Sarah M.','Dedication: "To my daughter on her 16th birthday"','$249','#d4a843',true,true],
                ['Lyric Sheet','"Alive" &bull; For: Mike T.','No dedication','$99','#7BBEFD',false,true],
                ['Video Shoutout','Birthday &bull; For: Jess R.','"Happy 30th, you\'re amazing"','$99','#7BBEFD',true,false],
                ['Inner Circle','Full bundle + call &bull; For: Dana K.',null,'$499','#d4a843',false,false],
              ] as $order)
              <div style="background:#0e0e20;border-radius:10px;padding:12px;margin-bottom:8px;border-left:3px solid {{ $order[4] }}">
                <div style="display:flex;justify-content:space-between;align-items:flex-start">
                  <div>
                    <div style="font-size:13px;font-weight:700;color:#f0f0f0">{{ $order[0] }}</div>
                    <div style="font-size:11px;color:#8888a0;margin-top:2px">{!! $order[1] !!}</div>
                    @if($order[2])<div style="font-size:10px;color:#8888a0;margin-top:2px">{{ $order[2] }}</div>@endif
                  </div>
                  <div style="font-size:14px;font-weight:700;color:{{ $order[4] }}">{{ $order[3] }}</div>
                </div>
                <div style="display:flex;gap:6px;margin-top:8px">
                  @if($order[5])<div style="font-size:10px;font-weight:600;padding:5px 12px;border-radius:16px;background:#7BBEFD;color:#000012;display:flex;align-items:center;gap:4px"><svg width="10" height="10"><use href="#i-video"/></svg>Record Video</div>@endif
                  @if($order[6])<div style="font-size:10px;font-weight:600;padding:5px 12px;border-radius:16px;background:{{ $order[5] ? '#18182e' : '#7BBEFD' }};color:{{ $order[5] ? '#b8b8d0' : '#000012' }};display:flex;align-items:center;gap:4px"><svg width="10" height="10"><use href="#i-pen"/></svg>Write Lyrics</div>@endif
                  @if(!$order[5] && !$order[6])<div style="font-size:10px;font-weight:600;padding:5px 12px;border-radius:16px;background:#7BBEFD;color:#000012">Start Fulfillment</div>@endif
                </div>
              </div>
              @endforeach
              <div style="background:#18182e;border-radius:10px;padding:12px;margin-top:4px;text-align:center">
                <div style="font-size:10px;font-weight:600;color:#8888a0;text-transform:uppercase;letter-spacing:1px">This Week</div>
                <div style="font-size:28px;font-weight:800;color:#7BBEFD;margin-top:4px">$1,844</div>
                <div style="font-size:10px;color:#8888a0;margin-top:2px">12 orders fulfilled &bull; 7 pending</div>
              </div>
            </div>
            <div class="wf-bnav">
              <div class="wf-bnav-item active"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-list"/></svg></span><span class="wf-bnav-label">Orders</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-music"/></svg></span><span class="wf-bnav-label">Content</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-live"/></svg></span><span class="wf-bnav-label">Go Live</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-calendar"/></svg></span><span class="wf-bnav-label">Shows</span></div>
            </div>
          </div>
        </div>
        <div class="mt-3.5 text-[13px] font-semibold text-[#8888a0] tracking-wide">Order Queue</div>
      </div>

      {{-- ADMIN PHONE 2: CONTENT --}}
      <div class="text-center">
        <div class="wf-phone">
          <div class="wf-screen">
            <div class="wf-notch"></div>
            <div class="wf-hdr"><div class="wf-hdr-title" style="font-size:20px">Content</div><div style="background:#7BBEFD;width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center"><svg width="14" height="14" style="color:#000012"><use href="#i-pen"/></svg></div></div>
            <div class="wf-scroll">
              <div class="wf-section-label">Quick Actions</div>
              <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:14px">
                @foreach([['i-music','Upload Song'],['i-video','Record Video'],['i-mic','Voice Memo'],['i-pen','New Post']] as $action)
                <div style="background:#0e0e20;border-radius:10px;padding:14px;text-align:center"><svg width="22" height="22" style="color:#7BBEFD"><use href="#{{ $action[0] }}"/></svg><div style="font-size:11px;font-weight:600;margin-top:6px;color:#f0f0f0">{{ $action[1] }}</div></div>
                @endforeach
              </div>
              <div class="wf-section-label">Recent Uploads</div>
              @foreach([['i-music','Still Standing (Early Drop)','Song &bull; Published 2 days ago','Live','free'],['i-video','Song Story: "Notorious"','Video &bull; Published 5 days ago','Live','free'],['i-mic','Acoustic: "Ready for War"','Voice memo &bull; Draft','Draft','draft']] as $upload)
              <div class="wf-pl-row"><div class="wf-pl-art" style="background:#0e0e20"><svg width="16" height="16" style="color:#7BBEFD"><use href="#{{ $upload[0] }}"/></svg></div><div class="wf-pl-info"><div class="wf-pl-name">{{ $upload[1] }}</div><div class="wf-pl-meta">{!! $upload[2] !!}</div></div><div class="wf-badge" style="background:{{ $upload[4]==='free' ? 'rgba(29,185,84,0.15)' : '#18182e' }};color:{{ $upload[4]==='free' ? '#1db954' : '#8888a0' }}">{{ $upload[3] }}</div></div>
              @endforeach
              <div class="wf-section-label" style="margin-top:12px">Catalog</div>
              @foreach([['#3a1a1a','#1a0a0a','Power','10 songs &bull; 8 lyric sheets active'],['#1a2a3a','#0a1020','Shine On','12 songs &bull; 5 lyric sheets active'],['#2a2a1a','#10100a','Notorious','10 songs &bull; 3 lyric sheets active']] as $album)
              <div class="wf-pl-row"><div class="wf-pl-art" style="background:linear-gradient(135deg,{{ $album[0] }},{{ $album[1] }})"><svg width="16" height="16" style="color:#7BBEFD;opacity:.6"><use href="#i-disc"/></svg></div><div class="wf-pl-info"><div class="wf-pl-name">{{ $album[2] }}</div><div class="wf-pl-meta">{!! $album[3] !!}</div></div></div>
              @endforeach
            </div>
            <div class="wf-bnav">
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-list"/></svg></span><span class="wf-bnav-label">Orders</span></div>
              <div class="wf-bnav-item active"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#7BBEFD"><use href="#i-music"/></svg></span><span class="wf-bnav-label">Content</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-live"/></svg></span><span class="wf-bnav-label">Go Live</span></div>
              <div class="wf-bnav-item"><span class="wf-bnav-icon"><svg width="18" height="18" style="color:#b8b8d0"><use href="#i-calendar"/></svg></span><span class="wf-bnav-label">Shows</span></div>
            </div>
          </div>
        </div>
        <div class="mt-3.5 text-[13px] font-semibold text-[#8888a0] tracking-wide">Content Management</div>
      </div>

    </div>

    {{-- Dashboard capabilities --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-10">
      <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Fill Orders</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">New orders show up with the fan's name, what they want, and the dedication. Tap to open camera and record a video. Tap to mark a lyric sheet done and ship it. Bundles show up at the top so you knock out the big ones first.</p></div>
      <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Upload Content</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Upload a new song, record a video, drop a voice memo, write a post &mdash; all from the phone. Camera and mic are one tap away. Drafts save automatically. Post it when you're ready.</p></div>
      <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Go Live</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">One button. Fans get a push notification, chat lights up, and the unlock prompts show up on their end automatically. You just talk to your people.</p></div>
      <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Manage Shows</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Add a show &mdash; venue, date, ticket link, VIP details. Set how many VIP spots per show. Check the sales. All from the phone while you're on the road.</p></div>
      <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">See Your Money</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">What you made today, this week, this month. Which products are selling, which songs are driving the most purchases. No spreadsheets &mdash; just a clean number on your phone.</p></div>
      <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Push Notifications</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">One tap to hit every fan at once: new song, going live, new tour date, limited bundle drop. That's your direct line &mdash; no algorithm deciding who sees it.</p></div>
    </div>
  </div>
</section>

{{-- TECH STACK --}}
<section class="py-16 sm:py-20 px-5 sm:px-10 max-w-[1200px] mx-auto">
  <h3 class="text-xs font-semibold uppercase tracking-[1.5px] text-[#7BBEFD] mb-2">How It's Built</h3>
  <h2 class="text-2xl sm:text-[32px] font-bold tracking-tight text-[#f0f0f0] mb-2" style="font-family: 'Inter', sans-serif;">Under the Hood</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-8">
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Fan App</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">One codebase, runs on both iPhone and Android. Music streaming with playlists and offline listening, live video, push notifications, and native in-app purchases through Apple and Google.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Your Admin App</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Same app, different view when you log in. You see the order queue, content tools, go-live button, show management. Built for your phone, not a shrunken website.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Backend</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Laravel API handling orders, content, user accounts, tour dates, VIP packages, and the fulfillment workflow. In-app purchases through Apple and Google for digital content, Stripe for physical goods and VIP packages.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Live Video</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">You tap "Go Live," fans get a notification, chat opens up, and unlock prompts show up automatically while you're streaming. You don't have to think about the tech.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Shows &amp; VIP</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Tour dates with ticket links and VIP packages sold right in the app. Meet &amp; greet, early entry, signed merch. No third-party ticketing service taking a cut.</p></div>
    <div class="bg-[#0e0e20] border border-[#7BBEFD]/10 rounded-xl p-7"><h4 class="text-base font-semibold text-[#f0f0f0] mb-2" style="font-family:'Inter',sans-serif">Content Delivery</h4><p class="text-sm text-[#b8b8d0] leading-relaxed">Music streams with offline caching and playlists. Video unlocks delivered through secure links. Lyric sheet orders kick off a shipping flow with tracking. Simple.</p></div>
  </div>
</section>

</div>{{-- end Inter wrapper --}}
@endsection
