<?php
/**
 * Bonus Pages Generator for jun88.men
 * Generates bonus review pages
 * Run: php gen_bonuses.php
 */

$OPENAI_KEY = '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';
$ANTHROPIC_KEY = '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';

$BASE = '/home/admin/web/jun88.men/public_html';
$BONUS_DIR = $BASE . '/khuyen-mai';
$IMG_DIR = $BASE . '/images/bonuses';

$AFFILIATE_LINKS = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

if (!is_dir($BONUS_DIR)) mkdir($BONUS_DIR, 0755, true);
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

$BONUSES = [
    ['slug'=>'bonus-chao-mung','name'=>'Bonus Chào Mừng','title'=>'Bonus Chào Mừng Casino','desc'=>'Nhận bonus 100-200% khi nạp tiền lần đầu','amount'=>'Lên đến 10 triệu VND','type'=>'Nạp lần đầu','wagering'=>'30x','validity'=>'30 ngày','link_idx'=>0,'img_prompt'=>'Casino welcome bonus promotion banner, golden coins raining, gift boxes, celebration confetti, dark purple background, luxury casino theme'],
    ['slug'=>'free-spin','name'=>'Free Spin','title'=>'Free Spin Casino Miễn Phí','desc'=>'Nhận vòng quay miễn phí không cần nạp tiền','amount'=>'50-200 vòng quay','type'=>'Không cần nạp','wagering'=>'40x','validity'=>'7 ngày','link_idx'=>1,'img_prompt'=>'Free spins casino slot machine spinning, golden coins flying out, vibrant colors, no deposit bonus concept, dark casino background'],
    ['slug'=>'bonus-khong-can-nap','name'=>'Bonus Không Cần Nạp','title'=>'Bonus Không Cần Nạp Tiền','desc'=>'Nhận tiền thưởng miễn phí khi đăng ký tài khoản','amount'=>'50,000 - 500,000 VND','type'=>'No Deposit','wagering'=>'50x','validity'=>'3 ngày','link_idx'=>2,'img_prompt'=>'No deposit casino bonus, free money gift, registration bonus concept, golden glow, dark luxury background, Vietnamese style'],
    ['slug'=>'hoan-tien','name'=>'Hoàn Tiền Cashback','title'=>'Hoàn Tiền Cashback Casino','desc'=>'Nhận lại % tiền thua mỗi tuần','amount'=>'5-20% tiền thua','type'=>'Cashback hàng tuần','wagering'=>'1x','validity'=>'7 ngày','link_idx'=>0,'img_prompt'=>'Casino cashback rebate concept, money returning to hand, weekly reward, purple gold theme, dark background'],
    ['slug'=>'khuyen-mai-hang-ngay','name'=>'Khuyến Mãi Hàng Ngày','title'=>'Khuyến Mãi Casino Hàng Ngày','desc'=>'Ưu đãi mới mỗi ngày cho thành viên','amount'=>'Đa dạng','type'=>'Daily bonus','wagering'=>'20x','validity'=>'1 ngày','link_idx'=>1,'img_prompt'=>'Daily casino promotion, calendar with bonus offers, golden rewards each day, festive casino atmosphere, dark purple background'],
    ['slug'=>'chuong-trinh-vip','name'=>'Chương Trình VIP','title'=>'Chương Trình VIP Casino','desc'=>'Ưu đãi độc quyền cho thành viên VIP','amount'=>'Không giới hạn','type'=>'VIP loyalty','wagering'=>'10x','validity'=>'Không giới hạn','link_idx'=>2,'img_prompt'=>'VIP casino loyalty program, golden diamond crown, exclusive member card, luxury dark background, purple gold theme'],
    ['slug'=>'bonus-gioi-thieu','name'=>'Bonus Giới Thiệu','title'=>'Bonus Giới Thiệu Bạn Bè','desc'=>'Nhận thưởng khi giới thiệu bạn bè đăng ký','amount'=>'100,000 - 500,000 VND/người','type'=>'Referral','wagering'=>'20x','validity'=>'Không hết hạn','link_idx'=>0,'img_prompt'=>'Referral bonus casino, friends sharing rewards, golden coins between two hands, dark background, Vietnamese casino theme'],
    ['slug'=>'bonus-nap-tien','name'=>'Bonus Nạp Tiền','title'=>'Bonus Nạp Tiền Casino','desc'=>'Nhận thêm % mỗi lần nạp tiền','amount'=>'10-50% mỗi lần nạp','type'=>'Reload bonus','wagering'=>'25x','validity'=>'3 ngày','link_idx'=>1,'img_prompt'=>'Casino deposit bonus, money being added to account, reload promotion, golden percentage symbols, dark luxury casino background'],
    ['slug'=>'giai-dau-slot','name'=>'Giải Đấu Slot','title'=>'Giải Đấu Slot Online','desc'=>'Tham gia giải đấu slot thắng tiền thật','amount'=>'Giải thưởng đến 100 triệu VND','type'=>'Tournament','wagering'=>'0x','validity'=>'Theo giải','link_idx'=>2,'img_prompt'=>'Slot tournament competition, leaderboard with prizes, multiple slot machines, trophy, dark casino background, competitive gambling theme'],
    ['slug'=>'bonus-the-thao','name'=>'Bonus Cá Cược Thể Thao','title'=>'Bonus Cá Cược Thể Thao','desc'=>'Ưu đãi đặc biệt cho cá cược bóng đá và thể thao','amount'=>'Lên đến 5 triệu VND','type'=>'Sports bonus','wagering'=>'15x','validity'=>'7 ngày','link_idx'=>0,'img_prompt'=>'Sports betting bonus, football soccer ball, casino sports book, stadium lights, dark background, Vietnamese football betting theme'],
    ['slug'=>'khuyen-mai-tet','name'=>'Khuyến Mãi Tết','title'=>'Khuyến Mãi Casino Tết Nguyên Đán','desc'=>'Ưu đãi đặc biệt mùa Tết cho người chơi Việt Nam','amount'=>'Lên đến 20 triệu VND','type'=>'Seasonal','wagering'=>'20x','validity'=>'Mùa Tết','link_idx'=>1,'img_prompt'=>'Vietnamese Lunar New Year casino bonus, red envelope lucky money, dragon decorations, golden coins, festive dark background'],
    ['slug'=>'bonus-crypto','name'=>'Bonus Crypto','title'=>'Bonus Nạp Tiền Điện Tử','desc'=>'Ưu đãi đặc biệt khi nạp bằng Bitcoin và crypto','amount'=>'Thêm 10-20%','type'=>'Crypto bonus','wagering'=>'25x','validity'=>'3 ngày','link_idx'=>2,'img_prompt'=>'Cryptocurrency casino bonus, Bitcoin gold coin, blockchain casino concept, digital currency rewards, dark tech background'],
];

