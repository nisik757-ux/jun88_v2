<?php
/**
 * Casino Pages Generator for jun88.men
 * Generates 25 casino review pages with AI images and unique Vietnamese text
 * Run: php generate_casino_pages.php
 * Takes ~20-30 minutes to complete
 */

$OPENAI_KEY = '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';
$ANTHROPIC_KEY = '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';

$BASE = '/home/admin/web/jun88.men/public_html';
$CASINO_DIR = $BASE . '/casino';
$IMG_DIR = $BASE . '/images/casino';

// Affiliate links - rotate between 3
$AFFILIATE_LINKS = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

// Create directories
if (!is_dir($CASINO_DIR)) mkdir($CASINO_DIR, 0755, true);
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

// 25 casinos list
$CASINOS = [
    ['slug' => 'jun88', 'name' => 'Jun88', 'founded' => '2019', 'license' => 'Isle of Man', 'bonus' => '200% lên đến 10 triệu VND', 'rating' => '4.8', 'games' => '3000+', 'link_idx' => 0],
    ['slug' => '1xbet', 'name' => '1xBet', 'founded' => '2007', 'license' => 'Curaçao', 'bonus' => '100% lên đến 5 triệu VND', 'rating' => '4.7', 'games' => '5000+', 'link_idx' => 1],
    ['slug' => 'w88', 'name' => 'W88', 'founded' => '2013', 'license' => 'Isle of Man', 'bonus' => '150% lên đến 8 triệu VND', 'rating' => '4.6', 'games' => '2000+', 'link_idx' => 2],
    ['slug' => 'fb88', 'name' => 'FB88', 'founded' => '2015', 'license' => 'Curaçao', 'bonus' => '100% lên đến 3 triệu VND', 'rating' => '4.5', 'games' => '1500+', 'link_idx' => 0],
    ['slug' => '88bet', 'name' => '88Bet', 'founded' => '2014', 'license' => 'Curaçao', 'bonus' => '120% lên đến 4 triệu VND', 'rating' => '4.4', 'games' => '1800+', 'link_idx' => 1],
    ['slug' => 'bk8', 'name' => 'BK8', 'founded' => '2014', 'license' => 'Isle of Man', 'bonus' => '150% lên đến 6 triệu VND', 'rating' => '4.6', 'games' => '2500+', 'link_idx' => 2],
    ['slug' => 'dafabet', 'name' => 'Dafabet', 'founded' => '2004', 'license' => 'Philippines PAGCOR', 'bonus' => '100% lên đến 5 triệu VND', 'rating' => '4.7', 'games' => '2000+', 'link_idx' => 0],
    ['slug' => 'melbet', 'name' => 'Melbet', 'founded' => '2012', 'license' => 'Curaçao', 'bonus' => '130% lên đến 4 triệu VND', 'rating' => '4.3', 'games' => '3000+', 'link_idx' => 1],
    ['slug' => 'betwinner', 'name' => 'Betwinner', 'founded' => '2018', 'license' => 'Curaçao', 'bonus' => '100% lên đến 3 triệu VND', 'rating' => '4.2', 'games' => '2500+', 'link_idx' => 2],
    ['slug' => '22bet', 'name' => '22Bet', 'founded' => '2018', 'license' => 'Curaçao', 'bonus' => '122% lên đến 5 triệu VND', 'rating' => '4.3', 'games' => '1000+', 'link_idx' => 0],
    ['slug' => 'kubet', 'name' => 'Kubet', 'founded' => '2015', 'license' => 'Philippines', 'bonus' => '100% lên đến 2 triệu VND', 'rating' => '4.2', 'games' => '1200+', 'link_idx' => 1],
    ['slug' => 'shbet', 'name' => 'Shbet', 'founded' => '2020', 'license' => 'Curaçao', 'bonus' => '150% lên đến 3 triệu VND', 'rating' => '4.1', 'games' => '800+', 'link_idx' => 2],
    ['slug' => 'hi88', 'name' => 'Hi88', 'founded' => '2019', 'license' => 'Curaçao', 'bonus' => '100% lên đến 2 triệu VND', 'rating' => '4.0', 'games' => '900+', 'link_idx' => 0],
    ['slug' => 'f8bet', 'name' => 'F8bet', 'founded' => '2020', 'license' => 'Philippines', 'bonus' => '120% lên đến 3 triệu VND', 'rating' => '4.1', 'games' => '700+', 'link_idx' => 1],
    ['slug' => 'sv88', 'name' => 'SV88', 'founded' => '2018', 'license' => 'Curaçao', 'bonus' => '100% lên đến 2 triệu VND', 'rating' => '4.0', 'games' => '600+', 'link_idx' => 2],
    ['slug' => 'go88', 'name' => 'Go88', 'founded' => '2019', 'license' => 'Curaçao', 'bonus' => '100% lên đến 2 triệu VND', 'rating' => '3.9', 'games' => '500+', 'link_idx' => 0],
    ['slug' => '789bet', 'name' => '789Bet', 'founded' => '2019', 'license' => 'Curaçao', 'bonus' => '150% lên đến 3 triệu VND', 'rating' => '4.0', 'games' => '800+', 'link_idx' => 1],
    ['slug' => 'j88', 'name' => 'J88', 'founded' => '2021', 'license' => 'Curaçao', 'bonus' => '100% lên đến 2 triệu VND', 'rating' => '3.8', 'games' => '400+', 'link_idx' => 2],
    ['slug' => 'ok9', 'name' => 'Ok9', 'founded' => '2020', 'license' => 'Philippines', 'bonus' => '120% lên đến 2 triệu VND', 'rating' => '3.9', 'games' => '500+', 'link_idx' => 0],
    ['slug' => 'sin88', 'name' => 'Sin88', 'founded' => '2020', 'license' => 'Curaçao', 'bonus' => '100% lên đến 1.5 triệu VND', 'rating' => '3.8', 'games' => '400+', 'link_idx' => 1],
    ['slug' => 'tk88', 'name' => 'Tk88', 'founded' => '2021', 'license' => 'Curaçao', 'bonus' => '100% lên đến 2 triệu VND', 'rating' => '3.7', 'games' => '350+', 'link_idx' => 2],
    ['slug' => 'bong88', 'name' => 'Bong88', 'founded' => '2010', 'license' => 'Philippines PAGCOR', 'bonus' => '100% lên đến 3 triệu VND', 'rating' => '4.2', 'games' => '1000+', 'link_idx' => 0],
    ['slug' => 'nbet', 'name' => 'Nbet', 'founded' => '2019', 'license' => 'Curaçao', 'bonus' => '100% lên đến 2 triệu VND', 'rating' => '3.8', 'games' => '450+', 'link_idx' => 1],
    ['slug' => 'vn88', 'name' => 'Vn88', 'founded' => '2016', 'license' => 'Isle of Man', 'bonus' => '100% lên đến 3 triệu VND', 'rating' => '4.1', 'games' => '800+', 'link_idx' => 2],
    ['slug' => 'bet88', 'name' => 'Bet88', 'founded' => '2018', 'license' => 'Philippines PAGCOR', 'bonus' => '150% lên đến 4 triệu VND', 'rating' => '4.2', 'games' => '900+', 'link_idx' => 0],
];

