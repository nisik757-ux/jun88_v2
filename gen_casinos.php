<?php
/**
 * Casino Pages Generator v2 - No JSON parsing, separate API calls
 * Run: php gen_casinos.php
 */

$OPENAI_KEY = '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';
$ANTHROPIC_KEY = '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';

$BASE = '/home/admin/web/jun88.men/public_html';
$CASINO_DIR = $BASE . '/casino';
$IMG_DIR = $BASE . '/images/casino';

$AFFILIATE_LINKS = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

if (!is_dir($CASINO_DIR)) mkdir($CASINO_DIR, 0755, true);
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

$CASINOS = [
    ['slug'=>'jun88','name'=>'Jun88','founded'=>'2019','license'=>'Isle of Man','bonus'=>'200% lên đến 10 triệu VND','rating'=>'4.8','games'=>'3000+','link_idx'=>0],
    ['slug'=>'1xbet','name'=>'1xBet','founded'=>'2007','license'=>'Curaçao','bonus'=>'100% lên đến 5 triệu VND','rating'=>'4.7','games'=>'5000+','link_idx'=>1],
    ['slug'=>'w88','name'=>'W88','founded'=>'2013','license'=>'Isle of Man','bonus'=>'150% lên đến 8 triệu VND','rating'=>'4.6','games'=>'2000+','link_idx'=>2],
    ['slug'=>'fb88','name'=>'FB88','founded'=>'2015','license'=>'Curaçao','bonus'=>'100% lên đến 3 triệu VND','rating'=>'4.5','games'=>'1500+','link_idx'=>0],
    ['slug'=>'88bet','name'=>'88Bet','founded'=>'2014','license'=>'Curaçao','bonus'=>'120% lên đến 4 triệu VND','rating'=>'4.4','games'=>'1800+','link_idx'=>1],
    ['slug'=>'bk8','name'=>'BK8','founded'=>'2014','license'=>'Isle of Man','bonus'=>'150% lên đến 6 triệu VND','rating'=>'4.6','games'=>'2500+','link_idx'=>2],
    ['slug'=>'dafabet','name'=>'Dafabet','founded'=>'2004','license'=>'Philippines PAGCOR','bonus'=>'100% lên đến 5 triệu VND','rating'=>'4.7','games'=>'2000+','link_idx'=>0],
    ['slug'=>'melbet','name'=>'Melbet','founded'=>'2012','license'=>'Curaçao','bonus'=>'130% lên đến 4 triệu VND','rating'=>'4.3','games'=>'3000+','link_idx'=>1],
    ['slug'=>'betwinner','name'=>'Betwinner','founded'=>'2018','license'=>'Curaçao','bonus'=>'100% lên đến 3 triệu VND','rating'=>'4.2','games'=>'2500+','link_idx'=>2],
    ['slug'=>'22bet','name'=>'22Bet','founded'=>'2018','license'=>'Curaçao','bonus'=>'122% lên đến 5 triệu VND','rating'=>'4.3','games'=>'1000+','link_idx'=>0],
    ['slug'=>'kubet','name'=>'Kubet','founded'=>'2015','license'=>'Philippines','bonus'=>'100% lên đến 2 triệu VND','rating'=>'4.2','games'=>'1200+','link_idx'=>1],
    ['slug'=>'shbet','name'=>'Shbet','founded'=>'2020','license'=>'Curaçao','bonus'=>'150% lên đến 3 triệu VND','rating'=>'4.1','games'=>'800+','link_idx'=>2],
    ['slug'=>'hi88','name'=>'Hi88','founded'=>'2019','license'=>'Curaçao','bonus'=>'100% lên đến 2 triệu VND','rating'=>'4.0','games'=>'900+','link_idx'=>0],
    ['slug'=>'f8bet','name'=>'F8bet','founded'=>'2020','license'=>'Philippines','bonus'=>'120% lên đến 3 triệu VND','rating'=>'4.1','games'=>'700+','link_idx'=>1],
    ['slug'=>'sv88','name'=>'SV88','founded'=>'2018','license'=>'Curaçao','bonus'=>'100% lên đến 2 triệu VND','rating'=>'4.0','games'=>'600+','link_idx'=>2],
    ['slug'=>'go88','name'=>'Go88','founded'=>'2019','license'=>'Curaçao','bonus'=>'100% lên đến 2 triệu VND','rating'=>'3.9','games'=>'500+','link_idx'=>0],
    ['slug'=>'789bet','name'=>'789Bet','founded'=>'2019','license'=>'Curaçao','bonus'=>'150% lên đến 3 triệu VND','rating'=>'4.0','games'=>'800+','link_idx'=>1],
    ['slug'=>'j88','name'=>'J88','founded'=>'2021','license'=>'Curaçao','bonus'=>'100% lên đến 2 triệu VND','rating'=>'3.8','games'=>'400+','link_idx'=>2],
    ['slug'=>'ok9','name'=>'Ok9','founded'=>'2020','license'=>'Philippines','bonus'=>'120% lên đến 2 triệu VND','rating'=>'3.9','games'=>'500+','link_idx'=>0],
    ['slug'=>'sin88','name'=>'Sin88','founded'=>'2020','license'=>'Curaçao','bonus'=>'100% lên đến 1.5 triệu VND','rating'=>'3.8','games'=>'400+','link_idx'=>1],
    ['slug'=>'tk88','name'=>'Tk88','founded'=>'2021','license'=>'Curaçao','bonus'=>'100% lên đến 2 triệu VND','rating'=>'3.7','games'=>'350+','link_idx'=>2],
    ['slug'=>'bong88','name'=>'Bong88','founded'=>'2010','license'=>'Philippines PAGCOR','bonus'=>'100% lên đến 3 triệu VND','rating'=>'4.2','games'=>'1000+','link_idx'=>0],
    ['slug'=>'nbet','name'=>'Nbet','founded'=>'2019','license'=>'Curaçao','bonus'=>'100% lên đến 2 triệu VND','rating'=>'3.8','games'=>'450+','link_idx'=>1],
    ['slug'=>'vn88','name'=>'Vn88','founded'=>'2016','license'=>'Isle of Man','bonus'=>'100% lên đến 3 triệu VND','rating'=>'4.1','games'=>'800+','link_idx'=>2],
    ['slug'=>'bet88','name'=>'Bet88','founded'=>'2018','license'=>'Philippines PAGCOR','bonus'=>'150% lên đến 4 triệu VND','rating'=>'4.2','games'=>'900+','link_idx'=>0],
];