function claude($prompt, $key, $tokens = 400) {
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
    if (file_exists($jpgPath)) { echo "    ✓ exists\n"; return '/images/bonuses/'.str_replace('.png','.jpg',$file); }
    echo "    🎨 image...\n";
    $data = json_encode(['model'=>'gpt-image-1','prompt'=>$prompt.', no text, no watermark','n'=>1,'size'=>'1024x1024','output_format'=>'png']);
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
    return '/images/bonuses/'.str_replace('.png','.jpg',$file);
}

echo "=== BONUS PAGES GENERATOR ===\n".count($BONUSES)." bonus pages\n\n";

foreach ($BONUSES as $i => $b) {
    $n=$b['name']; $slug=$b['slug'];
    echo "[".($i+1)."/".count($BONUSES)."] $n\n";

    $imgPath = genImage($b['img_prompt'], "{$slug}.png", $OPENAI_KEY, $IMG_DIR);

    echo "    ✍️ texts...\n";

    $intro = claude("Viết 2 câu giới thiệu về '{$b['title']}' tại casino online Việt Nam. Đề cập {$b['desc']}. Tự nhiên như người thật. Chỉ 2 câu.", $ANTHROPIC_KEY, 150);

    $howto = claude("Viết hướng dẫn nhận '{$b['name']}' tại casino online cho người Việt Nam. 3 đoạn: 1) Cách nhận bonus, 2) Điều kiện và vòng cược {$b['wagering']}, 3) Mẹo tận dụng tối đa. Mỗi đoạn 2-3 câu, bọc trong <p>. Tự nhiên. Chỉ các đoạn văn.", $ANTHROPIC_KEY, 500);

    $tips = claude("Viết 3-4 mẹo thực tế để tận dụng '{$b['name']}' hiệu quả nhất tại casino online Việt Nam. Ngắn gọn, thực tế. Chỉ 3-4 câu.", $ANTHROPIC_KEY, 200);

    $faq1a = claude("Trả lời: Vòng cược của {$b['name']} là bao nhiêu? Đề cập {$b['wagering']} và cách tính. 2 câu ngắn.", $ANTHROPIC_KEY, 100);
    $faq2a = claude("Trả lời: {$b['name']} có hiệu lực bao lâu? Đề cập {$b['validity']}. 2 câu ngắn.", $ANTHROPIC_KEY, 100);
    $faq3a = claude("Trả lời: Nhà cái nào có {$b['name']} tốt nhất tại Việt Nam? 2 câu ngắn, khuyến khích đăng ký.", $ANTHROPIC_KEY, 100);

    $affiliateLink = $AFFILIATE_LINKS[$b['link_idx']];
    $imgTag = $imgPath ? "<img src=\"{$imgPath}\" alt=\"{$b['title']}\" title=\"{$b['title']} tại casino Việt Nam\">" : "<div class=\"iph\">🎁</div>";

    $html = <<<HTML
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$b['title']} | Hướng Dẫn Nhận Bonus Casino</title>
<meta name="description" content="{$b['desc']}. Hướng dẫn chi tiết cách nhận {$b['name']} tại casino online uy tín Việt Nam. Vòng cược {$b['wagering']}.">
<link rel="icon" type="image/png" href="/favicon.png">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{--g1:#7B2FBE;--g2:#EA4C89;--dark:#0D0D1A;--card:#161625;--card2:#1E1E32;--gold:#FFD166;--text:#F0F0FF;--muted:#8888AA;--green:#06D6A0}
body{background:var(--dark);color:var(--text);font-family:'Nunito',sans-serif;max-width:480px;margin:0 auto;padding-bottom:80px}
.topbar{background:rgba(13,13,26,.97);padding:12px 16px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(123,47,190,.2)}
.logo{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;text-decoration:none}
.back{color:var(--muted);font-size:13px;text-decoration:none;font-weight:700}
.hero{width:100%;height:200px;overflow:hidden;background:var(--card2)}
.hero img{width:100%;height:100%;object-fit:cover}
.hero .iph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:70px}
.header{padding:16px}
.h1{font-size:22px;font-weight:900;margin-bottom:8px}
.intro{font-size:13px;color:var(--muted);line-height:1.6}
.bonus-card{margin:0 16px 16px;background:linear-gradient(135deg,#1a0533,#2d0a4e);border:1px solid rgba(123,47,190,.3);border-radius:16px;padding:16px}
.bonus-amount{font-size:26px;font-weight:900;background:linear-gradient(135deg,var(--gold),#FFA500);-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:4px}
.bonus-type{font-size:12px;color:var(--muted);margin-bottom:16px}
.bonus-details{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:16px}
.bdet{background:rgba(255,255,255,.05);border-radius:10px;padding:10px;text-align:center}
.bdet-val{font-size:14px;font-weight:800;color:var(--gold)}
.bdet-label{font-size:10px;color:var(--muted);margin-top:2px}
.btn{display:block;background:linear-gradient(135deg,var(--g1),var(--g2));color:#fff;padding:14px;border-radius:12px;font-weight:800;font-size:15px;text-decoration:none;text-align:center}
.sec{padding:0 16px;margin-bottom:20px}
.sec h2{font-size:17px;font-weight:800;margin-bottom:12px;padding-bottom:6px;border-bottom:1px solid rgba(255,255,255,.08)}
.sec h2 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.body-text{font-size:13px;color:rgba(240,240,255,.85);line-height:1.7}
.body-text p{margin-bottom:12px}
.tips-list{display:flex;flex-direction:column;gap:8px}
.tip{background:var(--card);border-radius:10px;padding:12px;display:flex;gap:10px;align-items:flex-start;border:1px solid rgba(255,255,255,.06)}
.tip-num{width:24px;height:24px;border-radius:50%;background:linear-gradient(135deg,var(--g1),var(--g2));display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;flex-shrink:0}
.tip-text{font-size:13px;color:var(--muted);line-height:1.5}
.faq{background:var(--card);border-radius:12px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.fq{padding:14px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;cursor:pointer}
.fi{color:var(--g2);transition:.2s}
.faq.open .fi{transform:rotate(45deg)}
.fa{font-size:12px;color:var(--muted);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq.open .fa{max-height:200px;padding:0 16px 14px}
.other-bonuses{display:flex;flex-direction:column;gap:8px}
.other-item{background:var(--card);border-radius:12px;padding:12px;display:flex;justify-content:space-between;align-items:center;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06)}
.other-name{font-size:14px;font-weight:700}
.other-amount{font-size:12px;color:var(--gold);font-weight:700;margin-top:2px}
.other-arrow{color:var(--g2)}
.bnav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}
.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}
.ni.a{color:#EA4C89}
.ico{font-size:20px}
</style>
</head>
<body>
<div class="topbar"><a href="/" class="logo">🎰 CasinoVN</a><a href="/khuyen-mai/" class="back">← Khuyến Mãi</a></div>
<div class="hero">{$imgTag}</div>
<div class="header">
  <h1 class="h1">{$b['title']}</h1>
  <p class="intro">{$intro}</p>
</div>
<div class="bonus-card">
  <div class="bonus-amount">🎁 {$b['amount']}</div>
  <div class="bonus-type">{$b['type']}</div>
  <div class="bonus-details">
    <div class="bdet"><div class="bdet-val">{$b['wagering']}</div><div class="bdet-label">Vòng cược</div></div>
    <div class="bdet"><div class="bdet-val">{$b['validity']}</div><div class="bdet-label">Hiệu lực</div></div>
  </div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="btn">Nhận Bonus Ngay →</a>
</div>
<div class="sec">
  <h2>📖 Hướng Dẫn <span>Nhận Bonus</span></h2>
  <div class="body-text">{$howto}</div>
</div>
<div class="sec">
  <h2>💡 Mẹo <span>Tận Dụng Bonus</span></h2>
  <div class="body-text"><p>{$tips}</p></div>
</div>
<div class="sec">
  <h2>❓ Câu Hỏi <span>Thường Gặp</span></h2>
  <div class="faq"><div class="fq">Vòng cược của {$b['name']} là bao nhiêu? <span class="fi">+</span></div><div class="fa">{$faq1a}</div></div>
  <div class="faq"><div class="fq">{$b['name']} có hiệu lực bao lâu? <span class="fi">+</span></div><div class="fa">{$faq2a}</div></div>
  <div class="faq"><div class="fq">Nhà cái nào có {$b['name']} tốt nhất? <span class="fi">+</span></div><div class="fa">{$faq3a}</div></div>
</div>
<div class="bonus-card" style="margin:0 16px 20px">
  <div class="bonus-amount">🔥 Đăng Ký Ngay</div>
  <div class="bonus-type">Nhận {$b['amount']} cho thành viên mới</div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="btn" style="margin-top:0">Nhận Bonus →</a>
</div>
<nav class="bnav">
  <a href="/" class="ni"><span class="ico">🏠</span>Trang Chủ</a>
  <a href="/casino/" class="ni"><span class="ico">🎰</span>Nhà Cái</a>
  <a href="/slots/" class="ni"><span class="ico">🎲</span>Slots</a>
  <a href="/khuyen-mai/" class="ni a"><span class="ico">🎁</span>Bonus</a>
  <a href="/huong-dan/" class="ni"><span class="ico">📖</span>Hướng Dẫn</a>
</nav>
<script>document.querySelectorAll('.fq').forEach(q=>q.addEventListener('click',()=>q.closest('.faq').classList.toggle('open')));</script>
</body>
</html>
HTML;

    $dir = $BASE.'/khuyen-mai/'.$slug;
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    file_put_contents($dir.'/index.html', $html);
    echo "    ✅ /khuyen-mai/{$slug}/\n\n";
    sleep(2);
}

// Bonus listing page
echo "📋 Generating bonus listing...\n";
$listing = '<!DOCTYPE html><html lang="vi"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Khuyến Mãi Casino | Bonus & Free Spin Hấp Dẫn</title><meta name="description" content="Tổng hợp tất cả khuyến mãi casino online tại Việt Nam. Bonus chào mừng, free spin, cashback và nhiều ưu đãi hấp dẫn khác."><link rel="icon" type="image/png" href="/favicon.png"><link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"><style>*{margin:0;padding:0;box-sizing:border-box}:root{--g1:#7B2FBE;--g2:#EA4C89;--dark:#0D0D1A;--card:#161625;--gold:#FFD166;--text:#F0F0FF;--muted:#8888AA}body{background:var(--dark);color:var(--text);font-family:"Nunito",sans-serif;max-width:480px;margin:0 auto;padding-bottom:80px}.topbar{background:rgba(13,13,26,.97);padding:12px 16px;display:flex;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(123,47,190,.2)}.logo{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;text-decoration:none}.ph{padding:20px 16px 10px}h1{font-size:22px;font-weight:900;margin-bottom:6px}h1 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}.sub{font-size:13px;color:var(--muted);margin-bottom:16px}.list{padding:0 16px;display:flex;flex-direction:column;gap:12px}.item{background:var(--card);border-radius:14px;overflow:hidden;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06);display:flex;gap:0}.thumb{width:90px;height:90px;flex-shrink:0;overflow:hidden;background:#1E1E32}.thumb img{width:100%;height:100%;object-fit:cover}.thumb .ph2{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:36px}.info{padding:14px;flex:1}.iname{font-size:15px;font-weight:800;margin-bottom:4px}.iamount{font-size:13px;color:var(--gold);font-weight:700;margin-bottom:4px}.idesc{font-size:12px;color:var(--muted)}.bnav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}.ni.a{color:#EA4C89}.ico{font-size:20px}</style></head><body><div class="topbar"><a href="/" class="logo">🎰 CasinoVN</a></div><div class="ph"><h1>Khuyến Mãi <span>Casino</span></h1><p class="sub">Tất cả bonus và ưu đãi hấp dẫn</p></div><div class="list">';

foreach ($BONUSES as $b) {
    $listing .= '<a href="/khuyen-mai/'.$b['slug'].'/" class="item"><div class="thumb"><img src="/images/bonuses/'.$b['slug'].'.jpg" alt="'.$b['name'].'" loading="lazy"></div><div class="info"><div class="iname">'.$b['title'].'</div><div class="iamount">🎁 '.$b['amount'].'</div><div class="idesc">'.$b['desc'].'</div></div></a>';
}

$listing .= '</div><nav class="bnav"><a href="/" class="ni"><span class="ico">🏠</span>Trang Chủ</a><a href="/casino/" class="ni"><span class="ico">🎰</span>Nhà Cái</a><a href="/slots/" class="ni"><span class="ico">🎲</span>Slots</a><a href="/khuyen-mai/" class="ni a"><span class="ico">🎁</span>Bonus</a><a href="/huong-dan/" class="ni"><span class="ico">📖</span>Hướng Dẫn</a></nav></body></html>';

file_put_contents($BASE.'/khuyen-mai/index.html', $listing);
echo "✅ Listing saved\n\n=== DONE ===\n⚠️  Run: rm gen_bonuses.php\n";
