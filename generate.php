<?php
/**
 * One-time generator for jun88.men
 * Generates: casino images, slot images, favicon, AI texts
 * Run once: php generate.php
 * Delete after use!
 */

$OPENAI_KEY = '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';
$ANTHROPIC_KEY = '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';

$BASE = '/home/admin/web/jun88.men/public_html';
$IMG_DIR = $BASE . '/images';

// Create images dir
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

echo "=== JUN88.MEN GENERATOR ===\n\n";

// ============================================
// FUNCTIONS
// ============================================

function generateImage($prompt, $filename, $openaiKey) {
    global $IMG_DIR;
    $filepath = $IMG_DIR . '/' . $filename;
    
    if (file_exists($filepath)) {
        echo "  ✓ Already exists: $filename\n";
        return '/images/' . $filename;
    }
    
    echo "  🎨 Generating: $filename...\n";
    
    $data = json_encode([
        'model' => 'dall-e-3',
        'prompt' => $prompt . ', high quality, no text, no watermark',
        'n' => 1,
        'size' => '1024x1024',
        'quality' => 'standard'
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
        CURLOPT_TIMEOUT => 60
    ]);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    $result = json_decode($response, true);
    
    if (!isset($result['data'][0]['url'])) {
        echo "  ❌ Error: " . ($result['error']['message'] ?? 'Unknown') . "\n";
        return null;
    }
    
    $imageUrl = $result['data'][0]['url'];
    
    // Download and save
    $imageData = file_get_contents($imageUrl);
    if ($imageData) {
        file_put_contents($filepath, $imageData);
        echo "  ✅ Saved: $filename (" . round(strlen($imageData)/1024) . "KB)\n";
        return '/images/' . $filename;
    }
    
    return null;
}

function generateText($prompt, $anthropicKey) {
    echo "  ✍️  Generating text...\n";
    
    $data = json_encode([
        'model' => 'claude-sonnet-4-6',
        'max_tokens' => 200,
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
        CURLOPT_TIMEOUT => 30
    ]);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    $result = json_decode($response, true);
    return $result['content'][0]['text'] ?? '';
}

function resizeToFavicon($srcPath, $dstPath) {
    if (!function_exists('imagecreatefromjpeg')) {
        // Fallback: copy as-is
        copy($srcPath, $dstPath);
        return;
    }
    $src = imagecreatefromjpeg($srcPath);
    $favicon = imagecreatetruecolor(32, 32);
    imagecopyresampled($favicon, $src, 0, 0, 0, 0, 32, 32, imagesx($src), imagesy($src));
    imagepng($favicon, $dstPath);
    imagedestroy($src);
    imagedestroy($favicon);
}

// ============================================
// 1. FAVICON
// ============================================
echo "📌 FAVICON\n";
$faviconSrc = generateImage(
    'Casino logo icon, golden coin with playing card symbols, purple background, minimal flat design, square format',
    'favicon_src.jpg',
    $OPENAI_KEY
);
if ($faviconSrc) {
    $faviconPath = $BASE . '/favicon.png';
    resizeToFavicon($IMG_DIR . '/favicon_src.jpg', $faviconPath);
    echo "  ✅ Favicon saved\n\n";
}

// ============================================
// 2. CASINO IMAGES
// ============================================
echo "🎰 CASINO IMAGES\n";
$casinos = [
    1 => [
        'img_prompt' => 'Luxury Vietnamese casino online platform, golden purple theme, modern mobile interface, Vietnamese decorations, photorealistic dark background, premium feel',
        'img_file' => 'casino_top1.jpg',
        'text_prompt' => 'Viết 2 câu mô tả (tiếng Việt) cho nhà cái casino online hạng 1 uy tín nhất Việt Nam 2026. Nhấn mạnh: độ uy tín cao nhất, rút tiền nhanh nhất, bonus hấp dẫn nhất. Chỉ trả lời đúng 2 câu, không thêm gì.'
    ],
    2 => [
        'img_prompt' => 'Premium Vietnamese online casino, silver blue neon theme, slot machines interface, exciting gambling atmosphere, dark luxury background, photorealistic',
        'img_file' => 'casino_top2.jpg',
        'text_prompt' => 'Viết 2 câu mô tả (tiếng Việt) cho nhà cái casino online hạng 2 uy tín tại Việt Nam 2026. Nhấn mạnh: game đa dạng, hỗ trợ 24/7, thanh toán nhanh. Chỉ trả lời đúng 2 câu, không thêm gì.'
    ],
    3 => [
        'img_prompt' => 'Vietnamese online betting platform, bronze red theme, sports betting and casino mix, football and cards, exciting dark background, photorealistic',
        'img_file' => 'casino_top3.jpg',
        'text_prompt' => 'Viết 2 câu mô tả (tiếng Việt) cho nhà cái casino online hạng 3 uy tín tại Việt Nam 2026. Nhấn mạnh: cá cược thể thao tốt, slots phong phú, bonus hàng ngày. Chỉ trả lời đúng 2 câu, không thêm gì.'
    ]
];

