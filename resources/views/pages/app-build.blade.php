<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<title>Adelitas Way App — Product Design Overview</title>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

  * { margin: 0; padding: 0; box-sizing: border-box; }

  :root {
    --primary: rgb(123, 190, 253);
    --primary-dim: rgba(123, 190, 253, 0.12);
    --primary-mid: rgba(123, 190, 253, 0.35);
    --bg-dark: rgb(0, 0, 18);
    --bg-card: rgb(14, 14, 32);
    --bg-elevated: rgb(24, 24, 46);
    --bg-surface: rgb(32, 32, 56);
    --text-primary: #f0f0f0;
    --text-secondary: #a0a0b8;
    --text-muted: #606078;
    --border: rgba(123, 190, 253, 0.1);
    --gold: #d4a843;
    --green: #1db954;
  }

  html { scroll-behavior: smooth; overflow-x: hidden; }

  body {
    font-family: 'Inter', -apple-system, sans-serif;
    background: var(--bg-dark);
    color: var(--text-primary);
    line-height: 1.6;
    overflow-x: hidden;
  }

  /* Inline SVG icon helper */
  .ico { display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .ico svg { display: block; }

  /* SECTIONS */
  .section {
    padding: 80px 40px;
    border-bottom: 1px solid var(--border);
    max-width: 1200px;
    margin: 0 auto;
  }

  .section-full {
    padding: 80px 40px;
    border-bottom: 1px solid var(--border);
  }

  .section-full .section-inner {
    max-width: 1200px;
    margin: 0 auto;
  }

  h1 {
    font-family: 'Inter', sans-serif;
    font-size: 48px;
    font-weight: 800;
    letter-spacing: -1px;
    line-height: 1.1;
  }

  h2 {
    font-family: 'Inter', sans-serif;
    font-size: 32px;
    font-weight: 700;
    letter-spacing: -0.5px;
    margin-bottom: 10px;
  }

  h3 {
    font-family: 'Inter', sans-serif;
    font-weight: 600;
    color: var(--primary);
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-size: 12px;
  }

  .subtitle {
    font-size: 17px;
    color: var(--text-secondary);
    font-weight: 400;
    margin-top: 8px;
    max-width: 700px;
    line-height: 1.7;
  }

  .accent { color: var(--primary); }

  /* HERO */
  .hero {
    min-height: 50vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 100px 40px 80px;
    max-width: 1200px;
    margin: 0 auto;
    border-bottom: 1px solid var(--border);
  }

  .hero-label {
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--primary);
    margin-bottom: 20px;
  }

  .hero h1 { margin-bottom: 16px; }
  .hero .subtitle { font-size: 18px; max-width: 600px; }

  .hero-meta {
    display: flex;
    gap: 30px;
    margin-top: 40px;
    flex-wrap: wrap;
  }

  .hero-meta-item { font-size: 13px; color: var(--text-muted); }
  .hero-meta-item span { color: var(--text-secondary); font-weight: 500; }

  /* GRID */
  .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 30px; }
  .grid-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-top: 30px; }

  .card {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 28px;
  }

  .card h4 { font-size: 16px; font-weight: 600; margin-bottom: 8px; }
  .card p { font-size: 14px; color: var(--text-secondary); line-height: 1.7; }

  .card .price {
    font-size: 24px;
    font-weight: 700;
    color: var(--primary);
    margin-top: 12px;
  }

  .card .tag {
    display: inline-block;
    font-size: 10px;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 20px;
    background: var(--primary-dim);
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 12px;
  }

  .card .tag.free { background: rgba(29, 185, 84, 0.15); color: var(--green); }
  .card .tag.bundle { background: rgba(212, 168, 67, 0.15); color: var(--gold); }

  /* FEATURE LIST */
  .feature-list { list-style: none; margin-top: 20px; }

  .feature-list li {
    padding: 14px 0;
    border-bottom: 1px solid var(--border);
    display: flex;
    gap: 14px;
    font-size: 14px;
    color: var(--text-secondary);
    line-height: 1.6;
  }

  .feature-list li:last-child { border-bottom: none; }
  .feature-list .ft { font-weight: 600; color: var(--text-primary); display: block; margin-bottom: 2px; }

  .feature-list .ficon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: var(--bg-elevated);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  /* FLOW */
  .flow {
    display: flex;
    align-items: center;
    gap: 0;
    margin-top: 30px;
    flex-wrap: wrap;
    justify-content: center;
  }

  .flow-step {
    background: var(--bg-card);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 24px 20px;
    text-align: center;
    width: 200px;
  }

  .flow-step .step-num { font-size: 11px; font-weight: 700; color: var(--primary); letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 8px; }
  .flow-step .step-title { font-size: 15px; font-weight: 700; margin-bottom: 6px; }
  .flow-step .step-desc { font-size: 12px; color: var(--text-secondary); line-height: 1.5; }
  .flow-arrow { font-size: 20px; color: var(--text-muted); padding: 0 8px; }

  /* PHONES */
  .phones-row {
    display: flex;
    gap: 32px;
    justify-content: center;
    align-items: flex-start;
    margin: 40px 0;
    flex-wrap: wrap;
  }

  .phone-wrap { text-align: center; }

  .phone-frame {
    width: 280px;
    max-width: 100%;
    height: 590px;
    background: var(--bg-dark);
    border-radius: 36px;
    border: 2.5px solid #2a2a4a;
    overflow: hidden;
    position: relative;
    box-shadow: 0 20px 60px rgba(0,0,0,0.6), 0 0 40px rgba(123,190,253,0.04);
  }

  .phone-notch {
    width: 100px;
    height: 24px;
    background: var(--bg-dark);
    border-radius: 0 0 14px 14px;
    margin: 0 auto;
    position: relative;
    z-index: 10;
  }

  .phone-screen { background: var(--bg-dark); height: 100%; overflow: hidden; }

  .screen-label {
    margin-top: 14px;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-muted);
    letter-spacing: 0.5px;
  }

  /* App UI */
  .app-header {
    padding: 6px 18px 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .app-header-title { font-size: 22px; font-weight: 700; letter-spacing: -0.3px; }

  .app-header-avatar {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--bg-elevated);
    border: 1.5px solid var(--primary-mid);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    color: var(--primary);
    font-weight: 600;
  }

  .app-pill-row { display: flex; gap: 6px; padding: 0 18px 10px; overflow: hidden; }

  .app-pill {
    font-size: 11px;
    font-weight: 500;
    padding: 5px 14px;
    border-radius: 20px;
    background: var(--bg-elevated);
    color: var(--text-secondary);
    white-space: nowrap;
  }

  .app-pill.active { background: var(--primary); color: var(--bg-dark); font-weight: 600; }

  .app-scroll { padding: 0 18px; overflow: hidden; }

  .app-section-label { font-size: 14px; font-weight: 700; margin-bottom: 8px; margin-top: 4px; letter-spacing: -0.2px; }

  /* Compact track row */
  .track-row {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 6px 0;
  }

  .track-num { font-size: 12px; color: var(--text-muted); width: 16px; text-align: center; flex-shrink: 0; }
  .track-info { flex: 1; min-width: 0; }
  .track-title { font-size: 13px; font-weight: 500; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .track-title.playing { color: var(--primary); }
  .track-dur { font-size: 11px; color: var(--text-muted); flex-shrink: 0; }
  .track-action { flex-shrink: 0; opacity: 0.5; display: flex; align-items: center; }

  /* Album thumb grid */
  .album-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 14px;
  }

  .album-tile {
    background: var(--bg-card);
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 8px;
    height: 48px;
  }

  .album-tile-art {
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .album-tile-name {
    font-size: 11px;
    font-weight: 600;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding-right: 8px;
  }

  /* Playlist row */
  .playlist-row {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 7px 0;
  }

  .playlist-art {
    width: 44px;
    height: 44px;
    border-radius: 4px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .playlist-info { flex: 1; min-width: 0; }
  .playlist-name { font-size: 13px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .playlist-meta { font-size: 10px; color: var(--text-muted); margin-top: 1px; }

  /* Now playing full screen */
  .np-screen { padding: 0 24px; text-align: center; }

  .np-art {
    width: 220px;
    height: 220px;
    border-radius: 8px;
    margin: 4px auto 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 30px rgba(0,0,0,0.5);
    position: relative;
    overflow: hidden;
  }

  .np-art-label {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 6px;
    font-size: 9px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: var(--text-secondary);
    background: linear-gradient(transparent, rgba(0,0,18,0.8));
  }

  .np-song { font-size: 18px; font-weight: 700; letter-spacing: -0.3px; }
  .np-artist { font-size: 13px; color: var(--text-secondary); margin-top: 2px; }

  .np-progress { margin: 14px 0 4px; }
  .np-bar { height: 3px; background: var(--bg-surface); border-radius: 2px; }
  .np-bar-fill { height: 100%; background: var(--primary); border-radius: 2px; }
  .np-times { display: flex; justify-content: space-between; font-size: 10px; color: var(--text-muted); margin-top: 4px; }

  .np-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 24px;
    margin: 12px 0;
  }

  .np-ctrl { opacity: 0.5; display: flex; align-items: center; }
  .np-ctrl-main { opacity: 1; }

  /* Subtle unlock prompt on now-playing */
  .np-unlock-hint {
    margin-top: 14px;
    padding: 12px 14px;
    background: var(--bg-card);
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    text-align: left;
  }

  .np-unlock-hint .hint-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: var(--primary-dim);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .np-unlock-hint .hint-text { flex: 1; }
  .np-unlock-hint .hint-title { font-size: 12px; font-weight: 600; }
  .np-unlock-hint .hint-sub { font-size: 10px; color: var(--text-muted); margin-top: 1px; }
  .np-unlock-hint .hint-action { font-size: 11px; color: var(--primary); font-weight: 600; flex-shrink: 0; }

  /* Bundle option below hint */
  .np-bundle-row {
    margin-top: 8px;
    padding: 10px 14px;
    background: rgba(212,168,67,0.06);
    border: 1px solid rgba(212,168,67,0.12);
    border-radius: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
    text-align: left;
  }

  .np-bundle-row .hint-icon { background: rgba(212,168,67,0.15); }
  .np-bundle-row .hint-title { font-size: 12px; font-weight: 600; color: var(--gold); }
  .np-bundle-row .hint-sub { font-size: 10px; color: var(--text-muted); margin-top: 1px; }
  .np-bundle-row .hint-action { font-size: 11px; color: var(--gold); font-weight: 600; flex-shrink: 0; }

  /* Bottom nav */
  .app-bottom-nav {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    background: linear-gradient(180deg, transparent 0%, var(--bg-dark) 30%);
    padding: 14px 0 22px;
  }

  .app-bnav-item { flex: 1; text-align: center; }
  .app-bnav-icon { display: flex; justify-content: center; opacity: 0.35; }
  .app-bnav-label { font-size: 9px; font-weight: 500; color: var(--text-muted); display: block; margin-top: 3px; opacity: 0.4; }
  .app-bnav-item.active .app-bnav-icon { opacity: 1; }
  .app-bnav-item.active .app-bnav-label { color: var(--text-primary); opacity: 1; }

  /* Now playing mini bar */
  .app-now-playing {
    position: absolute;
    bottom: 56px;
    left: 6px;
    right: 6px;
    background: var(--bg-elevated);
    border-radius: 8px;
    padding: 8px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.4);
  }

  .app-np-thumb {
    width: 36px;
    height: 36px;
    border-radius: 4px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .app-np-info { flex: 1; }
  .app-np-title { font-size: 12px; font-weight: 600; }
  .app-np-artist { font-size: 10px; color: var(--text-muted); }

  /* Revenue table */
  .rev-table-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; margin-top: 24px; }
  .rev-table { width: 100%; border-collapse: collapse; min-width: 560px; }
  .rev-table th, .rev-table td { padding: 14px 16px; text-align: left; border-bottom: 1px solid var(--border); font-size: 14px; }
  .rev-table th { font-size: 11px; text-transform: uppercase; letter-spacing: 1.5px; color: var(--text-muted); font-weight: 600; }
  .rev-table td { color: var(--text-secondary); }
  .rev-table td:last-child { font-weight: 700; color: var(--primary); }
  .rev-table tr:last-child td { border-top: 2px solid var(--primary); border-bottom: none; font-weight: 700; color: var(--text-primary); }
  .rev-table tr:last-child td:last-child { color: var(--primary); font-size: 18px; }

  .stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-top: 24px; }
  .stat { background: var(--bg-card); border: 1px solid var(--border); border-radius: 12px; padding: 24px; text-align: center; }
  .stat .num { font-size: 36px; font-weight: 800; color: var(--primary); letter-spacing: -1px; }
  .stat .label { font-size: 12px; color: var(--text-muted); margin-top: 4px; text-transform: uppercase; letter-spacing: 1px; }

  .app-btn {
    display: block;
    width: 100%;
    padding: 10px;
    background: var(--primary);
    color: var(--bg-dark);
    border: none;
    border-radius: 24px;
    font-size: 12px;
    font-weight: 700;
    text-align: center;
  }

  .app-mini-badge {
    display: inline-block;
    font-size: 9px;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 10px;
    background: var(--primary-dim);
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.8px;
  }

  .app-mini-badge.free { background: rgba(29,185,84,0.15); color: var(--green); }
  .app-mini-badge.bundle { background: rgba(212,168,67,0.15); color: var(--gold); }

  @@media (max-width: 900px) {
    h1 { font-size: 36px; }
    h2 { font-size: 26px; }
    .section, .section-full { padding: 50px 20px; }
    .hero { padding: 60px 20px 50px; }
    .grid-2, .grid-3 { grid-template-columns: 1fr; }
    .phones-row { flex-direction: column; align-items: center; }
    .stats-row { grid-template-columns: 1fr 1fr; }
    .flow { flex-direction: column; }
    .flow-arrow { transform: rotate(90deg); }
    .rev-table th, .rev-table td { padding: 10px 8px; font-size: 13px; }
  }

  @@media (max-width: 480px) {
    h1 { font-size: 28px; }
    h2 { font-size: 22px; }
    .section, .section-full { padding: 40px 16px; }
    .hero { padding: 48px 16px 40px; }
    .hero-meta { gap: 16px; }
    .stats-row { grid-template-columns: 1fr; }
    .stat .num { font-size: 28px; }
  }