function claude($prompt, $key, $tokens = 500) {
    $data = json_encode([
        'model' => 'claude-sonnet-4-6',
        'max_tokens' => $tokens,
        'messages' => [['role' => 'user', 'content' => $prompt]]
    ]);
    $ch = curl_init('https://api.anthropic.com/v1/messages');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => ['Content-Type: application/json', 'x-api-key: '.$key, 'anthropic-version: 2023-06-01'],
        CURLOPT_TIMEOUT => 60
    ]);
    $r = json_decode(curl_exec($ch), true);
    curl_close($ch);
    return trim($r['content'][0]['text'] ?? '');
}

function genImage($prompt, $file, $key, $dir) {
    $path = $dir.'/'.$file;
    $jpgPath = str_replace('.png', '.jpg', $path);
    if (file_exists($jpgPath)) { echo "    ✓ Image exists\n"; return '/images/casino/'.str_replace('.png','.jpg',$file); }
    echo "    🎨 Generating image...\n";
    $data = json_encode(['model'=>'gpt-image-1','prompt'=>$prompt.', dark luxury casino theme, no text','n'=>1,'size'=>'1024x1024','output_format'=>'png']);
    $ch = curl_init('https://api.openai.com/v1/images/generations');
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER=>true,CURLOPT_POST=>true,CURLOPT_POSTFIELDS=>$data,CURLOPT_HTTPHEADER=>['Content-Type: application/json','Authorization: Bearer '.$key],CURLOPT_TIMEOUT=>90]);
    $r = json_decode(curl_exec($ch), true);
    curl_close($ch);
    if (!isset($r['data'][0]['b64_json'])) { echo "    ❌ Image error\n"; return null; }
    file_put_contents($path, base64_decode($r['data'][0]['b64_json']));
    $img = imagecreatefrompng($path);
    imagejpeg($img, $jpgPath, 82);
    imagedestroy($img);
    unlink($path);
    echo "    ✅ Image saved\n";
    return '/images/casino/'.str_replace('.png','.jpg',$file);
}

