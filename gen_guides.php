<?php
/**
 * Guides Pages Generator for jun88.men
 * Generates how-to-play guides
 * Run: php gen_guides.php
 */

$OPENAI_KEY = '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';
$ANTHROPIC_KEY = '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';

$BASE = '/home/admin/web/jun88.men/public_html';
$GUIDE_DIR = $BASE . '/huong-dan';
$IMG_DIR = $BASE . '/images/guides';

$AFFILIATE_LINKS = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

if (!is_dir($GUIDE_DIR)) mkdir($GUIDE_DIR, 0755, true);
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

$GUIDES = [
    ['slug'=>'cach-choi-baccarat','name'=>'Baccarat','title'=>'Cách Chơi Baccarat','difficulty'=>'Dễ','time'=>'5 phút học','link_idx'=>0,'img_prompt'=>'Baccarat card game table, elegant casino atmosphere, cards being dealt, dark luxury background, Vietnamese casino'],
    ['slug'=>'cach-choi-blackjack','name'=>'Blackjack','title'=>'Cách Chơi Blackjack','difficulty'=>'Trung bình','time'=>'10 phút học','link_idx'=>1,'img_prompt'=>'Blackjack 21 card game, casino table with cards and chips, player vs dealer, dark elegant background'],
    ['slug'=>'cach-choi-roulette','name'=>'Roulette','title'=>'Cách Chơi Roulette','difficulty'=>'Dễ','time'=>'5 phút học','link_idx'=>2,'img_prompt'=>'Roulette wheel spinning, casino table with betting layout, ball rolling, luxury dark background'],
    ['slug'=>'cach-choi-aviator','name'=>'Aviator','title'=>'Cách Chơi Aviator','difficulty'=>'Dễ','time'=>'2 phút học','link_idx'=>0,'img_prompt'=>'Aviator crash game airplane flying with multiplier curve, casino crash game interface, exciting gambling concept'],
    ['slug'=>'cach-choi-slot','name'=>'Slot Game','title'=>'Cách Chơi Slot Online','difficulty'=>'Rất dễ','time'=>'2 phút học','link_idx'=>1,'img_prompt'=>'Slot machine spinning reels, casino slot game interface, winning combination, vibrant colorful symbols'],
    ['slug'=>'cach-choi-poker','name'=>'Poker','title'=>'Cách Chơi Poker Texas Holdem','difficulty'=>'Khó','time'=>'30 phút học','link_idx'=>2,'img_prompt'=>'Texas Holdem poker table, cards and chips, professional poker game, dark casino atmosphere'],
    ['slug'=>'cach-choi-sicbo','name'=>'Sicbo','title'=>'Cách Chơi Sicbo Tài Xỉu','difficulty'=>'Dễ','time'=>'5 phút học','link_idx'=>0,'img_prompt'=>'Sicbo dice game, three dice on casino table, Asian gambling game, dark luxury background'],
    ['slug'=>'cach-choi-dragon-tiger','name'=>'Dragon Tiger','title'=>'Cách Chơi Dragon Tiger','difficulty'=>'Rất dễ','time'=>'2 phút học','link_idx'=>1,'img_prompt'=>'Dragon Tiger card game, two cards face up dragon vs tiger, Asian casino game, dark elegant background'],
    ['slug'=>'cach-choi-ca-cuoc-bong-da','name'=>'Cá Cược Bóng Đá','title'=>'Cách Cá Cược Bóng Đá Online','difficulty'=>'Trung bình','time'=>'15 phút học','link_idx'=>2,'img_prompt'=>'Football soccer betting, sports book interface, match odds, stadium background, Vietnamese football betting'],
    ['slug'=>'cach-doc-keo-chap','name'=>'Kèo Chấp','title'=>'Cách Đọc Kèo Chấp Bóng Đá','difficulty'=>'Trung bình','time'=>'10 phút học','link_idx'=>0,'img_prompt'=>'Asian handicap betting odds board, football match statistics, Vietnamese sports betting interface'],
    ['slug'=>'cach-choi-mahjong-ways','name'=>'Mahjong Ways','title'=>'Cách Chơi Mahjong Ways','difficulty'=>'Dễ','time'=>'5 phút học','link_idx'=>1,'img_prompt'=>'Mahjong Ways PG Soft slot game, mahjong tiles spinning, Chinese gambling game art, vibrant Asian colors'],
    ['slug'=>'cach-choi-gates-of-olympus','name'=>'Gates of Olympus','title'=>'Cách Chơi Gates of Olympus','difficulty'=>'Dễ','time'=>'5 phút học','link_idx'=>2,'img_prompt'=>'Gates of Olympus Pragmatic Play slot, Zeus lightning bolts, golden Greek temple, cascading wins concept'],
    ['slug'=>'chien-thuat-blackjack','name'=>'Chiến Thuật Blackjack','title'=>'Chiến Thuật Blackjack Cơ Bản','difficulty'=>'Trung bình','time'=>'20 phút học','link_idx'=>0,'img_prompt'=>'Blackjack basic strategy chart, card counting concept, casino strategy, dark background with cards'],
    ['slug'=>'quan-ly-von-casino','name'=>'Quản Lý Vốn','title'=>'Cách Quản Lý Vốn Khi Chơi Casino','difficulty'=>'Quan trọng','time'=>'10 phút học','link_idx'=>1,'img_prompt'=>'Bankroll management casino, money budget planning, responsible gambling concept, Vietnamese player managing funds'],
    ['slug'=>'ca-cuoc-co-trach-nhiem','name'=>'Cá Cược Có Trách Nhiệm','title'=>'Cá Cược Có Trách Nhiệm','difficulty'=>'Quan trọng','time'=>'10 phút học','link_idx'=>2,'img_prompt'=>'Responsible gambling concept, balance scale with fun and control, Vietnamese player making safe choices, calm blue background'],
];