</style>
</head>
<body>

<!-- SVG icon definitions (hidden) -->
<svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
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
  <symbol id="i-phone" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></symbol>
  <symbol id="i-gift" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><line x1="12" y1="22" x2="12" y2="7"/><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/></symbol>
  <symbol id="i-star" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></symbol>
  <symbol id="i-heart" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></symbol>
  <symbol id="i-list" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></symbol>
  <symbol id="i-disc" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></symbol>
  <symbol id="i-chevdown" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></symbol>
  <symbol id="i-more" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></symbol>
  <symbol id="i-calendar" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></symbol>
  <symbol id="i-map-pin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></symbol>
  <symbol id="i-live" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></symbol>
  <symbol id="i-ticket" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 9a3 3 0 0 1 0 6v2a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-2a3 3 0 0 1 0-6V7a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/><path d="M13 5v2"/><path d="M13 17v2"/><path d="M13 11v2"/></symbol>
</svg>

<!-- HERO -->
<header class="hero">
  <div class="hero-label">Product Design Overview</div>
  <h1>Adelitas Way <span class="accent">App</span></h1>
  <p class="subtitle">A free, direct-to-fan app built around Rick's personal connection with his audience. Free content gets fans in the door. Unlocks and bundles drive revenue.</p>
  <div class="hero-meta">
    <div class="hero-meta-item">Platform <span>iOS + Android (Flutter)</span></div>
    <div class="hero-meta-item">Price <span>Free to download</span></div>
    <div class="hero-meta-item">Revenue model <span>Unlocks + Bundle upsells</span></div>
    <div class="hero-meta-item">Updated <span>April 2026</span></div>
  </div>
