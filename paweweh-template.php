<?php
/**
 * Template Name: Paweweh Wedding Adat Jawa
 */
get_header(); ?>
<main id="paweweh-wedding">
<div id="cover">
  <svg class="gunungan" viewBox="0 0 100 140" fill="none" aria-hidden="true">
    <path d="M50 4 C58 30 74 52 74 82 C74 110 64 130 50 136 C36 130 26 110 26 82 C26 52 42 30 50 4Z" stroke="#e8c96a" stroke-width="2"/>
    <path d="M50 24 C55 44 64 58 64 80 C64 102 58 116 50 121 C42 116 36 102 36 80 C36 58 45 44 50 24Z" fill="#e8c96a" fill-opacity="0.18" stroke="#e8c96a" stroke-width="1"/>
    <circle cx="50" cy="84" r="8" stroke="#e8c96a" stroke-width="1.5"/>
    <path d="M42 84 h16 M50 76 v16" stroke="#e8c96a" stroke-width="1.2"/>
  </svg>
  <div class="aksara">ꦧ꧀ꦲꦸꦥꦸꦮꦶ</div>
  <div class="names"><?php echo esc_html(get_option('paweweh_groom','Bagas')); ?><br>&amp;<br><?php echo esc_html(get_option('paweweh_bride','Laras')); ?></div>
  <div class="date"><?php echo esc_html(get_option('paweweh_date_display','12 · 12 · 2026')); ?></div>
  <button class="open-btn" onclick="openCover()">BUKA UNDANGAN</button>
</div>

<section class="hero">
  <div class="frame">
    <div class="panggilan">Walimatul 'Ursy</div>
    <div class="divider">❀</div>
    <div class="names"><?php echo esc_html(get_option('paweweh_groom','Bagas')); ?><em>&amp;</em><?php echo esc_html(get_option('paweweh_bride','Larasati')); ?></div>
    <div class="divider">꧁ ꦏ ꦧ ꦤ ꦫ ꧁</div>
    <div class="tanggal"><?php echo esc_html(get_option('paweweh_date_display','Sabtu, 12 Desember 2026')); ?></div>
    <div class="weton"><?php echo esc_html(get_option('paweweh_weton','Passaran Wage — 12 Dhesa 2026')); ?></div>
    <p><?php echo wp_kses_post(get_option('paweweh_pangling','"Bismillahirrahmanirrahim.<br>Tiwasaning pujung kalangking, tembung prasaja saka sanubari,<br>kepareng rawuh ing pahargyan."')); ?></p>
  </div>
  <div class="scroll-hint">▼ GESER</div>
</section>

<section class="batik-kawung">
  <div class="container reveal">
    <h2 class="sec-title">Hitung Mundur</h2>
    <div class="sec-sub">ꦢꦺꦴꦏ꧀ꦊꦴꦃꦩꦤ꧀</div>
    <div class="countdown" id="countdown">
      <div class="cd-box"><b id="cd-d">00</b><span>HARI</span></div>
      <div class="cd-box"><b id="cd-h">00</b><span>JAM</span></div>
      <div class="cd-box"><b id="cd-m">00</b><span>MENIT</span></div>
      <div class="cd-box"><b id="cd-s">00</b><span>DETIK</span></div>
    </div>
  </div>
</section>