$casinoData = [];
foreach ($casinos as $rank => $c) {
    echo "\n  Casino Top $rank:\n";
    $imgPath = generateImage($c['img_prompt'], $c['img_file'], $OPENAI_KEY);
    $text = generateText($c['text_prompt'], $ANTHROPIC_KEY);
    $casinoData[$rank] = ['img' => $imgPath, 'text' => $text];
    echo "  ✅ Done\n";
    sleep(2); // Rate limit
}

// ============================================
// 3. SLOT IMAGES
// ============================================
echo "\n🎲 SLOT IMAGES\n";
$slots = [
    ['name' => 'Gates of Olympus', 'file' => 'slot_gates.jpg', 'prompt' => 'Gates of Olympus slot game art, Zeus lightning bolts, golden coins, Greek temple, vibrant purple blue colors, game art style, no text'],
    ['name' => 'Sweet Bonanza', 'file' => 'slot_bonanza.jpg', 'prompt' => 'Sweet Bonanza slot game art, colorful candy land, tumbling fruits and sweets, bright cheerful colors, game art style, no text'],
    ['name' => 'Aviator', 'file' => 'slot_aviator.jpg', 'prompt' => 'Aviator crash game art, small airplane flying upward, neon blue sky, multiplier numbers, modern minimalist style, game art, no text'],
    ['name' => 'Mahjong Ways', 'file' => 'slot_mahjong.jpg', 'prompt' => 'Mahjong Ways slot game art, Chinese mahjong tiles, dragon symbols, golden Asian temple, red gold colors, game art style, no text'],
    ['name' => 'Lucky Neko', 'file' => 'slot_neko.jpg', 'prompt' => 'Lucky Neko slot game art, Japanese lucky cat maneki neko, golden coins, cherry blossoms, vibrant Asian colors, game art style, no text'],
    ['name' => 'Sugar Rush', 'file' => 'slot_sugar.jpg', 'prompt' => 'Sugar Rush slot game art, candy factory, colorful sweets and lollipops, bright pink purple colors, game art style, no text'],
];

$slotData = [];
foreach ($slots as $slot) {
    echo "\n  Slot: {$slot['name']}:\n";
    $imgPath = generateImage($slot['prompt'], $slot['file'], $OPENAI_KEY);
    $slotData[] = ['name' => $slot['name'], 'img' => $imgPath];
    sleep(2);
}

// ============================================
// 4. UPDATE HTML
// ============================================
echo "\n📝 UPDATING HTML\n";

$html = file_get_contents($BASE . '/index.html');

// Add favicon to head
$faviconTag = '<link rel="icon" type="image/png" href="/favicon.png">';
$html = str_replace('</head>', $faviconTag . "\n</head>", $html);