</header>

<!-- SECTION: USER FLOW -->
<section class="section">
  <h3>How It Works</h3>
  <h2>The Fan Journey</h2>
  <p class="subtitle">Every step naturally leads to the next. Free content builds trust, unlocks convert intent, bundles maximize value.</p>
  <div class="flow">
    <div class="flow-step">
      <div class="step-num">Step 1</div>
      <div class="step-title">Download</div>
      <div class="step-desc">Free on App Store / Play Store. Zero friction entry.</div>
    </div>
    <div class="flow-arrow">&rarr;</div>
    <div class="flow-step">
      <div class="step-num">Step 2</div>
      <div class="step-title">Explore Free</div>
      <div class="step-desc">Stream music, read Rick's feed, get early drops. Build the habit.</div>
    </div>
    <div class="flow-arrow">&rarr;</div>
    <div class="flow-step">
      <div class="step-num">Step 3</div>
      <div class="step-title">First Unlock</div>
      <div class="step-desc">Fan sees a lyric sheet prompt while listening. Contextual, not pushy.</div>
    </div>
    <div class="flow-arrow">&rarr;</div>
    <div class="flow-step">
      <div class="step-num">Step 4</div>
      <div class="step-title">Bundle Upsell</div>
      <div class="step-desc">On the unlock screen: "Add Rick's personal video and save." Higher cart value.</div>
    </div>
  </div>
</section>

<!-- SECTION: FREE TIER -->
<section class="section">
  <h3>Free Tier</h3>
  <h2>Free Streaming as the Gateway</h2>
  <p class="subtitle">The music is free. That's the point. Free streaming gets fans using the app daily, builds habit and trust, and creates the natural touchpoints where premium unlocks and bundles surface. It also eliminates the complexity of streaming payouts &mdash; no per-play royalties, no distributor splits. The music drives engagement; the unlocks drive revenue.</p>
  <div class="grid-3">
    <div class="card"><div class="tag free">Free</div><h4>Independent Catalog</h4><p>Full streaming of Getaway, Notorious, Shine On, and Power with playlists and offline caching. Fans listen here instead of Spotify &mdash; and every session is a chance to surface premium content.</p></div>
    <div class="card"><div class="tag free">Free</div><h4>Rick's Feed + Live Video</h4><p>Updates, behind-the-scenes clips, voice notes, and live video streams directly from Rick. Fans see it in real time. The relationship layer that keeps the app alive between releases.</p></div>
    <div class="card"><div class="tag free">Free</div><h4>Early Access Drops</h4><p>New music debuts here before streaming platforms. The inner circle. This alone drives downloads &mdash; and every early drop is an opportunity for a lyric sheet or Song Story upsell.</p></div>
  </div>
</section>

<!-- SECTION: UNLOCKS -->
<section class="section">
  <h3>Unlocks</h3>
  <h2>Where the Money Is</h2>
  <p class="subtitle">Prompts surface naturally while fans use the free features. Not paywalls &mdash; optional upgrades. Every unlock is something only Rick can provide.</p>
  <div class="grid-2">
    <div class="card"><h4>Handwritten Lyric Sheets</h4><p>The proven seller, expanded to every song in the independent catalog. Personalized dedications available. Prompted subtly on the now-playing screen.</p><div class="price">$99 &ndash; $149</div></div>
    <div class="card"><h4>Personal Video Dedications</h4><p>Birthday shoutouts, pep talks, personal messages. Fan submits the request, Rick records when he has time. Self-hosted &mdash; no Cameo cut.</p><div class="price">$99 &ndash; $149</div></div>
    <div class="card"><h4>Acoustic Voice Memos</h4><p>Rick sings a few lines of their favorite song, dedicated by name. Raw, intimate, phone-recorded. The imperfection is the point.</p><div class="price">$99 &ndash; $199</div></div>
    <div class="card"><h4>Premium Video Calls</h4><p>10-minute personal call with Rick. Limited slots, scarcity-driven. The highest-touch product in the catalog.</p><div class="price">$500+</div></div>
    <div class="card"><h4>Live Video Streams</h4><p>Rick goes live directly in the app &mdash; Q&amp;As, acoustic sessions, behind-the-scenes from the studio or the road. Free to watch, but a natural stage for promoting unlocks and bundles in real time.</p><div class="price" style="color: var(--green);">Free (drives conversions)</div></div>
    <div class="card"><h4>VIP Tour Packages</h4><p>Meet &amp; greet, early entry, signed merch bundles tied to specific show dates. Sold through the Shows tab alongside tour dates. Premium experience, limited per show.</p><div class="price">$149 &ndash; $299</div></div>
  </div>
</section>

<!-- SECTION: BUNDLES -->
<section class="section">
  <h3>Bundles</h3>
  <h2>The Upsell Engine</h2>
  <p class="subtitle">When a fan taps an unlock, they see the bundle option alongside it. No popups, no pressure &mdash; just a visible savings path for fans who want more.</p>
  <div class="grid-3">
    <div class="card"><div class="tag bundle">Primary Upsell</div><h4>Song Story Bundle</h4><p>Handwritten lyric sheet + Rick's personal video explaining what inspired the song, with a dedication to the buyer. Positioned as an upgrade from standalone lyric sheets.</p><div class="price">$249 &ndash; $299</div></div>
    <div class="card"><div class="tag bundle">Gift Bundle</div><h4>Fan Package</h4><p>Lyric sheet + video shoutout + acoustic voice memo. The "I want it all" tier. Positioned for birthdays, holidays, anniversaries.</p><div class="price">$399</div></div>
    <div class="card"><div class="tag bundle">Limited</div><h4>The Inner Circle</h4><p>Everything in the Fan Package + a 5-minute video call with Rick. Extreme scarcity. The "once in a lifetime" offer.</p><div class="price">$499</div></div>
  </div>
</section>

