<?php
/**
 * Slots Pages Generator for jun88.men
 * Generates 55 slot review pages
 * Run: php gen_slots.php
 */

$OPENAI_KEY = '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';
$ANTHROPIC_KEY = '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';

$BASE = '/home/admin/web/jun88.men/public_html';
$SLOTS_DIR = $BASE . '/slots';
$IMG_DIR = $BASE . '/images/slots';

$AFFILIATE_LINKS = [
    'https://track.smartlink-gh.site/sl?id=687a0b103913fc6f4740965e&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67977ae8d54db995337cdfd9&pid=3935',
    'https://track.smartlink-gh.site/sl?id=67935cda9c50ac5df850a615&pid=3935',
];

if (!is_dir($SLOTS_DIR)) mkdir($SLOTS_DIR, 0755, true);
if (!is_dir($IMG_DIR)) mkdir($IMG_DIR, 0755, true);

$SLOTS = [
    // Pragmatic Play
    ['slug'=>'gates-of-olympus','name'=>'Gates of Olympus','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Thần thoại Hy Lạp','hot'=>true,'link_idx'=>0],
    ['slug'=>'sweet-bonanza','name'=>'Sweet Bonanza','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'2,000 VND','max_win'=>'21,100x','theme'=>'Kẹo ngọt','hot'=>true,'link_idx'=>1],
    ['slug'=>'starlight-princess','name'=>'Starlight Princess','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Công chúa','hot'=>true,'link_idx'=>2],
    ['slug'=>'sugar-rush','name'=>'Sugar Rush','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Nhà máy kẹo','hot'=>false,'link_idx'=>0],
    ['slug'=>'big-bass-bonanza','name'=>'Big Bass Bonanza','provider'=>'Pragmatic Play','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,100x','theme'=>'Câu cá','hot'=>true,'link_idx'=>1],
    ['slug'=>'wolf-gold','name'=>'Wolf Gold','provider'=>'Pragmatic Play','rtp'=>'96.0%','volatility'=>'Trung bình','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Sói hoang dã','hot'=>false,'link_idx'=>2],
    ['slug'=>'fruit-party','name'=>'Fruit Party','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Trái cây','hot'=>false,'link_idx'=>0],
    ['slug'=>'great-rhino-megaways','name'=>'Great Rhino Megaways','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'20,000x','theme'=>'Tê giác châu Phi','hot'=>false,'link_idx'=>1],
    ['slug'=>'the-dog-house','name'=>'The Dog House','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'6,750x','theme'=>'Cún cưng','hot'=>false,'link_idx'=>2],
    ['slug'=>'wild-west-gold','name'=>'Wild West Gold','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'10,000x','theme'=>'Miền Tây hoang dã','hot'=>false,'link_idx'=>0],
    ['slug'=>'money-train-3','name'=>'Money Train 3','provider'=>'Relax Gaming','rtp'=>'96.0%','volatility'=>'Rất cao','min_bet'=>'2,000 VND','max_win'=>'100,000x','theme'=>'Tàu hỏa','hot'=>true,'link_idx'=>1],
    ['slug'=>'wanted-dead-or-wild','name'=>'Wanted Dead or a Wild','provider'=>'Hacksaw Gaming','rtp'=>'96.4%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'12,500x','theme'=>'Cao bồi','hot'=>true,'link_idx'=>2],
    // PG Soft
    ['slug'=>'mahjong-ways','name'=>'Mahjong Ways','provider'=>'PG Soft','rtp'=>'96.9%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'4,000x','theme'=>'Mạt chược','hot'=>true,'link_idx'=>0],
    ['slug'=>'mahjong-ways-2','name'=>'Mahjong Ways 2','provider'=>'PG Soft','rtp'=>'96.9%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'10,000x','theme'=>'Mạt chược 2','hot'=>true,'link_idx'=>1],
    ['slug'=>'lucky-neko','name'=>'Lucky Neko','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Mèo may mắn Nhật Bản','hot'=>true,'link_idx'=>2],
    ['slug'=>'tree-of-fortune','name'=>'Tree of Fortune','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Cây may mắn','hot'=>false,'link_idx'=>0],
    ['slug'=>'dragon-hatch','name'=>'Dragon Hatch','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Rồng nở','hot'=>false,'link_idx'=>1],
    ['slug'=>'gem-saviour-sword','name'=>'Gem Saviour Sword','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Kiếm ma thuật','hot'=>false,'link_idx'=>2],
    ['slug'=>'muay-thai-champion','name'=>'Muay Thai Champion','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Muay Thái','hot'=>false,'link_idx'=>0],
    ['slug'=>'ways-of-qilin','name'=>'Ways of the Qilin','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Kỳ lân','hot'=>false,'link_idx'=>1],
    ['slug'=>'jungle-delight','name'=>'Jungle Delight','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Trung bình','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Rừng nhiệt đới','hot'=>false,'link_idx'=>2],
    ['slug'=>'fortune-mouse','name'=>'Fortune Mouse','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Thấp','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Chuột may mắn','hot'=>false,'link_idx'=>0],
    // Crash games
    ['slug'=>'aviator','name'=>'Aviator','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'Không giới hạn','theme'=>'Máy bay','hot'=>true,'link_idx'=>1],
    ['slug'=>'jetx','name'=>'JetX','provider'=>'SmartSoft Gaming','rtp'=>'97.0%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'Không giới hạn','theme'=>'Tên lửa','hot'=>true,'link_idx'=>2],
    ['slug'=>'spaceman','name'=>'Spaceman','provider'=>'Pragmatic Play','rtp'=>'96.0%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'Không giới hạn','theme'=>'Du hành vũ trụ','hot'=>true,'link_idx'=>0],
    ['slug'=>'mines','name'=>'Mines','provider'=>'Spribe','rtp'=>'97.0%','volatility'=>'Tùy chọn','min_bet'=>'1,000 VND','max_win'=>'Không giới hạn','theme'=>'Mìn','hot'=>false,'link_idx'=>1],
    // NetEnt / Evolution
    ['slug'=>'starburst','name'=>'Starburst','provider'=>'NetEnt','rtp'=>'96.1%','volatility'=>'Thấp','min_bet'=>'1,000 VND','max_win'=>'500x','theme'=>'Không gian','hot'=>false,'link_idx'=>2],
    ['slug'=>'gonzo-quest','name'=>"Gonzo's Quest","provider"=>'NetEnt','rtp'=>'95.97%','volatility'=>'Trung bình','min_bet'=>'1,000 VND','max_win'=>'2,500x','theme'=>'Thám hiểm','hot'=>false,'link_idx'=>0],
    ['slug'=>'reactoonz','name'=>'Reactoonz','provider'=>'Play n GO','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'4,570x','theme'=>'Sinh vật ngoài hành tinh','hot'=>false,'link_idx'=>1],
    ['slug'=>'book-of-dead','name'=>'Book of Dead','provider'=>'Play n GO','rtp'=>'96.2%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Ai Cập','hot'=>true,'link_idx'=>2],
    // More popular
    ['slug'=>'rise-of-olympus','name'=>'Rise of Olympus','provider'=>'Play n GO','rtp'=>'96.5%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Thần Zeus','hot'=>false,'link_idx'=>0],
    ['slug'=>'fire-joker','name'=>'Fire Joker','provider'=>'Play n GO','rtp'=>'96.2%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'800x','theme'=>'Joker lửa','hot'=>false,'link_idx'=>1],
    ['slug'=>'mental','name'=>'Mental','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'75,000x','theme'=>'Bệnh viện tâm thần','hot'=>false,'link_idx'=>2],
    ['slug'=>'east-coast-vs-west-coast','name'=>'East Coast vs West Coast','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'30,000x','theme'=>'Hip hop','hot'=>false,'link_idx'=>0],
    ['slug'=>'deadwood','name'=>'Deadwood','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'25,000x','theme'=>'Miền Tây','hot'=>false,'link_idx'=>1],
    ['slug'=>'tombstone-rip','name'=>'Tombstone R.I.P.','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'50,000x','theme'=>'Nghĩa địa','hot'=>false,'link_idx'=>2],
    ['slug'=>'san-quentin','name'=>'San Quentin xWays','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'150,000x','theme'=>'Nhà tù','hot'=>true,'link_idx'=>0],
    ['slug'=>'fire-in-the-hole','name'=>'Fire in the Hole','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'60,000x','theme'=>'Mỏ than','hot'=>false,'link_idx'=>1],
    ['slug'=>'buffalo-king-megaways','name'=>'Buffalo King Megaways','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'10,000x','theme'=>'Bò rừng','hot'=>false,'link_idx'=>2],
    ['slug'=>'sweet-bonanza-xmas','name'=>'Sweet Bonanza Xmas','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'21,100x','theme'=>'Giáng sinh','hot'=>false,'link_idx'=>0],
    ['slug'=>'floating-dragon','name'=>'Floating Dragon','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Rồng nước','hot'=>false,'link_idx'=>1],
    ['slug'=>'5-lions-megaways','name'=>'5 Lions Megaways','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Sư tử','hot'=>false,'link_idx'=>2],
    ['slug'=>'bigger-bass-bonanza','name'=>'Bigger Bass Bonanza','provider'=>'Pragmatic Play','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'4,000x','theme'=>'Câu cá lớn','hot'=>false,'link_idx'=>0],
    ['slug'=>'cash-bonanza','name'=>'Cash Bonanza','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Tiền mặt','hot'=>false,'link_idx'=>1],
    ['slug'=>'lucky-lightning','name'=>'Lucky Lightning','provider'=>'Pragmatic Play','rtp'=>'96.5%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Sấm sét','hot'=>false,'link_idx'=>2],
    ['slug'=>'tractor-beam','name'=>'Tractor Beam','provider'=>'No Limit City','rtp'=>'96.0%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'30,000x','theme'=>'UFO','hot'=>false,'link_idx'=>0],
    ['slug'=>'mental-2','name'=>'Mental 2','provider'=>'Nolimit City','rtp'=>'96.0%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'50,000x','theme'=>'Bệnh viện','hot'=>false,'link_idx'=>1],
    ['slug'=>'legacy-of-dead','name'=>'Legacy of Dead','provider'=>'Play n GO','rtp'=>'96.5%','volatility'=>'Rất cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Ai Cập cổ đại','hot'=>false,'link_idx'=>2],
    ['slug'=>'rabbit-garden','name'=>'Rabbit Garden','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'3,000x','theme'=>'Vườn thỏ','hot'=>false,'link_idx'=>0],
    ['slug'=>'double-fortune','name'=>'Double Fortune','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Trung bình','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Rồng đôi','hot'=>false,'link_idx'=>1],
    ['slug'=>'crypto-gold','name'=>'Crypto Gold','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Tiền điện tử','hot'=>false,'link_idx'=>2],
    ['slug'=>'leprechaun-riches','name'=>'Leprechaun Riches','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Thần lùn Ireland','hot'=>false,'link_idx'=>0],
    ['slug'=>'treasures-of-aztec','name'=>'Treasures of Aztec','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'5,000x','theme'=>'Kho báu Aztec','hot'=>true,'link_idx'=>1],
    ['slug'=>'phoenix-rises','name'=>'Phoenix Rises','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Phượng hoàng','hot'=>false,'link_idx'=>2],
    ['slug'=>'wild-fireworks','name'=>'Wild Fireworks','provider'=>'PG Soft','rtp'=>'96.7%','volatility'=>'Cao','min_bet'=>'1,000 VND','max_win'=>'2,000x','theme'=>'Pháo hoa','hot'=>false,'link_idx'=>0],
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
    if (file_exists($jpgPath)) { echo "    ✓ exists\n"; return '/images/slots/'.str_replace('.png','.jpg',$file); }
    echo "    🎨 image...\n";
    $data = json_encode(['model'=>'gpt-image-1','prompt'=>$prompt.', game art style, vibrant colors, no text','n'=>1,'size'=>'1024x1024','output_format'=>'png']);
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
    return '/images/slots/'.str_replace('.png','.jpg',$file);
}

function stars($r) {
    $f=floor($r); return str_repeat('★',$f).(($r-$f)>=0.5?'½':'').str_repeat('☆',5-ceil($r));
}

echo "=== SLOTS GENERATOR ===\n".count($SLOTS)." slots\n\n";

foreach ($SLOTS as $i => $s) {
    $n=$s['name']; $slug=$s['slug'];
    echo "[".($i+1)."/".count($SLOTS)."] $n\n";

    $imgPath = genImage("{$n} slot game art, {$s['theme']} theme, casino slot machine interface, vibrant", "{$slug}.png", $OPENAI_KEY, $IMG_DIR);

    echo "    ✍️ texts...\n";

    $intro = claude("Viết 2 câu giới thiệu slot '{$n}' của {$s['provider']} cho người chơi Việt Nam. Đề cập chủ đề '{$s['theme']}' và RTP {$s['rtp']}. Tự nhiên như người thật. Chỉ 2 câu.", $ANTHROPIC_KEY, 150);

    $howto = claude("Viết hướng dẫn chơi slot '{$n}' của {$s['provider']} cho người mới. 3 đoạn ngắn: 1) Cách hoạt động cơ bản, 2) Tính năng đặc biệt và bonus, 3) Mẹo chơi hiệu quả. Mỗi đoạn 2-3 câu, bọc trong <p>. Tiếng Việt tự nhiên. Chỉ trả lời các đoạn.", $ANTHROPIC_KEY, 500);

    $why = claude("Viết 3-4 câu giải thích tại sao game '{$n}' được người Việt yêu thích. Đề cập max win {$s['max_win']} và volatility {$s['volatility']}. Tự nhiên, không quảng cáo quá. Chỉ 3-4 câu.", $ANTHROPIC_KEY, 200);

    $faq1a = claude("Trả lời: RTP của {$n} là bao nhiêu? Đề cập {$s['rtp']} và ý nghĩa. 2 câu ngắn.", $ANTHROPIC_KEY, 100);
    $faq2a = claude("Trả lời: {$n} có chơi demo miễn phí không? 2 câu ngắn cho người Việt.", $ANTHROPIC_KEY, 100);
    $faq3a = claude("Trả lời: Ở đâu chơi {$n} uy tín tại Việt Nam? 2 câu, đề cập nhà cái có game này. Ngắn gọn.", $ANTHROPIC_KEY, 100);

    $affiliateLink = $AFFILIATE_LINKS[$s['link_idx']];
    $hotBadge = $s['hot'] ? '<span class="hot">🔥 HOT</span>' : '';
    $imgTag = $imgPath ? "<img src=\"{$imgPath}\" alt=\"{$n} slot game\" title=\"Chơi {$n} - {$s['theme']}\">" : "<div class=\"iph\">🎰</div>";

    $html = <<<HTML
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$n} | Đánh Giá Slot | RTP {$s['rtp']} | Chơi Ngay</title>
<meta name="description" content="Đánh giá slot {$n} của {$s['provider']}. RTP {$s['rtp']}, thắng tối đa {$s['max_win']}, chủ đề {$s['theme']}. Hướng dẫn chơi và mẹo thắng lớn.">
<link rel="icon" type="image/png" href="/favicon.png">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{--g1:#7B2FBE;--g2:#EA4C89;--dark:#0D0D1A;--card:#161625;--card2:#1E1E32;--gold:#FFD166;--text:#F0F0FF;--muted:#8888AA;--green:#06D6A0;--red:#EF476F}
body{background:var(--dark);color:var(--text);font-family:'Nunito',sans-serif;max-width:480px;margin:0 auto;padding-bottom:80px}
.topbar{background:rgba(13,13,26,.97);padding:12px 16px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(123,47,190,.2)}
.logo{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;text-decoration:none}
.back{color:var(--muted);font-size:13px;text-decoration:none;font-weight:700}
.hero{width:100%;height:220px;overflow:hidden;background:var(--card2);position:relative}
.hero img{width:100%;height:100%;object-fit:cover}
.hero .iph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:70px}
.hot{position:absolute;top:12px;right:12px;background:var(--red);color:#fff;font-size:12px;font-weight:800;padding:4px 10px;border-radius:8px}
.header{padding:16px}
.name-row{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:6px}
.slot-h1{font-size:22px;font-weight:900}
.provider-badge{background:var(--card2);color:var(--muted);padding:4px 10px;border-radius:8px;font-size:12px;font-weight:700}
.intro{font-size:13px;color:var(--muted);line-height:1.6;margin-top:8px}
.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;padding:0 16px;margin-bottom:16px}
.stat{background:var(--card);border-radius:12px;padding:10px;text-align:center;border:1px solid rgba(255,255,255,.06)}
.stat-val{font-size:14px;font-weight:900;background:linear-gradient(135deg,var(--gold),#FFA500);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.stat-label{font-size:10px;color:var(--muted);margin-top:2px}
.cta{margin:0 16px 16px;background:linear-gradient(135deg,#1a0533,#2d0a4e);border:1px solid rgba(123,47,190,.3);border-radius:16px;padding:16px;text-align:center}
.cta-title{font-size:16px;font-weight:800;margin-bottom:4px}
.cta-sub{font-size:12px;color:var(--muted);margin-bottom:12px}
.btn{display:block;background:linear-gradient(135deg,var(--g1),var(--g2));color:#fff;padding:14px;border-radius:12px;font-weight:800;font-size:15px;text-decoration:none}
.sec{padding:0 16px;margin-bottom:20px}
.sec h2{font-size:17px;font-weight:800;margin-bottom:12px;padding-bottom:6px;border-bottom:1px solid rgba(255,255,255,.08)}
.sec h2 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}
.body-text{font-size:13px;color:rgba(240,240,255,.85);line-height:1.7}
.body-text p{margin-bottom:12px}
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.icard{background:var(--card);border-radius:10px;padding:10px;border:1px solid rgba(255,255,255,.06)}
.ilabel{font-size:11px;color:var(--muted);margin-bottom:3px}
.ivalue{font-size:13px;font-weight:700}
.faq{background:var(--card);border-radius:12px;margin-bottom:8px;overflow:hidden;border:1px solid rgba(255,255,255,.06)}
.fq{padding:14px 16px;font-size:13px;font-weight:700;display:flex;justify-content:space-between;cursor:pointer}
.fi{color:var(--g2);transition:.2s}
.faq.open .fi{transform:rotate(45deg)}
.fa{font-size:12px;color:var(--muted);line-height:1.6;max-height:0;overflow:hidden;transition:max-height .3s,padding .3s}
.faq.open .fa{max-height:200px;padding:0 16px 14px}
.related-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.rel-card{background:var(--card);border-radius:12px;padding:12px;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06);display:block}
.rel-name{font-size:13px;font-weight:700;margin-bottom:2px}
.rel-rtp{font-size:11px;color:var(--muted)}
.bnav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}
.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}
.ni.a{color:#EA4C89}
.ico{font-size:20px}
</style>
</head>
<body>
<div class="topbar"><a href="/" class="logo">🎰 CasinoVN</a><a href="/slots/" class="back">← Slots</a></div>
<div class="hero">{$hotBadge}{$imgTag}</div>
<div class="header">
  <div class="name-row">
    <h1 class="slot-h1">{$n}</h1>
    <span class="provider-badge">{$s['provider']}</span>
  </div>
  <p class="intro">{$intro}</p>
</div>
<div class="stats">
  <div class="stat"><div class="stat-val">{$s['rtp']}</div><div class="stat-label">RTP</div></div>
  <div class="stat"><div class="stat-val">{$s['max_win']}</div><div class="stat-label">Max Win</div></div>
  <div class="stat"><div class="stat-val">{$s['volatility']}</div><div class="stat-label">Biến động</div></div>
</div>
<div class="cta">
  <div class="cta-title">🎮 Chơi {$n} Ngay</div>
  <div class="cta-sub">Nhà cái uy tín · Bonus chào mừng hấp dẫn</div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="btn">Chơi Ngay →</a>
</div>
<div class="sec">
  <h2>📖 Hướng Dẫn <span>Chơi {$n}</span></h2>
  <div class="body-text">{$howto}</div>
</div>
<div class="sec">
  <h2>⭐ Tại Sao Nên <span>Chơi?</span></h2>
  <div class="body-text"><p>{$why}</p></div>
</div>
<div class="sec">
  <h2>📊 Thông Tin <span>Chi Tiết</span></h2>
  <div class="info-grid">
    <div class="icard"><div class="ilabel">Nhà cung cấp</div><div class="ivalue">{$s['provider']}</div></div>
    <div class="icard"><div class="ilabel">Chủ đề</div><div class="ivalue">{$s['theme']}</div></div>
    <div class="icard"><div class="ilabel">RTP</div><div class="ivalue">{$s['rtp']}</div></div>
    <div class="icard"><div class="ilabel">Biến động</div><div class="ivalue">{$s['volatility']}</div></div>
    <div class="icard"><div class="ilabel">Cược tối thiểu</div><div class="ivalue">{$s['min_bet']}</div></div>
    <div class="icard"><div class="ilabel">Thắng tối đa</div><div class="ivalue">{$s['max_win']}</div></div>
  </div>
</div>
<div class="sec">
  <h2>❓ Câu Hỏi <span>Thường Gặp</span></h2>
  <div class="faq"><div class="fq">RTP của {$n} là bao nhiêu? <span class="fi">+</span></div><div class="fa">{$faq1a}</div></div>
  <div class="faq"><div class="fq">{$n} có chơi demo miễn phí không? <span class="fi">+</span></div><div class="fa">{$faq2a}</div></div>
  <div class="faq"><div class="fq">Chơi {$n} ở đâu uy tín? <span class="fi">+</span></div><div class="fa">{$faq3a}</div></div>
</div>
<div class="cta" style="margin:0 16px 20px">
  <div class="cta-title">🎰 Sẵn Sàng Chơi?</div>
  <div class="cta-sub">Đăng ký nhà cái uy tín · Nhận bonus ngay</div>
  <a href="{$affiliateLink}" target="_blank" rel="noopener" class="btn">Đăng Ký & Chơi Ngay →</a>
</div>
<nav class="bnav">
  <a href="/" class="ni"><span class="ico">🏠</span>Trang Chủ</a>
  <a href="/casino/" class="ni"><span class="ico">🎰</span>Nhà Cái</a>
  <a href="/slots/" class="ni a"><span class="ico">🎲</span>Slots</a>
  <a href="/khuyen-mai/" class="ni"><span class="ico">🎁</span>Bonus</a>
  <a href="/huong-dan/" class="ni"><span class="ico">📖</span>Hướng Dẫn</a>
</nav>
<script>document.querySelectorAll('.fq').forEach(q=>q.addEventListener('click',()=>q.closest('.faq').classList.toggle('open')));</script>
</body>
</html>
HTML;

    $dir = $BASE.'/slots/'.$slug;
    if (!is_dir($dir)) mkdir($dir, 0755, true);
    file_put_contents($dir.'/index.html', $html);
    echo "    ✅ /slots/{$slug}/\n\n";
    sleep(2);
}

// Slots listing page
echo "📋 Generating slots listing...\n";
$listing = '<!DOCTYPE html><html lang="vi"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Slot Game Online Việt Nam | Top 55 Game Hot Nhất</title><meta name="description" content="Danh sách 55+ slot game online phổ biến nhất tại Việt Nam. Gates of Olympus, Aviator, Mahjong Ways và nhiều game hot khác. Hướng dẫn chơi và RTP chi tiết."><link rel="icon" type="image/png" href="/favicon.png"><link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet"><style>*{margin:0;padding:0;box-sizing:border-box}:root{--g1:#7B2FBE;--g2:#EA4C89;--dark:#0D0D1A;--card:#161625;--gold:#FFD166;--text:#F0F0FF;--muted:#8888AA;--red:#EF476F}body{background:var(--dark);color:var(--text);font-family:"Nunito",sans-serif;max-width:480px;margin:0 auto;padding-bottom:80px}.topbar{background:rgba(13,13,26,.97);padding:12px 16px;display:flex;position:sticky;top:0;z-index:100;border-bottom:1px solid rgba(123,47,190,.2)}.logo{font-size:18px;font-weight:900;background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;text-decoration:none}.ph{padding:20px 16px 10px}h1{font-size:22px;font-weight:900;margin-bottom:6px}h1 span{background:linear-gradient(135deg,var(--g1),var(--g2));-webkit-background-clip:text;-webkit-text-fill-color:transparent}.sub{font-size:13px;color:var(--muted);margin-bottom:16px}.grid{padding:0 16px;display:grid;grid-template-columns:1fr 1fr;gap:12px}.card{background:var(--card);border-radius:14px;overflow:hidden;text-decoration:none;color:var(--text);border:1px solid rgba(255,255,255,.06);position:relative}.thumb{width:100%;aspect-ratio:1;overflow:hidden;background:#1E1E32}.thumb img{width:100%;height:100%;object-fit:cover}.hot{position:absolute;top:6px;right:6px;background:var(--red);color:#fff;font-size:10px;font-weight:800;padding:2px 6px;border-radius:5px}.info{padding:10px}.iname{font-size:13px;font-weight:800;margin-bottom:2px}.iprov{font-size:11px;color:var(--muted)}.irtp{font-size:11px;color:var(--gold);font-weight:700;margin-top:2px}.bnav{position:fixed;bottom:0;left:50%;transform:translateX(-50%);width:100%;max-width:480px;background:rgba(13,13,26,.97);border-top:1px solid rgba(255,255,255,.08);display:flex;padding:8px 0}.ni{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px;text-decoration:none;color:var(--muted);font-size:10px;font-weight:700}.ni.a{color:#EA4C89}.ico{font-size:20px}</style></head><body><div class="topbar"><a href="/" class="logo">🎰 CasinoVN</a></div><div class="ph"><h1>Slot Game <span>Online</span></h1><p class="sub">55+ game hot nhất tại Việt Nam</p></div><div class="grid">';

foreach ($SLOTS as $s) {
    $hot = $s['hot'] ? '<div class="hot">🔥 HOT</div>' : '';
    $listing .= '<a href="/slots/'.$s['slug'].'/" class="card">'.$hot.'<div class="thumb"><img src="/images/slots/'.$s['slug'].'.jpg" alt="'.$s['name'].'" loading="lazy"></div><div class="info"><div class="iname">'.$s['name'].'</div><div class="iprov">'.$s['provider'].'</div><div class="irtp">RTP '.$s['rtp'].'</div></div></a>';
}

$listing .= '</div><nav class="bnav"><a href="/" class="ni"><span class="ico">🏠</span>Trang Chủ</a><a href="/casino/" class="ni"><span class="ico">🎰</span>Nhà Cái</a><a href="/slots/" class="ni a"><span class="ico">🎲</span>Slots</a><a href="/khuyen-mai/" class="ni"><span class="ico">🎁</span>Bonus</a><a href="/huong-dan/" class="ni"><span class="ico">📖</span>Hướng Dẫn</a></nav></body></html>';

file_put_contents($BASE.'/slots/index.html', $listing);
echo "✅ Listing saved\n\n=== DONE ===\n⚠️  Run: rm gen_slots.php\n";