// Text angle - different for each casino to ensure uniqueness
$TEXT_ANGLES = [
    'Tập trung vào trải nghiệm người dùng và tốc độ nạp rút tiền',
    'Nhấn mạnh sự đa dạng của trò chơi và nhà cung cấp phần mềm',
    'Nổi bật với chương trình khách hàng thân thiết và VIP',
    'Đặc biệt về cá cược thể thao và live casino',
    'Chuyên về slots và jackpot tiến bộ',
    'Ưu điểm về hỗ trợ khách hàng 24/7 và đa ngôn ngữ',
    'Tập trung vào bảo mật và uy tín lâu năm',
    'Nổi bật với bonus không cần nạp và free spin',
    'Đặc biệt về phương thức thanh toán địa phương Việt Nam',
    'Chuyên về live dealer và casino trực tuyến',
];

// ============================================
// FUNCTIONS
// ============================================

function generateImage($prompt, $filename, $openaiKey, $imgDir) {
    $filepath = $imgDir . '/' . $filename;
    if (file_exists($filepath)) {
        echo "    ✓ Image exists: $filename\n";
        return '/images/casino/' . $filename;
    }
    echo "    🎨 Generating image: $filename...\n";
    $data = json_encode([
        'model' => 'gpt-image-1',
        'prompt' => $prompt . ', professional casino website banner, no text, no watermark',
        'n' => 1,
        'size' => '1024x1024',
        'response_format' => 'b64_json',
        'output_format' => 'png',
    ]);
    $ch = curl_init('https://api.openai.com/v1/images/generations');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $openaiKey
        ],
        CURLOPT_TIMEOUT => 90
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($response, true);
    if (!isset($result['data'][0]['b64_json'])) {
        echo "    ❌ Image error: " . ($result['error']['message'] ?? 'Unknown') . "\n";
        return null;
    }
    $imageData = base64_decode($result['data'][0]['b64_json']);
    file_put_contents($filepath, $imageData);
    // Convert to JPEG
    $img = imagecreatefrompng($filepath);
    $jpgPath = str_replace('.png', '.jpg', $filepath);
    imagejpeg($img, $jpgPath, 82);
    imagedestroy($img);
    unlink($filepath);
    echo "    ✅ Image saved: " . basename($jpgPath) . "\n";
    return '/images/casino/' . str_replace('.png', '.jpg', $filename);
}