<!-- SECTION: APP MOCKUPS -->
<section class="section-full" style="background: linear-gradient(180deg, rgba(123,190,253,0.02) 0%, transparent 100%);">
  <div class="section-inner">
    <h3>App Screens</h3>
    <h2>Product Mockups</h2>
    <p class="subtitle">Four key screens showing the core experience: Library, Now Playing with subtle unlocks, Tour Dates with VIP packages, and live video.</p>

    <div class="phones-row">

      <!-- PHONE 1: LIBRARY -->
      <div class="phone-wrap">
        <div class="phone-frame">
          <div class="phone-screen">
            <div class="phone-notch"></div>
            <div class="app-header">
              <div class="app-header-title">Library</div>
              <div class="app-header-avatar">G</div>
            </div>
            <div class="app-pill-row">
              <div class="app-pill active">All</div>
              <div class="app-pill">Albums</div>
              <div class="app-pill">Playlists</div>
            </div>
            <div class="app-scroll">
              <!-- Album quick-access grid -->
              <div class="album-grid">
                <div class="album-tile">
                  <div class="album-tile-art" style="background: linear-gradient(135deg, #3a1a1a, #1a0a0a);"><svg width="18" height="18" style="color:var(--primary);opacity:0.6;"><use href="#i-disc"/></svg></div>
                  <div class="album-tile-name">Power</div>
                </div>
                <div class="album-tile">
                  <div class="album-tile-art" style="background: linear-gradient(135deg, #1a2a3a, #0a1020);"><svg width="18" height="18" style="color:var(--primary);opacity:0.6;"><use href="#i-disc"/></svg></div>
                  <div class="album-tile-name">Shine On</div>
                </div>
                <div class="album-tile">
                  <div class="album-tile-art" style="background: linear-gradient(135deg, #2a2a1a, #10100a);"><svg width="18" height="18" style="color:var(--primary);opacity:0.6;"><use href="#i-disc"/></svg></div>
                  <div class="album-tile-name">Notorious</div>
                </div>
                <div class="album-tile">
                  <div class="album-tile-art" style="background: linear-gradient(135deg, #1a3a2a, #0a1a10);"><svg width="18" height="18" style="color:var(--primary);opacity:0.6;"><use href="#i-disc"/></svg></div>
                  <div class="album-tile-name">Getaway</div>
                </div>
              </div>

              <!-- Playlists -->
              <div class="app-section-label">Playlists</div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: linear-gradient(135deg, var(--bg-surface), var(--bg-card));"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-list"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">AW Essentials</div>
                  <div class="playlist-meta">24 songs &bull; Curated by Rick</div>
                </div>
              </div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: linear-gradient(135deg, #2a1a2a, #1a0a1a);"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-heart"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Liked Songs</div>
                  <div class="playlist-meta">12 songs</div>
                </div>
              </div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: linear-gradient(135deg, #1a2a1a, #0a1a0a);"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-list"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Deep Cuts</div>
                  <div class="playlist-meta">16 songs &bull; Curated by Rick</div>
                </div>
              </div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: linear-gradient(135deg, #2a2a0a, #1a1a00);"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-mic"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Acoustic Sessions</div>
                  <div class="playlist-meta">6 songs &bull; App exclusive</div>
                </div>
              </div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: linear-gradient(135deg, #0a1a2a, #000a1a);"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-star"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Unreleased Demos</div>
                  <div class="playlist-meta">3 songs &bull; App exclusive</div>
                </div>
              </div>
            </div>

            <!-- Now playing mini bar -->
            <div class="app-now-playing">
              <div class="app-np-thumb" style="background: linear-gradient(135deg, #3a1a1a, #1a0a0a);"><svg width="14" height="14" style="color:var(--primary);"><use href="#i-play"/></svg></div>
              <div class="app-np-info">
                <div class="app-np-title">Dog on a Leash</div>
                <div class="app-np-artist">Adelitas Way &bull; Power</div>
              </div>
              <svg width="16" height="16" style="color:var(--text-muted);"><use href="#i-pause"/></svg>
            </div>

            <div class="app-bottom-nav">
              <div class="app-bnav-item active"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-home"/></svg></span><span class="app-bnav-label">Home</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-music"/></svg></span><span class="app-bnav-label">Music</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-ticket"/></svg></span><span class="app-bnav-label">Shows</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-unlock"/></svg></span><span class="app-bnav-label">Unlocks</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-user"/></svg></span><span class="app-bnav-label">Profile</span></div>
            </div>
          </div>
        </div>
        <div class="screen-label">Library &amp; Playlists</div>
      </div>

      <!-- PHONE 2: NOW PLAYING (with subtle unlock) -->
      <div class="phone-wrap">
        <div class="phone-frame">
          <div class="phone-screen">
            <div class="phone-notch"></div>
            <!-- Now playing header -->
            <div style="padding: 6px 18px 0; display: flex; justify-content: space-between; align-items: center;">
              <svg width="16" height="16" style="color:var(--text-muted);"><use href="#i-chevdown"/></svg>
              <div style="font-size: 10px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1.5px;">Playing from Power</div>
              <svg width="16" height="16" style="color:var(--text-muted);"><use href="#i-more"/></svg>
            </div>

            <div class="np-screen">
              <!-- Album art -->
              <div class="np-art" style="background: linear-gradient(145deg, #4a1a1a 0%, #1a0808 40%, #0a0a2a 100%);">
                <svg width="48" height="48" style="color:rgba(123,190,253,0.15);"><use href="#i-disc"/></svg>
                <div class="np-art-label">Power &bull; 2023</div>
              </div>

              <!-- Song info -->
              <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="text-align: left;">
                  <div class="np-song">Dog on a Leash</div>
                  <div class="np-artist">Adelitas Way</div>
                </div>
                <svg width="18" height="18" style="color:var(--text-muted);"><use href="#i-heart"/></svg>
              </div>

              <!-- Progress -->
              <div class="np-progress">
                <div class="np-bar"><div class="np-bar-fill" style="width: 62%;"></div></div>
                <div class="np-times"><span>2:14</span><span>3:42</span></div>
              </div>

              <!-- Controls -->
              <div class="np-controls">
                <span class="np-ctrl"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-shuffle"/></svg></span>
                <span class="np-ctrl"><svg width="22" height="22" style="color:var(--text-primary);"><use href="#i-skip-back"/></svg></span>
                <span class="np-ctrl np-ctrl-main" style="background: var(--primary); width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center;"><svg width="20" height="20" style="color:var(--bg-dark);"><use href="#i-pause"/></svg></span>
                <span class="np-ctrl"><svg width="22" height="22" style="color:var(--text-primary);"><use href="#i-skip-fwd"/></svg></span>
                <span class="np-ctrl"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-repeat"/></svg></span>
              </div>

              <!-- Subtle unlock hint (not pushy) -->
              <div class="np-unlock-hint">
                <div class="hint-icon"><svg width="16" height="16" style="color:var(--primary);"><use href="#i-pen"/></svg></div>
                <div class="hint-text">
                  <div class="hint-title">Handwritten lyrics available</div>
                  <div class="hint-sub">Written and signed by Rick</div>
                </div>
                <div class="hint-action">$99</div>
              </div>

              <!-- Quieter bundle option -->
              <div class="np-bundle-row">
                <div class="hint-icon"><svg width="16" height="16" style="color:var(--gold);"><use href="#i-video"/></svg></div>
                <div class="hint-text">
                  <div class="hint-title">Song Story Bundle</div>
                  <div class="hint-sub">Lyrics + Rick's video about this song</div>
                </div>
                <div class="hint-action">$249</div>
              </div>
            </div>

            <div class="app-bottom-nav">
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-home"/></svg></span><span class="app-bnav-label">Home</span></div>
              <div class="app-bnav-item active"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-music"/></svg></span><span class="app-bnav-label">Music</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-ticket"/></svg></span><span class="app-bnav-label">Shows</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-unlock"/></svg></span><span class="app-bnav-label">Unlocks</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-user"/></svg></span><span class="app-bnav-label">Profile</span></div>
            </div>
          </div>
        </div>
        <div class="screen-label">Now Playing + Unlock Hints</div>
      </div>

      <!-- PHONE 3: TOUR DATES + VIP -->
      <div class="phone-wrap">
        <div class="phone-frame">
          <div class="phone-screen">
            <div class="phone-notch"></div>
            <div class="app-header">
              <div class="app-header-title">Shows</div>
              <div class="app-header-avatar">G</div>
            </div>
            <div class="app-pill-row">
              <div class="app-pill active">Upcoming</div>
              <div class="app-pill">Past</div>
              <div class="app-pill">VIP</div>
            </div>
            <div class="app-scroll">
              <!-- Show card 1 -->
              <div style="background: var(--bg-card); border-radius: 10px; padding: 14px; margin-bottom: 10px;">
                <div style="display: flex; gap: 12px; align-items: flex-start;">
                  <div style="text-align: center; min-width: 40px;">
                    <div style="font-size: 22px; font-weight: 800; color: var(--primary); line-height: 1;">18</div>
                    <div style="font-size: 10px; font-weight: 600; color: var(--text-muted); text-transform: uppercase;">Oct</div>
                  </div>
                  <div style="flex: 1;">
                    <div style="font-size: 14px; font-weight: 700;">Varsity Theater</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px; display: flex; align-items: center; gap: 4px;">
                      <svg width="10" height="10" style="color:var(--text-muted);"><use href="#i-map-pin"/></svg>Minneapolis, MN
                    </div>
                    <div style="display: flex; gap: 6px; margin-top: 8px;">
                      <div style="font-size: 10px; font-weight: 600; padding: 4px 10px; border-radius: 16px; background: var(--primary); color: var(--bg-dark);">Tickets</div>
                      <div style="font-size: 10px; font-weight: 600; padding: 4px 10px; border-radius: 16px; background: rgba(212,168,67,0.15); color: var(--gold);">VIP $199</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Show card 2 -->
              <div style="background: var(--bg-card); border-radius: 10px; padding: 14px; margin-bottom: 10px;">
                <div style="display: flex; gap: 12px; align-items: flex-start;">
                  <div style="text-align: center; min-width: 40px;">
                    <div style="font-size: 22px; font-weight: 800; color: var(--primary); line-height: 1;">19</div>
                    <div style="font-size: 10px; font-weight: 600; color: var(--text-muted); text-transform: uppercase;">Oct</div>
                  </div>
                  <div style="flex: 1;">
                    <div style="font-size: 14px; font-weight: 700;">Q&amp;Z Expo Center</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px; display: flex; align-items: center; gap: 4px;">
                      <svg width="10" height="10" style="color:var(--text-muted);"><use href="#i-map-pin"/></svg>Ringle, WI
                    </div>
                    <div style="display: flex; gap: 6px; margin-top: 8px;">
                      <div style="font-size: 10px; font-weight: 600; padding: 4px 10px; border-radius: 16px; background: var(--primary); color: var(--bg-dark);">Tickets</div>
                      <div style="font-size: 10px; font-weight: 600; padding: 4px 10px; border-radius: 16px; background: rgba(212,168,67,0.15); color: var(--gold);">VIP $149</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Show card 3 -->
              <div style="background: var(--bg-card); border-radius: 10px; padding: 14px; margin-bottom: 10px;">
                <div style="display: flex; gap: 12px; align-items: flex-start;">
                  <div style="text-align: center; min-width: 40px;">
                    <div style="font-size: 22px; font-weight: 800; color: var(--primary); line-height: 1;">14</div>
                    <div style="font-size: 10px; font-weight: 600; color: var(--text-muted); text-transform: uppercase;">Mar</div>
                  </div>
                  <div style="flex: 1;">
                    <div style="font-size: 14px; font-weight: 700;">The Ranch Concert Hall</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px; display: flex; align-items: center; gap: 4px;">
                      <svg width="10" height="10" style="color:var(--text-muted);"><use href="#i-map-pin"/></svg>Fort Myers, FL
                    </div>
                    <div style="display: flex; gap: 6px; margin-top: 8px;">
                      <div style="font-size: 10px; font-weight: 600; padding: 4px 10px; border-radius: 16px; background: var(--primary); color: var(--bg-dark);">Tickets</div>
                      <div style="font-size: 10px; font-weight: 600; padding: 4px 10px; border-radius: 16px; background: rgba(212,168,67,0.15); color: var(--gold);">VIP $199</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- VIP Package Detail -->
              <div style="margin-top: 6px; background: linear-gradient(135deg, rgba(212,168,67,0.08), rgba(123,190,253,0.04)); border: 1px solid rgba(212,168,67,0.15); border-radius: 10px; padding: 14px;">
                <div class="app-mini-badge bundle" style="margin-bottom: 8px;">VIP Experience</div>
                <div style="font-size: 14px; font-weight: 700;">Meet &amp; Greet Package</div>
                <div style="font-size: 11px; color: var(--text-secondary); margin-top: 4px; line-height: 1.6;">Early venue entry, personal meet &amp; greet with Rick, signed setlist, exclusive merch item, photo opportunity</div>
                <div style="font-size: 18px; font-weight: 800; color: var(--gold); margin-top: 8px;">$149 &ndash; $299</div>
                <div style="font-size: 10px; color: var(--text-muted); margin-top: 4px;">Limited per show &bull; Select your date above</div>
              </div>
            </div>

            <div class="app-bottom-nav">
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-home"/></svg></span><span class="app-bnav-label">Home</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-music"/></svg></span><span class="app-bnav-label">Music</span></div>
              <div class="app-bnav-item active"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-ticket"/></svg></span><span class="app-bnav-label">Shows</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-unlock"/></svg></span><span class="app-bnav-label">Unlocks</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-user"/></svg></span><span class="app-bnav-label">Profile</span></div>
            </div>
          </div>
        </div>
        <div class="screen-label">Tour Dates + VIP</div>
      </div>

      <!-- PHONE 4: LIVE VIDEO -->
      <div class="phone-wrap">
        <div class="phone-frame">
          <div class="phone-screen">
            <div class="phone-notch"></div>

            <!-- Live video feed -->
            <div style="background: linear-gradient(180deg, #1a0a0a 0%, #0a0a2a 50%, var(--bg-dark) 100%); height: 280px; display: flex; flex-direction: column; justify-content: space-between; padding: 10px 18px 14px; position: relative;">
              <!-- Live badge -->
              <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div style="display: flex; align-items: center; gap: 6px;">
                  <div style="width: 8px; height: 8px; border-radius: 50%; background: #e53e3e;"></div>
                  <span style="font-size: 11px; font-weight: 700; color: #e53e3e; text-transform: uppercase; letter-spacing: 1px;">Live</span>
                </div>
                <div style="display: flex; align-items: center; gap: 4px;">
                  <svg width="12" height="12" style="color:var(--text-secondary);"><use href="#i-live"/></svg>
                  <span style="font-size: 11px; color: var(--text-secondary);">847 watching</span>
                </div>
              </div>

              <!-- Simulated video content area -->
              <div style="flex: 1; display: flex; align-items: center; justify-content: center;">
                <svg width="56" height="56" style="color:rgba(123,190,253,0.08);"><use href="#i-live"/></svg>
              </div>

              <!-- Title overlay -->
              <div>
                <div style="font-size: 15px; font-weight: 700;">Acoustic Friday</div>
                <div style="font-size: 11px; color: var(--text-secondary);">Rick DeJesus &bull; Started 12 min ago</div>
              </div>
            </div>

            <!-- Live chat + interaction area -->
            <div class="app-scroll" style="padding-top: 12px;">
              <!-- Chat messages -->
              <div style="margin-bottom: 10px;">
                <div style="display: flex; gap: 8px; margin-bottom: 8px;">
                  <div style="width: 24px; height: 24px; border-radius: 50%; background: var(--bg-surface); flex-shrink: 0;"></div>
                  <div>
                    <span style="font-size: 11px; font-weight: 600; color: var(--primary);">Sarah M.</span>
                    <span style="font-size: 11px; color: var(--text-secondary);"> Play Alive!!!</span>
                  </div>
                </div>
                <div style="display: flex; gap: 8px; margin-bottom: 8px;">
                  <div style="width: 24px; height: 24px; border-radius: 50%; background: var(--bg-surface); flex-shrink: 0;"></div>
                  <div>
                    <span style="font-size: 11px; font-weight: 600; color: var(--gold);">Mike T.</span>
                    <span style="font-size: 11px; color: var(--text-secondary);"> That was incredible</span>
                  </div>
                </div>
                <div style="display: flex; gap: 8px; margin-bottom: 8px;">
                  <div style="width: 24px; height: 24px; border-radius: 50%; background: var(--bg-surface); flex-shrink: 0;"></div>
                  <div>
                    <span style="font-size: 11px; font-weight: 600; color: var(--text-secondary);">Jess R.</span>
                    <span style="font-size: 11px; color: var(--text-secondary);"> Just ordered the Song Story</span>
                  </div>
                </div>
              </div>

              <!-- Subtle promo during live (not pushy, just a small mention) -->
              <div style="background: var(--bg-card); border-radius: 8px; padding: 10px 12px; display: flex; align-items: center; gap: 10px;">
                <svg width="14" height="14" style="color:var(--primary); flex-shrink: 0;"><use href="#i-pen"/></svg>
                <div style="flex: 1; font-size: 11px; color: var(--text-secondary);">Rick mentioned "Alive" &mdash; <span style="color: var(--primary); font-weight: 600;">handwritten lyrics available</span></div>
              </div>

              <!-- Chat input -->
              <div style="margin-top: 10px; display: flex; gap: 8px; align-items: center;">
                <div style="flex: 1; background: var(--bg-elevated); border-radius: 20px; padding: 8px 14px; font-size: 12px; color: var(--text-muted);">Say something...</div>
                <svg width="16" height="16" style="color:var(--primary);"><use href="#i-heart"/></svg>
              </div>
            </div>

            <div class="app-bottom-nav">
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-home"/></svg></span><span class="app-bnav-label">Home</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-music"/></svg></span><span class="app-bnav-label">Music</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-ticket"/></svg></span><span class="app-bnav-label">Shows</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-unlock"/></svg></span><span class="app-bnav-label">Unlocks</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-user"/></svg></span><span class="app-bnav-label">Profile</span></div>
            </div>
          </div>
        </div>
        <div class="screen-label">Live Video</div>
      </div>

    </div>
  </div>
</section>

<!-- SECTION: REVENUE MODEL -->
<section class="section">
  <h3>Revenue Model</h3>
  <h2>Conservative Projections</h2>
  <p class="subtitle">Based on modest conversion from the existing audience. No growth required. The bundle upsell rate assumes 30% of lyric sheet buyers upgrade.</p>

  <div class="rev-table-wrap">
  <table class="rev-table">
    <thead><tr><th>Product</th><th>Price</th><th>Monthly Volume</th><th>Monthly Rev</th></tr></thead>
    <tbody>
      <tr><td>Lyric Sheets (standalone)</td><td>$99-149</td><td>14 orders</td><td>$1,680</td></tr>
      <tr><td>Song Story Bundles (upsell from lyric sheets)</td><td>$249-299</td><td>6 orders</td><td>$1,644</td></tr>
      <tr><td>Personal Video Dedications</td><td>$99-149</td><td>12 orders</td><td>$1,440</td></tr>
      <tr><td>Fan Package Bundles</td><td>$399</td><td>5 orders</td><td>$1,995</td></tr>
      <tr><td>Acoustic Voice Memos</td><td>$99-199</td><td>8 orders</td><td>$1,192</td></tr>
      <tr><td>Inner Circle / Video Calls</td><td>$499</td><td>2 orders</td><td>$998</td></tr>
      <tr><td>VIP Tour Packages</td><td>$149-299</td><td>10/show</td><td>$2,000</td></tr>
      <tr><td><strong>Total (excl. VIP)</strong></td><td></td><td><strong>47 orders</strong></td><td>$9,949/mo</td></tr>
    </tbody>
  </table>
  </div>

  <div class="stats-row">
    <div class="stat"><div class="num">$119K</div><div class="label">Annual Potential</div></div>
    <div class="stat"><div class="num">~2hrs</div><div class="label">Rick's Weekly Time</div></div>
    <div class="stat"><div class="num">$212</div><div class="label">Avg Order Value</div></div>
    <div class="stat"><div class="num">$0</div><div class="label">Inventory Cost</div></div>
  </div>
</section>

<!-- SECTION: LABEL STRATEGY -->
<section class="section">
  <h3>Content Strategy</h3>
  <h2>No Label Required</h2>
  <p class="subtitle">The first three albums are locked by Virgin Records. That's fine &mdash; the app doesn't need them.</p>
  <div class="grid-2">
    <div class="card"><h4>What fans are buying</h4><p>Not catalog access &mdash; that's on Spotify for free. They're buying Rick, unfiltered. Handwritten lyrics, personal videos, voice memos. None of that requires a label's permission.</p></div>
    <div class="card"><h4>4 independent albums</h4><p>Getaway, Notorious, Shine On, and Power are fully owned. Four albums of streamable content, Song Stories, lyric sheets, and behind-the-scenes material. Plenty to launch.</p></div>
    <div class="card"><h4>The narrative sells itself</h4><p>"The real Adelitas Way. No label, no middleman, direct from Rick." Independence isn't a limitation &mdash; it's the brand.</p></div>
    <div class="card"><h4>New music drops here first</h4><p>Every future release debuts in the app before streaming. Fans get a reason to download, stay, and keep coming back.</p></div>
  </div>
</section>

<!-- SECTION: PAYOUT SIMPLICITY -->
<section class="section">
  <h3>Why Free Streaming</h3>
  <h2>Simplify the Money</h2>
  <p class="subtitle">Giving the music away for free inside the app isn't just a growth strategy &mdash; it dramatically simplifies the business.</p>
  <div class="grid-2">
    <div class="card"><h4>No per-play royalties</h4><p>Traditional streaming requires tracking every play and calculating royalty splits across writers, performers, publishers, and labels. Free in-app streaming eliminates all of that. Zero payout complexity.</p></div>
    <div class="card"><h4>Single revenue stream</h4><p>All money flows through unlocks, bundles, and VIP packages via Stripe. One payment processor, one payout destination. Clean accounting, no reconciliation headaches.</p></div>
    <div class="card"><h4>Music as marketing</h4><p>The independent catalog drives app usage and creates the moments where fans discover unlocks naturally. Every play is a touchpoint. The music pays for itself by converting listeners into buyers.</p></div>
    <div class="card"><h4>No distributor middlemen</h4><p>No DistroKid, no TuneCore, no label splits on streaming revenue. The music lives in the app. Premium products generate the income. The entire margin stays in-house.</p></div>
  </div>
</section>

<!-- SECTION: RICK'S DASHBOARD -->
<section class="section-full" style="background: linear-gradient(180deg, rgba(123,190,253,0.02) 0%, transparent 100%);">
  <div class="section-inner">
    <h3>Rick's Dashboard</h3>
    <h2>Everything From His Phone</h2>
    <p class="subtitle">While on tour, Rick runs his life from his phone. The admin experience has to match. Every action &mdash; fulfilling orders, uploading content, going live, managing tour dates &mdash; is designed for one-handed use on a phone screen. No laptop required, ever.</p>

    <div class="phones-row" style="margin-top: 40px;">

      <!-- ADMIN PHONE 1: ORDER QUEUE -->
      <div class="phone-wrap">
        <div class="phone-frame">
          <div class="phone-screen">
            <div class="phone-notch"></div>
            <div class="app-header">
              <div class="app-header-title" style="font-size: 20px;">Orders</div>
              <div style="display: flex; gap: 8px; align-items: center;">
                <div style="background: var(--primary); padding: 2px 8px; border-radius: 10px; font-size: 11px; font-weight: 700; color: var(--bg-dark);">7 new</div>
              </div>
            </div>
            <div class="app-pill-row">
              <div class="app-pill active">Pending</div>
              <div class="app-pill">Fulfilled</div>
              <div class="app-pill">All</div>
            </div>
            <div class="app-scroll">
              <!-- Order 1 -->
              <div style="background: var(--bg-card); border-radius: 10px; padding: 12px; margin-bottom: 8px; border-left: 3px solid var(--gold);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                  <div>
                    <div style="font-size: 13px; font-weight: 700;">Song Story Bundle</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">"Dog on a Leash" &bull; For: Sarah M.</div>
                    <div style="font-size: 10px; color: var(--text-muted); margin-top: 2px;">Dedication: "To my daughter on her 16th birthday"</div>
                  </div>
                  <div style="font-size: 14px; font-weight: 700; color: var(--gold);">$249</div>
                </div>
                <div style="display: flex; gap: 6px; margin-top: 8px;">
                  <div style="font-size: 10px; font-weight: 600; padding: 5px 12px; border-radius: 16px; background: var(--primary); color: var(--bg-dark); display: flex; align-items: center; gap: 4px;"><svg width="10" height="10"><use href="#i-video"/></svg>Record Video</div>
                  <div style="font-size: 10px; font-weight: 600; padding: 5px 12px; border-radius: 16px; background: var(--bg-elevated); color: var(--text-secondary); display: flex; align-items: center; gap: 4px;"><svg width="10" height="10"><use href="#i-pen"/></svg>Write Lyrics</div>
                </div>
              </div>

              <!-- Order 2 -->
              <div style="background: var(--bg-card); border-radius: 10px; padding: 12px; margin-bottom: 8px; border-left: 3px solid var(--primary);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                  <div>
                    <div style="font-size: 13px; font-weight: 700;">Lyric Sheet</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">"Alive" &bull; For: Mike T.</div>
                    <div style="font-size: 10px; color: var(--text-muted); margin-top: 2px;">No dedication</div>
                  </div>
                  <div style="font-size: 14px; font-weight: 700; color: var(--primary);">$99</div>
                </div>
                <div style="display: flex; gap: 6px; margin-top: 8px;">
                  <div style="font-size: 10px; font-weight: 600; padding: 5px 12px; border-radius: 16px; background: var(--primary); color: var(--bg-dark); display: flex; align-items: center; gap: 4px;"><svg width="10" height="10"><use href="#i-pen"/></svg>Write Lyrics</div>
                </div>
              </div>

              <!-- Order 3 -->
              <div style="background: var(--bg-card); border-radius: 10px; padding: 12px; margin-bottom: 8px; border-left: 3px solid var(--primary);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                  <div>
                    <div style="font-size: 13px; font-weight: 700;">Video Shoutout</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">Birthday &bull; For: Jess R.</div>
                    <div style="font-size: 10px; color: var(--text-muted); margin-top: 2px;">"Happy 30th, you're amazing"</div>
                  </div>
                  <div style="font-size: 14px; font-weight: 700; color: var(--primary);">$99</div>
                </div>
                <div style="display: flex; gap: 6px; margin-top: 8px;">
                  <div style="font-size: 10px; font-weight: 600; padding: 5px 12px; border-radius: 16px; background: var(--primary); color: var(--bg-dark); display: flex; align-items: center; gap: 4px;"><svg width="10" height="10"><use href="#i-video"/></svg>Record Video</div>
                </div>
              </div>

              <!-- Order 4 -->
              <div style="background: var(--bg-card); border-radius: 10px; padding: 12px; margin-bottom: 8px; border-left: 3px solid var(--gold);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                  <div>
                    <div style="font-size: 13px; font-weight: 700;">Inner Circle</div>
                    <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">Full bundle + call &bull; For: Dana K.</div>
                  </div>
                  <div style="font-size: 14px; font-weight: 700; color: var(--gold);">$499</div>
                </div>
                <div style="display: flex; gap: 6px; margin-top: 8px;">
                  <div style="font-size: 10px; font-weight: 600; padding: 5px 12px; border-radius: 16px; background: var(--primary); color: var(--bg-dark);">Start Fulfillment</div>
                </div>
              </div>

              <!-- Earnings summary -->
              <div style="background: var(--bg-elevated); border-radius: 10px; padding: 12px; margin-top: 4px; text-align: center;">
                <div style="font-size: 10px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px;">This Week</div>
                <div style="font-size: 28px; font-weight: 800; color: var(--primary); margin-top: 4px;">$1,844</div>
                <div style="font-size: 10px; color: var(--text-muted); margin-top: 2px;">12 orders fulfilled &bull; 7 pending</div>
              </div>
            </div>

            <div class="app-bottom-nav">
              <div class="app-bnav-item active"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-list"/></svg></span><span class="app-bnav-label">Orders</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-music"/></svg></span><span class="app-bnav-label">Content</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-live"/></svg></span><span class="app-bnav-label">Go Live</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-calendar"/></svg></span><span class="app-bnav-label">Shows</span></div>
            </div>
          </div>
        </div>
        <div class="screen-label">Order Queue</div>
      </div>

      <!-- ADMIN PHONE 2: CONTENT MANAGEMENT -->
      <div class="phone-wrap">
        <div class="phone-frame">
          <div class="phone-screen">
            <div class="phone-notch"></div>
            <div class="app-header">
              <div class="app-header-title" style="font-size: 20px;">Content</div>
              <div style="background: var(--primary); width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <svg width="14" height="14" style="color:var(--bg-dark);"><use href="#i-pen"/></svg>
              </div>
            </div>
            <div class="app-scroll">
              <!-- Quick actions -->
              <div class="app-section-label">Quick Actions</div>
              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 14px;">
                <div style="background: var(--bg-card); border-radius: 10px; padding: 14px; text-align: center;">
                  <svg width="22" height="22" style="color:var(--primary);"><use href="#i-music"/></svg>
                  <div style="font-size: 11px; font-weight: 600; margin-top: 6px;">Upload Song</div>
                </div>
                <div style="background: var(--bg-card); border-radius: 10px; padding: 14px; text-align: center;">
                  <svg width="22" height="22" style="color:var(--primary);"><use href="#i-video"/></svg>
                  <div style="font-size: 11px; font-weight: 600; margin-top: 6px;">Record Video</div>
                </div>
                <div style="background: var(--bg-card); border-radius: 10px; padding: 14px; text-align: center;">
                  <svg width="22" height="22" style="color:var(--primary);"><use href="#i-mic"/></svg>
                  <div style="font-size: 11px; font-weight: 600; margin-top: 6px;">Voice Memo</div>
                </div>
                <div style="background: var(--bg-card); border-radius: 10px; padding: 14px; text-align: center;">
                  <svg width="22" height="22" style="color:var(--primary);"><use href="#i-pen"/></svg>
                  <div style="font-size: 11px; font-weight: 600; margin-top: 6px;">New Post</div>
                </div>
              </div>

              <!-- Recent uploads -->
              <div class="app-section-label">Recent Uploads</div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: var(--bg-card);"><svg width="16" height="16" style="color:var(--primary);"><use href="#i-music"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Still Standing (Early Drop)</div>
                  <div class="playlist-meta">Song &bull; Published 2 days ago</div>
                </div>
                <div class="app-mini-badge free">Live</div>
              </div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: var(--bg-card);"><svg width="16" height="16" style="color:var(--primary);"><use href="#i-video"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Song Story: "Notorious"</div>
                  <div class="playlist-meta">Video &bull; Published 5 days ago</div>
                </div>
                <div class="app-mini-badge free">Live</div>
              </div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: var(--bg-card);"><svg width="16" height="16" style="color:var(--primary);"><use href="#i-mic"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Acoustic: "Ready for War"</div>
                  <div class="playlist-meta">Voice memo &bull; Draft</div>
                </div>
                <div class="app-mini-badge" style="background: var(--bg-elevated); color: var(--text-muted);">Draft</div>
              </div>

              <!-- Manage catalog -->
              <div class="app-section-label" style="margin-top: 12px;">Catalog</div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: linear-gradient(135deg, #3a1a1a, #1a0a0a);"><svg width="16" height="16" style="color:var(--primary); opacity: 0.6;"><use href="#i-disc"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Power</div>
                  <div class="playlist-meta">10 songs &bull; 8 lyric sheets active</div>
                </div>
              </div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: linear-gradient(135deg, #1a2a3a, #0a1020);"><svg width="16" height="16" style="color:var(--primary); opacity: 0.6;"><use href="#i-disc"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Shine On</div>
                  <div class="playlist-meta">12 songs &bull; 5 lyric sheets active</div>
                </div>
              </div>
              <div class="playlist-row">
                <div class="playlist-art" style="background: linear-gradient(135deg, #2a2a1a, #10100a);"><svg width="16" height="16" style="color:var(--primary); opacity: 0.6;"><use href="#i-disc"/></svg></div>
                <div class="playlist-info">
                  <div class="playlist-name">Notorious</div>
                  <div class="playlist-meta">10 songs &bull; 3 lyric sheets active</div>
                </div>
              </div>
            </div>

            <div class="app-bottom-nav">
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-list"/></svg></span><span class="app-bnav-label">Orders</span></div>
              <div class="app-bnav-item active"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--primary);"><use href="#i-music"/></svg></span><span class="app-bnav-label">Content</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-live"/></svg></span><span class="app-bnav-label">Go Live</span></div>
              <div class="app-bnav-item"><span class="app-bnav-icon"><svg width="18" height="18" style="color:var(--text-secondary);"><use href="#i-calendar"/></svg></span><span class="app-bnav-label">Shows</span></div>
            </div>
          </div>
        </div>
        <div class="screen-label">Content Management</div>
      </div>

    </div>

    <!-- Dashboard capabilities breakdown -->
    <div class="grid-3" style="margin-top: 40px;">
      <div class="card">
        <h4>Order Fulfillment</h4>
        <p>New orders appear with the fan's name, dedication request, and product type. One tap to open camera and record a video. One tap to mark a lyric sheet as written and trigger shipping. Color-coded by priority &mdash; bundles at the top.</p>
      </div>
      <div class="card">
        <h4>Content Upload</h4>
        <p>Upload a new song, record a video, capture a voice memo, or write a feed post &mdash; all from the phone. Camera and mic access are one tap away. Drafts save automatically. Publish when ready.</p>
      </div>
      <div class="card">
        <h4>Go Live</h4>
        <p>One button to start a live stream. The app handles the rest &mdash; push notifications go out to fans, chat activates, and contextual unlock prompts surface automatically. Rick just talks to his audience.</p>
      </div>
      <div class="card">
        <h4>Tour Management</h4>
        <p>Add shows with venue, date, ticket link, and VIP package details. Set VIP capacity limits per show. Track VIP sales. All from the phone while on the road.</p>
      </div>
      <div class="card">
        <h4>Earnings Dashboard</h4>
        <p>Real-time revenue by day, week, and month. Breakdown by product type. See which songs drive the most unlock purchases. No spreadsheets &mdash; just a clean summary on the phone.</p>
      </div>
      <div class="card">
        <h4>Push Notifications</h4>
        <p>Send a notification to all fans with one tap: new song drop, going live, new tour date, limited bundle available. The direct line to the audience, owned entirely by AW.</p>
      </div>
    </div>
  </div>
</section>

<!-- SECTION: TECH STACK -->
<section class="section">
  <h3>Implementation</h3>
  <h2>Technical Overview</h2>
  <div class="grid-2">
    <div class="card"><h4>Fan App</h4><p>Flutter (iOS + Android from single codebase). Audio streaming with playlists and offline caching, live video, push notifications, in-app purchases via Stripe. Spotify-inspired UI.</p></div>
    <div class="card"><h4>Admin App</h4><p>Flutter (same codebase, admin role). Rick logs in and sees his dashboard &mdash; order queue, content tools, go-live, show management. Phone-native, not a shrunken website.</p></div>
    <div class="card"><h4>Backend</h4><p>Laravel API handling orders, content delivery, user accounts, tour dates, VIP packages, and fulfillment workflow. Stripe for all payments &mdash; single payout destination, no royalty complexity.</p></div>
    <div class="card"><h4>Live Video</h4><p>WebRTC or RTMP-based live streaming with in-app chat. Rick taps "Go Live" on his phone, fans get a push notification. Contextual unlock prompts surface automatically during streams.</p></div>
    <div class="card"><h4>Shows &amp; VIP</h4><p>Tour date listings with ticket links and in-app VIP package sales. Meet &amp; greet, early entry, signed merch bundles. Sold directly, no third-party ticketing cut.</p></div>
    <div class="card"><h4>Content Delivery</h4><p>Audio streaming with offline caching and playlists. Video unlocks via secure link. Lyric sheets trigger shipping flow with tracking. Free streaming eliminates per-play payout complexity.</p></div>
  </div>
</section>

</body>
</html>