// Remove JS API calls and replace with static content
$casinoLinks = [
    1 => 'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    2 => 'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    3 => 'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];
$casinoBonuses = [1 => '200% + 100 Free Spin', 2 => '150% + 50 Free Spin', 3 => '100% lên đến 5 triệu'];
$casinoFeatures = [
    1 => ['Live Casino', 'Slots', 'Bóng Đá'],
    2 => ['Slots Hot', 'Esports', 'Poker'],
    3 => ['Sports Bet', 'Baccarat', 'Roulette']
];
$rankClass = [1 => 'rank-gold', 2 => 'rank-silver', 3 => 'rank-bronze'];
$rankLabel = [1 => '🥇 Top 1', 2 => '🥈 Top 2', 3 => '🥉 Top 3'];

// Build static casino HTML
$casinoHtml = '';
foreach ($casinoData as $rank => $data) {
    $img = $data['img'] ? '<img src="'.$data['img'].'" alt="Nhà cái casino online hạng '.$rank.' uy tín Việt Nam" title="Top '.$rank.' nhà cái casino Vietnam">' : '<div class="img-ph">🎰</div>';
    $features = implode('', array_map(fn($f) => '<span class="feature-tag">✓ '.$f.'</span>', $casinoFeatures[$rank]));
    $casinoHtml .= '
<a href="'.$casinoLinks[$rank].'" target="_blank" rel="noopener" class="casino-card">
  <div class="casino-card-img">
    '.$img.'
    <div class="casino-rank-badge '.$rankClass[$rank].'">'.$rankLabel[$rank].'</div>
    <div class="casino-bonus-tag">🎁 '.$casinoBonuses[$rank].'</div>
  </div>
  <div class="casino-card-body">
    <h2 class="casino-card-name">Nhà Cái Hạng '.$rank.' Uy Tín</h2>
    <p class="casino-card-desc">'.htmlspecialchars($data['text']).'</p>
    <div class="casino-features">'.$features.'</div>
    <div class="casino-cta">Đăng Ký Nhận Bonus →</div>
  </div>
</a>';
}

// Build static slots HTML
$slotsHtml = '';
$hotSlots = ['Gates of Olympus', 'Sweet Bonanza', 'Aviator', 'Sugar Rush'];
$slotRtps = ['Gates of Olympus'=>'96.5%','Sweet Bonanza'=>'96.5%','Aviator'=>'97%','Mahjong Ways'=>'96.9%','Lucky Neko'=>'96.7%','Sugar Rush'=>'96.5%'];

foreach ($slotData as $slot) {
    $isHot = in_array($slot['name'], $hotSlots);
    $img = $slot['img'] ? '<img src="'.$slot['img'].'" alt="'.$slot['name'].' slot game Vietnam" title="Chơi '.$slot['name'].' tại nhà cái uy tín">' : '<div class="img-ph">🎲</div>';
    $hotBadge = $isHot ? '<div class="slot-hot">🔥 HOT</div>' : '';
    $slotsHtml .= '
<a href="'.$casinoLinks[1].'" target="_blank" class="slot-card">
  <div class="slot-card-img">
    '.$img.'
    '.$hotBadge.'
  </div>
  <div class="slot-card-info">
    <div class="slot-card-name">'.$slot['name'].'</div>
    <div class="slot-card-rtp">RTP '.($slotRtps[$slot['name']] ?? '96%').'</div>
  </div>
</a>';
}

// Remove JS block and replace dynamic divs with static HTML
$html = preg_replace('/<script>.*?<\/script>/s', '', $html);

// Replace casino-list div
$html = preg_replace(
    '/<div class="casino-scroll" id="casino-list">.*?<\/div>/s',
    '<div class="casino-scroll" id="casino-list">'.$casinoHtml.'</div>',
    $html
);

// Replace slots-list div
$html = preg_replace(
    '/<div class="slots-scroll" id="slots-list">.*?<\/div>/s',
    '<div class="slots-scroll" id="slots-list">'.$slotsHtml.'</div>',
    $html
);

// Add back FAQ JS only
$faqJs = '<script>document.querySelectorAll(".faq-q").forEach(q=>{q.addEventListener("click",()=>q.closest(".faq-item").classList.toggle("open"));});</script>';
$html = str_replace('</body>', $faqJs."\n</body>", $html);

file_put_contents($BASE . '/index.html', $html);
echo "  ✅ index.html updated with static content\n\n";

echo "=== DONE! ===\n";
echo "✅ Favicon: /favicon.png\n";
echo "✅ Casino images: /images/casino_top1.jpg, top2, top3\n";
echo "✅ Slot images: /images/slot_*.jpg\n";
echo "✅ index.html updated - no more API calls on load!\n\n";
echo "⚠️  DELETE THIS FILE: rm generate.php\n";