<section style="background:var(--cream)">
  <div class="container reveal">
    <h2 class="sec-title">Dados Pengantin</h2>
    <div class="sec-sub">ꦥꦸꦫꦫꦶꦢ꧀ꦝꦤ꧀</div>
    <div class="divider">꧁ ꦠ ꦮ ꦤ ꦤ ꧁</div>
    <div style="display:flex;gap:40px;justify-content:center;flex-wrap:wrap;margin-top:20px;text-align:center">
      <div>
        <div style="width:150px;height:150px;margin:0 auto 14px;border-radius:50%;border:3px double var(--gold);background:linear-gradient(135deg,#e8dcc0,#faf6ec);display:flex;align-items:center;justify-content:center;font-size:52px">꧁</div>
        <h3 style="font-family:'Cormorant Garamond',serif;font-size:30px;color:var(--brown)"><?php echo esc_html(get_option('paweweh_groom','Bagas Prakoso')); ?></h3>
        <p style="color:#6b4a2a;line-height:1.7;font-size:16px"><?php echo wp_kses_post(get_option('paweweh_groom_desc','Putra pertama dari<br>Bapak Sujono &amp; Ibu Sri Wahyuni<br>Yogyakarta')); ?></p>
      </div>
      <div style="font-family:'Cormorant Garamond',serif;font-size:54px;color:var(--gold);align-self:center">&amp;</div>
      <div>
        <div style="width:150px;height:150px;margin:0 auto 14px;border-radius:50%;border:3px double var(--gold);background:linear-gradient(135deg,#e8dcc0,#faf6ec);display:flex;align-items:center;justify-content:center;font-size:52px">꧁</div>
        <h3 style="font-family:'Cormorant Garamond',serif;font-size:30px;color:var(--brown)"><?php echo esc_html(get_option('paweweh_bride','Larasati Dewi')); ?></h3>
        <p style="color:#6b4a2a;line-height:1.7;font-size:16px"><?php echo wp_kses_post(get_option('paweweh_bride_desc','Putri kedua dari<br>Bapak Hartono &amp; Ibu Endang Susilowati<br>Solo')); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="batik-parang">
  <div class="container reveal">
    <h2 class="sec-title">Rundown Acara</h2>
    <div class="sec-sub">ꦢꦺꦴꦏ꧀ꦊꦴꦃꦩꦤ꧀</div>
    <div class="timeline">
      <?php
      $events = get_option('paweweh_events', [
        ['aks'=>'ꦧ꧀ꦭꦃꦫꦤ꧀','title'=>'Siraman &amp; Midodareni','time'=>'Jumat, 11 Des 2026 — 15.00 WIB','loc'=>'Rumah mempelai putri, Jl. Slamet Riyadi No. 88, Solo'],
        ['aks'=>'ꦢꦸꦮ꧀ꦃꦘꦈꦩꦤ꧀','title'=>'Akad Nikah','time'=>'Sabtu, 12 Des 2026 — 08.00 WIB','loc'=>'Grha Adi Buwana, Jl. Magelang Km. 6, Yogyakarta'],
        ['aks'=>'ꦧ꧀ꦫꦺꦴꦢꦺꦴ','title'=>'Resepsi','time'=>'Sabtu, 12 Des 2026 — 11.00 – 14.00 WIB','loc'=>'Grha Adi Buwana — pendopo jawa, Jl. Magelang Km. 6, Yogyakarta'],
        ['aks'=>'ꦥꦸꦥꦸꦃꦩꦤ꧀','title'=>'Mapag Penganten','time'=>'Sabtu, 12 Des 2026 — 15.00 WIB','loc'=>'Rumah mempelai putra, Bantul, Yogyakarta'],
      ]);
      foreach($events as $i=>$e): ?>
      <div class="tl-item reveal">
        <div class="aks"><?php echo esc_html($e['aks']); ?></div>
        <h3><?php echo esc_html($e['title']); ?></h3>
        <div class="jam"><?php echo esc_html($e['time']); ?></div>
        <p><?php echo esc_html($e['loc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="pewuwuhan">
  <div class="container reveal">
    <h2 class="sec-title" style="color:var(--gold-soft)">Pewuwuhan</h2>
    <div class="sec-sub">ꦥꦸꦮꦸꦃꦩꦤ꧀</div>
    <div class="card">
      <?php echo wp_kses_post(get_option('paweweh_pewuwuhan','"Mugi-mugi ingkang paring sih kalayan gusti Allah SWT, tansah maringaken slamet kagem putra-putri kami. Bilih woning panyuwunan lan cacahing lepat, dongakaken awrat diliputi pangaksopsing langgeng ing dunya tuwin akhirat."')); ?>
      <div class="sign">— <?php echo esc_html(get_option('paweweh_pewuwuhan_sign','Keluarga Besar Prakoso &amp; Hartono')); ?> —</div>
    </div>
  </div>
</section>

<section class="batik-kawung" style="background:var(--cream)">
  <div class="container reveal">
    <h2 class="sec-title">Galeri</h2>
    <div class="sec-sub">ꦒꦭꦺꦫꦶ</div>
    <div class="gallery">
      <?php
      $photos = get_option('paweweh_gallery', [
        'https://via.placeholder.com/400x533/e8dcc0/5a3a1e?text=Prewedding+1',
        'https://via.placeholder.com/400x533/e8dcc0/5a3a1e?text=Prewedding+2',
        'https://via.placeholder.com/400x533/e8dcc0/5a3a1e?text=Prewedding+3',
        'https://via.placeholder.com/400x533/e8dcc0/5a3a1e?text=Prewedding+4',
      ]);
      foreach($photos as $p): ?>
      <div class="ph"><img src="<?php echo esc_url($p); ?>" alt="Prewedding" style="width:100%;height:100%;object-fit:cover"></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="rsvp">
  <div class="container reveal">
    <h2 class="sec-title">Konfirmasi Kehadiran</h2>
    <div class="sec-sub">ꦢꦺꦴꦏ꧀ꦊꦴꦃꦩꦤ꧀</div>
    <form id="paweweh-rsvp" onsubmit="sendRsvp(event)">
      <label>NAMA</label>
      <input type="text" name="nama" placeholder="Nama lengkap Anda" required>
      <label>KEHADIRAN</label>
      <select name="status" required>
        <option value="">— pilih —</option>
        <option>Ya, saya hadir</option>
        <option>Ya, hadir + 1</option>
        <option>Maaf, tidak bisa hadir</option>
      </select>
      <label>JUMLAH ORANG</label>
      <input type="number" name="jml" min="1" max="10" value="1">
      <label>PESAN / DOA</label>
      <textarea name="pesan" rows="4" placeholder="Tuliskan doa &amp; ucapan..."></textarea>
      <button class="submit-btn" type="submit">KIRIM KONFIRMASI</button>
    </form>
    <p id="rsvpOk" style="display:none;margin-top:20px;color:var(--red);font-size:19px">Sampun kadhaftar. Matur nuwun! 🙏</p>
    <div style="margin-top:34px;font-size:16px;color:#6b4a2a;line-height:1.9">
      <b>Lokasi:</b><br>
      <a href="<?php echo esc_url(get_option('paweweh_maps_url','https://maps.google.com/?q=Grha+Adi+Buwana+Yogyakarta')); ?>" target="_blank" style="color:var(--red)">📍 Buka Google Maps</a>
    </div>
  </div>
</section>
</main>

<footer>
  <div class="doa">
    ꦱꦸꦫꦤ꧀ꦢꦸꦮ꧀ꦤ꧀ꦢꦸꦃꦝꦸꦫꦸꦮ꧀ꦤ꧀<br><br>
    "Barang sing perlu dijupuk ya dijupuk, barang sing ora perlu ya ora usah."<br>
    Matur nuwun sampun rawuh ing pahargyan kami.
  </div>
  <div class="credit">© <?php echo date('Y'); ?> — Paweweh Template Adat Jawa</div>
</footer>

<button id="musicBtn" onclick="toggleMusic()" title="Gamelan">♪</button>

<?php get_footer(); ?>