function claude($prompt, $key, $tokens = 500) {
    $data = json_encode(['model'=>'claude-sonnet-4-6','max_tokens'=>$tokens,'messages'=>[['role'=>'user','content'=>$prompt]]]);
    $ch = curl_init('https://api.anthropic.com/v1/messages');
    curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$data,CURLOPT_HTTPHEADER=>['Content-Type: application/json','x-api-key: '.$key,'anthropic-version: 2023-06-01'],CURLOPT_TIMEOUT=>60]);
    $r = json_decode(curl_exec($ch), true);
    curl_close($ch);
    return trim($r['content'][0]['text'] ?? '');
}

function genImage($prompt, $file, $key, $dir) {
    $path = $dir.'/'.$file;
    $jpgPath = str_replace('.png','.jpg',$path);
    if (file_exists($jpgPath)) { echo "    ✓ exists\n"; return '/images/guides/'.str_replace('.png','.jpg',$file); }
    echo "    🎨 image...\n";
    $data = json_encode(['model'=>'gpt-image-1','prompt'=>$prompt.', no text, no watermark, high quality','n'=>1,'size'=>'1024x1024','output_format'=>'png']);
    $ch = curl_init('https://api.openai.com/v1/images/generations');
    curl_setopt_array($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$data,CURLOPT_HTTPHEADER=>['Content-Type: application/json','Authorization: Bearer '.$key],CURLOPT_TIMEOUT=>90]);
    $r = json_decode(curl_exec($ch),true);
    curl_close($ch);
    if (!isset($r['data'][0]['b64_json'])) { echo "    ❌ error\n"; return null; }
    file_put_contents($path, base64_decode($r['data'][0]['b64_json']));
    $img = imagecreatefrompng($path);
    imagejpeg($img,$jpgPath,82);
    imagedestroy($img);
    unlink($path);
    echo "    ✅ saved\n";
    return '/images/guides/'.str_replace('.png','.jpg',$file);
}

echo "=== GUIDES GENERATOR ===\n".count($GUIDES)." guides\n\n";