function generateText($prompt, $anthropicKey) {
    $data = json_encode([
        'model' => 'claude-sonnet-4-6',
        'max_tokens' => 1500,
        'messages' => [['role' => 'user', 'content' => $prompt]]
    ]);
    $ch = curl_init('https://api.anthropic.com/v1/messages');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'x-api-key: ' . $anthropicKey,
            'anthropic-version: 2023-06-01'
        ],
        CURLOPT_TIMEOUT => 60
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($response, true);
    return $result['content'][0]['text'] ?? '';
}

function renderStars($rating) {
    $full = floor($rating);
    $half = ($rating - $full) >= 0.5 ? 1 : 0;
    $empty = 5 - $full - $half;
    return str_repeat('★', $full) . ($half ? '½' : '') . str_repeat('☆', $empty);
}

function generateCasinoPage($casino, $affiliateLink, $angle, $imgPath, $texts, $baseDir) {
    $slug = $casino['slug'];
    $name = $casino['name'];
    $rating = $casino['rating'];
    $bonus = $casino['bonus'];
    $games = $casino['games'];
    $founded = $casino['founded'];
    $license = $casino['license'];
    $stars = renderStars((float)$rating);

    $intro = $texts['intro'];
    $body = $texts['body'];
    $pros = $texts['pros'];
    $cons = $texts['cons'];
    $faq1q = $texts['faq1q'];
    $faq1a = $texts['faq1a'];
    $faq2q = $texts['faq2q'];
    $faq2a = $texts['faq2a'];
    $faq3q = $texts['faq3q'];
    $faq3a = $texts['faq3a'];
    $conclusion = $texts['conclusion'];

    $imgTag = $imgPath
        ? "<img src=\"{$imgPath}\" alt=\"{$name} casino online Vietnam review\" title=\"Đánh giá {$name} - Nhà cái uy tín Việt Nam\" loading=\"lazy\">"
        : "<div class=\"img-ph\">🎰</div>";

    $html = <<<HTML
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$name} Casino | Đánh Giá Chi Tiết 2026 | Bonus & Uy Tín</title>
<meta name="description" content="Đánh giá {$name} Casino 2026 - Bonus {$bonus}, {$games} trò chơi, rút tiền nhanh. Xem chi tiết ưu nhược điểm và hướng dẫn đăng ký.">
<link rel="icon" type="image/png" href="/favicon.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{--g1:#7B2FBE;--g2:#EA4C89;--dark:#0D0D1A;--card:#161625;--card2:#1E1E32;--gold:#FFD166;--text:#F0F0FF;--muted:#8888AA;--green:#06D6A0;--red:#EF476F}
body{background:var(--dark);color:var(--text);font-family:'Nunito',sans-serif;max-width:480px;margin:0 auto;padding-bottom:80px}
.topbar{background:rgba(13,13,26,.97);padding:12px 16px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(123,47,190,.2)}
.logo{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;text-decoration:none}
.back-btn{color:var(--muted);font-size:13px;text-decoration:none;font-weight:700}

.hero-img{width:100%;height:200px;overflow:hidden;position:relative;background:var(--card2)}
.hero-img img{width:100%;height:100%;object-fit:cover}
.hero-img .img-ph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:60px}