function stars($r) {
    return str_repeat('★', floor($r)) . (($r - floor($r)) >= 0.5 ? '½' : '') . str_repeat('☆', 5 - ceil($r));
}

echo "=== CASINO GENERATOR v2 ===\n\n";

foreach ($CASINOS as $i => $c) {
    $n = $c['name']; $s = $c['slug'];
    echo "[".($i+1)."/".count($CASINOS)."] $n\n";

    // Generate image
    $imgPath = genImage("Online casino $n Vietnam professional banner, showing casino games slots live dealer mobile interface", "{$s}_hero.png", $OPENAI_KEY, $IMG_DIR);

    // Generate texts - separate calls, no JSON
    echo "    ✍️  Generating intro...\n";
    $intro = claude("Viết 2 câu giới thiệu về nhà cái {$n} (thành lập {$c['founded']}, giấy phép {$c['license']}, {$c['games']} trò chơi). Viết tự nhiên như người thật, tiếng Việt. Chỉ trả lời 2 câu, không thêm gì.", $ANTHROPIC_KEY, 200);

    echo "    ✍️  Generating body...\n";
    $body = claude("Viết 3 đoạn văn đánh giá nhà cái {$n} cho người chơi Việt Nam. Đoạn 1: về uy tín và lịch sử (thành lập {$c['founded']}, giấy phép {$c['license']}). Đoạn 2: về trò chơi và bonus ({$c['games']} game, bonus {$c['bonus']}). Đoạn 3: về thanh toán và hỗ trợ. Mỗi đoạn 3-4 câu, viết như người thật đã dùng qua. Bọc mỗi đoạn trong thẻ <p>. Chỉ trả lời các đoạn văn, không thêm gì.", $ANTHROPIC_KEY, 800);

    echo "    ✍️  Generating pros...\n";
    $pros_text = claude("Liệt kê 4 ưu điểm của nhà cái {$n} (giấy phép {$c['license']}, bonus {$c['bonus']}, {$c['games']} game). Mỗi ưu điểm 1 dòng ngắn, bắt đầu bằng <li>. Chỉ trả lời 4 dòng <li>, không thêm gì.", $ANTHROPIC_KEY, 200);

    echo "    ✍️  Generating cons...\n";
    $cons_text = claude("Liệt kê 3 nhược điểm thực tế của nhà cái {$n}. Mỗi nhược điểm 1 dòng ngắn, bắt đầu bằng <li>. Chỉ trả lời 3 dòng <li>, không thêm gì.", $ANTHROPIC_KEY, 150);

    echo "    ✍️  Generating FAQ...\n";
    $faq1q = "{$n} có uy tín không?";
    $faq1a = claude("Trả lời câu hỏi '{$n} có uy tín không?' trong 2 câu ngắn, đề cập giấy phép {$c['license']} và năm thành lập {$c['founded']}. Chỉ trả lời 2 câu.", $ANTHROPIC_KEY, 150);

    $faq2q = "Bonus tại {$n} là bao nhiêu?";
    $faq2a = claude("Trả lời câu hỏi về bonus {$c['bonus']} tại {$n} trong 2 câu. Chỉ trả lời 2 câu.", $ANTHROPIC_KEY, 150);

    $faq3q = "Rút tiền tại {$n} mất bao lâu?";
    $faq3a = claude("Trả lời câu hỏi về thời gian rút tiền tại {$n} trong 2 câu. Đề cập ví điện tử và ngân hàng. Chỉ trả lời 2 câu.", $ANTHROPIC_KEY, 150);

    echo "    ✍️  Generating conclusion...\n";
    $conclusion = claude("Viết kết luận 2-3 câu về nhà cái {$n} cho người chơi Việt Nam đang cân nhắc đăng ký. Tự nhiên, trung thực. Chỉ trả lời 2-3 câu.", $ANTHROPIC_KEY, 200);

    $affiliateLink = $AFFILIATE_LINKS[$c['link_idx']];
    $rating = $c['rating'];
    $starsHtml = stars((float)$rating);
    $imgTag = $imgPath ? "<img src=\"{$imgPath}\" alt=\"{$n} casino online Vietnam\" title=\"Đánh giá {$n} Casino 2026\">" : "<div class=\"img-ph\">🎰</div>";

    $html = <<<HTML
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$n} Casino | Đánh Giá Chi Tiết 2026 | Bonus {$c['bonus']}</title>
<meta name="description" content="Đánh giá {$n} Casino 2026 - Bonus {$c['bonus']}, {$c['games']} trò chơi, rút tiền nhanh. Xem ưu nhược điểm và hướng dẫn đăng ký.">
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
.hero .img-ph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:60px}
.header{padding:16px}
.name-row{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:6px}
.casino-h1{font-size:24px;font-weight:900}
.badge{background:linear-gradient(135deg,var(--g1),var(--g2));color:#fff;padding:6px 12px;border-radius:10px;font-size:16px;font-weight:800}
.stars{color:var(--gold);font-size:16px;margin-bottom:8px}
.intro{font-size:13px;color:var(--muted);line-height:1.6}
.cta{margin:0 16px 16px;background:linear-gradient(135deg,#1a0533,#2d0a4e);border:1px solid rgba(123,47,190,.3);border-radius:16px;padding:16px;text-align:center}
.bonus{font-size:22px;font-weight:900;background:linear-gradient(135deg,var(--gold),#FFA500);-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:4px}
.bonus-sub{font-size:12px;color:var(--muted);margin-bottom:12px}
.btn{display:block;background:linear-gradient(135deg,var(--g1),var(--g2));color:#fff;padding:14px;border-radius:12px;font-weight:800;font-size:16px;text-decoration:none}
.sec{padding:0 16px;margin-bottom:20px}
.sec h2{font-size:17px;font-weight:800;margin-bottom:12px;padding-bottom:6px;border-bottom:1px solid rgba(255,255,255,.08)}
.sec h2 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.grid{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.icard{background:var(--card);border-radius:12px;padding:12px;border:1px solid rgba(255,255,255,.06)}
.ilabel{font-size:11px;color:var(--muted);margin-bottom:4px}
.ivalue{font-size:14px;font-weight:700}
.body-text{font-size:13px;color:rgba(240,240,255,.85);line-height:1.7}
.body-text p{margin-bottom:12px}
.pc{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.pros,.cons{background:var(--card);border-radius:12px;padding:12px;border:1px solid rgba(255,255,255,.06)}
.pt{color:var(--green);font-size:13px;font-weight:800;margin-bottom:8px}
.ct{color:var(--red);font-size:13px;font-weight:800;margin-bottom:8px}
.pros li,.cons li{font-size:12px;color:var(--muted);margin-bottom:6px;padding-left:16px;position:relative;list-style:none}
.pros li:before{content:'✓';position:absolute;left:0;color:var(--green)}
.cons li:before{content:'✗';position:absolute;left:0;color:var(--red)}
.faq{background:var(--card);border-radius:12px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.fq{padding:14px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;cursor:pointer}
.fi{color:var(--g2);transition:.2s}
.faq.open .fi{transform:rotate(45deg)}
.fa{font-size:12px;color:var(--muted);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq.open .fa{max-height:300px;padding:0 16px 14px}
.bnav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}
.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}
.ni.a{color:#EA4C89}
.ico{font-size:20px}
</style>
</head>
<body>
<div class="topbar"><a href="/" class="logo">🎰 CasinoVN</a><a href="/casino/" class="back">← Nhà Cái</a></div>
<div class="hero">{$imgTag}</div>
<div class="header">
  <div class="name-row">
    <h1 class="casino-h1">{$n} Casino</h1>
    <div class="badge">{$rating}/5</div>
  </div>
  <div class="stars">{$starsHtml}</div>
  <p class="intro">{$intro}</p>
</div>
<div class="cta">
  <div class="bonus">🎁 {$c['bonus']}</div>
  <div class="bonus-sub">Bonus chào mừng cho thành viên mới</div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="btn">Đăng Ký Nhận Bonus →</a>
</div>
<div class="sec">
  <h2>📋 Thông Tin <span>Tổng Quan</span></h2>
  <div class="grid">
    <div class="icard"><div class="ilabel">Năm thành lập</div><div class="ivalue">{$c['founded']}</div></div>
    <div class="icard"><div class="ilabel">Giấy phép</div><div class="ivalue">{$c['license']}</div></div>
    <div class="icard"><div class="ilabel">Số trò chơi</div><div class="ivalue">{$c['games']}</div></div>
    <div class="icard"><div class="ilabel">Đánh giá</div><div class="ivalue">{$rating}/5 ⭐</div></div>
    <div class="icard"><div class="ilabel">Nạp tối thiểu</div><div class="ivalue">100,000 VND</div></div>
    <div class="icard"><div class="ilabel">Rút tiền</div><div class="ivalue">15-30 phút</div></div>
  </div>
</div>
<div class="sec">
  <h2>📝 Đánh Giá <span>Chi Tiết</span></h2>
  <div class="body-text">{$body}</div>
</div>
<div class="sec">
  <h2>⚖️ Ưu & <span>Nhược Điểm</span></h2>
  <div class="pc">
    <div class="pros"><div class="pt">✅ Ưu điểm</div><ul>{$pros_text}</ul></div>
    <div class="cons"><div class="ct">❌ Nhược điểm</div><ul>{$cons_text}</ul></div>
  </div>
</div>
<div class="cta" style="margin:0 16px 20px">
  <div class="bonus">🔥 Đăng Ký Ngay</div>
  <div class="bonus-sub">Nhận {$c['bonus']} cho thành viên mới</div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="btn">Tạo Tài Khoản Miễn Phí →</a>
</div>
<div class="sec">
  <h2>❓ Câu Hỏi <span>Thường Gặp</span></h2>
  <div class="faq"><div class="fq">{$faq1q} <span class="fi">+</span></div><div class="fa">{$faq1a}</div></div>
  <div class="faq"><div class="fq">{$faq2q} <span class="fi">+</span></div><div class="fa">{$faq2a}</div></div>
  <div class="faq"><div class="fq">{$faq3q} <span class="fi">+</span></div><div class="fa">{$faq3a}</div></div>
</div>
<div class="sec">
  <h2>🏆 <span>Kết Luận</span></h2>
  <div class="body-text"><p>{$conclusion}</p></div>
</div>
<nav class="bnav">
  <a href="/" class="ni"><span class="ico">🏠</span>Trang Chủ</a>
  <a href="/casino/" class="ni a"><span class="ico">🎰</span>Nhà Cái</a>
  <a href="/slots/" class="ni"><span class="ico">🎲</span>Slots</a>
  <a href="/khuyen-mai/" class="ni"><span class="ico">🎁</span>Bonus</a>
  <a href="/huong-dan/" class="ni"><span class="ico">📖</span>Hướng Dẫn</a>
</nav>
<script>document.querySelectorAll('.fq').forEach(q=>q.addEventListener('click',()=>q.closest('.faq').classList.toggle('open')));</script>
</body>
</html>
HTML;

    $dir = $BASE.'/casino/'.$s;
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    file_put_contents($dir.'/index.html', $html);
    echo "    ✅ Saved: /casino/{$s}/\n\n";
    sleep(2);
}

// Casino listing page
echo "📋 Generating listing page...\n";
$listing = '<!DOCTYPE html><html lang="vi"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Danh Sách Nhà Cái Casino Uy Tín Việt Nam 2026</title><meta name="description" content="So sánh 25+ nhà cái casino online uy tín nhất Việt Nam 2026. Đánh giá bonus, trò chơi và rút tiền."><link rel="icon" type="image/png" href="/favicon.png"><link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"><style>*{margin:0;padding:0;box-sizing:border-box}:root{--g1:#7B2FBE;--g2:#EA4C89;--dark:#0D0D1A;--card:#161625;--gold:#FFD166;--text:#F0F0FF;--muted:#8888AA}body{background:var(--dark);color:var(--text);font-family:"Nunito",sans-serif;max-width:480px;margin:0 auto;padding-bottom:80px}.topbar{background:rgba(13,13,26,.97);padding:12px 16px;display:flex;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(123,47,190,.2)}.logo{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;text-decoration:none}.ph{padding:20px 16px 10px}h1{font-size:22px;font-weight:900;margin-bottom:6px}h1 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}.sub{font-size:13px;color:var(--muted)}.list{padding:0 16px;display:flex;flex-direction:column;gap:10px}.item{background:var(--card);border-radius:14px;padding:14px;display:flex;gap:12px;align-items:center;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06)}.rank{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,var(--g1),var(--g2));display:flex;align-items:center;justify-content:center;font-weight:900;font-size:13px;flex-shrink:0}.thumb{width:48px;height:48px;border-radius:10px;overflow:hidden;flex-shrink:0;background:#1E1E32}.thumb img{width:100%;height:100%;object-fit:cover}.info{flex:1}.iname{font-size:15px;font-weight:800;margin-bottom:2px}.ibonus{font-size:11px;color:var(--gold);font-weight:700}.irating{font-size:12px;color:var(--muted);margin-top:2px}.arr{color:#EA4C89;font-size:18px}.bnav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}.ni.a{color:#EA4C89}.ico{font-size:20px}</style></head><body><div class="topbar"><a href="/" class="logo">🎰 CasinoVN</a></div><div class="ph"><h1>Nhà Cái <span>Uy Tín</span> 2026</h1><p class="sub">25+ nhà cái được đánh giá độc lập</p></div><div class="list">';

foreach ($CASINOS as $i => $c) {
    $listing .= '<a href="/casino/'.$c['slug'].'/" class="item"><div class="rank">'.($i+1).'</div><div class="thumb"><img src="/images/casino/'.$c['slug'].'_hero.jpg" alt="'.$c['name'].'" loading="lazy"></div><div class="info"><div class="iname">'.$c['name'].' Casino</div><div class="ibonus">🎁 '.$c['bonus'].'</div><div class="irating">⭐ '.$c['rating'].'/5 · '.$c['games'].' trò chơi</div></div><div class="arr">›</div></a>';
}

$listing .= '</div><nav class="bnav"><a href="/" class="ni"><span class="ico">🏠</span>Trang Chủ</a><a href="/casino/" class="ni a"><span class="ico">🎰</span>Nhà Cái</a><a href="/slots/" class="ni"><span class="ico">🎲</span>Slots</a><a href="/khuyen-mai/" class="ni"><span class="ico">🎁</span>Bonus</a><a href="/huong-dan/" class="ni"><span class="ico">📖</span>Hướng Dẫn</a></nav></body></html>';

file_put_contents($BASE.'/casino/index.html', $listing);
echo "✅ Listing saved\n\n=== DONE ===\n⚠️  Run: rm gen_casinos.php\n";