foreach ($GUIDES as $i => $g) {
    $n=$g['name']; $slug=$g['slug'];
    echo "[".($i+1)."/".count($GUIDES)."] {$g['title']}\n";

    $imgPath = genImage($g['img_prompt'], "{$slug}.png", $OPENAI_KEY, $IMG_DIR);

    echo "    ✍️ texts...\n";

    $intro = claude("Viết 2 câu giới thiệu về cách chơi '{$n}' tại casino online cho người mới bắt đầu Việt Nam. Thân thiện, dễ hiểu. Chỉ 2 câu.", $ANTHROPIC_KEY, 150);

    $steps = claude("Viết hướng dẫn chơi '{$n}' cho người mới tại casino online Việt Nam. Chia thành 3 bước rõ ràng, mỗi bước 2-3 câu, bọc trong <p><strong>Bước X:</strong> nội dung</p>. Đơn giản, dễ hiểu. Chỉ các đoạn văn.", $ANTHROPIC_KEY, 600);

    $tips = claude("Viết 3-4 mẹo chơi '{$n}' hiệu quả cho người Việt Nam mới bắt đầu. Thực tế, ngắn gọn. Chỉ 3-4 câu.", $ANTHROPIC_KEY, 200);

    $mistakes = claude("Liệt kê 3 lỗi thường gặp khi chơi '{$n}' và cách tránh. Ngắn gọn, mỗi lỗi 1-2 câu. Bọc từng mục trong <li>. Chỉ 3 dòng <li>.", $ANTHROPIC_KEY, 200);

    $faq1a = claude("Trả lời: '{$n}' có khó học không? Đề cập độ khó '{$g['difficulty']}' và thời gian '{$g['time']}'. 2 câu ngắn.", $ANTHROPIC_KEY, 100);
    $faq2a = claude("Trả lời: Có thể chơi '{$n}' miễn phí không? 2 câu ngắn cho người Việt.", $ANTHROPIC_KEY, 100);
    $faq3a = claude("Trả lời: Chiến lược nào tốt nhất khi chơi '{$n}'? 2 câu thực tế.", $ANTHROPIC_KEY, 100);

    $affiliateLink = $AFFILIATE_LINKS[$g['link_idx']];
    $imgTag = $imgPath ? "<img src=\"{$imgPath}\" alt=\"Cách chơi {$n}\" title=\"Hướng dẫn chơi {$n} tại casino online\">" : "<div class=\"iph\">🎮</div>";

    $html = <<<HTML
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$g['title']} | Hướng Dẫn Chi Tiết Cho Người Mới</title>
<meta name="description" content="Hướng dẫn {$g['title']} chi tiết cho người mới. Độ khó: {$g['difficulty']}, học trong {$g['time']}. Bước đơn giản, mẹo thực tế từ chuyên gia casino Việt Nam.">
<link rel="icon" type="image/png" href="/favicon.png">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{--g1:#7B2FBE;--g2:#EA4C89;--dark:#0D0D1A;--card:#161625;--card2:#1E1E32;--gold:#FFD166;--text:#F0F0FF;--muted:#8888AA;--green:#06D6A0;--red:#EF476F}
body{background:var(--dark);color:var(--text);font-family:'Nunito',sans-serif;max-width:480px;margin:0 auto;padding-bottom:80px}
.topbar{background:rgba(13,13,26,.97);padding:12px 16px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(123,47,190,.2)}
.logo{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;text-decoration:none}
.back{color:var(--muted);font-size:13px;text-decoration:none;font-weight:700}
.hero{width:100%;height:200px;overflow:hidden;background:var(--card2)}
.hero img{width:100%;height:100%;object-fit:cover}
.hero .iph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:70px}
.header{padding:16px}
.h1{font-size:22px;font-weight:900;margin-bottom:8px}
.meta-row{display:flex;gap:8px;margin-bottom:10px}
.meta-pill{background:var(--card2);border-radius:8px;padding:4px 10px;font-size:12px;font-weight:700}
.meta-pill.diff{color:var(--gold)}
.meta-pill.time{color:var(--green)}
.intro{font-size:13px;color:var(--muted);line-height:1.6}
.sec{padding:0 16px;margin-bottom:20px}
.sec h2{font-size:17px;font-weight:800;margin-bottom:12px;padding-bottom:6px;border-bottom:1px solid rgba(255,255,255,.08)}
.sec h2 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.body-text{font-size:13px;color:rgba(240,240,255,.85);line-height:1.7}
.body-text p{margin-bottom:12px}
.body-text strong{color:var(--gold)}
.mistakes-list{display:flex;flex-direction:column;gap:8px}
.mistake{background:var(--card);border-radius:10px;padding:12px;border-left:3px solid var(--red);font-size:13px;color:var(--muted);line-height:1.5;list-style:none}
.tips-box{background:linear-gradient(135deg,rgba(6,214,160,.1),rgba(6,214,160,.05));border:1px solid rgba(6,214,160,.2);border-radius:14px;padding:16px;margin-bottom:16px}
.tips-title{color:var(--green);font-size:14px;font-weight:800;margin-bottom:8px}
.tips-text{font-size:13px;color:var(--muted);line-height:1.6}
.cta{margin:0 16px 16px;background:linear-gradient(135deg,#1a0533,#2d0a4e);border:1px solid rgba(123,47,190,.3);border-radius:16px;padding:16px;text-align:center}
.cta-title{font-size:16px;font-weight:800;margin-bottom:4px}
.cta-sub{font-size:12px;color:var(--muted);margin-bottom:12px}
.btn{display:block;background:linear-gradient(135deg,var(--g1),var(--g2));color:#fff;padding:14px;border-radius:12px;font-weight:800;font-size:15px;text-decoration:none}
.faq{background:var(--card);border-radius:12px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.fq{padding:14px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;cursor:pointer}
.fi{color:var(--g2);transition:.2s}
.faq.open .fi{transform:rotate(45deg)}
.fa{font-size:12px;color:var(--muted);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq.open .fa{max-height:200px;padding:0 16px 14px}
.related{padding:0 16px;display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:20px}
.rel{background:var(--card);border-radius:12px;padding:12px;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06);display:block}
.rel-name{font-size:13px;font-weight:700}
.rel-diff{font-size:11px;color:var(--muted);margin-top:2px}
.bnav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}
.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}
.ni.a{color:#EA4C89}
.ico{font-size:20px}
</style>
</head>
<body>
<div class="topbar"><a href="/" class="logo">🎰 CasinoVN</a><a href="/huong-dan/" class="back">← Hướng Dẫn</a></div>
<div class="hero">{$imgTag}</div>
<div class="header">
  <h1 class="h1">{$g['title']}</h1>
  <div class="meta-row">
    <span class="meta-pill diff">📊 {$g['difficulty']}</span>
    <span class="meta-pill time">⏱ {$g['time']}</span>
  </div>
  <p class="intro">{$intro}</p>
</div>

<div class="sec">
  <h2>📖 Hướng Dẫn <span>Từng Bước</span></h2>
  <div class="body-text">{$steps}</div>
</div>

<div class="sec">
  <h2>💡 Mẹo <span>Chơi Hiệu Quả</span></h2>
  <div class="tips-box">
    <div class="tips-title">✅ Mẹo từ chuyên gia</div>
    <div class="tips-text">{$tips}</div>
  </div>
</div>

<div class="cta">
  <div class="cta-title">🎮 Thực Hành Ngay</div>
  <div class="cta-sub">Áp dụng kiến thức vừa học · Bonus chào mừng hấp dẫn</div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="btn">Chơi {$n} Ngay →</a>
</div>

<div class="sec">
  <h2>⚠️ Lỗi <span>Thường Gặp</span></h2>
  <ul class="mistakes-list">{$mistakes}</ul>
</div>

<div class="sec">
  <h2>❓ Câu Hỏi <span>Thường Gặp</span></h2>
  <div class="faq"><div class="fq">{$n} có khó học không? <span class="fi">+</span></div><div class="fa">{$faq1a}</div></div>
  <div class="faq"><div class="fq">Có thể chơi {$n} miễn phí không? <span class="fi">+</span></div><div class="fa">{$faq2a}</div></div>
  <div class="faq"><div class="fq">Chiến lược tốt nhất khi chơi {$n}? <span class="fi">+</span></div><div class="fa">{$faq3a}</div></div>
</div>

<div class="cta" style="margin:0 16px 20px">
  <div class="cta-title">🏆 Sẵn Sàng Chơi?</div>
  <div class="cta-sub">Đăng ký nhà cái uy tín · Nhận bonus ngay hôm nay</div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="btn">Đăng Ký & Chơi Ngay →</a>
</div>

<nav class="bnav">
  <a href="/" class="ni"><span class="ico">🏠</span>Trang Chủ</a>
  <a href="/casino/" class="ni"><span class="ico">🎰</span>Nhà Cái</a>
  <a href="/slots/" class="ni"><span class="ico">🎲</span>Slots</a>
  <a href="/khuyen-mai/" class="ni"><span class="ico">🎁</span>Bonus</a>
  <a href="/huong-dan/" class="ni a"><span class="ico">📖</span>Hướng Dẫn</a>
</nav>
<script>document.querySelectorAll('.fq').forEach(q=>q.addEventListener('click',()=>q.closest('.faq').classList.toggle('open')));</script>
</body>
</html>
HTML;

    $dir = $BASE.'/huong-dan/'.$slug;
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    file_put_contents($dir.'/index.html', $html);
    echo "    ✅ /huong-dan/{$slug}/\n\n";
    sleep(2);
}

// Guides listing page
echo "📋 Generating guides listing...\n";
$listing = '<!DOCTYPE html><html lang="vi"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Hướng Dẫn Chơi Casino | Baccarat, Blackjack, Slot, Aviator</title><meta name="description" content="Hướng dẫn chơi casino online chi tiết cho người mới. Baccarat, Blackjack, Roulette, Slot, Aviator, Poker. Học nhanh, thực hành ngay."><link rel="icon" type="image/png" href="/favicon.png"><link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"><style>*{margin:0;padding:0;box-sizing:border-box}:root{--g1:#7B2FBE;--g2:#EA4C89;--dark:#0D0D1A;--card:#161625;--gold:#FFD166;--text:#F0F0FF;--muted:#8888AA;--green:#06D6A0}body{background:var(--dark);color:var(--text);font-family:"Nunito",sans-serif;max-width:480px;margin:0 auto;padding-bottom:80px}.topbar{background:rgba(13,13,26,.97);padding:12px 16px;display:flex;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(123,47,190,.2)}.logo{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;text-decoration:none}.ph{padding:20px 16px 10px}h1{font-size:22px;font-weight:900;margin-bottom:6px}h1 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}.sub{font-size:13px;color:var(--muted);margin-bottom:16px}.list{padding:0 16px;display:flex;flex-direction:column;gap:10px}.item{background:var(--card);border-radius:14px;padding:14px;display:flex;gap:12px;align-items:center;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06)}.thumb{width:56px;height:56px;border-radius:12px;overflow:hidden;flex-shrink:0;background:#1E1E32}.thumb img{width:100%;height:100%;object-fit:cover}.thumb .ph2{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:26px}.info{flex:1}.iname{font-size:15px;font-weight:800;margin-bottom:4px}.imeta{display:flex;gap:8px}.ipill{font-size:11px;font-weight:700;padding:2px 8px;border-radius:6px}.diff{background:rgba(255,209,102,.1);color:var(--gold)}.time{background:rgba(6,214,160,.1);color:var(--green)}.arr{color:var(--g2);font-size:18px}.bnav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}.ni.a{color:#EA4C89}.ico{font-size:20px}</style></head><body><div class="topbar"><a href="/" class="logo">🎰 CasinoVN</a></div><div class="ph"><h1>Hướng Dẫn <span>Chơi Game</span></h1><p class="sub">Học cách chơi từ cơ bản đến nâng cao</p></div><div class="list">';

foreach ($GUIDES as $g) {
    $listing .= '<a href="/huong-dan/'.$g['slug'].'/" class="item"><div class="thumb"><img src="/images/guides/'.$g['slug'].'.jpg" alt="'.$g['title'].'" loading="lazy"></div><div class="info"><div class="iname">'.$g['title'].'</div><div class="imeta"><span class="ipill diff">'.$g['difficulty'].'</span><span class="ipill time">⏱ '.$g['time'].'</span></div></div><div class="arr">›</div></a>';
}

$listing .= '</div><nav class="bnav"><a href="/" class="ni"><span class="ico">🏠</span>Trang Chủ</a><a href="/casino/" class="ni"><span class="ico">🎰</span>Nhà Cái</a><a href="/slots/" class="ni"><span class="ico">🎲</span>Slots</a><a href="/khuyen-mai/" class="ni"><span class="ico">🎁</span>Bonus</a><a href="/huong-dan/" class="ni a"><span class="ico">📖</span>Hướng Dẫn</a></nav></body></html>';

file_put_contents($BASE.'/huong-dan/index.html', $listing);
echo "✅ Listing saved\n\n=== DONE ===\n⚠️  Run: rm gen_guides.php\n";