.casino-header{padding:16px}
.casino-name-row{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:8px}
.casino-title{font-size:24px;font-weight:900}
.rating-badge{background:linear-gradient(135deg,var(--g1),var(--g2));color:#fff;padding:6px 12px;border-radius:10px;font-size:16px;font-weight:800}
.stars{color:var(--gold);font-size:16px;margin-bottom:6px}
.casino-intro{font-size:13px;color:var(--muted);line-height:1.6}

.cta-box{margin:0 16px 16px;background:linear-gradient(135deg,#1a0533,#2d0a4e);border:1px solid rgba(123,47,190,.3);border-radius:16px;padding:16px;text-align:center}
.bonus-amount{font-size:22px;font-weight:900;background:linear-gradient(135deg,var(--gold),#FFA500);-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:4px}
.bonus-label{font-size:12px;color:var(--muted);margin-bottom:12px}
.cta-btn{display:block;background:linear-gradient(135deg,var(--g1),var(--g2));color:#fff;padding:14px;border-radius:12px;font-weight:800;font-size:16px;text-decoration:none}

.section{padding:0 16px;margin-bottom:20px}
.section h2{font-size:17px;font-weight:800;margin-bottom:12px;padding-bottom:6px;border-bottom:1px solid rgba(255,255,255,.08)}
.section h2 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}

.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.info-card{background:var(--card);border-radius:12px;padding:12px;border:1px solid rgba(255,255,255,.06)}
.info-label{font-size:11px;color:var(--muted);margin-bottom:4px}
.info-value{font-size:14px;font-weight:700}

.body-text{font-size:13px;color:rgba(240,240,255,.85);line-height:1.7}
.body-text p{margin-bottom:12px}

.pros-cons{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.pros,.cons{background:var(--card);border-radius:12px;padding:12px;border:1px solid rgba(255,255,255,.06)}
.pros-title{color:var(--green);font-size:13px;font-weight:800;margin-bottom:8px}
.cons-title{color:var(--red);font-size:13px;font-weight:800;margin-bottom:8px}
.pros li,.cons li{font-size:12px;color:var(--muted);margin-bottom:6px;padding-left:16px;position:relative;list-style:none}
.pros li:before{content:'✓';position:absolute;left:0;color:var(--green)}
.cons li:before{content:'✗';position:absolute;left:0;color:var(--red)}

.faq-item{background:var(--card);border-radius:12px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.faq-q{padding:14px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;cursor:pointer}
.faq-ico{color:var(--g2);transition:.2s}
.faq-item.open .faq-ico{transform:rotate(45deg)}
.faq-a{font-size:12px;color:var(--muted);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq-item.open .faq-a{max-height:300px;padding:0 16px 14px}

.bottom-nav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}
.nav-item{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}
.nav-icon{font-size:20px}
</style>
</head>
<body>

<div class="topbar">
  <a href="/" class="logo">🎰 CasinoVN</a>
  <a href="/casino/" class="back-btn">← Nhà Cái</a>
</div>

<div class="hero-img">{$imgTag}</div>

<div class="casino-header">
  <div class="casino-name-row">
    <h1 class="casino-title">{$name} Casino</h1>
    <div class="rating-badge">{$rating}/5</div>
  </div>
  <div class="stars">{$stars}</div>
  <p class="casino-intro">{$intro}</p>
</div>

<div class="cta-box">
  <div class="bonus-amount">🎁 {$bonus}</div>
  <div class="bonus-label">Bonus chào mừng cho thành viên mới</div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="cta-btn">Đăng Ký Nhận Bonus →</a>
</div>

<div class="section">
  <h2>📋 Thông Tin <span>Tổng Quan</span></h2>
  <div class="info-grid">
    <div class="info-card"><div class="info-label">Năm thành lập</div><div class="info-value">{$founded}</div></div>
    <div class="info-card"><div class="info-label">Giấy phép</div><div class="info-value">{$license}</div></div>
    <div class="info-card"><div class="info-label">Số trò chơi</div><div class="info-value">{$games}</div></div>
    <div class="info-card"><div class="info-label">Đánh giá</div><div class="info-value">{$rating}/5 ⭐</div></div>
    <div class="info-card"><div class="info-label">Nạp tiền tối thiểu</div><div class="info-value">100,000 VND</div></div>
    <div class="info-card"><div class="info-label">Rút tiền</div><div class="info-value">15-30 phút</div></div>
  </div>
</div>

<div class="section">
  <h2>📝 Đánh Giá <span>Chi Tiết</span></h2>
  <div class="body-text">{$body}</div>
</div>

<div class="section">
  <h2>⚖️ Ưu & <span>Nhược Điểm</span></h2>
  <div class="pros-cons">
    <div class="pros">
      <div class="pros-title">✅ Ưu điểm</div>
      <ul>{$pros}</ul>
    </div>
    <div class="cons">
      <div class="cons-title">❌ Nhược điểm</div>
      <ul>{$cons}</ul>
    </div>
  </div>
</div>

<div class="cta-box" style="margin:0 16px 20px">
  <div class="bonus-amount">🔥 Đăng Ký Ngay</div>
  <div class="bonus-label">Nhận {$bonus} cho thành viên mới</div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="cta-btn">Tạo Tài Khoản Miễn Phí →</a>
</div>

<div class="section">
  <h2>❓ Câu Hỏi <span>Thường Gặp</span></h2>
  <div class="faq-item">
    <div class="faq-q">{$faq1q} <span class="faq-ico">+</span></div>
    <div class="faq-a">{$faq1a}</div>
  </div>
  <div class="faq-item">
    <div class="faq-q">{$faq2q} <span class="faq-ico">+</span></div>
    <div class="faq-a">{$faq2a}</div>
  </div>
  <div class="faq-item">
    <div class="faq-q">{$faq3q} <span class="faq-ico">+</span></div>
    <div class="faq-a">{$faq3a}</div>
  </div>
</div>

<div class="section">
  <h2>🏆 <span>Kết Luận</span></h2>
  <div class="body-text"><p>{$conclusion}</p></div>
</div>

<nav class="bottom-nav">
  <a href="/" class="nav-item"><span class="nav-icon">🏠</span>Trang Chủ</a>
  <a href="/casino/" class="nav-item"><span class="nav-icon">🎰</span>Nhà Cái</a>
  <a href="/slots/" class="nav-item"><span class="nav-icon">🎲</span>Slots</a>
  <a href="/khuyen-mai/" class="nav-item"><span class="nav-icon">🎁</span>Bonus</a>
  <a href="/huong-dan/" class="nav-item"><span class="nav-icon">📖</span>Hướng Dẫn</a>
</nav>

<script>
document.querySelectorAll('.faq-q').forEach(q=>{q.addEventListener('click',()=>q.closest('.faq-item').classList.toggle('open'))});
</script>
</body>
</html>
HTML;

    $dir = $baseDir . '/casino/' . $slug;
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    file_put_contents($dir . '/index.html', $html);
    echo "    ✅ Page saved: /casino/{$slug}/\n";
}

// ============================================
// MAIN LOOP
// ============================================

echo "=== CASINO PAGES GENERATOR ===\n";
echo "Generating " . count($CASINOS) . " casino pages...\n\n";

foreach ($CASINOS as $i => $casino) {
    $name = $casino['name'];
    $slug = $casino['slug'];
    $angle = $TEXT_ANGLES[$i % count($TEXT_ANGLES)];
    $affiliateLink = $AFFILIATE_LINKS[$casino['link_idx']];

    echo "[$($i+1)/" . count($CASINOS) . "] Processing: $name\n";

    // Generate image
    $imgPrompt = "Online casino {$name} Vietnam, professional gambling website hero banner, dark luxury theme with gold and purple accents, showing casino games interface, mobile app design, Vietnamese style";
    $imgFile = "{$slug}_hero.png";
    $imgPath = generateImage($imgPrompt, $imgFile, $OPENAI_KEY, $IMG_DIR);

    // Generate text content
    echo "    ✍️  Generating texts...\n";
    $textPrompt = "Bạn là chuyên gia đánh giá casino online tại Việt Nam. Viết nội dung đánh giá cho nhà cái {$name} theo góc độ: {$angle}.

Yêu cầu:
- Viết như người thật, tự nhiên, không có vẻ AI
- Tiếng Việt chuẩn, gần gũi với người Việt Nam
- Nhà cái thành lập năm {$casino['founded']}, giấy phép {$casino['license']}, {$casino['games']} trò chơi, bonus {$casino['bonus']}

Trả lời ĐÚNG format JSON sau, không thêm gì khác:
{
  \"intro\": \"2 câu giới thiệu ngắn về nhà cái\",
  \"body\": \"<p>Đoạn 1 về nhà cái (3-4 câu)</p><p>Đoạn 2 về trò chơi và bonus (3-4 câu)</p><p>Đoạn 3 về thanh toán và hỗ trợ (3-4 câu)</p>\",
  \"pros\": \"<li>Ưu điểm 1</li><li>Ưu điểm 2</li><li>Ưu điểm 3</li><li>Ưu điểm 4</li>\",
  \"cons\": \"<li>Nhược điểm 1</li><li>Nhược điểm 2</li><li>Nhược điểm 3</li>\",
  \"faq1q\": \"Câu hỏi 1 về nhà cái\",
  \"faq1a\": \"Trả lời câu hỏi 1 (2-3 câu)\",
  \"faq2q\": \"Câu hỏi 2 về bonus\",
  \"faq2a\": \"Trả lời câu hỏi 2 (2-3 câu)\",
  \"faq3q\": \"Câu hỏi 3 về rút tiền\",
  \"faq3a\": \"Trả lời câu hỏi 3 (2-3 câu)\",
  \"conclusion\": \"Kết luận 3-4 câu về nhà cái\"
}";

    $textRaw = generateText($textPrompt, $ANTHROPIC_KEY);

    // Parse JSON
    $texts = json_decode($textRaw, true);
    if (!$texts) {
        // Try to extract JSON
        preg_match('/\{.*\}/s', $textRaw, $matches);
        $texts = json_decode($matches[0] ?? '{}', true);
    }
    if (!$texts || !isset($texts['intro'])) {
        echo "    ⚠️  Text parse error, using fallback\n";
        $texts = [
            'intro' => "{$name} là một trong những nhà cái uy tín tại Việt Nam với nhiều năm kinh nghiệm.",
            'body' => "<p>{$name} cung cấp dịch vụ casino online chuyên nghiệp với {$casino['games']} trò chơi đa dạng.</p><p>Bonus chào mừng {$casino['bonus']} là một trong những ưu đãi hấp dẫn nhất trên thị trường.</p><p>Hỗ trợ khách hàng 24/7 và rút tiền nhanh chóng trong vòng 30 phút.</p>",
            'pros' => "<li>Bonus hấp dẫn</li><li>Trò chơi đa dạng</li><li>Rút tiền nhanh</li><li>Hỗ trợ 24/7</li>",
            'cons' => "<li>Cần xác minh danh tính</li><li>Giới hạn rút tiền hàng ngày</li><li>Một số game không hỗ trợ tiếng Việt</li>",
            'faq1q' => "{$name} có uy tín không?",
            'faq1a' => "{$name} được cấp phép bởi {$casino['license']} và hoạt động từ năm {$casino['founded']}. Đây là nhà cái uy tín với hàng triệu thành viên trên toàn thế giới.",
            'faq2q' => "Bonus tại {$name} là bao nhiêu?",
            'faq2a' => "{$name} cung cấp bonus chào mừng {$casino['bonus']} cho thành viên mới. Ngoài ra còn có nhiều ưu đãi hàng tuần và chương trình VIP.",
            'faq3q' => "Rút tiền tại {$name} mất bao lâu?",
            'faq3a' => "Thông thường rút tiền tại {$name} được xử lý trong vòng 15-30 phút qua ví điện tử. Chuyển khoản ngân hàng có thể mất 1-24 giờ.",
            'conclusion' => "{$name} là lựa chọn đáng tin cậy cho người chơi tại Việt Nam. Với bonus hấp dẫn và trò chơi đa dạng, đây là nhà cái xứng đáng để thử.",
        ];
    }

    // Generate page
    generateCasinoPage($casino, $affiliateLink, $angle, $imgPath, $texts, $BASE);

    echo "\n";
    sleep(3); // Rate limit between casinos
}

// Generate casino listing page
echo "📋 Generating casino listing page...\n";
$listingHtml = '<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Danh Sách Nhà Cái Casino Uy Tín Việt Nam 2026</title>
<meta name="description" content="Danh sách 25+ nhà cái casino online uy tín nhất Việt Nam 2026. So sánh bonus, trò chơi và đánh giá chi tiết từng nhà cái.">
<link rel="icon" type="image/png" href="/favicon.png">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{--g1:#7B2FBE;--g2:#EA4C89;--dark:#0D0D1A;--card:#161625;--gold:#FFD166;--text:#F0F0FF;--muted:#8888AA}
body{background:var(--dark);color:var(--text);font-family:"Nunito",sans-serif;max-width:480px;margin:0 auto;padding-bottom:80px}
.topbar{background:rgba(13,13,26,.97);padding:12px 16px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(123,47,190,.2)}
.logo{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;text-decoration:none}
.page-header{padding:20px 16px 10px}
h1{font-size:22px;font-weight:900;margin-bottom:6px}
h1 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.sub{font-size:13px;color:var(--muted)}
.casino-list{padding:0 16px;display:flex;flex-direction:column;gap:10px}
.casino-item{background:var(--card);border-radius:14px;padding:14px;display:flex;gap:12px;align-items:center;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06)}
.casino-rank{width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,var(--g1),var(--g2));display:flex;align-items:center;justify-content:center;font-weight:900;font-size:13px;flex-shrink:0}
.casino-thumb{width:48px;height:48px;border-radius:10px;overflow:hidden;flex-shrink:0;background:#1E1E32}
.casino-thumb img{width:100%;height:100%;object-fit:cover}
.casino-thumb .ph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:22px}
.casino-info{flex:1}
.casino-name{font-size:15px;font-weight:800;margin-bottom:2px}
.casino-bonus{font-size:11px;color:var(--gold);font-weight:700}
.casino-rating{font-size:12px;color:var(--muted);margin-top:2px}
.casino-arrow{color:var(--g2);font-size:18px}
.bottom-nav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}
.nav-item{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}
.nav-item.active{color:#EA4C89}
.nav-icon{font-size:20px}
</style>
</head>
<body>
<div class="topbar">
  <a href="/" class="logo">🎰 CasinoVN</a>
</div>
<div class="page-header">
  <h1>Nhà Cái <span>Uy Tín</span> 2026</h1>
  <p class="sub">25+ nhà cái được đánh giá độc lập bởi chuyên gia</p>
</div>
<div class="casino-list">';

foreach ($CASINOS as $i => $casino) {
    $imgSrc = "/images/casino/{$casino['slug']}_hero.jpg";
    $listingHtml .= "
  <a href=\"/casino/{$casino['slug']}/\" class=\"casino-item\">
    <div class=\"casino-rank\">" . ($i+1) . "</div>
    <div class=\"casino-thumb\"><img src=\"{$imgSrc}\" alt=\"{$casino['name']}\" loading=\"lazy\"></div>
    <div class=\"casino-info\">
      <div class=\"casino-name\">{$casino['name']} Casino</div>
      <div class=\"casino-bonus\">🎁 {$casino['bonus']}</div>
      <div class=\"casino-rating\">⭐ {$casino['rating']}/5 · {$casino['games']} trò chơi</div>
    </div>
    <div class=\"casino-arrow\">›</div>
  </a>";
}

$listingHtml .= '
</div>
<nav class="bottom-nav">
  <a href="/" class="nav-item"><span class="nav-icon">🏠</span>Trang Chủ</a>
  <a href="/casino/" class="nav-item active"><span class="nav-icon">🎰</span>Nhà Cái</a>
  <a href="/slots/" class="nav-item"><span class="nav-icon">🎲</span>Slots</a>
  <a href="/khuyen-mai/" class="nav-item"><span class="nav-icon">🎁</span>Bonus</a>
  <a href="/huong-dan/" class="nav-item"><span class="nav-icon">📖</span>Hướng Dẫn</a>
</nav>
</body>
</html>';

file_put_contents($BASE . '/casino/index.html', $listingHtml);
echo "✅ Casino listing page saved: /casino/\n\n";

echo "=== DONE! ===\n";
echo "✅ Generated " . count($CASINOS) . " casino pages\n";
echo "✅ Casino listing: /casino/\n";
echo "⚠️  DELETE: rm generate_casino_pages.php\n";
