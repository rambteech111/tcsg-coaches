<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'The Career Strategy Group \u2014 A curated marketplace for professional women')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Georgia&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    :root{
    --plum:#1E2B4D; --berry:#EA5F72; --coral:#EA5F72; --coral-d:#D14E62;
    --gold:#D9A441; --cream:#F7F4EF; --blush:#EFEBE3; --ink:#222A3D; --muted:#6B7488; --line:#E4E0D8; --white:#fff;
  }
  *{margin:0;padding:0;box-sizing:border-box;}
  html{scroll-behavior:smooth;}
  body{font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif;color:var(--ink);line-height:1.6;background:var(--white);font-size:17px;}
  h1,h2,h3{font-family:Georgia,'Times New Roman',serif;font-weight:600;line-height:1.14;letter-spacing:-.01em;}
  .wrap{max-width:1120px;margin:0 auto;padding:0 28px;}
  a{color:inherit;text-decoration:none;}
  .btn{display:inline-block;background:var(--coral);color:#fff;font-weight:700;padding:16px 32px;border-radius:100px;font-size:17px;border:none;cursor:pointer;transition:transform .15s,background .15s;}
  .btn:hover{transform:translateY(-2px);background:var(--coral-d);}
  .btn-plum{background:var(--plum);}
  .btn-ghost{background:transparent;border:2px solid var(--plum);color:var(--plum);}
  .btn-white{background:#fff;color:var(--plum);}
  .eyebrow{font-size:14px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--berry);}

  nav{position:sticky;top:0;z-index:50;background:rgba(255,255,255,.95);backdrop-filter:blur(8px);border-bottom:1px solid var(--line);}
  nav .wrap{display:flex;align-items:center;justify-content:space-between;height:76px;}
  .logo{display:flex;align-items:center;gap:12px;font-family:Georgia,serif;font-weight:700;font-size:19px;color:var(--plum);}
  .logo .logo-mark{height:46px;width:auto;display:block;flex-shrink:0;}
  .logo .logo-text{display:inline-flex;flex-direction:column;align-items:flex-start;line-height:1.3;}
  .logo .sub{display:block;font-family:'Inter',sans-serif;font-weight:600;font-size:10.5px;letter-spacing:.09em;text-transform:uppercase;color:var(--muted);margin-bottom:2px;}
  .logo .sub em{font-style:italic;text-transform:none;}
  .nav-links{display:flex;align-items:center;gap:20px;font-size:14px;font-weight:600;color:var(--plum);}
  .nav-links a.cta{background:var(--plum);color:#fff;padding:10px 20px;border-radius:100px;}
  @media(max-width:860px){.nav-links a:not(.cta){display:none;}}

  .hero{background:var(--plum);color:#fff;position:relative;overflow:hidden;}
  .hero::after{content:"";position:absolute;right:-140px;top:-130px;width:540px;height:540px;border-radius:50%;background:radial-gradient(circle at 40% 40%,rgba(232,96,76,.36),transparent 66%);}
  .hero::before{content:"";position:absolute;left:-170px;bottom:-170px;width:540px;height:540px;border-radius:50%;background:radial-gradient(circle at 55% 45%,rgba(232,96,76,.14),transparent 70%);}
  .hero-inner{position:relative;z-index:2;max-width:940px;margin:0 auto;padding:124px 28px 112px;text-align:center;}
  @media(max-width:640px){.hero-inner{padding:78px 24px 66px;}}
  .hero-inner .eyebrow{color:var(--gold);}
  .hero-inner h1{font-size:70px;line-height:1.03;letter-spacing:-.025em;color:#fff;margin:20px auto 26px;}
  .hero-inner h1 .em{color:var(--coral);font-style:italic;}
  .hero-inner p{font-size:22px;color:#C6CDDA;max-width:660px;margin:0 auto 38px;line-height:1.55;}
  .hero-inner .row{display:flex;gap:22px;justify-content:center;flex-wrap:wrap;align-items:center;}
  .hero-inner .arrowlink{color:#fff;font-weight:700;font-size:16px;}
  .hero-inner .arrowlink:hover{color:var(--coral);}
  .hero-trust{margin-top:36px;display:flex;justify-content:center;flex-wrap:wrap;}
  .hero-trust span{color:#9AA6BC;font-size:15px;font-weight:600;letter-spacing:.02em;padding:4px 22px;position:relative;}
  .hero-trust span + span::before{content:"";position:absolute;left:-2px;top:50%;transform:translateY(-50%);width:5px;height:5px;border-radius:50%;background:var(--coral);}
  @media(max-width:640px){.hero-inner h1{font-size:40px;}}

  .trustband{background:#fff;border-top:1px solid var(--line);border-bottom:1px solid var(--line);padding:56px 28px;}
  .trustband .eyebrow{text-align:center;margin-bottom:30px;}
  .trustgrid{display:grid;grid-template-columns:repeat(5,1fr);gap:14px;max-width:1120px;margin:0 auto;background:transparent;}
  @media(max-width:860px){.trustgrid{grid-template-columns:repeat(2,1fr);}}
  .trust-tile{background:transparent;aspect-ratio:1.6/1;display:flex;align-items:center;justify-content:center;padding:20px;position:relative;overflow:hidden;}
  .trust-face{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;padding:20px;opacity:1;transition:opacity .6s ease;}
  .trust-face.out{opacity:0;}
  .trust-tile img{max-width:100%;max-height:56px;object-fit:contain;}
  .trust-tile .mark{width:56px;height:56px;border-radius:12px;color:#fff;display:flex;align-items:center;justify-content:center;font-family:Georgia,serif;font-weight:700;font-size:15px;}
  .marquee{overflow:hidden;flex:1;-webkit-mask-image:linear-gradient(90deg,transparent,#000 6%,#000 94%,transparent);mask-image:linear-gradient(90deg,transparent,#000 6%,#000 94%,transparent);}
  .mtrack{display:flex;align-items:center;gap:58px;width:max-content;animation:scrollx 26s linear infinite;}
  .mtrack:hover{animation-play-state:paused;}
  @keyframes scrollx{from{transform:translateX(0);}to{transform:translateX(-50%);}}
  .reviewband-section{padding-bottom:0;}
  .reviewband{overflow:hidden;-webkit-mask-image:linear-gradient(90deg,transparent,#000 4%,#000 96%,transparent);mask-image:linear-gradient(90deg,transparent,#000 4%,#000 96%,transparent);padding-bottom:70px;}
  .rtrack{display:flex;gap:22px;width:max-content;animation:scrollx 70s linear infinite;padding:0 22px;}
  .rtrack:hover{animation-play-state:paused;}
  .rcard{background:#fff;border-radius:16px;padding:24px 26px;width:320px;flex:none;box-shadow:0 1px 3px rgba(30,43,77,.08);}
  .rcard .stars{color:var(--gold);font-size:14px;letter-spacing:2px;margin-bottom:10px;}
  .rcard p{font-size:15px;line-height:1.55;color:var(--ink);margin:0;}
  .rcard .who{margin-top:14px;font-size:13px;font-weight:700;color:var(--muted);}
  .asseen{background:var(--plum);padding:58px 28px;text-align:center;overflow:hidden;}
  .asseen .eyebrow{color:var(--gold);margin-bottom:26px;}
  .asseen .marquee{max-width:1120px;margin:0 auto;}
  .asseen .mtrack{animation-duration:30s;}
  .asseen .pr{font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Helvetica,Arial,sans-serif;font-weight:700;font-size:19px;letter-spacing:-.01em;color:var(--plum);opacity:.55;white-space:nowrap;}
  .pressgrid{display:grid;grid-template-columns:repeat(6,1fr);gap:14px;max-width:1120px;margin:0 auto;}
  .press-tile{background:#fff;border-radius:10px;aspect-ratio:1.55/1;display:flex;align-items:center;justify-content:center;padding:14px;}
  .press-mark{display:flex;align-items:center;justify-content:center;}
  @media(max-width:860px){.pressgrid{grid-template-columns:repeat(3,1fr);}}
  @media(max-width:480px){.pressgrid{grid-template-columns:repeat(2,1fr);}}

  .statband{background:var(--cream);padding:84px 28px 34px;}
  .statband .in{max-width:1120px;margin:0 auto;display:grid;grid-template-columns:repeat(4,1fr);gap:30px;}
  @media(max-width:760px){.statband .in{grid-template-columns:1fr 1fr;gap:40px 24px;}}
  .statband .s b{font-family:Georgia,serif;font-size:46px;color:var(--plum);display:block;line-height:1;}
  .statband .s span{font-size:16px;color:var(--muted);margin-top:12px;display:block;max-width:230px;line-height:1.5;}
  .statband .src{max-width:1120px;margin:34px auto 0;font-size:12px;color:var(--muted);text-align:center;line-height:1.7;}

  .manifesto{background:var(--plum);color:#fff;padding:98px 28px;text-align:center;position:relative;overflow:hidden;}
  .manifesto svg{opacity:.85;}
  .manifesto-overlay{position:absolute;inset:0;background:linear-gradient(180deg,rgba(30,43,77,.55) 0%,rgba(30,43,77,.35) 40%,rgba(30,43,77,.92) 100%);}
  .manifesto .in{max-width:900px;margin:0 auto;position:relative;z-index:1;}
  .manifesto .eyebrow{color:var(--gold);}
  .manifesto h2{font-size:46px;line-height:1.14;color:#fff;margin-top:14px;}
  .manifesto p{font-size:19px;color:#C6CDDA;margin-top:20px;max-width:680px;margin-left:auto;margin-right:auto;}
  .manifesto p.stat-lead{font-family:Georgia,'Times New Roman',serif;font-size:19px;line-height:1.55;max-width:760px;color:#C6CDDA;}
  .manifesto h2.closer{font-size:32px;line-height:1.3;margin-top:32px;max-width:820px;margin-left:auto;margin-right:auto;}
  @media(max-width:640px){.manifesto h2{font-size:32px;}.manifesto h2.closer{font-size:24px;}}

  .section{padding:88px 0;}
  .section.cream{background:var(--cream);}
  .section.blush{background:var(--blush);}
  .section.dark{background:var(--plum);color:#fff;}
  .section.dark h2{color:#fff;}
  .section.dark .center p{color:rgba(255,255,255,.75);}
  .section.dark .hw-src{color:rgba(255,255,255,.6);}
  .center{text-align:center;max-width:720px;margin:0 auto 52px;}
  .center h2{font-size:42px;margin:14px 0 16px;color:var(--plum);}
  .center p{font-size:20px;color:var(--muted);}
  .grid{display:grid;gap:20px;}
  .cols-3{grid-template-columns:repeat(3,1fr);}
  @media(max-width:860px){.cols-3{grid-template-columns:1fr;}}
  .cols-2{grid-template-columns:repeat(2,1fr);}
  @media(max-width:860px){.cols-2{grid-template-columns:1fr;}}
  .why-card{border-radius:18px;padding:28px 30px;}
  .why-ic{width:38px;height:38px;margin-bottom:16px;}
  .why-card.dark .why-ic{color:#fff;}
  .why-card.light .why-ic{color:var(--plum);}
  .why-card h3{font-size:19px;margin-bottom:8px;}
  .why-card p{font-size:16px;line-height:1.55;}
  .why-card.dark{background:var(--plum);}
  .why-card.dark h3{color:#fff;}
  .why-card.dark p{color:#C6CDDA;}
  .why-card.light{background:var(--coral);}
  .why-card.light h3{color:var(--plum);}
  .why-card.light p{color:rgba(30,43,77,.78);}
  .section.dark .why-card{background:transparent;border:none;border-top:2px solid rgba(255,255,255,.18);padding:24px 4px 0;}
  .section.dark .why-card h3{color:#fff;}
  .section.dark .why-card p{color:rgba(255,255,255,.68);}
  .section.dark .why-card .why-ic{color:var(--gold);}

  /* steps (jobtest-style numbered flow) */
  .steps{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;}
  @media(max-width:900px){.steps{grid-template-columns:1fr;}}
  @media(max-width:560px){.steps{grid-template-columns:1fr;}}
  .step{text-align:center;background:#fff;border:1px solid var(--line);border-radius:18px;padding:32px 24px;box-shadow:0 8px 24px rgba(30,43,77,.05);}
  .step .n{width:52px;height:52px;margin:0 auto 14px;border-radius:50%;background:var(--coral);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;font-size:20px;}
  .step h3{font-size:20px;color:var(--plum);margin-bottom:6px;}
  .step p{font-size:16px;color:var(--muted);}
  .hw-stat{display:inline-flex;align-items:baseline;gap:12px;margin-top:24px;background:#fff;border:1px solid var(--line);border-radius:100px;padding:12px 26px;font-size:17px;color:var(--ink);box-shadow:0 8px 24px rgba(30,43,77,.06);}
  .hw-stat b{font-family:Georgia,serif;font-size:28px;color:var(--coral);line-height:1;}
  .hw-src{font-size:12px;color:var(--muted);margin-top:10px;}

  /* problem selector */
  .path{background:#fff;border:1px solid var(--line);border-radius:18px;padding:28px;}
  .path .ic{font-size:28px;margin-bottom:16px;width:56px;height:56px;border-radius:16px;display:flex;align-items:center;justify-content:center;}
  .path h3{font-size:22px;color:var(--plum);margin-bottom:8px;}
  .path p{font-size:17px;color:var(--muted);}
  .path-whisper{margin-top:14px;padding-top:14px;border-top:1px dashed var(--line);font-style:italic;font-size:15px;color:var(--muted);line-height:1.6;}
  .path-whisper .pw-q{font-style:italic;background:linear-gradient(180deg,transparent 58%,#FBEFAA 58%);}

  /* selectivity band */
  .selband{background:var(--plum);color:#fff;border-radius:24px;padding:52px 48px;text-align:center;}
  .selband h2{color:#fff;font-size:36px;margin-bottom:14px;}
  .selband p{color:#D7DCE6;font-size:19px;max-width:680px;margin:0 auto;}

  /* coaches */
  .match-banner{display:none;background:#fff;border:1px solid var(--line);border-radius:20px;padding:30px 34px;margin-bottom:44px;box-shadow:0 10px 30px rgba(51,32,63,.06);}
  .match-banner.show{display:block;}
  .match-banner .mb-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:6px;}
  .match-banner h2{font-size:26px;color:var(--plum);margin:2px 0 8px;}
  .match-banner p{font-size:17px;color:var(--muted);max-width:640px;}
  .mb-reset{background:transparent;border:none;color:var(--plum);font-weight:700;font-size:13.5px;cursor:pointer;text-decoration:underline;padding:0;}
  .mb-reset:hover{color:var(--coral-d);}
  .filters{display:flex;gap:12px;flex-wrap:wrap;justify-content:center;margin-bottom:40px;}
  .chip{border:1.5px solid var(--line);background:#fff;color:var(--plum);font-weight:600;font-size:15px;padding:10px 20px;border-radius:100px;cursor:pointer;transition:.15s;}
  .chip:hover{border-color:var(--coral);}
  .chip.active{background:var(--plum);color:#fff;border-color:var(--plum);}
  .coachgrid{display:grid;grid-template-columns:repeat(3,1fr);gap:26px;}
  .coachgrid{justify-content:center;grid-template-columns:repeat(auto-fit,minmax(260px,340px)) !important;}
  @media(max-width:620px){.coachgrid{grid-template-columns:1fr !important;}}
  @media(max-width:900px){.coachgrid{grid-template-columns:1fr 1fr;}}
  @media(max-width:600px){.coachgrid{grid-template-columns:1fr;}}
  .coach{background:#fff;border-radius:22px;overflow:hidden;box-shadow:0 10px 30px rgba(51,32,63,.08);transition:.2s;display:flex;flex-direction:column;}
  .coach:hover{transform:translateY(-5px);box-shadow:0 26px 54px rgba(51,32,63,.18);}
  .coach.hide{display:none;}
  .ch-photo{position:relative;aspect-ratio:4/5;display:flex;align-items:center;justify-content:center;overflow:hidden;}
  .ch-photo .mono{font-family:Georgia,serif;font-size:132px;font-weight:600;color:rgba(255,255,255,.82);}
  .ch-badge{position:absolute;top:14px;left:14px;background:rgba(255,255,255,.94);color:var(--plum);font-size:12px;font-weight:700;padding:7px 13px;border-radius:100px;letter-spacing:.03em;box-shadow:0 4px 12px rgba(0,0,0,.12);}
  .ch-overlay{position:absolute;left:0;right:0;bottom:0;padding:22px 20px 18px;background:linear-gradient(to top,rgba(23,12,24,.85),rgba(23,12,24,0));color:#fff;}
  .ch-overlay .n{font-family:Georgia,serif;font-size:25px;font-weight:600;line-height:1.1;}
  .ch-overlay .t{font-size:15px;color:#D7DCE6;margin-top:2px;}
  .ch-body{padding:20px 22px 24px;display:flex;flex-direction:column;gap:14px;}
  .ch-meta{display:flex;align-items:center;justify-content:space-between;}
  .ch-stars{color:var(--gold);font-size:15px;letter-spacing:1px;}
  .ch-stars span{color:var(--muted);font-size:14px;letter-spacing:0;margin-left:3px;}
  .ch-price{font-weight:700;color:var(--plum);font-size:17px;}
  .ch-tagrow{display:flex;gap:8px;flex-wrap:wrap;}
  .ch-tagrow span{background:var(--blush);color:var(--berry);font-size:13px;font-weight:600;padding:5px 12px;border-radius:100px;}
  .ch-book{background:var(--coral);color:#fff;font-weight:700;text-align:center;padding:14px;border-radius:100px;font-size:16px;transition:.15s;}
  .ch-book:hover{background:var(--coral-d);}

  /* pricing */
  .price{background:#fff;border:1px solid var(--line);border-radius:20px;padding:32px 28px;display:flex;flex-direction:column;}
  .price.feat{border:2px solid var(--coral);position:relative;}
  .price .tag{position:absolute;top:-14px;left:28px;background:var(--coral);color:#fff;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:6px 14px;border-radius:100px;}
  .price h3{font-size:23px;color:var(--plum);margin-bottom:4px;}
  .price .amt{font-family:Georgia,serif;font-size:34px;color:var(--plum);margin:10px 0;}
  .price .amt small{font-size:17px;color:var(--muted);font-family:'Inter',sans-serif;}
  .price ul{list-style:none;margin:14px 0 26px;}
  .price li{font-size:17px;padding:8px 0 8px 26px;position:relative;}
  .price li::before{content:"✓";position:absolute;left:0;color:var(--coral);font-weight:700;}
  .price .btn{margin-top:auto;text-align:center;}

  /* testimonials */
  .quote{background:#fff;border:1px solid var(--line);border-radius:18px;padding:28px;}
  .quote .stars{color:var(--gold);font-size:18px;letter-spacing:2px;margin-bottom:12px;}
  .quote p{font-size:18px;color:var(--ink);margin-bottom:14px;}
  .quote .who{font-size:15px;color:var(--muted);font-weight:600;}

  /* guarantee */
  .guar{display:flex;align-items:center;gap:28px;background:var(--cream);border:1px solid var(--line);border-radius:22px;padding:40px 44px;flex-wrap:wrap;}
  .guar .seal{width:112px;height:112px;border-radius:50%;background:var(--berry);color:#fff;display:flex;align-items:center;justify-content:center;text-align:center;font-weight:700;font-size:13px;letter-spacing:.01em;line-height:1.3;flex:none;padding:0 12px;box-sizing:border-box;}
  .guar h3{font-size:26px;color:var(--plum);margin-bottom:6px;}
  .guar p{font-size:17px;color:var(--muted);max-width:640px;}

  .faq details{border-bottom:1px solid var(--line);padding:22px 0;}
  .faq summary{font-size:20px;font-weight:600;color:var(--plum);cursor:pointer;list-style:none;display:flex;justify-content:space-between;align-items:center;}
  .faq summary::-webkit-details-marker{display:none;}
  .faq summary::after{content:"+";font-size:26px;color:var(--coral);}
  .faq details[open] summary::after{content:"–";}
  .faq p{font-size:18px;color:var(--muted);padding-top:14px;max-width:820px;}

  .final{background:linear-gradient(160deg,#1E2B4D,#1E2B4D);color:#fff;text-align:center;padding:92px 0;position:relative;overflow:hidden;}
  .final svg{opacity:.85;}
  .final-overlay{position:absolute;inset:0;background:linear-gradient(180deg,rgba(30,43,77,.55) 0%,rgba(30,43,77,.35) 40%,rgba(30,43,77,.92) 100%);}
  .final .wrap{position:relative;z-index:1;}
  .final h2{font-size:44px;color:#fff;margin-bottom:16px;}
  .final p{color:#D7DCE6;font-size:19px;max-width:560px;margin:0 auto 32px;}
  footer{background:#222A3D;color:#8A93A6;font-size:15px;padding:38px 0;}
  footer .wrap{display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;flex-wrap:wrap;gap:16px;}
  footer .f-links{display:flex;flex-direction:column;justify-content:center;align-items:center;gap:6px;flex-wrap:wrap;}
  .apply-link{color:#C6CDDA;font-weight:600;text-decoration:underline;text-underline-offset:3px;}
  .apply-link:hover{color:#fff;}
  .apply-btn{background:transparent;border:1.5px solid #4A5470;color:#fff;font-weight:700;padding:10px 22px;border-radius:100px;font-size:14px;white-space:nowrap;transition:.15s;}
  .apply-btn:hover{background:#fff;color:var(--plum);border-color:#fff;}

  /* modal */
  .overlay{position:fixed;inset:0;background:rgba(20,10,20,.6);backdrop-filter:blur(3px);display:none;align-items:flex-start;justify-content:center;z-index:200;padding:40px 16px;overflow-y:auto;}
  .overlay.open{display:flex;}
  .modal{background:#fff;border-radius:24px;max-width:760px;width:100%;overflow:hidden;box-shadow:0 30px 80px rgba(0,0,0,.35);position:relative;animation:pop .2s ease;}
  .modal.wide{max-width:960px;}
  @keyframes pop{from{transform:translateY(14px);opacity:0}to{transform:none;opacity:1}}
  .modal .x{position:absolute;top:16px;right:16px;width:38px;height:38px;border-radius:50%;background:rgba(255,255,255,.92);border:none;font-size:17px;cursor:pointer;color:var(--plum);z-index:5;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 12px rgba(0,0,0,.12);}
  .pf-top{display:flex;}
  @media(max-width:600px){.pf-top{flex-direction:column;}}
  .pf-photo{position:relative;width:250px;flex:none;aspect-ratio:4/5;display:flex;align-items:center;justify-content:center;}
  @media(max-width:600px){.pf-photo{width:100%;aspect-ratio:16/9;}}
  .pf-photo .mono{font-family:Georgia,serif;font-size:112px;color:rgba(255,255,255,.85);}
  .pf-photo .ch-badge{position:absolute;top:14px;left:14px;}
  .pf-info{padding:26px 30px;flex:1;}
  .pf-info h3{font-size:28px;color:var(--plum);}
  .pf-info .role{color:var(--berry);font-weight:600;font-size:15px;margin-bottom:8px;}
  .pf-info .rate{color:var(--gold);font-size:16px;}
  .pf-info .rate span{color:var(--muted);font-size:13px;margin-left:4px;}
  .pf-info .pf-price{font-weight:700;color:var(--plum);margin:8px 0;font-size:16px;}
  .pf-info .bio{font-size:17px;color:var(--ink);margin-top:8px;}
  .pf-sec{padding:0 30px;}
  .pf-sec h4{font-size:13px;letter-spacing:.12em;text-transform:uppercase;color:var(--berry);margin:20px 0 12px;}
  .slots{display:flex;flex-wrap:wrap;gap:10px;}
  .slot{border:1.5px solid var(--line);background:#fff;color:var(--plum);font-weight:600;font-size:15px;padding:10px 16px;border-radius:12px;cursor:pointer;transition:.15s;}
  .slot:hover{border-color:var(--coral);}
  .slot.sel{background:var(--plum);color:#fff;border-color:var(--plum);}
  .pf-book{margin:18px 30px 6px;}
  .pf-book .btn{width:100%;text-align:center;}
  .pf-confirm{margin:12px 30px 6px;padding:13px 16px;background:#EAF7EE;border:1px solid #B7E0C4;border-radius:12px;color:#1E6B3A;font-size:14px;display:none;}
  .pf-confirm.show{display:block;}
  .pf-review{padding:0 30px 26px;}
  .pf-review .r{background:var(--cream);border-radius:14px;padding:15px 18px;margin-bottom:10px;}
  .pf-review .r .s{color:var(--gold);font-size:13px;}
  .pf-review .r p{font-size:16px;color:var(--ink);margin:6px 0 4px;}
  .pf-review .r .w{font-size:13px;color:var(--muted);}
  .match{padding:38px 34px 34px;}
  .match h3{font-size:28px;color:var(--plum);margin-bottom:8px;}
  .match .lead{color:var(--muted);margin-bottom:22px;font-size:17px;}
  .goals{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
  @media(max-width:520px){.goals{grid-template-columns:1fr;}}
  .goal{border:1.5px solid var(--line);border-radius:14px;padding:15px 16px;font-weight:600;color:var(--plum);cursor:pointer;transition:.15s;position:relative;}
  .goal:hover{border-color:var(--coral);background:var(--blush);}
  .goal.sel{border-color:var(--coral);background:var(--blush);box-shadow:inset 0 0 0 1.5px var(--coral);}
  .qz-continue{margin-top:18px;display:flex;justify-content:flex-end;}
  .qz-continue .btn{opacity:1;transition:.15s;}
  .qz-continue .btn.disabled{opacity:.4;pointer-events:none;}
  .qz-hint{font-size:13px;color:var(--muted);margin-top:14px;}
  .qz-tag{display:inline-block;margin:2px 0 8px;background:var(--blush);color:var(--berry);font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:4px 10px;border-radius:100px;}
  .ch-fit{align-self:flex-start;background:#E8F3EC;color:#2F6B45;font-size:13px;font-weight:700;padding:5px 12px;border-radius:100px;}
  .qz-rank{display:inline-block;margin:0 0 6px;background:var(--coral);color:#fff;font-size:11px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;padding:3px 9px;border-radius:100px;}
  .goal .qz-rank{display:table;}

  /* quiz (multi-step) */
  .qz-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;}
  .qz-back{background:#fff;border:1.5px solid var(--line);color:var(--plum);font-weight:700;font-size:13px;padding:9px 18px;border-radius:100px;cursor:pointer;transition:.15s;}
  .qz-back:hover{border-color:var(--coral);}
  .qz-dots{display:flex;gap:7px;}
  .qz-dot{width:8px;height:8px;border-radius:50%;background:var(--line);transition:.15s;}
  .qz-dot.on{background:var(--coral);width:20px;border-radius:5px;}
  .qz-step{font-size:13px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--berry);margin-bottom:10px;}
  .match h3 + .goals{margin-top:22px;}
  .qz-form{display:flex;flex-direction:column;gap:8px;}
  .qz-label{font-size:14px;font-weight:700;color:var(--plum);margin-top:6px;}
  .qz-input{width:100%;box-sizing:border-box;height:52px;padding:0 16px;border:1.5px solid var(--line);border-radius:14px;font:inherit;font-size:17px;color:var(--plum);background:#fff;}
  .qz-input:focus{outline:none;border-color:var(--coral);box-shadow:0 0 0 3px rgba(234,95,114,.18);}
  .qz-err{min-height:20px;font-size:14px;color:var(--coral-d);font-weight:600;}
  .qz-submit{width:100%;text-align:center;border:none;cursor:pointer;font-size:17px;}
  .qz-legal{text-align:center;font-size:14px;color:var(--muted);margin-top:8px;}
  .qz-legal a{color:inherit;text-decoration:underline;}
  .qz-done{padding:44px 34px;text-align:center;}
  .qz-done .n{width:64px;height:64px;margin:0 auto 18px;border-radius:50%;background:var(--coral);color:#fff;display:flex;align-items:center;justify-content:center;font-size:28px;}
  .qz-done h3{font-size:26px;color:var(--plum);margin-bottom:10px;}
  .qz-done p{color:var(--muted);font-size:17px;max-width:440px;margin:0 auto 26px;}

  /* full-page coach profile */
  #profilePage{background:var(--cream);display:none;min-height:100vh;}
  .pp-bar{position:sticky;top:0;background:rgba(255,255,255,.96);backdrop-filter:blur(8px);border-bottom:1px solid var(--line);height:70px;display:flex;align-items:center;justify-content:space-between;padding:0 28px;z-index:2;}
  .pp-back{color:var(--plum);font-weight:700;cursor:pointer;font-size:16px;}
  .pp-back:hover{color:var(--coral-d);}
  .pp-wrap{max-width:1000px;margin:0 auto;padding:44px 28px 90px;}
  .pp-hero{display:flex;gap:40px;align-items:center;background:linear-gradient(135deg,#fff 0%,var(--blush) 145%);border-radius:28px;padding:36px;position:relative;overflow:hidden;box-shadow:0 20px 50px rgba(51,32,63,.08);}
  .pp-hero::before{content:"";position:absolute;right:-90px;top:-100px;width:320px;height:320px;border-radius:50%;background:radial-gradient(circle at 40% 40%,rgba(232,96,76,.16),transparent 68%);pointer-events:none;}
  .pp-hero::after{content:"";position:absolute;left:30%;bottom:-140px;width:280px;height:280px;border-radius:50%;background:radial-gradient(circle at 55% 45%,rgba(217,164,65,.14),transparent 70%);pointer-events:none;}
  .pp-hero>*{position:relative;z-index:1;}
  @media(max-width:720px){.pp-hero{flex-direction:column;gap:24px;align-items:stretch;padding:24px;}}
  .pp-photo{width:280px;flex:none;aspect-ratio:4/5;border-radius:22px;position:relative;display:flex;align-items:center;justify-content:center;overflow:hidden;box-shadow:0 16px 40px rgba(51,32,63,.18);}
  @media(max-width:720px){.pp-photo{width:100%;aspect-ratio:16/10;}}
  .pp-photo .mono{font-family:Georgia,serif;font-size:150px;color:rgba(255,255,255,.85);}
  .pp-photo .ch-badge{position:absolute;top:16px;left:16px;}
  .pp-info{flex:1;}
  .pp-info h1{font-size:44px;color:var(--plum);margin:6px 0 2px;}
  .pp-info .role{color:var(--berry);font-weight:600;font-size:16px;margin-bottom:12px;}
  .pp-info .rate{color:var(--gold);font-size:17px;}
  .pp-info .rate span{color:var(--muted);font-size:14px;margin-left:4px;}
  .pp-info .pp-price{font-weight:700;color:var(--plum);font-size:18px;margin:14px 0;}
  .pp-info .bio{font-size:18px;color:var(--ink);margin-top:12px;}
  .pp-info .ch-tagrow{margin-top:6px;}
  .pp-h{font-size:14px;letter-spacing:.12em;text-transform:uppercase;color:var(--berry);margin:40px 0 16px;}
  .pp-wrap .slots{display:flex;flex-wrap:wrap;gap:12px;}
  .pp-book{margin-top:22px;max-width:320px;}
  .pp-book .btn{width:100%;text-align:center;}
  .pp-wrap .pf-review{padding:0;max-width:none;}
  .pp-wrap .pf-confirm{margin:16px 0 0;max-width:none;}
  /* profile depth */
  .pp-info .title{font-size:18px;color:var(--ink);font-weight:600;margin:2px 0 8px;}
  .pp-info .socials{margin-top:16px;display:flex;gap:10px;}
  .pp-info .socials a{width:36px;height:36px;border-radius:50%;background:var(--blush);color:var(--berry);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:12px;}
  .pp-body2{display:grid;grid-template-columns:1fr 320px;gap:46px;align-items:start;margin-top:50px;}
  @media(max-width:820px){.pp-body2{grid-template-columns:1fr;gap:36px;}}
  .pp-block{margin-bottom:28px;background:#fff;border-radius:20px;padding:30px 32px;box-shadow:0 10px 30px rgba(51,32,63,.06);}
  .pp-block h2{font-size:24px;color:var(--plum);margin-bottom:8px;}
  .pp-block h2::after{content:"";display:block;width:42px;height:3px;border-radius:2px;background:var(--coral);margin:10px 0 16px;}
  .pp-block h2 small{font-size:16px;color:var(--gold);font-weight:600;margin-left:8px;}
  .pp-block p{font-size:18px;color:var(--ink);line-height:1.75;}
  .pp-block p+p,.pp-block ul+p{margin-top:16px;}
  .pp-block .pp-list{margin:10px 0 0 22px;padding:0;font-size:18px;color:var(--ink);line-height:1.6;}
  .pp-block .pp-list li{margin:4px 0;padding-left:4px;}
  .style-tag{display:inline-flex;align-items:center;gap:8px;background:var(--blush);color:var(--berry);font:inherit;font-size:13px;font-weight:600;padding:5px 6px 5px 12px;border-radius:100px;border:1px solid transparent;cursor:pointer;transition:.15s;}
  .style-tag:hover,.style-tag[aria-expanded="true"]{border-color:var(--berry);background:#fff;}
  .style-tag:focus-visible{outline:2px solid var(--plum);outline-offset:2px;}
  .style-i{display:inline-flex;align-items:center;justify-content:center;width:18px;height:18px;border-radius:50%;background:var(--berry);color:#fff;font-family:Georgia,serif;font-style:italic;font-size:12px;font-weight:700;line-height:1;}
  .sr-only{position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);white-space:nowrap;}
  .style-info{position:relative;margin-top:14px;max-width:560px;background:#fff;border:1px solid var(--line);border-left:4px solid var(--berry);border-radius:14px;padding:18px 44px 18px 20px;box-shadow:0 10px 30px rgba(30,43,77,.08);}
  .style-info[hidden]{display:none;}
  .style-eyebrow{font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--berry);font-weight:700;}
  .style-info h4{font-family:Georgia,serif;font-size:20px;color:var(--plum);margin:4px 0 8px;}
  .style-info p{font-size:15px;line-height:1.6;color:var(--ink);margin:0;}
  .style-intro{margin-top:6px !important;}
  .style-sec{margin-top:14px;padding-top:14px;border-top:1px solid var(--line);}
  .style-info .style-foot{margin-top:10px;font-size:13px;color:var(--muted);}
  .style-x{position:absolute;top:8px;right:10px;background:none;border:0;font-size:22px;line-height:1;color:var(--muted);cursor:pointer;padding:4px;}
  .creds{list-style:none;margin:0;padding:0;display:grid;gap:12px;}
  .creds li{display:flex;align-items:center;gap:16px;padding:14px 16px;background:var(--cream);border:1px solid var(--line);border-radius:14px;}
  .cred-badge{flex:none;width:112px;box-sizing:border-box;text-align:center;background:var(--plum);color:#fff;font-weight:700;font-size:12px;letter-spacing:.05em;padding:8px 6px;border-radius:10px;}
  .cred-name{font-size:17px;color:var(--ink);font-weight:600;line-height:1.4;}
  .pills{display:flex;flex-wrap:wrap;gap:10px;}
  .pill{background:var(--blush);color:var(--berry);font-weight:600;font-size:15px;padding:8px 15px;border-radius:100px;}
  .expect ul{list-style:none;display:grid;gap:11px;}
  .expect li{position:relative;padding-left:28px;font-size:17px;color:var(--ink);}
  .expect li::before{content:"✓";position:absolute;left:0;color:var(--coral);font-weight:700;}
  h4.sub{font-size:13px;letter-spacing:.1em;text-transform:uppercase;color:var(--berry);margin:22px 0 12px;}
  .qs{display:grid;gap:10px;}
  .q{background:var(--cream);border-left:3px solid var(--coral);border-radius:8px;padding:12px 16px;font-style:italic;color:var(--plum);font-size:16px;}
  .xps{display:grid;gap:16px;}
  .xp{border-left:2px solid var(--line);padding-left:16px;}
  .xp b{display:block;color:var(--plum);font-size:17px;}
  .xp span{color:var(--muted);font-size:15px;}
  .pp-side{position:sticky;top:90px;}
  @media(max-width:820px){.pp-side{position:static;}}
  .book-card{background:#fff;border:1px solid var(--line);border-radius:20px;box-shadow:0 16px 40px rgba(51,32,63,.12);padding:24px;}
  .bc-price-wrap{background:var(--cream);border-radius:14px;padding:18px 20px;margin-bottom:20px;}
  .bc-price{font-family:Georgia,serif;font-size:30px;color:var(--plum);margin-bottom:6px;}
  .bc-price small{font-size:16px;color:var(--muted);font-family:'Inter',sans-serif;}
  .bc-rate{color:var(--gold);font-size:16px;margin:4px 0 18px;}
  .bc-rate span{color:var(--muted);font-size:14px;margin-left:4px;}
  .book-card h4{font-size:13px;letter-spacing:.1em;text-transform:uppercase;color:var(--berry);margin:0 0 12px;}
  .book-card .slots{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:16px;}
  .book-card .btn{width:100%;text-align:center;}
  .svc-toggle{display:flex;gap:8px;margin-bottom:16px;}
  .svc-opt{flex:1;border:1.5px solid var(--line);background:#fff;color:var(--plum);font-weight:700;font-size:13.5px;padding:10px 6px;border-radius:12px;cursor:pointer;text-align:center;transition:.15s;}
  .svc-opt:hover{border-color:var(--coral);}
  .svc-opt.active{background:var(--plum);color:#fff;border-color:var(--plum);}
  .bc-note{font-size:12.5px;letter-spacing:.06em;text-transform:uppercase;color:var(--coral-d);font-weight:700;margin:0;line-height:1.55;min-height:0;}
  .bc-inc{list-style:none;margin:0 0 20px;display:grid;gap:8px;}
  .bc-inc li{position:relative;padding-left:20px;font-size:15px;color:var(--ink);line-height:1.5;}
  .bc-inc li::before{content:"✓";position:absolute;left:0;color:var(--coral);font-weight:700;}
  .bc-guar{font-size:13.5px;color:var(--muted);text-align:center;margin-top:12px;}
  .consent-row{display:flex;flex-direction:column;gap:10px;margin:4px 0 16px;padding-top:16px;border-top:1px dashed var(--line);}
  .consent{display:flex;align-items:flex-start;gap:9px;font-size:13.5px;color:var(--ink);line-height:1.45;cursor:pointer;}
  .consent input{margin-top:2px;flex:none;width:16px;height:16px;accent-color:var(--coral);cursor:pointer;}
  .consent a{color:var(--berry);font-weight:700;text-decoration:underline;}
  .consent-err{display:none;color:var(--coral-d);font-size:13px;font-weight:700;margin:-8px 0 12px;}
  .consent-err.show{display:block;}
  .captcha-box{border:1px solid #d3d3d3;border-radius:6px;background:#f9f9f9;padding:14px 16px;margin:2px 0 16px;}
  .captcha-check{display:flex;align-items:center;gap:12px;cursor:pointer;user-select:none;}
  .captcha-mark{width:26px;height:26px;flex:none;border:2px solid #c1c1c1;border-radius:4px;background:#fff;display:flex;align-items:center;justify-content:center;transition:.15s;position:relative;}
  .captcha-mark svg{width:16px;height:16px;opacity:0;transform:scale(.5);transition:.15s;}
  .captcha-check.verifying .captcha-mark{border-color:var(--gold);}
  .captcha-check.verifying .captcha-mark::after{content:"";position:absolute;inset:4px;border-radius:50%;border:2.5px solid #e7e7e7;border-top-color:var(--gold);animation:captchaSpin .7s linear infinite;}
  .captcha-check.verified .captcha-mark{border-color:#2e7d32;background:#f3faf3;}
  .captcha-check.verified .captcha-mark svg{opacity:1;transform:scale(1);}
  @keyframes captchaSpin{to{transform:rotate(360deg);}}
  .captcha-label{font-size:14.5px;color:var(--ink);font-weight:600;}
  .captcha-brand{margin-top:10px;padding-top:10px;border-top:1px solid #e6e6e6;font-size:11px;color:#9aa0a6;letter-spacing:.02em;}
  .captcha-err{display:none;color:var(--coral-d);font-size:13px;font-weight:700;margin:-8px 0 12px;}
  .captcha-err.show{display:block;}
  .tos-body{max-width:720px;padding:44px 40px 40px;}
  .tos-body h2{font-size:26px;color:var(--plum);margin-bottom:4px;}
  .tos-body .tos-updated{font-size:13px;color:var(--muted);margin-bottom:22px;}
  .tos-body h3{font-size:16px;color:var(--plum);margin:26px 0 8px;}
  .tos-body p, .tos-body li{font-size:15px;color:var(--muted);line-height:1.65;}
  .tos-body ul{margin:0 0 12px;padding-left:20px;}
  .tos-body strong{color:var(--ink);}
  .pp-wide{margin:14px 0 0;}
  .pp-wide .ctr{text-align:center;font-size:28px;color:var(--plum);margin:46px 0 28px;}
  .hws{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;}
  @media(max-width:720px){.hws{grid-template-columns:1fr;}}
  .hw{background:#fff;border-radius:16px;padding:24px;box-shadow:0 10px 26px rgba(51,32,63,.06);}
  .hw .n{width:40px;height:40px;border-radius:50%;background:var(--coral);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:700;margin-bottom:12px;}
  .hw h4{font-size:18px;color:var(--plum);margin-bottom:6px;}
  .hw p{font-size:16px;color:var(--muted);}
  .pp-faq{max-width:760px;margin:0 auto;}
  /* people placeholders in coach photos */
  .ch-photo .mono, .pp-photo .mono{display:none;}
  .ch-photo::before, .pp-photo::before{content:"";position:absolute;left:0;right:0;bottom:0;height:90%;background-image:url("data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20viewBox='0%200%20240%20240'%3E%3Ccircle%20cx='120'%20cy='84'%20r='52'%20fill='%23ffffff'%20fill-opacity='0.34'/%3E%3Cpath%20d='M22%20240C22%20170%2064%20140%20120%20140%20176%20140%20218%20170%20218%20240Z'%20fill='%23ffffff'%20fill-opacity='0.34'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position:bottom center;background-size:auto 100%;z-index:1;pointer-events:none;}
  .ch-overlay{z-index:2;}
  .ch-photo .ch-badge, .pp-photo .ch-badge{z-index:3;}
  .ch-img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:top center;z-index:1;}
  .ch-photo::before,.pp-photo::before{z-index:0;}
  .ch-overlay{z-index:2;}
  .ch-photo .ch-badge,.pp-photo .ch-badge{z-index:3;}

  .story-grid{display:grid;grid-template-columns:1.55fr 1fr;gap:56px;align-items:center;}
  @media(max-width:800px){.story-grid{grid-template-columns:1fr;}}
  .story-photo img{width:100%;aspect-ratio:1/1;object-fit:cover;border-radius:24px;display:block;}
  .story-grid .story-photo{order:2;}
  .story-grid .story-text{order:1;}
  @media(max-width:800px){.story-grid .story-photo,.story-grid .story-text{order:initial;}}
  .story-pills{display:flex;flex-wrap:wrap;gap:12px;margin:22px 0 30px;}
  .story-pills span{background:var(--cream);border:1px solid var(--line);border-radius:100px;padding:11px 20px;font-size:14px;font-weight:600;color:var(--ink);}
  .story-signature{margin:6px 0 4px;line-height:1;}
  .story-signature img{height:64px;width:auto;display:block;}
  .story-name{font-family:Georgia,'Times New Roman',serif;font-weight:700;font-size:21px;color:var(--plum);}
  .story-title{color:var(--muted);font-size:15px;margin-top:2px;}
    </style>
    @stack('head')
</head>
<body>
@yield('content')
@stack('scripts')
</body>
</html>
